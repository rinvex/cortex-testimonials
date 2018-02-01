<?php

declare(strict_types=1);

namespace Cortex\Testimonials\Console\Commands;

use Rinvex\Testimonials\Console\Commands\MigrateCommand as BaseMigrateCommand;

class MigrateCommand extends BaseMigrateCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cortex:migrate:testimonials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Cortex Testimonials Tables.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        parent::handle();

        $this->call('migrate', ['--step' => true, '--path' => 'app/cortex/testimonials/database/migrations']);
    }
}
