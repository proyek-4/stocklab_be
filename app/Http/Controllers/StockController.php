<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Http\Resources\StockResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Image as Image;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Stock::all();
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
            'quantity' => 'required|numeric',
            'description' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'sometimes',
        ]);

        $imageName = 'default.png';
        if ($image = $request->file('image')) {
            $imageName = Str::random(10) . date('Ymd') . '.' . $image->extension();
            Storage::put('public/stock/' . $imageName, file_get_contents($image));
        }
        
        $stock = new Stock();
        $stock->name = $input['name'];
        $stock->price = $input['price'];
        $stock->quantity = $input['quantity'];
        $stock->description = $input['description'];
        $stock->date = $input['date'];
        $stock->image = $imageName;
        $stock->save();
        return response()->json([
            'Data' => $stock,
            'response' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
