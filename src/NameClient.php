<?php

declare(strict_types=1);

namespace Resoul\IMDB\Client;

class NameClient implements ClientInterface
{
    private const string
        NAME_PATH = 'name/%s/',
        NAME_AWARDS_PATH = 'name/%s/awards/',
        NAME_MEDIA_PATH = 'name/%s/mediaindex/',
        NAME_TRIVIA_PATH = 'name/%s/trivia/',
        NAME_QUOTES_PATH = 'name/%s/quotes/';

    public function __construct(private ImdbRequest $request)
    {
    }

    public function getName(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::NAME_PATH, $id)
        );
    }

    public function getMedia(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::NAME_MEDIA_PATH, $id)
        );
    }

    public function getAwards(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::NAME_AWARDS_PATH, $id)
        );
    }

    public function getQuotes(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::NAME_QUOTES_PATH, $id)
        );
    }

    public function getTrivia(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::NAME_TRIVIA_PATH, $id)
        );
    }
}
