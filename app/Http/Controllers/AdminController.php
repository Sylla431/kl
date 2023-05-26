<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AdminController extends Controller
{
    //
    public function Login(){
        return view('admin.login');
    }

    public function Dashboard(){
        return view('admin.dashboard');
    }

    public function Check(Request $request){
        $check = $request->all();
        // dd($request->all());
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin_dasboard')->with('error', 'Welcome Back to your dashboard');
        }else{
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function Logout(){
        Auth::guard('admin')->Logout();
        return redirect()->route('login_form')->with('error', 'You are succefully logout');
    }

    public function Register(){
        return view('admin.register');
    }

    public function CreateAdmin(Request $request){
        Admin::insert([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => HASH::make($request -> password),
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('login_form')->with('error','New admin has been created');
    }
}
