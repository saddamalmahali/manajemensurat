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
        $jafar->name = "Japar Sidik";
        $jafar->email = "1306074@sttgarut.ac.id";
        $jafar->password = bcrypt('admin');
        $jafar->save();

		$fahrul = new User();
        $fahrul->name = "Fahrul Siddik";
        $fahrul->email = "1306048@sttgarut.ac.id";
        $fahrul->password = bcrypt('admin');
        $fahrul->save();        
    }
}
