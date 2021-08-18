<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting();

        $setting->office_name = "Nyetakin";
        $setting->address = "Bandung";
        $setting->office_email = "nyetakin@gmail.com";
        $setting->office_whatsapp = "6281939448487";

        $setting->save();
    }
}
