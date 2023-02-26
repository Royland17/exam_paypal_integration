<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    /**
     * Return Login View
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('pages.login');
    }
    /**
     * Authenticate user
     * @param \App\Http\Request\LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(! Auth::attempt($credentials)){
            abort(401);
        }
        $request->session()->regenerate();
    }
    /**
     * Register User
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make('password');
        return User::create($data);
    }
    /**
     * Register View
     */
    public function registerView()
    {
        return view('pages.register');
    }

    /**
     * Logout authenticated user
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
