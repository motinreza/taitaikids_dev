@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        .product-image{
            max-height: 100px;
        }
        #cart_mobile a{
            color: black;
        }
    </style>
@endpush
@section('page_conent')
    <div class="main-content-wrapper home-page">
        <div class="wrapper-container p-top-15">
            {{-- Main banner  --}}
            <div id="carouselExampleIndicators" class="carousel slide mt-2" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/default/1.webp') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/default/4.webp') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/default/1.webp') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            {{-- End main banner  --}}

            <div class="product-module best-deals">
                <div class="category-title">
                    <h3 align='center'>Products</h3>
                    {{-- <a class="see-all-header" href="#"><span>See All</span></a> --}}
                    <div class="border-lines">
                        <span class="line-shape"></span>
                        <span class="line-shape small"></span>
                    </div>
                </div>
                <div class="product-listing bg-white">

                    <div class="row">
                    @forelse($products as $product)
                            <div class="col-6 col-md-3 p-3">
                                <div class="card text-center h-100">
                                    <img class="card-img-top product-image img{{ $product->id }}" src='{{ asset("$product->photo") }}'
                                        alt="{{ $product->title }}" title="{{ $product->title }}">
                                    <div class="card-body">
                                        <h2 class="card-title title{{ $product->id }}">{{ $product->title }}</h2>
                                        <div class="card-text mb-4">
                                            <span class="rounded rounded-pill p-2 ">৳<span
                                                    class="price{{ $product->id }}">{{ $product->price }}</span> <sub><s
                                                        class="ml-3 dis-price{{ $product->id }}">{{ $product->price - ($product->discount ?? 0) }}</s>৳</sub></span>

                                        </div>
                                        <a href="" class="btn btn-primary add-to-cart" id="{{ $product->id }}">
                                            <i class="fa fa-cart-plus"></i>
                                            <span>Add to Cart</span></a>
                                    </div>
                                </div>
                            </div>
                            @empty
                                @if(isset($category))
                                    <p class="w-100 text-center">There are no products in {{$category->title}} category</p>
                                @else
                                    <p class="w-100 text-center">There are no products</p>
                                @endif
                            @endforelse
                        </div>

                </div>
            </div>


        </div>
    </div>
@endsection

@push('custom-js')
    <script>
        window.addEventListener('load', function() {
           
        });
    </script>
@endpush
