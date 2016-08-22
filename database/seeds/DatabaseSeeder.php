<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// $this->call(UserTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Eloquent::unguard();

        $faker = Faker\Factory::create();
        \App\Place::truncate();

        factory(App\Place::class, 100)->create()->each(function ($u)
        {
            $u->images()->savemany(factory(App\Image::class, rand(2, 5))->make());

        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
