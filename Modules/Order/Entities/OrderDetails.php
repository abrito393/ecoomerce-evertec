<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = ['unitPrice','quantity','order_id','product_id'];
    protected $table = 'order_details';
    
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\OrderDetailsFactory::new();
    }

    function product(){
		return $this->belongsTo('Modules\Product\Entities\Product','product_id');
	}
}
