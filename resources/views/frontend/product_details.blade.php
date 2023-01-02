@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        .product-image {
            max-height: 100px;
        }

        #cart_mobile a {
            color: black;
        }

        /*Product details page custome css code*/
        .btn-success {
            width: 40%;
            border-radius: 0;
            margin-top: 18px;
        }

        .title-attr {
            margin-top:0;
            margin-bottom:0;
            color:black;
        }
        .btn-minus{
            cursor:pointer;
            font-size:15px;
            display:flex;
            align-items:center;
            padding:5px;
            padding-left:10px;
            padding-right:10px;
            border:1px solid gray;
            border-radius:2px;
            border-right:0;
            background-color: #198754;
            color:white;
        }
        .btn-plus{
            cursor:pointer;
            font-size:15px;
            display:flex;
            align-items:center;
            padding:5px;
            padding-left:10px;
            padding-right:10px;
            border:1px solid gray;
            border-radius:2px;
            border-left:0;
            background-color: #198754;
            color:white;
        }
        div.section > div {

            display:inline-flex;
        }
        div.section > div > input {
            margin: 0;
            padding-left: 5px;
            font-size: 15px;
            padding-right: 5px;
            max-width: 50%;
            text-align: center;
        }
        .attr,.attr2{
            cursor:pointer;
            margin-right:5px;
            height:20px;
            font-size:10px;
            padding:2px;
            border:1px solid gray;
            border-radius:2px;
        }
        .attr.active,.attr2.active{ border:1px solid orange;}

        @media (max-width: 426px) {
            .container {margin-top:0px !important;}
            .container > .row{padding:0 !important;}
            .container > .row > .col-xs-12.col-sm-5{
                padding-right:0 ;
            }
            .container > .row > .col-xs-12.col-sm-9 > div > p{
                padding-left:0 !important;
                padding-right:0 !important;
            }
            .container > .row > .col-xs-12.col-sm-9 > div > ul{
                padding-left:10px !important;

            }
            .section{width:104%;}
            .menu-items{padding-left:0;}
        }

    </style>
@endpush
@section('page_conent')

    <div class="main-content-wrapper home-page">
        <div class="wrapper-container p-top-15">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-5 item-photo">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-interval="false">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img style="max-width:100%;" src='{{ asset("$data->photo") }}' class="d-block w-100" alt="...">
                                </div>

                                @php
                                    $id = $data->id;
                                    $image = DB::table('products')->where('id', $id)->first();
                                    $images = explode('|', $image->product_gallery);
                                @endphp

                                @foreach($images as $image)
                                    <div class="carousel-item">
                                        <img src="{{ URL::to($image) }}" style="max-width:100%;" alt="">
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-7" style="border:0px solid #808080">
                        <h4>{{ $data->title }}</h4>
                        <h6 class="title-price"><small>Product price</small></h6>
                        <h5 style="margin-top:0px; color: red; text-decoration: line-through; ">U$S {{ $data->price }}</h5>
                        <h6 class="title-price"><small>Discount price</small></h6>
                        <h5 style="margin-top:0px; color: blue;">U$S {{ $data->discount }}</h5>

                        <div class="section">
                            <h6 class="title-attr" style="margin-top:15px;" ><small>STOCK</small></h6>
                            <div>
                                <p>{{ $data->stock }}</p>
                            </div>
                        </div>

                            <div class="section" style="width: 68%">
                                <h6 class="title-attr"><small>CANTIDAD</small></h6>
                                <div class="d-flex">
                                    <div class="btn-minus"><i class="fa-solid fa-minus"></i></div>
                                    <input value="1" style="width: 40%;" />
                                    <div class="btn-plus"><i class="fa-solid fa-plus"></i></div>
                                </div>
                            </div>
                            <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to card</button>
                        </div>
                    </div>

                    <div class="col-xs-9">
                        <h2>Dectiption</h2>
                        <div style="width:100%;border-top:1px solid silver">
                            <p style="padding:15px;">
                                <small style="font-size: 16px">
                                    {!! $data->description !!}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('custom-js')
    <script>
        gtag('event', 'screen_view', {
            'app_name': 'myAppName',
            'screen_name': 'Home'
        });

        $('.add-to-cart').on('click', function(e) {
            e.preventDefault;
            let index = Number($(this).index('.add-to-cart'));
            var product_name = $('.card-title');
            var id = Number($(this).prop('id'));
            var valu = Number($('.dis-price' + id).text());
            var price = Number($('.price' + id).text());

            gtag("event", "add_to_cart", {
                currency: "BDT",
                value: valu,
                items: [{
                    item_id: id,
                    item_name: product_name,
                    currency: "BDT",
                    discount: 2.22,
                    index: index,
                    price: price,
                    quantity: 1
                }]
            });

        });

        // Product details page custom js
        $(document).ready(function(){
            //-- Click on detail
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })
        })
    </script>
@endpush
