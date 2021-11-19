@extends('app')

@section('content')
    <div class="container w-30 border p-4 mt-4">
        <form action="{{ route('people') }}" method="POST">
            @csrf

            @if(session('success'))
                <h6 class="alert alert-success"> {{ session('success') }} </h6>
            @endif
            
            @error('document')
            <h6 class="alert alert-danger"> {{ $message }} </h6>
            @enderror
            <h2 style="text-align: center;" >Registro de Personas</h2>
                <div class="mb-3">
                    <label for="docType" class="form-label">Tipo de Documento</label>
                    <select class="form-select" name="docType" >
                        @foreach($document as $doc)
                            <option value="{{ $doc->id }}"> {{ $doc->description }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="document" class="form-label">Número de Documento</label>
                    <input type="text" class="form-control" name="document" />
                </div>
                <div class="mb-3">
                    <label for="name1" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" name="name1" />
                </div>
                <div class="mb-3">
                    <label for="name2" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" name="name2" />
                </div>
                <div class="mb-3">
                    <label for="apel1" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" name="apel1" />
                </div>
                <div class="mb-3">
                    <label for="apel2" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" name="apel2" />
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="address" />
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="phone" />
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="city" />
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Tipo de Documento</label>
                    <select class="form-select" name="role" >
                        @foreach($role as $rol)
                            <option value="{{ $rol->id }}"> {{ $rol->description }} </option>
                        @endforeach
                    </select>
                </div>
                <!-- <div id="descHelp" class="form-text">Ingresa el nuevo rol que manejarán los usuarios de los vehiculos.</div> -->
                       
            <button type="submit" class="btn btn-primary">Crear Persona</button>
        </form>

        <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>                    
                    <th scope="col">Tipo de documento</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $person as $per)
                <tr>
                    <td> {{ $per->docType }} </td>
                    <td> {{ $per->document }} </td>
                    <td> {{ $per->name }} </td>
                    <td> {{ $per->address }} </td>
                    <td> {{ $per->phone }} </td>
                    <td> {{ $per->city }} </td>
                    <td> {{ $per->rol }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection