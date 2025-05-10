<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    // Define fillable properties for mass assignment
    protected $fillable = ['title', 'description', 'image'];
}
