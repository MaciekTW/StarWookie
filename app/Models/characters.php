<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class characters extends Model
{
    use HasFactory;

    public $timestamps = false;
//    protected $primaryKey = 'index';

    public function save(array $options = [])
    {
        $result = parent::save($options);

        if ($result) {
            $item= new Item();
            $item->component_index = $this->index;

            $item->name = $this->name;
            $item->component = $this->component;
            $item->src = $this->src;
            $item->save();
        }

        return $result;
    }

}
