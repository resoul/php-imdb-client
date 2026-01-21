<?php

declare(strict_types=1);

namespace Resoul\IMDB\Client;

class ImdbRequest extends Request
{
    private const string API_ENDPOINT = 'https://www.imdb.com/';

    public function getEndpoint(): string
    {
        return self::API_ENDPOINT;
    }
}