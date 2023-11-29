@extends('layouts.app')

@section('title', 'Users')

@section('content')
<h1>Users</h1>
<div>
    @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
</div>
<div>
    <a href="{{route('user.create')}}">Create user</a>
</div>
<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Last Names</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->last_names}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{route('user.edit', ['user' => $user])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('user.destroy', ['user' => $user])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </div>

@endsection