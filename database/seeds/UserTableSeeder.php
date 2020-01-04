<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 5)->state('withPosts')->create();
    }
}
