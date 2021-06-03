<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_detail extends Model
{
    protected $fillable = ['payment_id','shopping_details_id'];


    use HasFactory;
    public function shopping_details(){
        return $this->belongsTo(Shopping_detail::class);
    }
    public function payments(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    public function  getTotalBayarPaymentBorrowerAttribute(){
        return $this->shopping_details->price_qty - $this->shopping_details->promo_borrower;
    }
}
