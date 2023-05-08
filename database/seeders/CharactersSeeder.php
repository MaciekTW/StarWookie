<?php

namespace Database\Seeders;

use App\Models\characters;
use Illuminate\Database\Seeder;

class CharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = 1;
        $obj_names = array();
        if (($handle = fopen("storage/rawdata/dbcharacters.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $characters =new characters();
                for ($c=0; $c < $num; $c++) {
                    if($row == 1)
                        $obj_names[]=$data[$c];
                    else
                        $characters->{$obj_names[$c]}=$data[$c];
                }
                if($row != 1)
                    $characters->save();
                $row++;
            }
            fclose($handle);
        }
    }
}
