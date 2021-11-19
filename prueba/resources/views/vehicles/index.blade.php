@extends('app')

@section('content')
    <div class="container w-30 border p-4 mt-4">
        <form action="{{ route('vehicles') }}" method="POST">
            @csrf

            @if(session('success'))
                <h6 class="alert alert-success"> {{ session('success') }} </h6>
            @endif
            
            @error('licensePlate')
            <h6 class="alert alert-danger"> {{ $message }} </h6>
            @enderror
            <h2 style="text-align: center;" >Registro de Vehiculos</h2>
                <div class="mb-3">
                    <label for="licensePlate" class="form-label">Número de Placa</label>
                    <input type="text" class="form-control" name="licensePlate" />
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <select class="form-select" name="color" >
                        <option value="Blanco"> Blanco </option>
                        <option value="Negro"> Negro </option>
                        <option value="Azul"> Azul </option>
                        <option value="Gris"> Gris </option>
                        <option value="Verde"> Verde </option>
                        <option value="Rojo"> Rojo </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vehicleBrand" class="form-label">Marca</label>
                    <select class="form-select" name="vehicleBrand" >
                        @foreach($brand as $bran)
                            <option value="{{ $bran->id }}"> {{ $bran->description }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vehicleType" class="form-label">Tipo de Vehiculo</label>
                    <select class="form-select" name="vehicleType" >
                        @foreach($types as $type)
                            <option value="{{ $type->id }}"> {{ $type->description }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="driver" class="form-label">Conductor</label>
                    <select class="form-select" name="driver" >
                        @foreach($persons as $person)
                            <option value="{{ $person->id }}"> {{ $person->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="owner" class="form-label">Propietario</label>
                    <select class="form-select" name="owner" >
                        @foreach($persons as $person)
                            <option value="{{ $person->id }}"> {{ $person->name }} </option>
                        @endforeach
                    </select>
                </div>
                       
            <button type="submit" class="btn btn-primary">Crear Persona</button>
        </form>

        <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>                    
                    <th scope="col">Placa</th>
                    <th scope="col">Color</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">Propietario</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ( $vehicles as $vehicle)
                <tr>
                    <td> {{ $vehicle->licensePlate }} </td>
                    <td> {{ $vehicle->color }} </td>
                    <td> {{ $vehicle->brand }} </td>
                    <td> {{ $vehicle->type }} </td>
                    <td> {{ $vehicle->driver }} </td>
                    <td> {{ $vehicle->owner }} </td>
                </tr>
                @endforeach
            </tbody>            
        </table>
        </div>
    </div>
@endsection