<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;
use App\Models\Vehicle_brand;
use App\Models\Vehicle_type;
use App\Models\Person;

class VehiclesController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'licensePlate' => 'required|min:6'
        ]);

        $vehicle = new Vehicle;
        $vehicle->licensePlate = $request->licensePlate;
        $vehicle->color = $request->color;
        $vehicle->vehicleBrand = $request->vehicleBrand;
        $vehicle->vehicleType = $request->vehicleType;
        $vehicle->driver = $request->driver;
        $vehicle->owner = $request->owner;
        $vehicle->save();

        return redirect()->route('vehicles')->with('success','Persona registrada correctamente');
    }

    public function index(){

        $vehicles = DB::table('vehicles')
                ->leftJoin('vehicle_brands', 'vehicles.vehicleBrand', '=', 'vehicle_brands.id')
                ->leftJoin('vehicle_types', 'vehicles.vehicleType', '=', 'vehicle_types.id')
                ->leftJoin('people', 'vehicles.driver', '=', 'people.id')
                ->leftJoin('people as owners', 'vehicles.owner', '=', 'owners.id')
                ->select("vehicles.licensePlate","vehicles.color","vehicle_brands.description as brand", "vehicle_types.description as type", DB::raw("CONCAT(people.name1,' ',people.name2) as driver"), DB::raw("CONCAT(owners.name1,' ',owners.name2) as owner"))->get();
        
        $persons = DB::table('people')
                ->select("id",DB::raw("CONCAT(people.name1,' ',people.name2) as name"))->get();
        
        $brand = Vehicle_brand::all();
        $types = Vehicle_type::all();
        return view('vehicles.index', ['vehicles' => $vehicles, 'brand' => $brand, 'types' => $types, 'persons' => $persons ]);
    }
}
