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

        Route::get('/chuck-norris', ChuckNorrisController::class);
    }

    public function register(): void
    {
        $this->app->bind('chuck-norris', fn () => new JokeFactory());
    }
}