@extends('layout.master')

@section('contenu')
    @if ($errors->any())
        <div>
            <ul>nbJoueurMinMaxid
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--
         formulaire de saisie d'une tâche
         la fonction 'route' utilise un nom de route
         'csrf_field' ajoute un champ caché qui permet de vérifier
           que le formulaire vient du serveur.
      --}}

    <form action="{{route('jeux.store')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3>Création d'un jeu</h3>
            <a href="/jeux">Retour a la liste</a>
            <hr class="mt-2 mb-2">
        </div>

        <div>
            {{-- le nom --}}
            <label for="nom"><strong>Nom : </strong></label>
            <input type="text" name="nom" id="nom"
                   placeholder="nom du jeu">
        </div>
        <div>
            {{-- année de sortie  --}}
            <label for="anneeS"><strong>Année de sortie : </strong></label>
            <input type="int" id="anneeS" name="anneeS"
                   placeholder="aaaa">
        </div>
        <div>
            <label for="ageMax"><strong>age minimum : </strong></label>
            <input type="string" id="ageMax" name="ageMax"
                   placeholder="3+">
        </div>
        <div>
            <label for="nbJoueurMinMax"><strong>nombre de joueur minimum et maximum dans une partie : </strong></label>
            <input type="string" id="nbJoueurMinMax" name="nbJoueurMinMax"
                   placeholder="3-100">
        </div>
        <div>
            <label for="dureePartieMaxMin"><strong>duree minimum et maximmum d'une partie : </strong></label>
            <input type="string" id="dureePartieMaxMin" name="dureePartieMaxMin"
                   placeholder="entre 3 et 30 min">
        </div>
        <div>
            <label for="description"><strong>description du jeu : </strong></label>
            <input type="string" id="description" name="description"
                   placeholder="description">
        </div>
        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>
@stop
