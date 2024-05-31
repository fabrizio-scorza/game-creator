<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $characters = [
            [
                'name' =>  'Gino Del Pollo',
                'description' => 'poderoso attaccante con ali di pollo',
                'attack' => 1,
                'defence' => 80,
                'speed' => 15,
                'life' => 150
            ],
            [
                'name' =>  'Franco 30 Pance',
                'description' => 'trenta l\'età non è',
                'attack' => 69,
                'defence' => 15,
                'speed' => 89,
                'life' => 30
            ],
            [
                'name' =>  'Anna la maga di panna',
                'description' => 'fortissima in magie culinarie',
                'attack' => 50,
                'defence' => 41,
                'speed' => 23,
                'life' => 5
            ]
        ];

        foreach ($characters as $character) {
            $new_character = new Character();

            $new_character->name = $character['name'];
            $new_character->description = $character['description'];
            $new_character->attack = $character['attack'];
            $new_character->defence = $character['defence'];
            $new_character->speed = $character['speed'];
            $new_character->life = $character['life'];

            $new_character->save();
        }
    }
}