<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'doruruma';
        $user->email = 'doruruma@email.com';
        $user->password = bcrypt('doruruma');
        $user->save();
    }
}
