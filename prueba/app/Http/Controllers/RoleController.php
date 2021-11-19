<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'description' => 'required|min:5'
        ]);

        $role = new Role;
        $role->description = $request->description;
        $role->save();

        return redirect()->route('role')->with('success','Rol registrado correctamente');
    }

    public function index(){
        $role = Role::all();
        return view('role.index', ['role' => $role]);
    }

    public function destroy($id){
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role')->with('success','Rol eliminado');
    }
}
