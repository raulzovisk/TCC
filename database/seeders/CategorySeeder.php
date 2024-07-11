<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=CategorySeeder
        $categories = [
            ['nome' => 'Costas'],
            ['nome' => 'Bíceps'],
            ['nome' => 'Tríceps'],
            ['nome' => 'Peito'],
            ['nome' => 'Pernas'],
            ['nome' => 'Ombros'],
            ['nome' => 'Abdômen']
        ];

        DB::table('categoria')->insert($categories);
    }
}
