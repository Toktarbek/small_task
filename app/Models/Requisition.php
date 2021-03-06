<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Answer;

class Requisition extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function answers(){
        return $this->hasOne(Answer::class);
    }
}
