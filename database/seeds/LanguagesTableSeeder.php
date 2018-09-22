<?php

use App\Models\Language;
use Illuminate\Database\Seeder;
use Symfony\Component\Intl\Intl;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(Intl::getLanguageBundle()->getLanguageNames())->each(function ($item, $key) {

            Language::create([
                'short_code' => $key,
                'long_name' => $item
            ]);
        });
    }
}
