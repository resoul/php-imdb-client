<?php

declare(strict_types=1);

namespace Resoul\IMDB\Client;

class TitleClient
{
    private const string
        TITLE_PATH = 'title/%s/',
        TITLE_SEASON_PATH = 'title/%s/episodes/?season=%d',
        TITLE_FULL_CREDITS_PATH = 'title/%s/fullcredits/',
        TITLE_GOOFS_PATH = 'title/%s/goofs/',
        TITLE_MEDIA_PATH = 'title/%s/mediaindex/',
        TITLE_COMPANY_PATH = 'title/%s/companycredits/',
        TITLE_TRIVIA_PATH = 'title/%s/trivia/',
        TITLE_AWARDS_PATH = 'title/%s/awards/';

    public function __construct(private ImdbRequest $request)
    {
    }

    public function getTitle(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::TITLE_PATH, $id)
        );
    }

    public function getSeason(string $id, int $seasonId): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::TITLE_SEASON_PATH, $id, $seasonId)
        );
    }

    public function getAwards(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::TITLE_AWARDS_PATH, $id)
        );
    }

    public function getMedia(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::TITLE_MEDIA_PATH, $id)
        );
    }

    public function getCredits(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::TITLE_FULL_CREDITS_PATH, $id)
        );
    }

    public function getGoofs(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::TITLE_GOOFS_PATH, $id)
        );
    }

    public function getTrivia(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::TITLE_TRIVIA_PATH, $id)
        );
    }

    public function getCompany(string $id): string
    {
        return $this->request->sendRequest(
            url: sprintf(self::TITLE_COMPANY_PATH, $id)
        );
    }
}
