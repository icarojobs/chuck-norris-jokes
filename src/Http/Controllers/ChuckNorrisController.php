<?php

namespace TioJobs\ChuckNorrisJokes\Http\Controllers;

use TioJobs\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
        return view('chuck-norris::joke', [
            'joke' => ChuckNorris::getRandomJokes()
        ]);
    }
}