<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    public function shopping_details(){
        return $this->hasMany(Shopping_detail::class);
    }

}
