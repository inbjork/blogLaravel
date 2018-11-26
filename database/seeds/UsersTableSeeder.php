<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = 'inbjork';
        $user->email = 'inbjork@gmail.com';
        $user->password = bcrypt('root');
        $user->save();
    }
}
