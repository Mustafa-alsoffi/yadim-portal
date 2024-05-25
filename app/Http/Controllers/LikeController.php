<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Statamic\Facades\Entry;

class LikeController extends Controller
{
    public function like($entryId)
    {
        $entry = Entry::find($entryId);

        if (!$entry) {
            return response()->json(['message' => 'Entry not found'], 404);
        }

        $like = Like::firstOrCreate([
            'user_id' => auth()->id(),
            'entry_id' => $entryId
        ]);

        $likesCount = Like::where('entry_id', $entryId)->count();

        return response()->json(['likes_count' => $likesCount]);
    }
}