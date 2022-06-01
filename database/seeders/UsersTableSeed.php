<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Márcio Santos',
            'telefone' => '(81)99965-7042',
            'cep' => '51345-091',
            'rua' => 'Rua Severino Galdino de Oliveira',
            'numero' => '40',
            'complemento' => 'Casa',
            'estado' => 'Pernambuco',
            'cidade' => 'Recife',
            'bairro' => 'Ibura',
            //'imagem' => 'photo.jpg',
            
            'email' => 'marciosantosf7@gmail.com',
            'password' => bcrypt('@Shinzo21'),

        ]);

        User::create([
            'name' => 'Daniel Silva',
            'telefone' => '(81)99965-8855',
            'cep' => '51300-091',
            'rua' => 'Rua Geraldino de Oliveira',
            'numero' => '40',
            'complemento' => 'Casa',
            'estado' => 'Pernambuco',
            'cidade' => 'Recife',
            'bairro' => 'Ibura',
            //'imagem' => 'photo.jpg',
            
            'email' => 'danielsilva@gmail.com',
            'password' => bcrypt('@Shinzo21'),

        ]);
    }
}
