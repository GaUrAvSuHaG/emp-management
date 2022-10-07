<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class EmpController extends Controller
{
    public function index(){
        $id = session()->get('emp');
        $user = User::find($id);
        return view('emp.home',compact('user'));
    }
    public function showLogin(){
        return view('emp.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $emp = User::where('email',$request->email)->first();
        if($emp){
            if($emp->password == $request->password){
                $request->session()->put('emp',$emp->id);

                return redirect()->route('emp.home');
            }
            else{

                return redirect()->back()->with('fail','Invalid credentials');
            }
        }
        else{

            return redirect()->back()->with('fail','Invalid credentials');
        }
    }
    public function logout(Request $request){
        if($request->session()->has('emp')){
            $request->session()->pull('emp');
            return redirect()->route('emp.login');
        }
    }

}
