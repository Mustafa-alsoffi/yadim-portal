<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Yaml;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contentPath = base_path('../yadim-portal/content/collections/pages/home.md');

        if (File::exists($contentPath)) {
            $content = File::get($contentPath);
            $contentArray = $this->parseMarkdown($content);
            return view('index', ['content' => $contentArray]);
        }

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
