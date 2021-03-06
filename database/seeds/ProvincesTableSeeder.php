<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $provinces = [
            [
                'id' => '1',
                'name' => 'San José',
            ],
            [
                'id' => '2',
                'name' => 'Alajuela',
            ],
            [
                'id' => '3',
                'name' => 'Cartago',
            ],
            [
                'id' => '4',
                'name' => 'Heredia',
            ],
            [
                'id' => '5',
                'name' => 'Guanacaste',
            ],
            [
                'id' => '6',
                'name' => 'Puntarenas',
            ],
            [
                'id' => '7',
                'name' => 'Limón',
            ],
        ];

        DB::table('provinces')->insert($provinces);
    }
}
