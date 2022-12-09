@extends('layouts.backend')

@section('page_title', "Création d'un instrument")
@section('content')
    <form action="{{ route('instrument.store') }}" method="POST" enctype="multipart/form-data">
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
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom"><br>
        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea><br>
        <label for="prix">Prix</label>
        <input type="number" step="0.01" id="prix" name="prix"><br>
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock"><br>
        <label for="image">Image</label>
        <input type="file" name="image"><br>
        <label for="categorie">Catégorie</label>
        <select name="categorie_id" for="categorie">
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
        </select><br>
        <label for="rayon">Rayon</label>
        <select name="rayon_id" for="rayon">
            @foreach ($rayons as $rayon)
                <option value="{{ $rayon->id }}">{{ $rayon->nom }}</option>
            @endforeach
        </select><br>
        <label for="rayon">Marque</label>
        <select name="marque_id" for="marque">
            @foreach ($marques as $marque)
                <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
            @endforeach
        </select><br>
        <label for="rayon">Promotion</label>
        <select name="promotion_id" for="promotion">
            @foreach ($promotions as $promotion)
                <option value="{{ $promotion->id }}">{{ $promotion->reduction }}</option>
            @endforeach
        </select><br>
        <label>Créer</label>
        <input type="submit">

    </form>
@endsection
