<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'description',
        'user_id'
    ];
    public function company (){
        return $this->HasMany(Boat::class);
    }
}
