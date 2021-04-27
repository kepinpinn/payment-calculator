<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_detail extends Model
{
    use HasFactory;
    public function shopping_details(){
        return $this->belongsTo(Shopping_detail::class);
    }
    public function payments(){
        return $this->belongsTo(Payment::class);
    }
}
