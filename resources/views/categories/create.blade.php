@extends('layouts.backend')

@section('page_title', "Création d'une categorie")
@section('content')
    <form action="{{ route('categorie.store') }}" method="POST">
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
        <label>Créer</label>
        <input type="submit">

    </form>
@endsection
