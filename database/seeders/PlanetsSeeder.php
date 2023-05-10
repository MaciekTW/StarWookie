<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\planets;

class PlanetsSeeder extends Seeder
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
        if (($handle = fopen("storage/rawdata/dbplanets.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $planets =new planets();
                for ($c=0; $c < $num; $c++) {
                    if($row == 1)
                        $obj_names[]=$data[$c];
                    else
                        $planets->{$obj_names[$c]}=$data[$c];
                }
                if($row != 1)
                    $planets->save();
                $row++;
            }
            fclose($handle);
        }
    }
}
