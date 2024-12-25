<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $articleId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $article = Article::findOrFail($articleId);

        $article->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }
}
