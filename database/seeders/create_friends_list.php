<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class create_friends_list extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         *             $table->string('name');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
         */
        DB::table('contacts')->insert([
            'name' => 'Test Contact 1',
            'user_id' => 1,
            'list_id' => 1,
            'email' => 'test@test.com',
            'address' => "123 Main Street",
            'phone' => "(775) 450-5221",
        ]);

        DB::table('contacts')->insert([
            'name' => 'Test Contact 2',
            'user_id' => 1,
            'list_id' => 1,
            'email' => 'test@test.com',
            'address' => "123 Main Street",
            'phone' => "(775) 450-5221",
        ]);


        DB::table('contacts')->insert([
            'name' => 'Test Contact 3',
            'user_id' => 1,
            'list_id' => 1,
            'email' => 'demo@demo.com',
            'address' => "123 Main Street",
            'phone' => "(775) 450-5221",
        ]);
    }
}
