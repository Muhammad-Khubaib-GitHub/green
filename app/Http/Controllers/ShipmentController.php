<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::with('container', 'user')->get();
        return view('pages.shipment');
    }

    public function create()
    {
        // Return view for creating a new shipment
        return view('shipments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|string',
            'profit' => 'required|string',
            'container_id' => 'required|exists:containers,container_id',
            'return_date' => 'required|string',
            'processing_date' => 'required|string',
            'user_id' => 'required|exists:users,user_id',
        ]);

        Shipment::create($request->all());

        return redirect()->route('shipments.index')
            ->with('success', 'Shipment created successfully.');
    }

    public function show(Shipment $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', compact('shipment'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $request->validate([
            'amount' => 'required|string',
            'profit' => 'required|string',
            'container_id' => 'required|exists:containers,container_id',
            'return_date' => 'required|string',
            'processing_date' => 'required|string',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $shipment->update($request->all());

        return redirect()->route('shipments.index')
            ->with('success', 'Shipment updated successfully.');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        return redirect()->route('shipments.index')
            ->with('success', 'Shipment deleted successfully.');
    }
}
