<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
    use HasFactory;

    protected $table = 'animals';

    protected $fillable = array('name','kind_of_animal','gender','age','image','temper','colour','type_of_fur','size');
}
