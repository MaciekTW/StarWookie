<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function getItemName($itemName)
    {
        return DB::table('items')
            ->where('name', '=', $itemName)->first();
    }

    public static function getItemPhotoByName($itemName)
    {
        $itemObj = Item::getItemName($itemName);
        return "Graphics/".$itemObj->component."/".$itemObj->src;
    }

}
