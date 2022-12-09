@extends('layouts.app')

@section('content')

    <h1>{{ $categorie->nom }}</h1>

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
        <h2>Tous les instruments liés</h2>
        @foreach ($categorie->instruments as $instrument)
            {{ $instrument->nom }}<br>
        @endforeach

    </section>

@endsection
