<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function showSetting()
    {
        $setting = Setting::all()->last();

        return view('backoffice.settings.index', compact('setting'));
    }

    public function updateSetting($id)
    {
        $setting = Setting::find($id);

        return view('backoffice.settings.update', compact('setting'));
    }

    public function storeUpdateSetting(Request $request, $id)
    {
        $this->validate($request, [
            'office_name' => 'required|string',
            'address' => 'required',
            'office_email' => 'required|email',
            'office_whatsapp' => 'required|numeric'
        ]);

        $setting = Setting::find($id);

        $setting->update([
            'office_name' => $request->office_name,
            'address' => $request->address,
            'office_email' => $request->office_email,
            'office_whatsapp' => $request->office_whatsapp,
        ]);

        session()->flash('success', 'Informasi telah berhasil diupdate');

        return redirect()->route("setting");
    }
}
