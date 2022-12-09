@extends('layouts.app')

@section('page_title', "Edition d'un instrument")

@section('content')
    <table class='table'>

        <form action="{{ route('instrument.update', $instrument->id) }}" method="POST">
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
            <!--checke les erreurs en fonction des paramètres dans UpdateInstrumentRequest.php -->

            <input type="hidden" id="id" name="id" value="{{ $instrument->id }}"><br>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ $instrument->nom }}"><br>
            <textarea id="desc" name="description">{{ $instrument->description }}</textarea><br>
            <label for="prix">Prix</label>
            <input type="number" step="0.01" id="prix" name="prix" value="{{ $instrument->prix }}"><br>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ $instrument->stock }}"><br>
            <label for="image">Image</label>
            <input type="file" name="image" value="{{ $instrument->image }}"><br>
            <label for="categorie">Catégorie</label>
            <select name="categorie_id" id="categorie">
                @foreach ($categories as $categorie)
                    @if ($categorie->id == $instrument->categories_id)
                        <option selected value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @else
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endif
                @endforeach
            </select><br>
            <select name="rayon_id" id="rayon">
                @foreach ($rayons as $rayon)
                    @if ($rayon->id == $instrument->rayons_id)
                        <option selected value="{{ $rayon->id }}">{{ $rayon->nom }}</option>
                    @else
                        <option value="{{ $rayon->id }}">{{ $rayon->nom }}</option>
                    @endif
                @endforeach
            </select><br>
            <select name="marque_id" id="marque">
                @foreach ($marques as $marque)
                    @if ($marque->id == $instrument->marques_id)
                        <option selected value="{{ $marque->id }}">{{ $marque->nom }}</option>
                    @else
                        <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                    @endif
                @endforeach
            </select><br>
            <select name="promotion_id" id="promotion">
                @foreach ($promotions as $promotion)
                    @if ($promotion->id == $instrument->promotions_id)
                        <option selected value="{{ $promotion->id }}">{{ $promotion->coupon }}</option>
                    @else
                        <option value="{{ $promotion->id }}">{{ $promotion->coupon }}</option>
                    @endif
                @endforeach
            </select><br>

            <input id="sub" type="submit">



        </form>
    </table>
@endsection
