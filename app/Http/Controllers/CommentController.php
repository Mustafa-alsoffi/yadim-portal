<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Statamic\Facades\Entry;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'entry_id' => $request->entry_id,
            'content' => $request->content,
        ]);

        return back();
    }
}
