@extends('layouts.app')

@section('content')

    <h1>{{ $promotion->coupon }}</h1>
    <p>{{ $promotion->reduction }}</p>
    <p>{{ $promotion->date_debut }}</p>
    <p>{{ $promotion->date_fin }}</p>

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
        @foreach ($promotion->instruments as $instrument)
            {{ $instrument->nom }}<br>
        @endforeach

    </section>

@endsection
