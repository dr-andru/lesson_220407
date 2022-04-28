<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shag:test-2 {com} {--option1=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
      print_r(
        "Console command started with "
        . $this->argument('com') . PHP_EOL
      );

      print_r(
        "Options --option1= " . $this->option('option1'). PHP_EOL
      );

        return 0;
    }
}
