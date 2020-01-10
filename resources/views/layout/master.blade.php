<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <title>Hello, world!</title>
</head>
<body>
@section('navbar')
    @include('layout.navbar')
@show

<div class="container-fluid">
    @section('contenu')
    @show
</div>

@section('footer')
    @include('layout.footer')
@show
</body>
