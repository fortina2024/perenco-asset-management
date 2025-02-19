<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;
    
    protected $guarder=[];
    
    protected $fillable=['date','boat_id','location','destination','passagers','band_landing','fifi','ais','miles','user_id'];

    public function boat ()
    {
        return $this->belongsTo(Boat::class);
    }
    public function location ()
    {
        return $this->belongsTo(Champofboat::class);
    }
    public function champofboat ()
    {
        return $this->belongsTo(Champofboat::class);
    }
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
