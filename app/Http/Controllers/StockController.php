<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Http\Resources\StockResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Stock::orderBy('name')->get();
        $resource = StockResource::collection($data);

        return response()->json([
            'data' => $resource,
            'response' => 200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'cost' => 'required|numeric', // Tambahkan validasi untuk cost
            'quantity' => 'required|numeric',
            'description' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'sometimes',
            'warehouse_id' => 'required|exists:warehouses,id',
        ]);

        $imageName = 'default.png';
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . date('Ymd') . '.webp';
            $webpImageData = Image::make($request->image);
            $webpImageData->encode('webp');
            $webpImageData->resize(200, 250);
            Storage::put('public/stock/' . $imageName, (string) $webpImageData);
        }

        $stock = new Stock();
        $stock->name = $input['name'];
        $stock->price = $input['price'];
        $stock->cost = $input['cost']; // Simpan cost
        $stock->quantity = $input['quantity'];
        $stock->description = $input['description'] ?? null;
        $stock->date = $input['date'] ?? null;
        $stock->image = $imageName;
        $stock->warehouse_id = $input['warehouse_id'];
        $stock->save();
        return response()->json([
            'data' => $stock,
            'response' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Stock::find($id);
        if (!$data) {
            return response()->json([
                'message' => 'Stock Not Found',
                'status' => 404
            ], 404);
        }
        $resource = new StockResource($data);

        return response()->json([
            'data' => $resource,
            'response' => 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json([
                'message' => 'Stock Not Found',
                'status' => 404
            ], 404);
        }

        $resource = new StockResource($stock);

        return response()->json([
            'data' => $resource,
            'response' => 200
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'cost' => 'required|numeric', // Tambahkan validasi untuk cost
            'quantity' => 'required|numeric',
            'description' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'sometimes',
            'warehouse_id' => 'required|exists:warehouses,id',
        ]);

        $dataStock = Stock::find($id);
        if (!$dataStock) {
            return response()->json([
                'message' => 'Stock Not Found',
                'status' => 404
            ], 404);
        }

        $imageName = $dataStock->image;
        if ($request->hasFile('image')) {
            $imageName != 'default.png' ? Storage::delete('public/stock/' . $dataStock->image) : null;
            $imageName = Str::random(10) . date('Ymd') . '.webp';
            $webpImageData = Image::make($request->image);
            $webpImageData->encode('webp');
            $webpImageData->resize(200, 250);
            Storage::put('public/stock/' . $imageName, (string) $webpImageData);
        }

        $dataStock->name = $input['name'];
        $dataStock->price = $input['price'];
        $dataStock->cost = $input['cost']; // Simpan cost
        $dataStock->quantity = $input['quantity'];
        $dataStock->description = $input['description'] ?? null;
        $dataStock->date = $input['date'] ?? null;
        $dataStock->image = $imageName;
        $dataStock->warehouse_id = $input['warehouse_id'];
        $dataStock->save();
        return response()->json([
            'message' => 'Stok berhasil diupdate',
            'data' => $dataStock,
            'response' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json([
                'message' => 'Stock Not Found',
                'status' => 404
            ], 404);
        }

        // Delete associated image if exists
        if ($stock->image && Storage::exists('public/stock/' . $stock->image)) {
            $stock->image != 'default.png' ? Storage::delete('public/stock/' . $stock->image) : null;
        }

        $stock->delete();

        return response()->json([
            'message' => 'Stock berhasil dihapus',
            'response' => 200
        ]);
    }
}
