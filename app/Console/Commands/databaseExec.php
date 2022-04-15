<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Artisan;

class databaseExec extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:database-run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill database for the store to work';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (Schema::hasTable('payments'))
        { 
            Artisan::call('module:migrate-reset Payment');
        }

        if (Schema::hasTable('orders')) 
        {
            Artisan::call('module:migrate-reset Order');
        }

        if (Schema::hasTable('products'))
        { 
            Artisan::call('module:migrate-reset Product');
        }

        if (Schema::hasTable('users'))
        { 
            Artisan::call('module:migrate-reset Customer');
        }
    
        
        echo ("Clean database \n");
        Artisan::call('module:migrate Customer');
        echo ("Successful Migrations Module: [Customer] \n");

        Artisan::call('module:migrate Product');
        echo ("Successful Migrations Module: [Product] \n");

        Artisan::call('module:seed Product');
        echo ("Successful Seeders Module: [Product] \n");

        Artisan::call('module:migrate Order');
        echo ("Successful Migrations Module: [Order] \n");

        Artisan::call('module:migrate Payment');
        echo ("Successful Migrations Module: [Payment] \n");

        Artisan::call('module:seed Payment');
        echo ("Successful Seeders Module: [Payment] \n");

        return "Successful Migrations and Seeders!";
    }
}
