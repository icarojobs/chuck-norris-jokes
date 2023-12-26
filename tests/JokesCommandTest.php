<?php

namespace TioJobs\ChuckNorrisJokes\Tests;

use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use TioJobs\ChuckNorrisJokes\Facades\ChuckNorris;
use TioJobs\ChuckNorrisJokes\Factories\JokeFactory;
use TioJobs\ChuckNorrisJokes\Providers\ChuckNorrisJokesServiceProvider;

class JokesCommandTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [ChuckNorrisJokesServiceProvider::class];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'ChuckNorris' => ChuckNorris::class,
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJokes')
            ->once()
            ->andReturn('some joke');

        $this->artisan('make:joke');

        $output = Artisan::output();

        $this->assertSame('some joke'.PHP_EOL, $output);
    }
}