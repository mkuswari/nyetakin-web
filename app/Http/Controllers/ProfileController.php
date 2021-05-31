<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        if (Auth::user()->role == "admin") {
            return view("backoffice.profiles.index");
        } elseif (Auth::user()->role == "designer") {
            return view("backoffice.profiles.index");
        } else {
            return view("frontoffice.profiles.index");
        }
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|numeric",
        ]);

        $user = User::find(Auth::user()->id);

        // cek jika user mengganti foto profile
        $imgName = $user->avatar;
        if ($request->avatar) {
            if ($user->avatar && file_exists(public_path("uploads/avatars/" . $user->avatar))) {
                unlink(public_path("uploads/avatars/" . $user->avatar));
            }
            $imgName = $request->email . '.' .  $request->avatar->extension();
            $request->avatar->move(public_path('uploads/avatars'), $imgName);
        }

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "avatar" => $imgName,
        ]);

        session()->flash('success', 'Profile kamu berhasil diupdate');

        return redirect()->route("profile");
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            "current_password" => "required|min:8",
            "new_password" => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            "new_password_confirm" => ['required', Password::min(8)]
        ]);

        // check if current password not matches with password on database
        if (!(Hash::check($request->get("current_password"), Auth::user()->password))) {
            session()->flash('error', 'Password yang kamu masukkan salah');
            return redirect()->route("profile");
        }

        // check if current password and new password are same
        if (strcmp($request->get("current_password"), $request->get("new_password")) == 0) {
            session()->flash('error', 'Password baru tidak boleh sama dengan password sebelumnya');
            return redirect()->route("profile");
        }

        // check if new password confirm not mathes with new password
        if (!(strcmp($request->get("new_password"), $request->get("new_password_confirm"))) == 0) {
            session()->flash('error', 'Konfirmasi Password baru kamu tidak sesuai');
            return redirect()->route('profile');
        }

        // if password has been accepted, encrypt using password hash
        $user = User::find(Auth::user()->id);
        $user->password = \Hash::make($request->get("new_password"));
        $user->save();

        Auth::guard('web');
        $request->session()->flush();

        session()->flash('success', 'Password berhasil diganti! Silakan Login Kembali');
        return redirect()->route('login');
    }
}
