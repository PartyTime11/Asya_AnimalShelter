<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animals extends Model
{
    protected $table = 'animals';

    protected $fillable = array('name','kind_of_animal','gender','age','image');

}
