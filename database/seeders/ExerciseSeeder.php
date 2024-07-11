<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //php artisan db:seed --class=ExerciseSeeder
        $exercises = [
            // Costas
            ['nome' => 'Barra Fixa', 'id_categoria' => 1],
            ['nome' => 'Remada Curvada', 'id_categoria' => 1],
            ['nome' => 'Pulley Frente', 'id_categoria' => 1],
            ['nome' => 'Pulley Costas', 'id_categoria' => 1],
            ['nome' => 'Remada Unilateral', 'id_categoria' => 1],
            ['nome' => 'Levantamento Terra', 'id_categoria' => 1],

            // Bíceps
            ['nome' => 'Rosca Direta', 'id_categoria' => 2],
            ['nome' => 'Rosca Alternada', 'id_categoria' => 2],
            ['nome' => 'Rosca Concentrada', 'id_categoria' => 2],
            ['nome' => 'Rosca Martelo', 'id_categoria' => 2],
            ['nome' => 'Rosca Scott', 'id_categoria' => 2],
            ['nome' => 'Rosca Inversa', 'id_categoria' => 2],

            // Tríceps
            ['nome' => 'Tríceps Pulley', 'id_categoria' => 3],
            ['nome' => 'Tríceps Testa', 'id_categoria' => 3],
            ['nome' => 'Tríceps Coice', 'id_categoria' => 3],
            ['nome' => 'Mergulho no Banco', 'id_categoria' => 3],
            ['nome' => 'Tríceps Francês', 'id_categoria' => 3],
            ['nome' => 'Tríceps Corda', 'id_categoria' => 3],

            // Peito
            ['nome' => 'Supino Reto', 'id_categoria' => 4],
            ['nome' => 'Supino Inclinado', 'id_categoria' => 4],
            ['nome' => 'Supino Declinado', 'id_categoria' => 4],
            ['nome' => 'Crucifixo', 'id_categoria' => 4],
            ['nome' => 'Crossover', 'id_categoria' => 4],
            ['nome' => 'Flexão de Braço', 'id_categoria' => 4],

            // Pernas
            ['nome' => 'Agachamento', 'id_categoria' => 5],
            ['nome' => 'Leg Press', 'id_categoria' => 5],
            ['nome' => 'Extensão de Pernas', 'id_categoria' => 5],
            ['nome' => 'Flexão de Pernas', 'id_categoria' => 5],
            ['nome' => 'Panturrilha em Pé', 'id_categoria' => 5],
            ['nome' => 'Panturrilha Sentado', 'id_categoria' => 5],
            ['nome' => 'Afundo', 'id_categoria' => 5],

            // Ombros
            ['nome' => 'Desenvolvimento', 'id_categoria' => 6],
            ['nome' => 'Elevação Lateral', 'id_categoria' => 6],
            ['nome' => 'Elevação Frontal', 'id_categoria' => 6],
            ['nome' => 'Crucifixo Invertido', 'id_categoria' => 6],
            ['nome' => 'Desenvolvimento Arnold', 'id_categoria' => 6],
            ['nome' => 'Encolhimento', 'id_categoria' => 6],

            // Abdômen
            ['nome' => 'Abdominal', 'id_categoria' => 7],
            ['nome' => 'Prancha', 'id_categoria' => 7],
            ['nome' => 'Abdominal Infra', 'id_categoria' => 7],
            ['nome' => 'Abdominal Oblíquo', 'id_categoria' => 7],
            ['nome' => 'Elevação de Pernas', 'id_categoria' => 7],
            ['nome' => 'Ab Wheel', 'id_categoria' => 7],
        ];

        DB::table('exercicio')->insert($exercises);
    }
}