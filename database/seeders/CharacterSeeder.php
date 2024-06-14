<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $items_ids = Item::all()->pluck('id')->all();

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

            $items = $faker->randomElements($items_ids, 4);


            $itemQuantity = [];
            
            foreach ($items as $item)
            {
                $itemQuantity[] = [$item => ['quantity' => rand(1, 3)]];
                
            };


            $new_character->items()->attach([$itemQuantity]);

            // [1,4,7]
            // [1 => ['quantity' => 9], 4 => ['quantity' => 90], ...]
        }
    }
}
