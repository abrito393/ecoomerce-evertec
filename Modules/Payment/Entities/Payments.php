<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = ['creditCardNumber','creditCardExpDate','paymentMethod','urlPayment','paymentAmount','order_id','requestId','urlPayment'];
    protected $table = 'payments';
    
    protected static function newFactory()
    {
        return \Modules\Payment\Database\factories\PaymentsFactory::new();
    }
}
