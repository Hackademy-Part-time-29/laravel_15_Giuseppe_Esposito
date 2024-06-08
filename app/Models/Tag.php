<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    //indichiamo le colonne "fillable" cioè riempibili
    protected $fillable = ['name', 'description'];

}
