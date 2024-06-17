<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('items')->truncate();

        $data = $this->getCSVData(__DIR__ . '/items.csv');

        foreach ($data as $index => $row) {

            if ($index !== 0) {
                $new_item = new Item();
                $new_item->name = $row[0];
                $new_item->slug = $row[1];
                $new_item->type = $row[2];
                $new_item->category = $row[3];
                $new_item->weight = $row[4];
                $new_item->cost = $row[5];
                $new_item->damage_dice = $row[6];
                $new_item->save();
            }
        }
    }

    public function getCSVData(string $path)
    {
        $data = [];

        $file_stream = fopen($path, 'r');

        if ($file_stream === false) {
            exit('Error - cannot open the file' . $path);
        }

        while (($row = fgetcsv($file_stream)) !== false) {
            $data[] = $row;
        }

        fclose($file_stream);

        return $data;
    }
}
