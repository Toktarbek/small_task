<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requisition;

class Answer extends Model
{
    public function requisitions(){
    	return $this->hasOne(Requisition::class);
    }
}
