<?php

namespace TioJobs\ChuckNorrisJokes\Facades;

use Illuminate\Support\Facades\Facade;

class ChuckNorris extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'chuck-norris';
    }
}
