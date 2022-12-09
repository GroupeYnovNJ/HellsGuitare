@extends('layouts.app')

@section('content')

    <h1>{{ $rayon->nom }}</h1>
    <p>{{ $rayon->nb_produits }}</p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section>
        <h2>Tous les employés liés</h2>
        @foreach ($rayon->employes as $employe)
            {{ $employe->nom }}
            {{ $employe->prenom }}<br>
        @endforeach

        <h2>Tous les instruments liés</h2>
        @foreach ($rayon->instruments as $instrument)
            {{ $instrument->nom }}<br>
        @endforeach
    </section>

@endsection
