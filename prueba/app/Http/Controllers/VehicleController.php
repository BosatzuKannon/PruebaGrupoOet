<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle_type;

class VehicleController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'description' => 'required|min:5'
        ]);

        $vehicle = new Vehicle_type;
        $vehicle->description = $request->description;
        $vehicle->save();

        return redirect()->route('vehicle')->with('success','Tipo de vehiculo registrado correctamente');
    }

    public function index(){
        $vehicle = Vehicle_type::all();
        return view('vehicles.index', ['vehicle' => $vehicle]);
    }

    public function destroy($id){
        $vehicle = Vehicle_type::find($id);
        $vehicle->delete();
        return redirect()->route('vehicle')->with('success','Tipo de vehiculo eliminado');
    }
}
