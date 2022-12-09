@extends('layouts.backend')

@section('page_title', "Création d'une promotion")
@section('content')
    <form action="{{ route('promotion.store') }}" method="POST">
        @csrf
        @method('POST')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="coupon">Coupon</label>
        <textarea id="coupon" name="coupon"></textarea><br>
        <label for="reduction">Réduction</label>
        <input type="number" min="1" max="100" id="reduction" name="reduction"><br>
        <label for="date_debut">Date de début</label>
        <input type="datetime-local" id="date_debut" name="date_debut"><br>
        <label for="date_fin">Date de fin</label>
        <input type="date" id="date_fin" name="date_fin"><br>

    </form>
@endsection
