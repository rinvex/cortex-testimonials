<?php

declare(strict_types=1);

namespace Cortex\Testimonials\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cortex:install:testimonials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Cortex Testimonials Module.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->warn($this->description);
        $this->call('cortex:migrate:testimonials');
        $this->call('cortex:seed:testimonials');
        $this->call('cortex:publish:testimonials');
    }
}
