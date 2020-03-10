<?php

use Illuminate\Database\Seeder;
use App\csvDistricts;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (($handle = fopen ( public_path () . '/data/Districts.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                $csv_data = new csvDistricts ();
                $csv_data->name = $data[1];
                $csv_data->canton = $data[2];
                $csv_data->save ();
            }
            fclose ( $handle );
        }
    }
}
