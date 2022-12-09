@extends('layouts.app')

@section('page_title', "Edition d'une categorie")

@section('content')
    <table class='table'>

        <form action="{{ route('categorie.update', $categorie->id) }}" method="POST">
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
            <!--checke les erreurs en fonction des paramètres dans UpdateCategorieRequest.php -->

            <input type="hidden" id="id" name="id" value="{{ $categorie->id }}"><br>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ $categorie->nom }}"><br>
            <input id="sub" type="submit">



        </form>
    </table>
@endsection
