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
        <label for="categorie_id">Catégorie</label>
        <select name="categorie_id" for="categorie_id">
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
        </select><br>
        <label for="rayon_id">Rayon</label>
        <select name="rayon_id" for="rayon_id">
            @foreach ($rayons as $rayon)
                <option value="{{ $rayon->id }}">{{ $rayon->nom }}</option>
            @endforeach
        </select><br>
        <label for="marque_id">Marque</label>
        <select name="marque_id" for="marque_id">
            @foreach ($marques as $marque)
                <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
            @endforeach
        </select><br>
        <label for="promotion_id">Promotion</label>
        <select name="promotion_id" for="promotion_id">
            @foreach ($promotions as $promotion)
                <option value="{{ $promotion->id }}">{{ $promotion->reduction }}</option>
            @endforeach
        </select><br>
        <label>Créer</label>
        <input type="submit">

    </form>
@endsection
