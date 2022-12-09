@extends('layouts.app')

@section('page_title', 'Liste des employés')

@section('content')

    <a href="{{ route('employe.create') }}">{{ __('Créer un employé') }}</a>

    <table class='table'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Nom') }}</th>
                <th scope="col">{{ __('Prénom') }}</th>
                <th scope="col">{{ __('Téléphone') }}</th>
                <th scope="col">{{ __('Email') }}</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $employe)
                <tr>
                    <th scope="row">{{ $employe->id }}</th>
                    <a href="{{ route('employe.show', $employe->id) }}">
                        <td>

                            {{ $employe->nom }}

                        </td>
                        <td>{{ $employe->prenom }}</td>
                    </a>
                    <td>{{ $employe->telephone }}</td>
                    <td>{{ $employe->email }}</td>
                    <td>
                        <a href="{{ route('employe.edit', $employe->id) }}">Editer</a>
                    </td>
                    <td>
                        <form action="{{ route('employe.delete', $employe->id) }}" method="POST">
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
                            <!--checke les erreurs en fonction des paramètres dans UpdateEmployeRequest.php -->

                            <input type="hidden" id="id" name="id" value="{{ $employe->id }}"><br>
                            <input id="sub" type="submit" value="Supprimer"
                                onclick="return confirm('Êtes-vous certain de vouloir supprimer cet employe');">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $employes->links() }}
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
