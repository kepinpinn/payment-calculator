<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','tanggal', 'store', 'amount', 'ppn', 'delivery', 'promo1'
    ];
    protected $appends  =['total','total_bayar'];

    public function shopping_details()
    {
        return $this->hasMany(Shopping_detail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getTotalAttribute(){
        return $this->amount
            + $this->delivery;
    }
    public function  getTotalBayarAttribute(){
        return $this->total - $this->promo1;
    }
}
