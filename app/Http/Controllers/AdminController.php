<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    //!CONTROLLER DASHBOARD USER
    public function dashboard_user()
    {

        $users = User::all();
        return view('admin.dashboard_user', compact('users'));
    }
    public function delete_user(User $user)
    {
        $user->delete();
        return Redirect::back();
    }

    public function create_user()
    {
        return view('admin.dashboard_user_create');
    }
    public function add_user(Request $request)
    {
        $request->validate(
            [
                'name'  =>  'required',
                'email' =>  'required|email|unique:users,email',
                'password'  =>  'required',
                'is_admin'  =>  'required',
                'call_num'  => 'required',
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
            'call_num' => $request->call_num,
        ]);
        return Redirect::route('dashboard_user');
    }

    public function edit_user(User $user)
    {
        return view('admin.dashboard_user_edit', compact('user'));
    }

    public function update_user(User $user, Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ignore unique check for the current user
            'is_admin'  => 'required',
            'call_num'  => 'required',
        ]);
    
        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'call_num' => $request->call_num,
        ];
    
        // Only update password if it's provided
        if (!empty($request->password)) {
            $dataToUpdate['password'] = bcrypt($request->password);
        }
    
        $user->update($dataToUpdate);
    
        return redirect()->route('dashboard_user');
    }
    //!END CONTROLLER DASHBOARD USER

  
}
