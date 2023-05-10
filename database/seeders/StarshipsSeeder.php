<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\starships;
class StarshipsSeeder extends Seeder
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
        if (($handle = fopen("storage/rawdata/dbstarships.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $starships=new starships();
                for ($c=0; $c < $num; $c++) {
                    if($row == 1)
                        $obj_names[]=$data[$c];
                    else
                        $starships->{$obj_names[$c]}=$data[$c];
                }
                if($row != 1)
                    $starships->save();
                $row++;
            }
            fclose($handle);
        }
    }
}
