<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){

        $vehicles = DB::table('vehicles')
                ->leftJoin('vehicle_brands', 'vehicles.vehicleBrand', '=', 'vehicle_brands.id')
                ->leftJoin('people', 'vehicles.driver', '=', 'people.id')
                ->leftJoin('people as owners', 'vehicles.owner', '=', 'owners.id')
                ->select("vehicles.licensePlate","vehicle_brands.description as brand", DB::raw("CONCAT(people.name1,' ',people.name2,' ',people.apel1,' ',people.apel2) as driver"), DB::raw("CONCAT(owners.name1,' ',owners.name2,' ',owners.apel1,' ',owners.apel2) as owner"))->get();
                
        return view('index', ['vehicles' => $vehicles]);
    }
}
