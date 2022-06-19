<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        if (Auth::user()->hasRole('user')) {
            return view('userdashboard');
        } elseif (Auth::user()->hasRole('admin')) {
            return view('dashboard', compact('users'));
        }
    }



    public function myprofile()
    {

        return view('user.myprofile');
    }

    public function createuser(Request $request)
    {
        $user = new User();
        $request->validate([
            'fullname' => 'required|regex:/^[a-zA-Z]+$/u|max:100|nullable',
            'username' => 'required|regex:/^[a-zA-Z]+$/u|max:100|nullable',
            'email' => 'required|regex:/^[a-zA-Z]+$/u|max:100|nullable|email',
            'phone' => 'required|numeric',
            'password' => 'required'

        ]);
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();
        return back()->with('name_created', 'User has been Created');
    }


    public function edituser($id)
    {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }

    public function updateuser(Request $request)
    {

        $user = User::find($request->id);
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();
        return back()->with('user-updated', 'User have been updated');
    }

    public function deleteuser($id)
    {
        User::where('id', $id)->delete();
        return back()->with('user_delete', 'User has been deleted successfully!');
    }

public function search(){
    $search_text=$_GET['query'];
    $users=User::where('username','LIKE','%'.$search_text.'%')->with('fullname')->get();
    return view('dashboard', compact('users'));
}


}
