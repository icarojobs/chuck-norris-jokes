<?php

namespace TioJobs\ChuckNorrisJokes\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use TioJobs\ChuckNorrisJokes\Commands\JokesCommand;
use TioJobs\ChuckNorrisJokes\Factories\JokeFactory;
use TioJobs\ChuckNorrisJokes\Http\Controllers\ChuckNorrisController;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                JokesCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'chuck-norris');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/chuck-norris'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../../config/chuck-norris.php' => base_path('config/chuck-norris.php'),
        ], 'config');

        if ($this->canPublishMigrations()) {
            $this->publishes([
                __DIR__ . '/../../database/migrations/create_jokes_table.php.stub' =>
                    database_path('migrations/'.date('Y_m_d_His').'_create_jokes_table.php'),
            ], 'migrations');
        }

        Route::get(config('chuck-norris.route'), ChuckNorrisController::class);
    }

    public function register(): void
    {
        $this->app->bind('chuck-norris', fn () => new JokeFactory());

        $this->mergeConfigFrom(__DIR__.'/../../config/chuck-norris.php', 'chuck-norris');
    }

    private function canPublishMigrations(): bool
    {
        $migrations = scandir(database_path('migrations'));

        foreach ($migrations as $migration) {
            if (str($migration)->contains('create_jokes_table')) {
                return false;
            }
        }

        return true;
    }
}
