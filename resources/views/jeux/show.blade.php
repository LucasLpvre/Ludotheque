@extends('layout.master')

@section('contenu')
<div class="text-center" style="margin-top: 2rem">
    @if($action == 'delete')
        <h3>Suppression d'une tâche</h3>
    @else
        <h3>Affichage d'une tâche</h3>
    @endif
    <hr class="mt-2 mb-2">
</div>

    <div>
        {{-- le nom --}}
        <p><strong>nom : </strong>{{$jeu->nom}}</p>
    </div>
    <div>
        {{-- l annee de sortie  --}}
        <p><strong>Annee de sortie : </strong>{{$jeu->anneeS}}</p>
    </div>
    <div>
        {{-- l age min  --}}
        <p><strong>Age minimum : </strong>{{$jeu->ageMax}}</p>
    </div>
    <div>
        {{-- nb joueur max  --}}
        <p><strong>Nombre de joueur Max : </strong>{{$jeu->nbJoueurMinMax}}</p>
    </div>
    <div>
        {{-- duree d une partie  --}}
        <p><strong>Duree d une partie : </strong>{{$jeu->dureePartieMaxMin}}</p>
    </div>
    <div>
        {{-- description --}}
        <p><strong>Description : </strong>{{$jeu->description}}</p>
    </div>

    <div>
        {{-- Liste commentaires--}}

        <h3>Liste des commentaires : </h3>
        @if(!empty($jeux->commentaires))
            <table>
                <tr>
                    <th>titre</th>
                    <th>body</th>
                    <th>auteur</th>
                </tr>
                @foreach($jeux->commentaires as $commentaire)
                        <tr>
                            <td>{{$commentaire['titre']}}</td>
                            <td>{{$commentaire['body']}}</td>
                            <td>{{$commentaire['auteur']}}</td>
                        </tr>
                @endforeach
            </table>

        @else
            <h3>aucun commentaire</h3>
        @endif
    </div>

    <div>
        {{-- Liste commentaires--}}

        <h3>Liste des tags :  <a href="{{route('tag.asso_jeux', ['idJeu' => $jeu->id])}}">Ajouter un tag</a></h3>
        @if(!empty($jeu->tags))
            <table>
                <tr>
                    <th>label</th>

                </tr>
                @foreach($jeu->tags as $tag)
                    <tr>
                        <td>{{$tag['label']}}</td>
                    </tr>
                @endforeach
            </table>

        @else
            <h3>aucun tag</h3>


        @endif
    </div>

    @if($action == 'delete')
        <form action="{{route('jeux.destroy',$jeu->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="text-center">
                <button type="submit" name="delete" value="valide">Valide</button>
                <button type="submit" name="delete" value="annule">Annule</button>
            </div>
        </form>
    @else
        <div>
            <hr>
            <a href="{{route('jeux.index')}}">Retour à la liste</a>
        </div>
    @endif

@stop
