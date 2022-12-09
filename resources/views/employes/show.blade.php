@extends('layouts.app')

@section('content')

    <h1>{{ $employe->nom }}
        {{ $employe->prenom }} </h1>
    <p>{{ $employe->telephone }}</p>
    <p>{{ $employe->email }}</p>


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
        <h2>Tous les rayons liés</h2>
        @foreach ($employe->rayons as $rayon)
            {{ $rayon->nom }}<br>
        @endforeach

    </section>

@endsection
