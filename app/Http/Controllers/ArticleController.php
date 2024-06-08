<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use App\Models\Article;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'I nostri articoli:';

        $articles = Article::orderBy('created_at', 'DESC');
        return view('articles.index', compact('title', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = Article::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

         // Salviamo l'immagine

         if($request->hasFile('cover')){
            
            $article->update([
                'cover' => $request->file('cover')->storeAs('public/covers/'.$article->id, 'cover.jpg'),
            ]);

            // $path=$request->file('cover')->storeAs('public/covers/'.$article->id, 'cover.jpg');
            // $article->cover=$path;
            // $article->save();

        }

        return redirect()->back()->with(['succes'=>'Articolo creato con successo!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $title = "Breve descrizione dell'articolo";
        
        return view('articles.show', compact('title', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        if($request->hasFile('cover')){
            $path=$request->file('cover')->storeAs('public/covers/'.$article->id, 'cover.jpg');
            $article->cover=$path;
            $article->save();
        }

        return redirect()->back()->with(['success'=>'Articolo modificato con successo']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if($article->cover){
            Storage::delete($article->cover);
        }
        
        $article->delete();

        return redirect()->back()->with(['success'=>'Articolo eliminato con successo']);
    }
}
