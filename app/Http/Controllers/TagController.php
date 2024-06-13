<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use App\Models\Article;

use Illuminate\Http\Request;

use App\Http\Requests\StoreTagRequest;

use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $title = 'Lista dei tags:';
    
        $tags = Tag::all();  //orderBy('created_at', 'DESC') mi funziona solo con paginate();
        
        return view('tags.index', compact('title', 'tags'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        return view('tags.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        // $tag = new Tag();
        // $tag->name=$request->name;
        // $tag->description=$request->description;
        // $tag->save();
        $tag->articles()->attach($request->articles);

        return redirect()->back()->with(['succes'=>'Tag creato con successo!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = "Breve descrizione del tag";

        $tag = Tag::findOrFail($id);
        
        return view('tags.show', compact('title', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->back()->with(['success'=>'Tag modificato con successo']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        // if($tag->articles->count()>0){
        // abort(403);
        // }
        $tag->articles()->detach();//elimina tutte le righe dalla tabella pivot che includono la categoria da eliminare
        $tag->delete();
        return redirect()->back()->with(['success'=>'Tag eliminato con successo']);
    }
}
