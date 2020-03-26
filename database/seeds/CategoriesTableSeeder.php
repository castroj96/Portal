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
        //
        $categories = [
            [
                'id' => '1',
                'name' => 'Carreteras',
            ],
            [
                'id' => '2',
                'name' => 'Telefonía',
            ],
            [
                'id' => '3',
                'name' => 'Agua',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
