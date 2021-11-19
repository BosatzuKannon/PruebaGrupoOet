<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document_type;

class DocumentController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'description' => 'required|min:5'
        ]);

        $document = new Document_type;
        $document->description = $request->description;
        $document->save();

        return redirect()->route('document')->with('success','Tipo de documento registrado correctamente');
    }

    public function index(){
        $document = Document_type::all();
        return view('documents.index', ['document' => $document]);
    }

    public function destroy($id){
        $document = Document_type::find($id);
        $document->delete();
        return redirect()->route('document')->with('success','Tipo de documento eliminado');
    }
}
