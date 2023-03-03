<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = Users::orderBy('id', 'asc')->get();
        // dd($user[0]->id);
        return view('user.user', ['user' => $user]);
    }

    public function add()
    {
        return view('user.tambah_user');
    }

    public function store(Request $request)
    {
        $user = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        Users::create($user);
        return redirect('user')->with('success', 'User Berhasil Ditambahkan');
    }

    public function edituser(Users $user)
    {
        // $user = Users::select('*')->where('id', $id)->first();
        return view('user.edit_user', compact('user'));
    }

    public function updateuser(Request $request, Users $user)
    {
        if($request->passsword) {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' =>  bcrypt($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ]);
        }
        return redirect()->route('user')->with('success', 'User Berhasil Diupdate');
    }

    public function deleteuser($id)
    {
        Users::where('id', $id)->delete();
        return redirect('user')->with('success', 'Delete Success');
    }
}
