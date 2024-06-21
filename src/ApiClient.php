<?php

namespace OmsSweip;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ApiClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchPageContent(string $url): string
    {
        $response = $this->client->request('GET', $url);
        return $response->getBody()->getContents();
    }

    public function parseTitle(string $html): string
    {
        $crawler = new Crawler($html);
        return $crawler->filter('title')->text();
    }

    public function parseLinks(string $html): array
    {
        $crawler = new Crawler($html);
        $links = $crawler->filter('a')->each(function (Crawler $node, $i) {
            return $node->attr('href');
        });
        return $links;
    }
}
