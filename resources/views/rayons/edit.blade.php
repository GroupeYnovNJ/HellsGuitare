@extends('layouts.app')

@section('page_title', "Edition d'un rayon")

@section('content')
    <table class='table'>

        <form action="{{ route('rayon.update', $rayon->id) }}" method="POST">
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
            <!--checke les erreurs en fonction des paramètres dans UpdateRayonRequest.php -->

            <input type="hidden" id="id" name="id" value="{{ $rayon->id }}"><br>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ $rayon->nom }}"><br>
            <label for="nb_produits">Nombre de produits</label>
            <input type="number" id="nb_produits" name="nb_produits" value="{{ $rayon->nb_produits }}"><br>
            <select name="employe_id" class="@error('employe_id') is-invalid @enderror">
                @foreach ($employes as $employe)
                    @if ($employe->id == $instrument->employes_id)
                        <option selected value="{{ $employe->id }}">{{ $employe->nom }}</option>
                    @else
                        <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
                    @endif
                @endforeach
            </select>
            @error('employe_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input id="sub" type="submit">



        </form>
    </table>
@endsection
