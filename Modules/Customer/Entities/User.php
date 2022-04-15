<?php

namespace Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','password'];
    protected $table = 'users';

    protected static function newFactory()
    {
        return \Modules\Customer\Database\factories\UserFactory::new();
    }
}
