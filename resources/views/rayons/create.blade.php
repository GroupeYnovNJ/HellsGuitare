@extends('layouts.backend')

@section('page_title', "Création d'un rayon")
@section('content')
    <form action="{{ route('rayon.store') }}" method="POST">
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
        <label for="nb_produits">Nombre de produits</label>
        <input type="number" id="nb_produits" name="nb_produits"><br>
        <select name="employe_id" class="@error('employe_id') is-invalid @enderror">
            @foreach ($employes as $employe)
                <option value="{{ $employe->id }}">
                    {{ $employe->name }}
                </option>
            @endforeach
        </select>
        @error('employe_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label>Créer</label>
        <input type="submit">

    </form>
@endsection
