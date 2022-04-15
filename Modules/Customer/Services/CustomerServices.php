<?php

namespace Modules\Customer\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//Models
use Modules\Customer\Entities\User;

class CustomerServices 
{
    /**
     * Get all products.
     *
     * @return object
     */
    public function saveCustomer(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);

        return $user;
    }
}