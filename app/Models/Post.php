<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //tutti i campi che vogliamo siano abilitati al mass update
    // protected $fillable = ['title', 'content', 'slug'];

    //tutti i campi che non vogliamo siano abilitati al mass update
    protected $guarded = ['id'];
}
