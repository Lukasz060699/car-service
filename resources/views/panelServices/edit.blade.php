@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edycja usług') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('services.update', $services->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nazwa" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa') }}</label>

                            <div class="col-md-6">
                                <input id="nazwa" type="text" class="form-control @error('nazwa') is-invalid @enderror" name="nazwa" value="{{ $services->nazwa }}" required autocomplete="nazwa" autofocus>

                                @error('nazwa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Opis') }}</label>

                            <div class="col-md-6">
                                <textarea id="opis" class="form-control @error('opis') is-invalid @enderror" name="opis" required autocomplete="opis" autofocus>{{ $services->opis }}</textarea>

                                @error('opis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zdjecie" class="col-md-4 col-form-label text-md-end">{{ __('Zdjęcie') }}</label>

                            <div class="col-md-6">
                                <input id="zdjecie" type="file" class="form-control" name="zdjecie">

                                @error('zdjecie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ asset('storage/' . $services->zdjecie) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cena" class="col-md-4 col-form-label text-md-end">{{ __('Cena') }}</label>

                            <div class="col-md-6">
                                <input id="cena" type="number" class="form-control @error('cena') is-invalid @enderror" name="cena" value="{{ $services->cena }}" required autocomplete="cena" autofocus>

                                @error('cena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Zmień') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
