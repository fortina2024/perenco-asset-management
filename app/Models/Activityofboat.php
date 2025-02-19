<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activityofboat extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'descripion',
        'user_id'
    ];
}
