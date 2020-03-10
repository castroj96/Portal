<?php

use Illuminate\Database\Seeder;
use App\csvCantons;

class CantonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (($handle = fopen ( public_path () . '/data/Cantons.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                $csv_data = new csvCantons ();
                $csv_data->name = $data[1];
                $csv_data->prov = $data[2];
                $csv_data->save ();
            }
            fclose ( $handle );
        }
    }
}
