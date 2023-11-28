<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicle History</title>
</head>
<body>
    <h1>Vehicle History of Ownership Changes</h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Vehicle ID</th>
                <th>Vehicle Brand</th>
                <th>Vehicle Model</th>
                <th>Vehicle Year</th>
                <th>Vehicle Price</th>
                <th>Previous Owner</th>
                <th>New Owner</th>
                <th>Date and Time</th>
            </tr>
            @foreach ($historys as $history)
                <tr>
                    <td>{{$history->id}}</td>
                    <td>{{$history->vehicle->id}}</td>
                    <td>{{$history->vehicle->brand}}</td>
                    <td>{{$history->vehicle->model}}</td>
                    <td>{{$history->vehicle->year}}</td>
                    <td>${{$history->vehicle->price}}</td>
                    <td>{{$history->previousOwner->name}} {{$history->previousOwner->last_names}}</td>
                    <td>{{$history->newOwner->name}} {{$history->newOwner->last_names}}</td>
                    <td>{{$history->created_at}}</td>
                </tr>
            @endforeach
        </div>
    
</body>
</html>