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
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\Log; 


class PageController extends Controller
{
    public function index(Request $request)
    {
       
        
        // $entries = EntryFacade::query()
        //     ->where('collection', 'pages')
        //     ->where('published', true)
        //     ->get();


        // return view('index', compact('entries'));
        $page = $request->get('page', 1);
        $perPage = 6;

        $entries = EntryFacade::query()
            ->where('collection', 'pages')
            ->where('published', true)
            ->orderBy('date', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        if ($request->ajax()) {
            return view('partials.posts', compact('entries'))->render();
        }

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
        $likesCount = Like::where('entry_id', $entry->id())->count();
        $isLiked = auth()->check() && Like::where('entry_id', $entry->id())->where('user_id', auth()->id())->exists();
                // Replace with actual like count logic
        $commentsCount = $comments->count();
        return view('page.show', compact('entry', 'content', 'comments', 'likesCount', 'isLiked','commentsCount'));
}

public function like(Request $request, $slug)
    {
        $entry = $this->entries->query()->where('slug', $slug)->where('collection', 'pages')->first();

        if (!$entry) {
            return response()->json(['error' => 'Entry not found'], 404);
        }

        $user_id = $request->user()->id ?? null;

        // Toggle like
        $like = Like::where('entry_id', $entry->id())->where('user_id', $user_id)->first();
        if ($like) {
            $like->delete();
        } else {
            Like::create(['entry_id' => $entry->id(), 'user_id' => $user_id]);
        }

        $likesCount = Like::where('entry_id', $entry->id())->count();
        return response()->json(['likesCount' => $likesCount]);
    }

private function extractFirstImage($content)
    {
        preg_match('/!\[.*?\]\((.*?)\)/', $content, $matches);
        return $matches[1] ?? 'https://via.placeholder.com/150';
    }
    public function dashboard()
    {
        $datasets = Entry::query()
            ->where('collection', 'datasets')
            ->where('published', true)
            ->get();
    
        $datasetContent = null;
        if ($datasets->isNotEmpty()) {
            $fileUrl = $datasets->first()->get('file_upload');
            Log::info("File URL: " . json_encode($fileUrl)); // Log the file URL
    
            $filePath = storage_path("app/" . $fileUrl); // Correct the file path
            Log::info("File Path: " . $filePath); // Log the file path
    
            if (file_exists($filePath)) {
                Log::info("File exists: " . $filePath); // Confirm file exists
    
                try {
                    $csv = Reader::createFromPath($filePath, 'r');
                    $csv->setHeaderOffset(0);
                    $records = (new Statement())->process($csv);
                    $datasetContent = iterator_to_array($records->getRecords());
                    Log::info("Dataset Content: " . json_encode($datasetContent)); // Log the dataset content
                } catch (\Exception $e) {
                    Log::error("Error reading CSV: " . $e->getMessage()); // Log any errors
                }
            } else {
                Log::info("File does not exist: " . $filePath); // Log if the file does not exist
            }
        }
    
        return view('dashboard', compact('datasets', 'datasetContent'));
    }
}