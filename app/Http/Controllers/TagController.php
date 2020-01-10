<?php

namespace App\Http\Controllers;

use App\Models\Jeux;
use App\Models\Tag;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }

    public function assoJeu($id){
        $tags = Tags::all();
        $jeu = Jeux::find($id);
        return view('tag.asso_jeux', ['jeu' => $jeu, 'tags' => $tags]);

    }

    public static function TagsInJeu(Tags $tag, Jeux $jeu){
        $tagsInJeu = $jeu->tags;
        $idTags = [];
        foreach ($tagsInJeu as $monTag) {
            $idTags[] = $monTag->id;
        }
        return in_array($tag->id, $idTags);
    }

    public function store_asso_jeu(Request $resquest, $id){
        $ids = $resquest->tags;
        $jeu = Jeux::find($id);
        $jeu -> tags()->sync($ids);
        return view('jeux.show', ['jeu' => $jeu, 'action' => 'show']);
    }
}
