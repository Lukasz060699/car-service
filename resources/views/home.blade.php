@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Wiadomość') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Zostałeś zalogowany ') }}{{ Auth::user()->name }} 

                        <a class="nav-link py-3 px-0 px-lg-3 rounded" style="color:red; font-weight:bold" href="{{ url('/') }}">Wróć</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
