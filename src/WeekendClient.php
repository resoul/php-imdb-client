<?php

declare(strict_types=1);

namespace Resoul\IMDB\Client;

class WeekendClient implements ClientInterface
{
    private const string WEEKEND_PATH = 'weekend/%s/';

    public function __construct(private BoxOfficeRequest $request)
    {
    }

    public function getWeekend(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::WEEKEND_PATH, $id)
        );
    }
}
