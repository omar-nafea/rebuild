<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function showSignupForm()
    {
    return view('Auth.signup');
    }
    public function showLoginForm()
    {
    return view('Auth.login');
    }
    public function signup(SignupRequest $request)
    {
      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->save();
      auth()->login($user);
      return redirect('/');
    }
       public function login(Request $request)
    {
      $credintials = $request->only('email', 'password');
      if (auth()->attempt($credintials)){
          $request->session()->regenerate();
          return redirect('/');
      }
      return back()->withErrors([
        'email' => 'The provided credentials do not match out match',
      ])->withInput();
    }
    public function logout(Request $request)
    {
      auth()->logout();
      return redirect('/');
    }
}
