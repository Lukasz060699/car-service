@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
        <div class="col-6">
            <h1>Zarządzanie użytkownikami</h1>
        </div>
        <div class="col-1">
            <a href="{{ route('users.create') }}">
                <button type="button" class="btn btn-success btn-sm create">
                    Dodaj
                </button>
            </a>
        </div>
        <div class="col-md-8">
            <div class="card">
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imie</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rola</th>
                    <th scope="col">Akcja</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm ">
                                    X
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
