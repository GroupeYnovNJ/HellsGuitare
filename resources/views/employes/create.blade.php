@extends('layouts.backend')

@section('page_title', "Création d'un employé")
@section('content')
    <form action="{{ route('employe.store') }}" method="POST">
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
        <label for="nom">Prénom</label>
        <input type="text" id="prenom" name="prenom"><br>
        <label for="telephone">Téléphone</label>
        <input type="tel" id="telephone" name="telephone"><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="admin@example.com"><br>
        <select name="rayon_id" class="@error('rayon_id') is-invalid @enderror">
            @foreach ($rayons as $rayon)
                <option value="{{ $rayon->id }}">
                    {{ $rayon->name }}
                </option>
            @endforeach
        </select>
        @error('rayon_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Créer</label>
        <input type="submit">

    </form>
@endsection
