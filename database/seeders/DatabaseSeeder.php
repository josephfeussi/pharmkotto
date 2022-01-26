<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserProfile;
use Database\Seeders\CSVUserSeeder;
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

        //Creating administrator account
        $u = User::create([

            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
        $u->profile()->create([
            'full_name' => 'Administrateur Kotto',
            'email' => 'admin@pharmaciekotto.cm',
            'city' => 'Douala',
            'gender' => 'm',
            'mobile_phone' => '+237694842185',
            'birthday' => "2001-09-26"
        ]);
        $u->save();


        $this->call([CSVUserSeeder::class]);
    }
}
