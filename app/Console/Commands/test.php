<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Choicese;
use App\ApplicationWay;
use App\Selection;
use App\Company;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test_command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test';

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
     * @return mixed
     */
    public function handle()
    {
        Company::created_id(["name" => "test"]);
    }
}
