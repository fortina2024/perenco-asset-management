<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipage extends Model
{
    use HasFactory;

    protected $fillable=['voyage_id','rank','nom','postnom'];
}
