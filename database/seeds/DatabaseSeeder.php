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
        Eloquent::unguard();


        if (App::environment() === 'local') //development
        {   
            // Admin
            DB::table('users')->insert([
                'email' => 'admin@chocolife.me',
                'name' => 'life',
                'password' => Hash::make('secret'),
                'role' => 1,
            ]);

            // SZP Admin
            DB::table('users')->insert([
                'email' => 'szp@chocolife.me',
                'name' => 'life',
                'password' => Hash::make('secret'),
                'role' => 1,
            ]);

            $this->call(ItemSeeder::class);
        }


    }
}
