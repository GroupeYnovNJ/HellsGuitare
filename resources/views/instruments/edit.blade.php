@extends('layouts.app')

@section('page_title', "Edition d'un instrument")

@section('content')
    <table class='table'>

        <form action="{{ route('instrument.update', $instrument->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ $instrument->description }}</textarea><br>
            <label for="prix">Prix</label>
            <input type="number" step="0.01" id="prix" name="prix" value="{{ $instrument->prix }}"><br>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ $instrument->stock }}"><br>
            <label for="image">Image</label>
            <input type="file" name="image"><br>
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id">
                @foreach ($categories as $categorie)
                    @if ($categorie->id == $instrument->categorie_id)
                        <option selected value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @else
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endif
                @endforeach
            </select><br>
            <label for="rayon">Rayon</label>
            <select name="rayon_id" id="rayon_id">
                @foreach ($rayons as $rayon)
                    @if ($rayon->id == $instrument->rayon_id)
                        <option selected value="{{ $rayon->id }}">{{ $rayon->nom }}</option>
                    @else
                        <option value="{{ $rayon->id }}">{{ $rayon->nom }}</option>
                    @endif
                @endforeach
            </select><br>
            <label for="marque_id">Marque</label>
            <select name="marque_id" id="marque_id">
                @foreach ($marques as $marque)
                    @if ($marque->id == $instrument->marque_id)
                        <option selected value="{{ $marque->id }}">{{ $marque->nom }}</option>
                    @else
                        <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                    @endif
                @endforeach
            </select><br>
            <label for="promotion_id">Promotion</label>
            <select name="promotion_id" id="promotion_id">
                @foreach ($promotions as $promotion)
                    @if ($promotion->id == $instrument->promotion_id)
                        <option selected value="{{ $promotion->id }}">{{ $promotion->reduction }}</option>
                    @else
                        <option value="{{ $promotion->id }}">{{ $promotion->reduction }}</option>
                    @endif
                @endforeach
            </select><br>

            <input id="sub" type="submit">



        </form>
    </table>
@endsection
