<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Vehicle</h1>
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
                    <td>{{$vehicle->price}}</td>
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
    
</body>
</html>