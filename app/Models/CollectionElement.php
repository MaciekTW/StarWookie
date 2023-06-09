<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionElement extends Model
{
    use HasFactory;
    protected $table = 'item_user';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'item_id',
    ];
}
