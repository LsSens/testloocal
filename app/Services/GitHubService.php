<?php

namespace App\Services;

use GuzzleHttp\Client;

class GitHubService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.github.com/',
            'timeout'  => 10.0,
            'headers' => [
                'Accept' => 'application/vnd.github.v3+json',
            ],
        ]);
    }

    public function getPopularRepos($username)
    {
        $response = $this->client->get("users/{$username}/repos");

        $repos = json_decode($response->getBody(), true);

        usort($repos, function ($a, $b) {
            return $b['stargazers_count'] - $a['stargazers_count'];
        });

        return array_slice($repos, 0, 5);
    }

    public function getLargestRepo($username)
    {
        $response = $this->client->get("users/{$username}/repos");

        $repos = json_decode($response->getBody(), true);

        usort($repos, function ($a, $b) {
            return $b['size'] - $a['size'];
        });

        return $repos[0];
    }
}
