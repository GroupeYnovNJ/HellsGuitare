@extends('layouts.app')

@section('page_title', 'Liste des utilisateurs')

@section('content')

    <table class='table'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Nom complet') }}</th>
                <th scope="col">{{ __('Email') }}</th>
                <th scope="col">{{ __('Rôle') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}">Editer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    </table>
    <div>
        {{ $users->links() }}
    </div>
@endsection
