<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
        
        Artisan::call('module:migrate-reset Product');
        echo ("Clean database \n");
        Artisan::call('module:migrate Product');
        echo ("Successful Migrations table: [Product] \n");
        Artisan::call('module:seed Product');
        echo ("Successful Seeders table: [Product] \n");

        return "Successful Migrations and Seeders!";
    }
}
