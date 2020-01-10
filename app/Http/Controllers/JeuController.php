<?php

namespace App\Http\Controllers;

use App\Models\Jeux;
use App\Models\Tags;
use Illuminate\Http\Request;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jeux = Jeux::all();
        $cat = $request->query('cat', 'All');
        if ($cat != 'All') {
            $jeux = Jeux::join('tag_jeux', 'jeux.id', '=', 'tag_jeux.jeux_id')
                ->join('tags', 'tags.id', '=', 'tag_jeux.tags_id')
                ->select('jeux.id','nom','anneeS','ageMax','nbJoueurMinMax','dureePartieMaxMin','description')
                ->where('tags.label',$cat)
                ->get();
        } else {
            $jeux = Jeux::all();
        }
        $tags = Tags::distinct('label')->pluck('label');
        return view('jeux.index', ['jeux' => $jeux, 'cat' => $cat, 'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'anneeS' => 'required',
                'ageMax' => 'required',
                'nbJoueurMinMax' => 'required',
                'dureePartieMaxMin' => 'required',
                'description' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $jeu = new Jeux;

        $jeu->nom = $request->nom;
        $jeu->anneeS = $request->anneeS;
        $jeu->ageMax = $request->ageMax;
        $jeu->nbJoueurMinMax = $request->nbJoueurMinMax;
        $jeu->dureePartieMaxMin = $request->dureePartieMaxMin;
        $jeu->description = $request->description;


        // insertion de l'enregistrement dans la base de données
        $jeu->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/jeux');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $jeu= Jeux::find($id);

        return view('jeux.show', ['jeu' => $jeu, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeu = Jeux::find($id);
        return view('jeux.edit', ['jeu' => $jeu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jeu = Jeux::find($id);

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'anneeS' => 'required',
                'ageMax' => 'required',
                'nbJoueurMinMax' => 'required',
                'dureePartieMaxMin' => 'required',
                'description' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données

        $jeu->nom = $request->nom;
        $jeu->anneeS = $request->anneeS;
        $jeu->ageMax = $request->ageMax;
        $jeu->nbJoueurMinMax = $request->nbJoueurMinMax;
        $jeu->dureePartieMaxMin = $request->dureePartieMaxMin;
        $jeu->description = $request->description;


        // insertion de l'enregistrement dans la base de données
        $jeu->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/jeux');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valide') {
            $jeu = Jeux::find($id);
            $jeu->delete();
        }
        return redirect()->route('jeux.index');
    }
}
