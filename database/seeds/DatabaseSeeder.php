<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingsTableSeeder::class,
            CountriesTableSeeder::class,
            LanguagesTableSeeder::class,
            AbilitiesTableSeeder::class,
            GenresTableSeeder::class,
            ComicStatusesTableSeeder::class,

            // Roles
            AdministratorSeeder::class,
            ContentManagerSeeder::class
        ]);
    }
}
