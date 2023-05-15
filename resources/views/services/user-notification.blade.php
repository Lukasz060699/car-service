@extends('layouts.base')

@section('content')
<section class="masthead page-section portfolio">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ trans('messages.nav_19') }}</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row justify-content-center">
        <div class="col-6">
            <ul class="list-group">
                @foreach ($wizyty as $wizyta)
                    @if ($wizyta->status == 1)
                        <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
                            {{ $wizyta->user->name }} Twoja wizyta
                            '{{ $wizyta->service->nazwa }}' 
                            została potwierdzona na datę {{ $wizyta->data }}.
                            @if ($wizyta->accept == 0)
                            <a href="{{ route('visites.accept', $wizyta->id) }}">
                                <button type="submit" class="btn btn-success btn-sm ml-auto">
                                    Odczytane
                                </button>
                            </a>
                            @endif
                        </li>
                        
                    @elseif (($wizyta->status == 0) && (!is_null($wizyta->status)))
                        <li class="list-group-item list-group-item-danger d-flex justify-content-between align-items-center">
                            {{ $wizyta->user->name }} niestety Twoja wizyta 
                            '{{ $wizyta->service->nazwa }}'
                            nie mogła 
                            być zaakceptowana na datę {{ $wizyta->data }}. Proszę spróbować z innym terminem.
                            @if ($wizyta->accept == 0)
                            <a href="{{ route('visites.accept', $wizyta->id) }}">
                                <button type="submit" class="btn btn-success btn-sm ml-auto">
                                    Odczytane 
                                </button>
                            </a>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        </div>
    </div>
</section>
@endsection