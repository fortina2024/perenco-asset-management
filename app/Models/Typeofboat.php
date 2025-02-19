<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeofboat extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'description',
        'user_id'
    ];
    public function typeofboat (){
        return $this->HasMany(Boat::class);
    }
}
