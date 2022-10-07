<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $id = session()->get('admin');
        $admin = Admin::find($id);
        $emps = User::all();
        return view('admin.home',compact('admin','emps'));
    }
    public function showLogin(){
        return view('admin.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $admin = Admin::where('email',$request->email)->first();
        if($admin){
            if($admin->password == $request->password){
                $request->session()->put('admin',$admin->id);

                return redirect()->route('admin.home');
            }
            else{

                return redirect()->back()->with('fail','Invalid credentials');
            }
        }
        else{

            return redirect()->back()->with('fail','Invalid credentials');
        }

    }
    public function addempForm(){
        $id = session()->get('admin');
        $admin = Admin::find($id);
        return view('admin.addemp',compact('admin'));
    }
    public function addemp(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);
        $user = User::create($request->all());
        return redirect()->route('admin.home')->with('success','Employee added successfully');
    }
    public function showempinfo($id){
        $aid = session()->get('admin');
        $admin = Admin::find($aid);
        $emps = User::all();
        $emp = User::find($id);
        $projects = Project::all();
        return view('admin.empinfo',compact('emp','admin','emps','projects'));
    }
    public function addprojForm(){
        $aid = session()->get('admin');
        $admin = Admin::find($aid);
        return view('admin.addproj',compact('admin'));
    }
    public function addproj(Request $request){
        $request->validate([
            'name'=>'required',
            'desc'=>'required',
        ]);
        $proj = Project::create($request->all());
        return redirect()->route('admin.home')->with('success','Project created successfully');
    }
    public function assignProj(Request $request){
        $emp = User::find($request->user_id);
        $emp->projects()->attach($request->project_id);
        return redirect()->route('admin.showempinfo',['id'=>$request->user_id])->with('success','Project assigned successfully');
    }
    public function logout(request $request){
        if($request->session()->has('admin')){
            $request->session()->pull('admin');
            return redirect()->route('admin.login');
        }
    }
}
