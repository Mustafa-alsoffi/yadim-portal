<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Statamic\Facades\Entry;
use Illuminate\Support\Facades\Log; 

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Comment Store Request:', $request->all());

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'entry_id' => $request->entry_id,
            'content' => $request->content,
        ]);

        Log::info('Comment created:', ['comment' => $comment->toArray()]);

        return back();
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'content' => 'required|string',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return response()->json([
            'success' => true,
            'comment' => [
                'id' => $comment->id,
                'content' => $comment->content,
                'updated_at' => $comment->updated_at->diffForHumans()
            ]
        ]);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully.'
        ]);
    }
}
