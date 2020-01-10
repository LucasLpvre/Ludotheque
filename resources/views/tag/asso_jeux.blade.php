@extends('layout.master')


<head>
    <title>Ajout TAG</title>
</head>

@section('contenu')
    <h2>Ajout d'un tag</h2>

    <form action="{{route('tag.store_asso_jeu', $jeu->id)}}" method="POST">
        @csrf
        @if(!empty($tags))
            <select name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option name="{{$tag['id']}}" value="{{$tag['id']}}"
                        @if(\App\Http\Controllers\TagController::TagsInJeu($tag, $jeu))
                            selected="selected" @endif>
                        {{$tag->label}}
                    </option>
                    <br>
                @endforeach
            </select>

        @else
            <h3>Aucun Tag.</h3>
        @endif
        <button type="submit">Valider</button>
    </form>
@stop
