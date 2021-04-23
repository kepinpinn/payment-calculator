<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_detail extends Model
{
    use HasFactory;
    public function shopping_details(){
        return $this->hasOne(Shopping_detail::class);
    }

}
