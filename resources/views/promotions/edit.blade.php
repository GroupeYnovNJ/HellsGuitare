@extends('layouts.app')

@section('page_title', "Edition d'une promotion")

@section('content')
    <table class='table'>

        <form action="{{ route('promotion.update', $promotion->id) }}" method="POST">
            @csrf
            @method('PATCH')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--checke les erreurs en fonction des paramètres dans UpdatePromotionRequest.php -->

            <input type="hidden" id="id" name="id" value="{{ $promotion->id }}"><br>
            <label for="coupon">Coupon</label>
            <textarea id="coupon" name="coupon">{{ $promotion->coupon }}</textarea><br>
            <label for="reduction">Réduction</label>
            <input type="number" min="1" max="100" id="reduction" name="reduction"
                value="{{ $promotion->reduction }}"><br>
            <label for="date_debut">Date de début</label>
            <input type="datetime-local" id="date_debut" name="date_debut" value="{{ $promotion->date_debut }}"><br>
            <label for="date_fin">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" value="{{ $promotion->date_fin }}"><br>

            <input id="sub" type="submit">



        </form>
    </table>
@endsection
