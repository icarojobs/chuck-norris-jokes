<?php

namespace TioJobs\ChuckNorrisJokes\Commands;

use Illuminate\Console\Command;
use TioJobs\ChuckNorrisJokes\Facades\ChuckNorris;

class JokesCommand extends Command
{
    /** @var string */
    protected $signature = 'make:joke';

    /** @var string */
    protected $description = 'Create a new random Chuck Norris Joke.';

    /** @return int */
    public function handle()
    {
        $this->info(ChuckNorris::getRandomJokes());

        return self::SUCCESS;
    }
}
