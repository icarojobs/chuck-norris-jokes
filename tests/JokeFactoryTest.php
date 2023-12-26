<?php

namespace TioJobs\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use TioJobs\ChuckNorrisJokes\Factories\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke',
        ]);

        $joke = $jokes->getRandomJoke();

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

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $chuckNorrisJokes);
    }
}