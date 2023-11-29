<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Editing {{$user->email}}</h1>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
            
        @endif
    </div>
    <form method="post" action="{{route('user.update', ['user' => $user])}}">
        @csrf
        @method('put')
        <div>
            <label>
                Name
            </label>
            <input type="text" name="name" placeholder="Name" value="{{$user->name}}" />
        </div>
        <div>
            <label>
                Last names
            </label>
            <input type="text" name="last_names" placeholder="Last names" value="{{$user->last_names}}" />
        </div>
        <div>
            <label>
                Email
            </label>
            <input type="text" name="email" placeholder="Email" value="{{$user->email}}" />
        </div>
        <div>
            <input type="submit" value="Update user" />
        </div>
    </form>
</body>
</html>