<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\Document_type;
use App\Models\Role;

class PeopleController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'document' => 'required|min:10',
            'name1' => 'required|min:5',
            'apel1' => 'required|min:5'
        ]);

        $person = new Person;
        $person->docType = $request->docType;
        $person->document = $request->document;
        $person->name1 = $request->name1;
        $person->name2 = $request->name2;
        $person->apel1 = $request->apel1;
        $person->apel2 = $request->apel2;
        $person->address = $request->address;
        $person->phone = $request->phone;
        $person->city = $request->city;
        $person->role = $request->role;
        $person->save();

        return redirect()->route('people')->with('success','Persona registrada correctamente');
    }

    public function index(){
        
        $person = DB::table('people')
                ->leftJoin('document_types', 'people.docType', '=', 'document_types.id')
                ->leftJoin('roles', 'people.role', '=', 'roles.id')
                ->select("document_types.description as docType","people.document", DB::raw("CONCAT(people.name1,' ',people.name2) as name"),"people.address", "people.phone", "people.city", "roles.description as rol")->get();
        
        $document = Document_type::all();
        $role = Role::all();
        return view('people.index', ['person' => $person, 'document' => $document, 'role' => $role ]);
    }
}
