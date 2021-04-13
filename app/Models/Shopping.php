<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','tanggal', 'store', 'amount', 'ppn', 'delivery', 'total','promo1','total_bayar'
    ];


    public function shopping_details()
    {
        return $this->hasMany(Shopping_detail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
