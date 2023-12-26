<?php

namespace TioJobs\ChuckNorrisJokes\Providers;

use Illuminate\Support\ServiceProvider;
use TioJobs\ChuckNorrisJokes\Commands\JokesCommand;
use TioJobs\ChuckNorrisJokes\Factories\JokeFactory;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                JokesCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        $this->app->bind('chuck-norris', fn () => new JokeFactory());
    }
}