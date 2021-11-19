@extends('app')

@section('content')
<div class="container w-30 border p-4 mt-4">
    <h2 style="text-align: center;" >Listado General de Vehiculos</h2>
    <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>                    
                    <th scope="col">Placa</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">Propietario</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ( $vehicles as $vehicle)
                <tr>
                    <td> {{ $vehicle->licensePlate }} </td>
                    <td> {{ $vehicle->brand }} </td>
                    <td> {{ $vehicle->driver }} </td>
                    <td> {{ $vehicle->owner }} </td>
                </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</div>
@endsection