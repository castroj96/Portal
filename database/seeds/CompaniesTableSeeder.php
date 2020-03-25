<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'id' => '1',
                'name' => 'ICE',
            ],
            [
                'id' => '2',
                'name' => 'Municipalidad',
            ],
            [
                'id' => '3',
                'name' => 'Cablera',
            ],
            [
                'id' => '4',
                'name' => 'AyA',
            ],
        ];

        DB::table('companies')->insert($companies);
    }
}
