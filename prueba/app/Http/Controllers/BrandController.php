<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle_brand;

class BrandController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'description' => 'required|min:5'
        ]);

        $brand = new Vehicle_brand;
        $brand->description = $request->description;
        $brand->save();

        return redirect()->route('brand')->with('success','Marca registrada correctamente');
    }

    public function index(){
        $brand = Vehicle_brand::all();
        return view('brands.index', ['brand' => $brand]);
    }

    public function destroy($id){
        $brand = Vehicle_brand::find($id);
        $brand->delete();
        return redirect()->route('brand')->with('success','Marca eliminada');
    }
}
