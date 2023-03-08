<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

use Illuminate\Console\View\Components\Mutators\EnsureDynamicContentIsHighlighted;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function postGet()
    {
        return view("vehicle", [
            "vehicles" => Vehicle::all(),
        ]);
    }

    public function voertuigtoevoegen(Request $request)
    {
        $vehicle = new Vehicle;
        $vehicle->number = $request->number;
        $vehicle->type = $request->type;
        $vehicle->passengers = $request->passengers;
        $vehicle->save();
        return redirect("voertuigen")->with("status", "voertuig toegevoegd");
    }

    public function voertuigUpdaten(Request $request)
    {

        Vehicle::where("vehicle_id", $request->vehicle_id)
            ->update(['number' => $request->number, 'type' => $request->type, 'passengers' => $request->passengers]);
        return redirect("voertuigen")->with("status", "voertuig geupdate");
    }

    public function voertuigVerwijderen(Request $request)
    {
        Vehicle::where("vehicle_id", $request->vehicle_id)
            ->delete();
        return redirect("voertuigen")->with("status", "voertuig verwijderd");
    }
}
