<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        if (Auth::guard('student')->check())
            return redirect()->route('sections');
        else{
            $region = Region::all();
            return view('auth.login',compact('region'));
        }
    }

    public function auntificate(Request $request){
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('student')->attempt($request->only('name', 'password')))
            return redirect()->route('index');

        return redirect()->back()->with(['error' => 'Login yoki parolda xatolik bor!']);
    }

    public function saveregister(Request $request){
        try {
            $data = $request->validate([
                'last_name' => 'required',
                'first_name' => 'required',
                'region_id' => 'required',
                'district_id' => 'required',
                'school_name' => 'required',
                'class_name' => 'required',
                'name' => 'required',
                'password' => 'required',
            ]);

            $data['password'] =  Hash::make($request->password);

            $student = Student::create($data);

            if (Auth::guard('student')->attempt(['name' => $student->name, 'password' => $request->password])) {
                return redirect()->route('sections');
            }

            return redirect()->back()->with(['error' => 'Login yoki parolda xatolik bor!']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}
