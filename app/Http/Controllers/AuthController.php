<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $formData = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|unique:users,email' ,
            'password' => 'required|min:8'
        ]);
        $user = User::create($formData);

        //login
        auth()->login($user);
        return redirect('/')->with('success','Welcome '.$user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function check()
    {
        $user = request()->validate([
            'email' => 'required|email|max:255|exists:users,email' ,
            'password' => 'required|min:8|max:255'
        ],[
            "email.exists" => "email or password is wrong",
            'password.min' => "Password should be more than 8 characters"
        ]);

        if(auth()->attempt($user)){
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs')->with('success','Welcome Back');
            }else{
                return redirect('/')->with('success','Welcome Back');
            }
        }else{
            return redirect()->back()->withErrors([
                'email' => 'email or password is wrong'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','See you later');
    }


}
