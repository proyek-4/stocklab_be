<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Resources\RecordResource;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::orderBy('date', 'desc')->get();
        return RecordResource::collection($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'quantity' => 'required|integer',
            'date' => 'required|date',
            'record_type' => 'required|in:in,out',
        ]);

        $stock = Stock::find($input['stock_id']);
        $record = new Record();
        $record->stock_id = $stock->id;
        $record->name = $stock->name;
        $record->quantity = $input['quantity'];
        $record->date = $input['date'];
        $record->record_type = $input['record_type'];

        if ($input['record_type'] == 'in') {
            $record->debit = 0;
            $record->kredit = $stock->cost * $input['quantity'];
            $record->saldo = $record->kredit;
            $stock->quantity += $input['quantity'];
        } else {
            $record->debit = $stock->price * $input['quantity'];
            $record->kredit = $stock->cost * $input['quantity'];
            $record->saldo = $record->debit - $record->kredit;
            $stock->quantity -= $input['quantity'];
        }
        
        $stock->save();
        $record->save();
        return new RecordResource($record);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = Record::findOrFail($id);
        return new RecordResource($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'quantity' => 'required|integer',
            'date' => 'required|date',
            'record_type' => 'required|in:in,out',
        ]);

        $record = Record::findOrFail($id);
        $stock = Stock::find($input['stock_id']);

        $record->stock_id = $stock->id;
        $record->name = $stock->name;
        $record->quantity = $input['quantity'];
        $record->date = $input['date'];
        $record->record_type = $input['record_type'];

        if ($input['record_type'] == 'in') {
            $record->debit = 0;
            $record->kredit = $stock->cost * $input['quantity'];
            $record->saldo = -$record->kredit;
        } else {
            $record->debit = $stock->price * $input['quantity'];
            $record->kredit = $stock->cost * $input['quantity'];
            $record->saldo = $record->debit - $record->kredit;
        }

        $record->save();
        return new RecordResource($record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return response()->json([
            'message' => 'Record deleted successfully',
        ], 200);
    }
}
