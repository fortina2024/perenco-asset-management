<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $fillable=['to','from','time','activity','champ','detail'];

    public function activityofboat ()
    {
        return $this->belongsTo(Activityofboat::class);
    }

    public function champofboat ()
    {
        return $this->belongsTo(Champofboat::class);
    }
}
