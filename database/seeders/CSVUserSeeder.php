<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class CSVUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = public_path("/seeder/patients.csv");

        function import_CSV($filename, $delimiter = ',')
        {
            if (!file_exists($filename) || !is_readable($filename))
                return false;
            $header = ['full_name', 'mobile_phone'];
            $data = array();
            if (($handle = fopen($filename, 'r')) !== false) {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                    if (!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }
            return $data;
        }


        // store returned data into array of records
        $records = import_CSV($file);

        //print_r($records);
        // add each record to the posts table in DB
        foreach ($records as $key => $record) {
            //Creating administrator account
            $u = User::create([

                'password' => Hash::make($record['mobile_phone']),
                'role' => 'patient',
            ]);
            $u->profile()->create([
                'full_name' => $record['full_name'],
                //'email' => 'admin@pharmaciekotto.cm',
                //'city' => 'Douala',
                //'gender' => 'm',
                'mobile_phone' => '+237' . $record['mobile_phone'],
                //'birthday' => "2001-09-26"
            ]);
            $u->save();
        }
    }
}
