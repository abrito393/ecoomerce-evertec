<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CredentialsPayment extends Model
{
    use HasFactory;

    protected $fillable = ['login','tranKey'];
    protected $table = 'credentianls_payment';
    
    protected static function newFactory()
    {
        return \Modules\Payment\Database\factories\CredentialsPaymentFactory::new();
    }
}
