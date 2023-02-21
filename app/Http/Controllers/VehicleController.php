<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function addVehicle(Request $request) {
        $vehicle = new Vehicle;
        $vehicle->number = $request->number;
        $vehicle->type = $request->type;
        $vehicle->passengers = $request->passengers;
        $vehicle->save();
        return redirect("voertuigen")->with("status", "voertuig toegevoegd");
    }
}
