<?php

use App\Models\Country;
use Illuminate\Database\Seeder;
use Symfony\Component\Intl\Intl;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(Intl::getRegionBundle()->getCountryNames())->each(function ($item, $key) {

            Country::create([
                'short_code' => $key,
                'long_name' => $item
            ]);
        });
    }
}
