<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nick extends Model
{
    protected $fillable = [
        'ingame', 'price', 'clan', 'level', 'class_id', 'sv_id', 'images', 'notes', 'status', 'username', 'password',
    ];

    protected $table = 'nicks';

    use HasFactory;

    public function nick_class()
    {
        return $this->belongsTo( 'App\Models\ClassAcc' , 'class_id', 'id' );
    }

    public function nick_sv()
    {
        return $this->belongsTo( 'App\Models\Server' , 'sv_id', 'id' );
    }

    public function nick_reciept()
    {
       return $this->hasMany( 'App\Models\Reciept' , 'nick_id', 'id' );
    }
}
