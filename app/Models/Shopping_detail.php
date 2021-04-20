<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'shopping_id','borrower', 'price_qty', 'ppn_borrower', 'promo_borrower', 'delivery_borrower', 'total_bayar_borrower','description'
    ];


    public function shoppings(){
        return $this->belongsTo(Shopping::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'borrower');
    }
}
