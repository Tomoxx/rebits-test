<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Vehicle</title>
</head>
<body>
    <h1>Create a Vehicle</h1>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
            
        @endif
    </div>
    <form method="post" action="{{route('vehicle.store')}}">
        @csrf
        @method('post')
        <div>
            <label>
                Brand
            </label>
            <input type="text" name="brand" placeholder="Brand" />
        </div>
        <div>
            <label>
                Model
            </label>
            <input type="text" name="model" placeholder="Model" />
        </div>
        <div>
            <label>
                Year
            </label>
            <input type="text" name="year" placeholder="2023" />
        </div>
        <div>
            <label>
                Price
            </label>
            <input type="text" name="price" placeholder="Price" />
        </div>
        <div>
            <label>
                Owner (ID)
            </label>
            <input type="text" name="owner_id" placeholder="Owner" />
        </div>
        <div>
            <input type="submit" value="Save a new vehicle" />
        </div>
    </form>
</body>
</html>