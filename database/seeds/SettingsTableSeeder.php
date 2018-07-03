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
        setting([
            'general.site.name' => 'Lida',
            'general.meta.description' => 'Website software by https://lida.io.',
            'general.meta.keywords' => 'scanlation, manga, manhwa, manhua, comics',
            'general.homepage.url' => NULL
        ])->save();
    }
}
