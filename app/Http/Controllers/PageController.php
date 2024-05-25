<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Comment;
use Statamic\Stache\Repositories\EntryRepository;
use Statamic\Entries\Entry;
use Statamic\Facades\Markdown;
use Statamic\Facades\Entry as EntryFacade;
use Illuminate\Support\Str;


class PageController extends Controller
{
    public function index()
    {
        // $pages = Entry::query()
        //     ->where('collection', 'pages')
        //     ->where('published', true)
        //     ->get()
        //     ->map(function ($entry) {
        //         return [
        //             'title' => $entry->get('title'),
        //             'content' => $entry->get('content'),
        //             'slug' => $entry->slug(),
        //             'image' => $entry->get('image') ?? 'default-image.jpg', // Assuming you have an image field
        //         ];
        //     });
        
        $entries = EntryFacade::query()
            ->where('collection', 'pages')
            ->where('published', true)
            ->get();


        return view('index', compact('entries'));
    }

    protected $entries;

    public function __construct(EntryRepository $entries)
    {
        $this->entries = $entries;
    }

    public function show($slug)
    {
        
        $entry = $this->entries->query()->where('slug', $slug)->where('collection', 'pages')->first();

        if (!$entry) {
            abort(404);
        }

        $content = Markdown::parse($entry->get('content'));
        $comments = Comment::where('entry_id', $entry->id())->with('user')->get();
        $likesCount = 0; // Replace with actual like count logic

        return view('page.show', compact('entry', 'content', 'comments', 'likesCount'));
}
private function extractFirstImage($content)
    {
        preg_match('/!\[.*?\]\((.*?)\)/', $content, $matches);
        return $matches[1] ?? 'https://via.placeholder.com/150';
    }
}