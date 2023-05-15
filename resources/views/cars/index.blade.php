@extends('layouts.base')

@section('content')
<section class="masthead page-section portfolio">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">
            @can('isUser')
                {{ trans('messages.nav_20') }}
            @endcan
            @can('isAdmin')
                {{ trans('messages.nav_21') }}
            @endcan
        </h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row justify-content-center">
        <div class="col-6">
        <div class="card">
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    @can('isAdmin')
                        <th scope="col">Imię</th>
                    @endcan
                    <th scope="col">Marka</th>
                    <th scope="col">Model</th>
                    <th scope="col">Rok produkcji</th>
                    <th scope="col">Dodatkowe informacje</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr>
                        <th scope="row justify-content-center">{{ $car->id }}</th>
                        @can('isAdmin')
                            <td>{{ $car->user->name}}</td>
                        @endcan
                        <td>{{ $car->marka}}</td>
                        <td>{{ $car->model}}</td>
                        <td>{{ $car->rok_produkcji}}</td>
                        <td>{{ $car->inf_dodatkowe}}</td>
                        <td>
                            <a href="{{ route('cars.edit', $car->id) }}">
                                <button type="submit" class="btn btn-success btn-sm ">
                                    Edytuj
                                </button>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('cars.destroy', $car->id) }}">
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
            </div>
            <div class="col-1">
                <a href="{{ route('cars.create') }}">
                    <button type="button" class="btn btn-success btn-sm create">
                        Dodaj
                    </button>
                </a>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection