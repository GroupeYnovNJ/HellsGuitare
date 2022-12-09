@extends('layouts.app')

@section('page_title', "Edition d'une marque")

@section('content')
    <table class='table'>

        <form action="{{ route('marque.update', $marque->id) }}" method="POST">
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
            <!--checke les erreurs en fonction des paramètres dans UpdateMarqueRequest.php -->

            <input type="hidden" id="id" name="id" value="{{ $marque->id }}"><br>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ $marque->nom }}"><br>

            <input id="sub" type="submit">



        </form>
    </table>
@endsection
