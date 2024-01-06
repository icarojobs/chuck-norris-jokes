<?php

namespace TioJobs\ChuckNorrisJokes\Factories;

class JokeFactory
{
    public function __construct(
        protected array $jokes = [
            "Chuck Norris doesn't read books. He stares them down until he gets the information he wants.",
            "Time waits for no man. Unless that man is Chuck Norris.",
            "Chuck Norris' tears cure cancer. Too bad he has never cried.",
            "Chuck Norris does not sleep. He waits.",
            "On the 7th day, God rested ... Chuck Norris took over.",
        ],
    ) {
    }

    public function getRandomJokes()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
