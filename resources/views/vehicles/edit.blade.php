<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle</title>
</head>
<body>
    <h1>Editing '{{$vehicle->brand}} {{$vehicle->model}} {{$vehicle->year}}'</h1>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
            
        @endif
    </div>
    <form method="post" action="{{route('vehicle.update', ['vehicle' => $vehicle])}}">
        @csrf
        @method('put')
        <div>
            <label>
                Brand
            </label>
            <input type="text" name="brand" placeholder="Brand" value="{{$vehicle->brand}}" />
        </div>
        <div>
            <label>
                Model
            </label>
            <input type="text" name="model" placeholder="Model" value="{{$vehicle->model}}" />
        </div>
        <div>
            <label>
                Year
            </label>
            <input type="text" name="year" placeholder="2023" value="{{$vehicle->year}}" />
        </div>
        <div>
            <label>
                Price
            </label>
            <input type="text" name="price" placeholder="$" value="{{$vehicle->price}}" />
        </div>
        <div>
            <label>
                Owner (ID)
            </label>
            <input type="text" name="owner_id" placeholder="1" value="{{$vehicle->owner->name}} {{$vehicle->owner->last_names}}" />
        </div>
        <div>
            <input type="submit" value="Update vehicle" />
        </div>
    </form>
</body>
</html>