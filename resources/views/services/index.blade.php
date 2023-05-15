@extends('layouts.base')

@section('content')
<section class="masthead page-section portfolio">
    <div class="container">
    @if(session('success'))
    <div style="text-align:center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div style="text-align:center;" class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ trans('messages.nav_1') }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
            @foreach($services as $service)
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="{{'#portfolioModal'.$service->id}}">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    @if(!is_null($service->zdjecie))
                        <img class="img-fluid" src="{{ asset('storage/' . $service->zdjecie) }}" alt="..." />
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
    <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Your Website 2022</small></div>
        </div>
        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        @foreach($services as $service)
        <div class="portfolio-modal modal fade" id="portfolioModal{{$service->id}}" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                            <!-- Portfolio Modal - Title-->
                                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{ $service->nazwa }}</h2>
                                            <!-- Icon Divider-->
                                            <div class="divider-custom">
                                                <div class="divider-custom-line"></div>
                                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                                <div class="divider-custom-line"></div>
                                            </div>
                                            <!-- Portfolio Modal - Image-->
                                            @if(!is_null($service->zdjecie))
                                                <img class="img-fluid" src="{{ asset('storage/' . $service->zdjecie) }}" alt="..." />
                                            @endif
                                            <!-- Portfolio Modal - Text-->
                                            <p class="mb-4">{{ $service->opis }}</p>
                                            @can('isUser')
                                            <p class="mb-4">Cena: {{ $service->cena }} zł</p>
                                            <form method="GET" action="{{ route('visit.store', ['lang' => 'en','id' => $service->id]) }}">
                                                <div id="calendar">
                                                    <div class="form-group">
                                                        <label for="start">Data i godzina wizyty</label>
                                                        <input type="datetime-local" name="start" class="form-control" id="start" >
                                                    </div>
                                                </div>
                                                </br>
                                                <input name='id' id='id' type="hidden" value="{{ $service->id }}"/>
                                                <button class="btn btn-success">Zapisz
                                            </button></br></br>
                                            @endcan
                                            </form>
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                    <i class="fas fa-xmark fa-fw"></i>
                                                    Zamknij
                                                </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
@endsection