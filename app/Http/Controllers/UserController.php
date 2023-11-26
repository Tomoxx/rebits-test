<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $products = User::all();
        return view('users.index', ['users' => $products]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $data = $request->validate(
            [
                'name' => 'required',
                'last_names' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $newUser = User::create($data);

        return redirect(route('user.index'));
        
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }
    
    public function update(User $user, Request $request){
        $data = $request->validate(
            [
                'name' => 'required',
                'last_names' => 'required',
                'email' => 'required',
                ]
            );
            $user->update($data);
            
            return redirect(route('user.index'))->with('success','User updated successfully');
        }
    public function destroy(User $user){
        $user->delete();
        return redirect(route('user.index'))->with('success','User deleted successfully');
    }
}
