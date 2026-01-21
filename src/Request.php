<?php

declare(strict_types=1);

namespace Resoul\IMDB\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Resoul\Cache\CacheInterface;

abstract class Request
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheInterface $cache,
        private int $defaultTtl = 131536000,
    ) {
    }

    abstract public function getEndpoint(): string;

    public function sendRequest(string $url): string
    {
        $buildUrl = $this->buildUrl($url);
        $cacheKey = $this->getCacheKey($buildUrl);
        $cached = $this->cache->get($cacheKey);

        if ($cached !== null) {
            return $cached;
        }

        $options['headers']['User-Agent'] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36';
        $options['headers']['Accept-Language'] = 'en';
        $response = $this->httpClient->request('GET', $buildUrl, $options);

        $content = $response->getContent();
        $this->cache->set($cacheKey, $content, $this->defaultTtl);

        return $content;
    }

    private function buildUrl(string $path): string
    {
        return sprintf('%s%s', $this->getEndpoint(), $path);
    }

    private function getCacheKey(string $url): string
    {
        return md5($url);
    }
}