<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jafar = new User();
        $jafar->name = "Admin Aplikasi";
        $jafar->username = "admin";
        $jafar->password = bcrypt('admin');
        $jafar->save();
    }
}
