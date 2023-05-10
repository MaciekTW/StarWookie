<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\vehicles;

class VehiclesSeeder extends Seeder
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
        if (($handle = fopen("storage/rawdata/dbvehicles.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $vehicles =new vehicles();
                for ($c=0; $c < $num; $c++) {
                    if($row == 1)
                        $obj_names[]=$data[$c];
                    else
                        $vehicles->{$obj_names[$c]}=$data[$c];
                }
                if($row != 1)
                    $vehicles->save();
                $row++;
            }
            fclose($handle);
        }
    }
}
