@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
        <div class="col-6">
            <h1>Informacje o wizytach</h1>
        </div>
        <div class="col-md-8">
            <div class="card">
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                    <th scope="col">ID Klienta</th>
                    <th scope="col">ID Usługi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Akcja</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($visites as $visit)
                    <tr>
                        <th scope="row">{{ $visit->id }}</th>
                        <td>{{ $visit->data }}</td>
                        <td>{{ $visit->user_id }}</td>
                        <td>{{ $visit->id_uslugi }}</td>
                        <td>{{ $visit->status }}</td>
                        <td>

                        <form method="POST" action="{{ route('visites.status', $visit->id) }}">
                            @csrf
                            @method('PATCH')
                            <button name="status" value="1" type="submit" class="btn btn-success btn-sm">
                                TAK
                            </button>
                        </form></br>

                        <form method="POST" action="{{ route('visites.status', $visit->id) }}">
                            @csrf
                            @method('PATCH')
                            <button name="status2" value="0" type="submit" class="btn btn-danger btn-sm">
                                NIE
                            </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                {{ $visites->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
