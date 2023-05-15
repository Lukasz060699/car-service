@extends('layouts.base')

@section('content')
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column" style='color:black'>
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="{{ asset('assets/img/logo.png') }}" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Moto Moto</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-dark">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">{{ trans('messages.title') }}</p>
            </div>
        </header>
        <section class="page-section opinion">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ trans('messages.nav_22') }}</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    @foreach ($reviews as $review)
                        <div class="justify-content-center">
                            <div>
                                Użytkownik: {{ $review->user->name }}
                            </div>
                            <div>    
                                Ocena: 
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <span class="fa fa-star checked"></span>
                                    @else
                                        <span class="fa fa-star"></span>
                                    @endif
                                @endfor
                            </div>
                            <div style="word-break: break-word;">
                                Komentarz: {{ $review->comment }}
                            </div>
                            </br>
                        </div>                      
                    @endforeach
                    {{ $reviews->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </section>
       <!-- Portfolio Section-->
        @guest
       <section class="page-section portfolio" id="portfolio">
            <div class="container">
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
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">{{ trans('messages.nav_6') }}</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">{{ trans('messages.nav_12') }}</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">{{ trans('messages.nav_13') }}</p></div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">{{ trans('messages.nav_14') }}</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">{{ trans('messages.nav_15') }}</p></div>
                </div>
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ trans('messages.nav_7') }}</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" method="POST">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Podaj dane..." data-sb-validations="required" />
                                <label for="name">{{ trans('messages.nav_16') }}</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Te dane sa wymagane.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">{{ trans('messages.nav_17') }}</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Email jest wymagany.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Nieprawidłowa składnia email</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" name="message" placeholder="Twoja wiadomość..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">{{ trans('messages.nav_18') }}</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">To pole jest wymagane.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <p>Wiadomość wysłana.</p>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">{{ trans('messages.nav_11') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Copyright Section-->
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
                                    @endif                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">{{ $service->opis }}</p>
                                    @can('isUser')
                                    <p class="mb-4">Cena: {{ $service->cena }} zł</p>
                                    <button class="btn btn-success">Zapisz
                                    </button></br></br>
                                    @endcan
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
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
       @endguest
@endsection