@extends('app')

@section('content')
    <div class="container w-30 border p-4 mt-4">
        <form action="{{ route('document') }}" method="POST">
            @csrf

            @if(session('success'))
                <h6 class="alert alert-success"> {{ session('success') }} </h6>
            @endif
            
            @error('description')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
            @enderror
            <h2 style="text-align: center;" >Registro de Tipo de Documentos</h2>
            <div class="mb-3">
                <input type="text" class="form-control" name="description" >
                <div id="descHelp" class="form-text">Ingresa el nuevo tipo de documento.</div>
            </div>            
            <button type="submit" class="btn btn-primary">Crear Tipo de Documento</button>
        </form>

        <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripción</th>
                    <th scope="col"></th>            
                </tr>
            </thead>
            <tbody>
                @foreach ( $document as $doc)
                <tr>
                    <th scope="row"> {{ $doc->id }} </th>
                    <td> {{ $doc->description }} </td>
                    <td>
                        <form action="{{ route('document-destroy', [$doc->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                    <!-- <td>@mdo</td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection