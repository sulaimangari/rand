<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listUser()
    {
        $user = Auth::user()->get();
        return view('permission.user', compact('user'));
    }

    public function adminUser(Request $request)
    {
        // Auth::user()->authorizeRoles(['admin',]);

        $user = Auth::user('admin');
        // dd($user);
        return view('permission.admin', compact('user'));
    }


    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);


        Auth::user('admin')->update(array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->password)
        ));

        return redirect()->route('adminUser')->with('message', 'Admin Succesfully updated');
    }

    public function destroyUser(Request $request)
    {

        $id = $request->input('id');
        $data = User::find($id);

        $data->delete();

        return redirect()->route('listUser')->with('message', 'User has been deleted!');
    }
}
