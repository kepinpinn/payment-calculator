<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_detail extends Model
{
    use HasFactory;
    public function shoppings(){
        return $this->belongsTo(Shopping::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
