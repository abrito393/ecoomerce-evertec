<?php

namespace Modules\Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

//Models
use Modules\Payment\Entities\CredentialsPayment;

class SeedCredentialsPlacetopayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        CredentialsPayment::create([
            "tranKey" => "024h1IlD",
            "login"   => "6dd490faf9cb87a9862245da41170ff2"
        ]);
    }
}
