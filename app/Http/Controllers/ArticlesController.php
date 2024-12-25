<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function allArticles(Request $request)
    {
        $search = $request->query('search');

        $articles = Article::orderBy("created_at", "desc")
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            })
            ->paginate(10);  // Pagination à 10 articles par page

        return view("pages.allArticles", compact("articles", "search"));
    }


    public function articlePage(Request $request)
    {
        $search = $request->query('search');

        $articles = Article::where('user_id', Auth::id())
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return view('articles.articles', compact('articles', 'search'));
    }

    public function articleCreate()
    {
        return view('articles.createArticle');
    }

    public function articles(Request $request)
    {
        $request->validate([
            "title" => "required|string",
            "content" => "required|string",
        ]);

        Article::create([
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => Auth::id(),
        ]);

        return redirect()->route("articles.list")->with("success", "Votre article a été créé avec succès");
    }

    public function editArticle($id)
    {
        $article = Article::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('articles.editArticle', compact('article'));
    }

    public function updateArticle(Request $request, $id)
    {
        $request->validate([
            "title" => "required|string",
            "content" => "required|string",
        ]);

        $article = Article::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $article->update([
            "title" => $request->title,
            "content" => $request->content,
        ]);

        return redirect()->route('articles.list')->with('success', 'Votre article a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $article = Article::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $article->delete();

        return redirect()->route('articles.list')->with('success', 'Article supprimé avec succès.');
    }

    public function likeArticle($id)
    {
        $article = Article::findOrFail($id);

        if ($article->likedBy()->where('user_id', Auth::id())->exists()) {
            $article->likedBy()->detach(Auth::id());
            return back()->with('success', 'Vous avez retiré votre like.');
        } else {
            $article->likedBy()->attach(Auth::id());
            return back()->with('success', 'Vous avez aimé cet article.');
        }
    }
}
