<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => '1',
                'name' => 'Puentes',
            ],
            [
                'id' => '2',
                'name' => 'Carreteras',
            ],
            [
                'id' => '3',
                'name' => 'Servicios Públicos',
            ],
            [
                'id' => '4',
                'name' => 'Servicios Privados',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
