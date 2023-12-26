<?php

namespace TioJobs\ChuckNorrisJokes\Tests;

use Orchestra\Testbench\TestCase;
use TioJobs\ChuckNorrisJokes\Facades\ChuckNorris;
use TioJobs\ChuckNorrisJokes\Factories\JokeFactory;
use TioJobs\ChuckNorrisJokes\Models\Joke;
use TioJobs\ChuckNorrisJokes\Providers\ChuckNorrisJokesServiceProvider;

class JokeModelTest extends TestCase
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

    protected function getEnvironmentSetUp($app)
    {
        require_once __DIR__ . '/../database/migrations/create_jokes_table.php.stub';

        (new \CreateJokesTable())->up();
    }

    /** @test */
    public function check_if_can_access_the_database()
    {
        $joke = new Joke();
        $joke->joke = 'This is funny';
        $joke->save();

        $this->assertDatabaseHas(
            table: Joke::class,
            data: [
                'joke' => 'This is funny',
            ],
        );
    }
}