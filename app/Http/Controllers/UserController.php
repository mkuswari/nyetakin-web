<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware([
            'auth',
            'role:admin',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("backoffice.users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|max:100",
            "email" => "required|email|max:100",
            "role" => "required",
            "password" => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            "password_confirmation" => ['required'],
        ]);

        if ($request->hasFile("avatar")) {
            $imgName = $request->email . '.' .  $request->avatar->extension();
            $request->avatar->move(public_path('uploads/avatars/'), $imgName);
        } else {
            $imgName = "";
        }

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "avatar" => $imgName,
            "phone" => $request->phone,
            "role" => $request->role,
            "password" => \Hash::make($request->password)
        ]);

        session()->flash('success', 'User Baru berhasil ditambahkan');

        return redirect()->route("users.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('backoffice.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $imgName = $user->avatar;
        if ($request->avatar) {
            if ($user->avatar && file_exists(public_path("uploads/avatars/" . $user->avatar))) {
                unlink(public_path("uploads/avatars/" . $user->avatar));
            }
            $imgName = $request->email . '.' .  $request->avatar->extension();
            $request->avatar->move(public_path('uploads/avatars'), $imgName);
        }

        if ($request->password == "") {

            $this->validate($request, [
                "name" => "required|max:100",
                "email" => "required|email|max:100",
                "phone" => "required|numeric",
                "role" => "required",
            ]);

            $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "avatar" => $imgName,
                "role" => $request->role,
            ]);
        } else {

            $this->validate($request, [
                "name" => "required|max:100",
                "email" => "required|email|max:100",
                "phone" => "required|numeric",
                "roles" => "required",
                "password" => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
                "password_confirmation" => ['required'],
            ]);

            $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "avatar" => $imgName,
                "roles" => $request->role,
                "password" => \Hash::make($request->password)
            ]);
        }

        session()->flash('success', 'Data user berhasil diubah');

        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->avatar && file_exists(public_path("uploads/avatars/" . $user->avatar))) {
            unlink(public_path("uploads/avatars/" . $user->avatar));
        }
        $user->delete();

        session()->flash('success', 'Data user berhasil dihapus');

        return redirect()->route("users.index");
    }
}
