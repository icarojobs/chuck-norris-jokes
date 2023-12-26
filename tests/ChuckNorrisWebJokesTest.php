<?php

namespace TioJobs\ChuckNorrisJokes\Tests;

use Orchestra\Testbench\TestCase;
use TioJobs\ChuckNorrisJokes\Facades\ChuckNorris;
use TioJobs\ChuckNorrisJokes\Providers\ChuckNorrisJokesServiceProvider;

class ChuckNorrisWebJokesTest extends TestCase
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
    public function check_if_joke_is_visible_on_chuck_norris_web_path()
    {
        $this->get('/chuck-norris')
            ->assertViewIs('chuck-norris::joke') // carrega a view resources.views.jokes
            ->assertViewHas('joke') // tem a variável $joke
            ->assertOk();
    }
}