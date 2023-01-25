@extends('layouts.front')

@section('slider')
        <div class="col-12">
    <!-- Main Content -->
    <main class="row">
        <!-- Slider -->
        <div class="col-12 px-0">
            <div id="slider" class="carousel slide w-100" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#slider" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="1"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{ url('public/images/slider/11.jpg') }}" class="slider-img">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('public/images/slider/12.jpg') }}" class="slider-img">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('public/images/slider/13.jpg') }}" class="slider-img">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Slider -->

        <!-- Featured Products -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>Featured Products</h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($featured_P as $featured)
                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="">
                                                <img src="{{ url('public/images/cms/'.$featured->thumbnails) }}" class="img-fluid img-thumbnail img-container">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">{{ $featured->name }}</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            @if(empty($featured->discount_price))
                                                    {{ $featured->price }}
                                            @else
                                                <div> <span> <u> {{ $featured->price }}</u></span></div>
                                                <div> <span class="line"> <u> {{ $featured->discount_price  }}</u></span></div>
                                            @endif
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <div class="row">
                                                <div class="col">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>View More</button>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Products -->
        <div class="col-12">
            <hr>
        </div>
    </main>
@endsection

