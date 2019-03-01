<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\User;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Item::class, 50000)->create();
    }
}
