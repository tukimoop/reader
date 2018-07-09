<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // General
        setting([
            'general.site.name' => 'Lida',
            'general.site.homepage_url' => NULL,
            'general.meta.description' => 'Website software by https://lida.io.',
            'general.meta.keywords' => 'scanlation, manga, manhwa, manhua, comics'
        ])->save();

        // Security
        setting([
            'security.recaptcha.enabled' => false,
            'security.recaptcha.site' => NULL,
            'security.recaptcha.secret' => NULL,
            'security.registration.min_name_length' => 2,
            'security.session.lifetime' => 60,
            'security.session.encrypt' => true,
            'security.session.https_only' => true,
            'security.comics.force' => false
        ])->save();
    }
}
