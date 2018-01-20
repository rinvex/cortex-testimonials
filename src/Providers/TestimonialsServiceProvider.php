<?php

declare(strict_types=1);

namespace Cortex\Testimonials\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Rinvex\Testimonials\Models\Testimonial;
use Illuminate\Database\Eloquent\Relations\Relation;
use Cortex\Testimonials\Console\Commands\SeedCommand;
use Cortex\Testimonials\Console\Commands\InstallCommand;
use Cortex\Testimonials\Console\Commands\MigrateCommand;
use Cortex\Testimonials\Console\Commands\PublishCommand;
use Cortex\Testimonials\Console\Commands\RollbackCommand;

class TestimonialsServiceProvider extends ServiceProvider
{
    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        SeedCommand::class => 'command.cortex.testimonials.seed',
        InstallCommand::class => 'command.cortex.testimonials.install',
        MigrateCommand::class => 'command.cortex.testimonials.migrate',
        PublishCommand::class => 'command.cortex.testimonials.publish',
        RollbackCommand::class => 'command.cortex.testimonials.rollback',
    ];

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register(): void
    {
        // Register console commands
        ! $this->app->runningInConsole() || $this->registerCommands();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router): void
    {
        // Bind route models and constrains
        $router->pattern('testimonial', '[0-9]+');
        $router->model('testimonial', Testimonial::class);

        // Map relations
        Relation::morphMap([
            'testimonial' => config('rinvex.testimonials.models.testimonial'),
        ]);

        // Load resources
        require __DIR__.'/../../routes/breadcrumbs.php';
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'cortex/testimonials');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'cortex/testimonials');
        ! $this->app->runningInConsole() || $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->app->afterResolving('blade.compiler', function () {
            require __DIR__.'/../../routes/menus.php';
        });

        // Publish Resources
        ! $this->app->runningInConsole() || $this->publishResources();
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    protected function publishResources(): void
    {
        $this->publishes([realpath(__DIR__.'/../../database/migrations') => database_path('migrations')], 'cortex-testimonials-migrations');
        $this->publishes([realpath(__DIR__.'/../../resources/lang') => resource_path('lang/vendor/cortex/testimonials')], 'cortex-testimonials-lang');
        $this->publishes([realpath(__DIR__.'/../../resources/views') => resource_path('views/vendor/cortex/testimonials')], 'cortex-testimonials-views');
    }

    /**
     * Register console commands.
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        // Register artisan commands
        foreach ($this->commands as $key => $value) {
            $this->app->singleton($value, function ($app) use ($key) {
                return new $key();
            });
        }

        $this->commands(array_values($this->commands));
    }
}
