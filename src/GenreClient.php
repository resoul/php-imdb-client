<?php

declare(strict_types=1);

namespace Resoul\IMDB\Client;

class GenreClient implements ClientInterface
{
    private const string INTEREST_PATH = 'interest/all/';

    public function __construct(private Request $request)
    {
    }

    public function getGenres(): string
    {
        return $this->request->sendRequest(self::INTEREST_PATH);
    }
}
