<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Event extends Model
{
    use HasFactory;
    protected $dates = ['date'];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function usersJoined(){
        return $this->belongsToMany(User::class);
    }
}
