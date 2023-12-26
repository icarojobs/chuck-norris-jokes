<?php

namespace TioJobs\ChuckNorrisJokes\Tests;

use Orchestra\Testbench\TestCase;
use TioJobs\ChuckNorrisJokes\Facades\ChuckNorris;
use TioJobs\ChuckNorrisJokes\Factories\JokeFactory;
use TioJobs\ChuckNorrisJokes\Providers\ChuckNorrisJokesServiceProvider;

class JokeFactoryTest extends TestCase
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
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke',
        ]);

        $joke = $jokes->getRandomJokes();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $chuckNorrisJokes = [
            "Chuck Norris doesn't read books. He stares them down until he gets the information he wants.",
            "Time waits for no man. Unless that man is Chuck Norris.",
            "Chuck Norris' tears cure cancer. Too bad he has never cried.",
            "Chuck Norris does not sleep. He waits.",
            "On the 7th day, God rested ... Chuck Norris took over.",
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJokes();

        $this->assertContains($joke, $chuckNorrisJokes);
    }

    /** @test */
    public function it_returns_a_joke_factory_instance_by_facade()
    {
        $joke = ChuckNorris::getRandomJokes();

        $this->assertIsString($joke);
    }
}