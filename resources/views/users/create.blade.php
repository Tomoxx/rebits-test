<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a User</h1>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
            
        @endif
    </div>
    <form method="post" action="{{route('user.store')}}">
        @csrf
        @method('post')
        <div>
            <label>
                Name
            </label>
            <input type="text" name="name" placeholder="Tomás" />
        </div>
        <div>
            <label>
                Last names
            </label>
            <input type="text" name="last_names" placeholder="Peña Bustamante" />
        </div>
        <div>
            <label>
                Email
            </label>
            <input type="text" name="email" placeholder="tomoxx91@gmail.com" />
        </div>
        <div>
            <label>
                Password
            </label>
            <input type="text" name="password" placeholder="1234" />
        </div>
        <div>
            <input type="submit" value="Save a new user" />
        </div>
    </form>
</body>
</html>