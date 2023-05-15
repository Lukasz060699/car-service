@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edycja samochodu') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cars.update', $cars->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="marka" class="col-md-4 col-form-label text-md-end">{{ __('Marka') }}</label>

                            <div class="col-md-6">
                                <input id="marka" type="text" class="form-control @error('marka') is-invalid @enderror" name="marka" value="{{ $cars->marka }}" required autocomplete="marka" autofocus>

                                @error('marka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="model" class="col-md-4 col-form-label text-md-end">{{ __('Model') }}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $cars->model }}" required autocomplete="model" autofocus>

                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rok_produkcji" class="col-md-4 col-form-label text-md-end">{{ __('Rok produkcji') }}</label>

                            <div class="col-md-6">
                                <textarea id="rok_produkcji" class="form-control @error('rok_produkcji') is-invalid @enderror" name="rok_produkcji" required autocomplete="rok_produkcji" autofocus>{{ $cars->rok_produkcji }}</textarea>

                                @error('rok_produkcji')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inf_dodatkowe" class="col-md-4 col-form-label text-md-end">{{ __('Informacje dodatkowe') }}</label>

                            <div class="col-md-6">
                                <textarea id="inf_dodatkowe" class="form-control @error('inf_dodatkowe') is-invalid @enderror" name="inf_dodatkowe" required autocomplete="inf_dodatkowe" autofocus>{{ $cars->inf_dodatkowe }}</textarea>

                                @error('inf_dodatkowe')
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
