@extends('layouts.app')

@section('content')

    <h1>{{ $instrument->nom }}</h1>
    <p>{{ $instrument->description }}</p>
    <p>{{ $instrument->prix }}</p>
    <p>{{ $instrument->stock }}</p>
    <p>{{ $instrument->image }}</p>

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
        <h2>La catégorie liée</h2>
        {{ $instrument->categorie->nom }}
        <h2>Le rayon lié</h2>
        {{ $instrument->rayon->nom }}
        <h2>La marque liée</h2>
        {{ $instrument->marque->nom }}
        <h2>La promotion liée</h2>
        {{ $instrument->promotion->coupon }}

    </section>

@endsection
