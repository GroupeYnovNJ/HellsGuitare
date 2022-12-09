@extends('layouts.app')

@section('page_title', 'Liste des instruments')

@section('content')

    <a href="{{ route('instrument.create') }}">{{ __('Créer un instrument') }}</a>

    <table class='table'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Nom') }}</th>
                <th scope="col">{{ __('Description') }}</th>
                <th scope="col">{{ __('Prix') }}</th>
                <th scope="col">{{ __('Stock') }}</th>
                <th scope="col">{{ __('Image') }}</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($instruments as $instrument)
                <tr>
                    <th scope="row">{{ $instrument->id }}</th>
                    <td>
                        <a href="{{ route('instrument.show', $instrument->id) }}">
                            {{ $instrument->nom }}
                        </a>
                    </td>
                    <td>{{ $instrument->description }}</td>
                    <td>{{ $instrument->prix }}</td>
                    <td>{{ $instrument->stock }}</td>
                    <td><img src="{{ $instrument->image }}" width="70px"height="70px"alt="Un instrument de musique">
                    </td>
                    <td>
                        <a href="{{ route('instrument.edit', $instrument->id) }}">Editer</a>
                    </td>
                    <td>
                        <form action="{{ route('instrument.delete', $instrument->id) }}" method="POST">
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
                            <!--checke les erreurs en fonction des paramètres dans UpdateInstrumentRequest.php -->

                            <input type="hidden" id="id" name="id" value="{{ $instrument->id }}"><br>
                            <input id="sub" type="submit" value="Supprimer"
                                onclick="return confirm('Êtes-vous certain de vouloir supprimer cet instrument');">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $instruments->links() }}
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
