<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use App\Models\Article;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreArticleRequest;

use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'I nostri articoli:';

        $tags = Tag::all();

        $articles = Article::all();  //orderBy('created_at', 'DESC') mi funziona solo con paginate();

        return view('articles.index', compact('title', 'tags', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        $articles = Article::all();

        return view('articles.create', compact('tags', 'articles'));
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

        //attach ci permette di creare nuove righe nella tabella pivot
        //accetta in inpunt un array di ID

        $article->tags()->attach($request->tags);
        

         // Salviamo l'immagine

         if($request->hasFile('cover')){
            
            $article->cover=$request->file('cover')->storeAs('public/covers/'. $article->id, 'cover.jpg');
            $article->save();

            // $article->update([
            //     'cover' => $request->file('cover')->storeAs('public/covers/'.$article->id, 'cover.jpg'),
            // ]);

            // $path=$request->file('cover')->storeAs('public/covers/'.$article->id, 'cover.jpg');
            // $article->cover=$path;
            // $article->save();

        }

        return redirect()->back()->with(['succes'=>'Articolo creato con successo!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = "Breve descrizione dell'articolo";

        $article = Article::findOrFail($id);
        
        return view('articles.show', compact('title', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        if($request->hasFile('cover')){
            $path=$request->file('cover')->storeAs('public/covers/'. $article->id, 'cover.jpg');
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

        $article->tags()->detach();

        return redirect()->back()->with(['success'=>'Articolo eliminato con successo']);
    }

    public function articlesByTag(Tag $tag)
    {
        $title = 'Articoli per tag:';

        $articles =$tag->articles->sortByDesc('created_at');

        return view('articles.index', compact('title','articles'));
    }
}
