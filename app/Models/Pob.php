<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pob extends Model
{
    use HasFactory;
    
    protected $fillable=['crew','client','visitor','cartering','voyage_id'];
}
