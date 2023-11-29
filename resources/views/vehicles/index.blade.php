@extends('layouts.app')

@section('title', 'Vehicles')

@section('content')
<h1>Vehicles</h1>
<div>
    @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
</div>
<div>
    <a href="{{route('vehicle.create')}}">Create vehicle</a>
</div>
<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Price</th>
            <th>Owner</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($vehicles as $vehicle)
            <tr>
                <td>{{$vehicle->id}}</td>
                <td>{{$vehicle->brand}}</td>
                <td>{{$vehicle->model}}</td>
                <td>{{$vehicle->year}}</td>
                <td>${{$vehicle->price}}</td>
                <td>{{$vehicle->owner->name}} {{$vehicle->owner->last_names}}</td>
                <td>
                    <a href="{{route('vehicle.edit', ['vehicle' => $vehicle])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('vehicle.destroy', ['vehicle' => $vehicle])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </div>

@endsection