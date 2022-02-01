<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\create_first_list;
use Database\Seeders\create_demo_user;
use Database\Seeders\create_friends_list;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(create_demo_user::class);
        $this->call(create_first_list::class);
        $this->call(create_friends_list::class);
    }
}
