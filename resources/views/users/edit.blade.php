@extends('layouts.app')

@section('page_title', "Edition d'un user")

@section('content')
    <table class='table'>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
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
            <!--checke les erreurs en fonction des paramètres dans UpdateuserRequest.php -->

            <input type="hidden" id="id" name="id" value="{{ $user->id }}"><br>
            <label for="name">Nom complet</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}"><br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}"><br>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password"><br>
            <div class="form-check mb-3">

                <input class="form-check-input" type="checkbox" value="1" id="role" name="role"
                    @if ($user->role) checked @endif>
                <label class="form-check-label" for="role">
                    {{ __('Rôle') }}
                </label>
            </div>
            <input type="submit">



        </form>
    </table>
@endsection
