@extends('layout.master')

<head>
    <title>Liste des jeux</title>
</head>

@section('contenu')
    <h2>La liste des jeux</h2>
    <hr>
    <div>

        <form action="{{route('jeux.index')}}" method="get">
            <select name="cat">
                <option value="All" @if($cat == 'All') selected @endif></option>

                @foreach($tags as $tag)
                    <option value="{{$tag}}"  @if($cat == $tag) selected @endif>{{$tag}}</option>
                @endforeach

            </select>
            <input class ="btn btn-outline-warning buttonMain" type="submit" value="Valider">
            <a class ="btn btn-outline-danger buttonMain"  href="{{route('jeux.index')}}">Réinitialiser</a>
        </form>
    </div>

    <div class = "container-fluid">
        @if(!empty($jeux))
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Annee de sortie</th>
                    <th>Age minimum</th>
                    <th>Nombre de joueur minimum-maximum</th>
                    <th>Duree d'une partie minimum-maximum</th>
                    <th>Description du jeu</th>
                    <th>Options</th>
                </tr>
                @foreach($jeux as $jeu)
                    <tr>
                        <td>{{$jeu['nom']}}</td>
                        <td>{{$jeu['anneeS']}}</td>
                        <td>{{$jeu['ageMax']}}</td>
                        <td>{{$jeu['nbJoueurMinMax']}}</td>
                        <td>{{$jeu['dureePartieMaxMin']}}</td>
                        <td>{{$jeu['description']}}</td>
                        <td>
                            <a href="./jeux/{{$jeu['id']}}"><button type="button" class="btn btn-info">Consulter</button></a>
                            <a href="./jeux/{{$jeu['id']}}/edit"><button type="button" class="btn btn-warning">Modifier</button></a>
                            <a href="./jeux/{{$jeu['id']}}/?action=delete"><button type="button" class="btn btn-danger">Supprimer</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>

        @else
            <h3>aucun jeu</h3>
        @endif
    </div>
@stop
