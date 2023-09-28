<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $groupId = DB::table("groups")->insertGetId([
            "name" => "Administrator",
            "user_id" => 0,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        if($groupId > 0){
            DB::table("users")->insert([
                "name" => "Nhat Nguyen",
                "username" => "nhatnguyenit",
                "email" => "nhat.nguyen.backend@gmail.com",
                "images" => "https://images.pexels.com/photos/56866/garden-rose-red-pink-56866.jpeg?cs=srgb&dl=pexels-pixabay-56866.jpg&fm=jpg",
                "group_id" => $groupId,
                "password" => password_hash("12345678", PASSWORD_DEFAULT),
            ]);
        }
    }
}
