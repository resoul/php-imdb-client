<?php

declare(strict_types=1);

namespace Resoul\IMDB\Client;

class ReleaseClient implements ClientInterface
{
    private const string RELEASE_PATH = 'release/%s/weekend/';

    public function __construct(private BoxOfficeRequest $request)
    {
    }

    public function getRelease(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::RELEASE_PATH, $id)
        );
    }
}
