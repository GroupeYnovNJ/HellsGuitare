@extends('layouts.app')

@section('page_title', 'Liste des instruments')

@section('content')

    <a href="{{ route('instrument.create') }}">{{ __('Créer un instrument') }}</a>

    <table class='table'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Nom') }}</th>
                <th scope="col">{{ __('Statut') }}</th>
                <th scope="col">{{ __('Description') }}</th>
                <th scope="col">{{ __('Page Web') }}</th>
                <th scope="col">{{ __('J\'aime') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entreprises as $entreprise)
                <tr>
                    <th scope="row">{{ $entreprise->id }}</th>
                    <td>{{ $entreprise->nom }}</td>
                    <td>{{ $entreprise->statut }}</td>
                    <td>{{ $entreprise->description }}</td>
                    <td>{{ $entreprise->web }}</td>
                    <td>{{ $entreprise->likes }}</td>
                    <td>
                        <a href="{{ route('entreprise.edit', $entreprise->id) }}">Editer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
