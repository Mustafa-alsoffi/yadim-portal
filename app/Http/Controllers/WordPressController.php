<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class WordPressController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://yadim.fatonitech.com/wp-json/wp/v2/',
        ]);
    }

    public function getPosts()
    {
        try {
            $response = $this->client->get('posts', [
                'verify' => false, // Disable SSL verification
            ]);
            $posts = json_decode($response->getBody()->getContents(), true);

            return view('wordpress.posts', compact('posts'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to fetch posts'], 500);
        }
    }

    public function getUsers()
    {
        $response = $this->client->get('users');
        $users = json_decode($response->getBody()->getContents(), true);

        return view('wordpress.users', compact('users'));
    }
}
