<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
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
    public function projinfo($id){
        $empid = session()->get('emp');
        $pid = $id;
        $tasks = Task::where('project_id',$pid)->where('user_id',$empid)->get();
        return view('emp.projinfo',compact('tasks', 'pid', 'empid'));
    }
    public function updatestatus(Request $request){
        $task = Task::find($request->id);
        $task->status = $request->status;
        $task->save();
        return redirect()->back();


    }
}
