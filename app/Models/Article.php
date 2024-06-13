<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

     //indichiamo le colonne "fillable" cioè riempibili
     protected $fillable = ['name', 'description', 'cover', 'tag_id,'];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
}
