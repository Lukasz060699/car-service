@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
        <div class="col-6">
            <h1>Zarządzanie usługami</h1>
        </div>
        <div class="col-1">
            <a href="{{ route('services.create') }}">
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
                    <th scope="col">Nazwa</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Zdjęcie</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Akcja</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <th scope="row justify-content-center">{{ $service->id }}</th>
                        <td>{{ $service->nazwa }}</td>
                        <td>{{ $service->opis }}</td>
                        <td><img class="img-fluid" style="width:20%;" src="{{ asset('storage' . $service->zdjecie) }}"/></td>
                        <td>{{ $service->cena }}</td>
                        <td>
                            <a href="{{ route('services.edit', $service->id) }}">
                                <button type="submit" class="btn btn-success btn-sm ">
                                    Edytuj
                                </button>
                            </a>
                            </form></br></br>
                            <form method="POST" action="{{ route('services.destroy', $service->id) }}">
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
                {{ $services->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
