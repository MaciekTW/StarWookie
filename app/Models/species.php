<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class species extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'index';
}
