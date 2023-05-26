<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employees;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class EmployeesController extends Controller
{
    //
    public function Login(){
        return view('employees.login');
    }

    public function Dashboard(){
        return view('employees.dashboard');
    }

    public function Check(Request $request){
        $check = $request->all();
        // dd($request->all());
        if(Auth::guard('employee')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('employee_dasboard')->with('error', 'Welcome Back to your dashboard');
        }else{
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function Logout(){
        Auth::guard('employee')->Logout();
        return redirect()->route('login_form')->with('error', 'You are succefully logout');
    }

    public function Register(){
        return view('employees.register');
    }

    public function CreateEmployees(Request $request){
        Employees::insert([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => HASH::make($request -> password),
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('login_form')->with('error','New employee has been created');
    }
}
