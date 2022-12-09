@extends('layouts.app')

@section('page_title', "Edition d'un employe")

@section('content')
    <table class='table'>

        <form action="{{ route('employe.update', $employe->id) }}" method="POST">
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
            <!--checke les erreurs en fonction des paramètres dans UpdateEmployeRequest.php -->

            <input type="hidden" id="id" name="id" value="{{ $employe->id }}"><br>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ $employe->nom }}"><br>
            <input type="text" id="prenom" name="prenom" value="{{ $employe->prenom }}"><br>
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" value="{{ $employe->telephone }}"><br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $employe->email }}"><br>
            <select name="rayon_id" class="@error('rayon_id') is-invalid @enderror">
                @foreach ($rayons as $rayon)
                    @if ($rayon->id == $instrument->rayons_id)
                        <option selected value="{{ $rayon->id }}">{{ $rayon->nom }}</option>
                    @else
                        <option value="{{ $rayon->id }}">{{ $rayon->nom }}</option>
                    @endif
                @endforeach
            </select>
            @error('rayon_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input id="sub" type="submit">



        </form>
    </table>
@endsection
