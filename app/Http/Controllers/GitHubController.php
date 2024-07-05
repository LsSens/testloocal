<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitHubController extends Controller
{
    public function getPopularRepos(Request $request, $user)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
        ])->get("https://api.github.com/users/$user/repos");

        $repos = collect($response->json());

        $popularRepos = $repos->sortByDesc('stargazers_count')->take(5);

        return $popularRepos->values()->all();
    }

    public function getLargestRepo(Request $request, $user)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
        ])->get("https://api.github.com/users/$user/repos");

        $repos = collect($response->json());

        $largestRepo = $repos->sortByDesc('size')->first();

        return $largestRepo;
    }
}
