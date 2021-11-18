@extends('app')

@section('content')
    <div class="container w-30 border p-4 mt-4">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Rol</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Ingresa el nuevo rol que manejarán los usuarios de los vehiculos.</div>
            </div>            
            <button type="submit" class="btn btn-primary">Crear Rol</button>
        </form>
    </div>
@endsection