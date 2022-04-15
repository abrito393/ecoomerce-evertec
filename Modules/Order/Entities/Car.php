<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','user_id'];
    protected $table = 'car';
    
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\CarFactory::new();
    }

    function product(){
		return $this->belongsTo('Modules\Product\Entities\Product','product_id');
	}
}
