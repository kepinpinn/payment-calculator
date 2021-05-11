<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'shopping_id','borrower', 'price_qty','description','status'
    ];
    protected $appends  =['promo_borrower','ppn_borrower','delivery_borrower','total_bayar_borrower', 'presentase'];

    public function shoppings(){
        return $this->belongsTo(Shopping::class,'shopping_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'borrower');
    }
    public function payment_details(){
        return $this->hasOne(Payment_detail::class);
    }
    public function getPpnBorrowerAttribute(){
        if($this->shoppings->ppn == "1"){
          return $this->price_qty * 10/100;
        }else{
            return 0;
        }
    }
    public function  getPresentaseAttribute(){
        if(!$this->shoppings->amount && $this->price_qty){
            return 0;
        }else {
            return round($this->price_qty / $this->shoppings->amount,4);
        }
    }
    public function getPromoBorrowerAttribute(){
        return  $this->shoppings->promo1 * $this->presentase;
    }
    public function getTotalBayarBorrowerAttribute(){
        return floor((($this->price_qty + $this->ppn_borrower) - $this->promo_borrower)+($this->shoppings->delivery * $this->presentase));
    }
}
