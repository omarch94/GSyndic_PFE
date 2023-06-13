<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function resetPassword()
    {
        return view('reset_password');
    }

    public function resetPasswordPost(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->input('new_password'));
            $user->update();
            return redirect()->route('dashboard')->with('success', 'Votre mot de passe a été changer avec succée');

        } else {
            return back()->withErrors(['old_password' => 'Le mot de passe actuel est incorrect.']);
        }
    }

    public function profile(){
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
