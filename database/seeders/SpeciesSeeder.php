<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\species;
class SpeciesSeeder extends Seeder
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
        if (($handle = fopen("storage/rawdata/dbspecies.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $species =new species();
                for ($c=0; $c < $num; $c++) {
                    if($row == 1)
                        $obj_names[]=$data[$c];
                    else
                        $species->{$obj_names[$c]}=$data[$c];
                }
                if($row != 1)
                    $species->save();
                $row++;
            }
            fclose($handle);
        }
    }
}
