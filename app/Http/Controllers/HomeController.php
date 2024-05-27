<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $wpController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $wpController = new WordPressController();
        $this->wpController = $wpController;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch WordPress posts
        $response = $this->wpController->getPosts()->getData(true);
        $posts = $response['posts']; // Extract the 'posts' array
        Log::info($posts);
        return view('index', compact('posts'));

        abort(404, 'Content not found');
    }

    private function parseMarkdown($content)
    {
        $parsedContent = [];
        $parts = explode('---', $content, 3);

        if (count($parts) === 3) {
            $parsedContent['meta'] = Yaml::parse($parts[1]);
            $parsedContent['body'] = $parts[2];
        }

        return $parsedContent;
    }
}
