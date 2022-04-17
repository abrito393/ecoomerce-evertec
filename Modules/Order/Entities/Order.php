<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customerName','customerEmail','customerMobile','status','user_id'];
    protected $table = 'orders';
    
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\OrderFactory::new();
    }

    function orderDetails(){
        return $this->hasMany('Modules\Order\Entities\OrderDetails', 'order_id');
	}
}
