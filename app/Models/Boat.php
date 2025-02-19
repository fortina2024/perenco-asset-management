<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;

    protected $guarder=[];
    
    protected $fillable=['nom','typeofboat_id','categoryofboat_id','costcenter_id','company_id','status','user_id','contract'];

    public function typeofboat ()
    {
        return $this->belongsTo(Typeofboat::class);
    }
    public function activityofboat ()
    {
        return $this->belongsTo(Activityofboat::class);
    }
    public function categoryofboat ()
    {
        return $this->belongsTo(Categoryofboat::class);
    }
    public function company ()
    {
        return $this->belongsTo(Company::class);
    }
    public function costcenter ()
    {
        return $this->belongsTo(Costcenter::class);
    }
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
