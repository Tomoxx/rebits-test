<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleOwnershipHistory;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        return view('vehicles.index', ['vehicles' => $vehicles]);
    }

    public function create(){
        return view('vehicles.create');
    }

    public function store(Request $request){
        $data = $request->validate(
            [
                'brand' => 'required',
                'model' => 'required',
                'year' => 'required|numeric',
                'price' => 'required|numeric',
                'owner_id' => 'required',
            ]
        );

        $newVehicle = Vehicle::create($data);

        return redirect(route('vehicle.index'));
        
    }

    public function edit(Vehicle $vehicle){
        return view('vehicles.edit', ['vehicle' => $vehicle]);
    }
    
    public function update(Vehicle $vehicle, Request $request){
        $data = $request->validate(
            [
                'brand' => 'required',
                'model' => 'required',
                'year' => 'required|numeric',
                'price' => 'required|numeric',
                'owner_id' => 'required',
            ]
        );
        // Get the original owner before updating
        $originalOwner = $vehicle->owner_id;

        // Update the vehicle attributes
        $vehicle->update($data);

        // Check if the 'owner' attribute has changed
        if ($originalOwner !== $vehicle->owner_id) {
            // Log the ownership change in the vehicle_ownership_history table
            VehicleOwnershipHistory::create([
                'vehicle_id' => $vehicle->id,
                'previous_owner' => $originalOwner,
                'new_owner' => $vehicle->owner_id,
            ]);
        }
        
        return redirect(route('vehicle.index'))->with('success','Vehicle updated successfully');
    }

    public function destroy(Vehicle $vehicle){
        $vehicle->delete();
        return redirect(route('vehicle.index'))->with('success','Vehicle deleted successfully');
    }
}
