<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting;
        $setting->owner = 'Rifki';
        $setting->bio = "Hi, I'm Rifki. I live in Muara Badak, East Borneo, Indonesia. I'm Web Developer with PHP (Laravel or CodeIgniter) and Android Developer with Kotlin. You can see my portfolio in my Github";
        $setting->web_portfolio = 'https://github.com/RifkiCS29';
        $setting->fb = 'https://www.facebook.com/rifki.jackson.12';
        $setting->twitter = 'https://twitter.com/Rifki_CS29';
        $setting->instagram = 'https://www.instagram.com/rifki_cs29/';

        $setting->save();

        $this->command->info('Setting berhasil');
    }
}
