@extends('layouts.app')

@section('page_title', 'Liste des rayons')

@section('content')

    <a href="{{ route('rayon.create') }}">{{ __('Créer un rayon') }}</a>

    <table class='table'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Nom') }}</th>
                <th scope="col">{{ __('Nombre de produits') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rayons as $rayon)
                <tr>
                    <th scope="row">{{ $rayon->id }}</th>
                    <td>
                        <a href="{{ route('rayon.show', $rayon->id) }}">
                            {{ $rayon->nom }}
                        </a>
                    </td>
                    <td>{{ $rayon->nb_produits }}</td>
                    <td>
                        <a href="{{ route('rayon.edit', $rayon->id) }}">Editer</a>
                    </td>
                    <td>
                        <form action="{{ route('rayon.delete', $marque->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!--checke les erreurs en fonction des paramètres dans UpdateRayonRequest.php -->

                            <input type="hidden" id="id" name="id" value="{{ $rayon->id }}"><br>
                            <input id="sub" type="submit" value="Supprimer"
                                onclick="return confirm('Êtes-vous certain de vouloir supprimer ce rayon');">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $rayons->links() }}
    </div>
    <div>
        <title>Geographic Coordinates</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="node_modules/ol/ol.css">
        <style>
            .map {
                width: 100%;
                height: 400px;
            }

            td {
                padding: 0 0.5em;
            }
        </style>
        </head>

        <body>
            <div id="map" class="map">
                <div id="popup"></div>
            </div>
            <div id="info"></div>

            <!-- Pointer events polyfill for old browsers, see https://caniuse.com/#feat=pointer -->
            <script src="https://unpkg.com/elm-pep@1.0.6/dist/elm-pep.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
            <script type="module" src="../js/map.js"></script>
    </div>

@endsection
