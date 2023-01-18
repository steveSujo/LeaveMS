<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index(Request $request)
    {
        if ($request->route()->named('admin.login')) {
            return view('auth.AdminLogin');
        }
        return view('auth.EmployeeLogin');
    }


    public function AdminAuth(Request $request)
    {
        // $credit = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => 'required',
        // ]);
        $credit = array('email' => 'admin@tim.com', 'password' => 'admin');
        if (Auth::guard('admin')->attempt($credit)) {
            return redirect()->intended('/admin/dashboard');
        };

        return view('auth.EmployeeLogin');
    }

    public function EmployeeAuth(Request $request)
    {
        $credit = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credit)) {

            return redirect()->intended('/user/dashboard');
        }
        return view('landing');
    }
    // public function EmployeeDashView(Request $request)
    // {
    //     return view('EmployeeDashboard');
    // }
    // public function AdminDashView()
    // {
    //     return view('AdminDashboard');
    // }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return view('landing');
    }
}
