@include('layouts.header')
    <body>
        <!-- Topbar Start -->
        @include('layouts.topbar')

        <!-- Navbar Start -->
        @include('layouts.navbar')

        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-12">
                    <nav class="breadcrumb bg-light mb-30">
                        <a class="breadcrumb-item text-dark" href="{{('/')}}">Home</a>
                        <a class="breadcrumb-item text-dark" href="{{route('category',$category->id)}}">{{$category->name}}</a>
                        <span class="breadcrumb-item active">{{$product->name}}</span>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
        @if (Session::has('success'))
            <div class="container-fluid">
                <div class="row px-xl-5">
                    <div class="col-12">
                        <nav class="breadcrumb bg-light mb-30">
                            <span class="breadcrumb-item active" style="color: green">{{ Session::get('success') }}</span>
                        </nav>
                    </div>
                </div>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="container-fluid">
                <div class="row px-xl-5">
                    <div class="col-12">
                        <nav class="breadcrumb bg-light mb-30">
                            <span class="breadcrumb-item active" style="color: red">{{ Session::get('error') }}</span>
                        </nav>
                    </div>
                </div>
            </div>
        @endif
        <!-- Shop Detail Start -->
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner bg-light">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="{{ URL::secure_asset('img/'.$product->image) }}" alt="Image">
                            </div>
                            @if($product->images)
                                @php
                                    $images = explode("/", $product->images);
                                @endphp
                                @foreach ($images as $img)
                                    <div class="carousel-item">
                                        <img class="w-100 h-100" src="{{ URL::secure_asset('img/'.$img) }}" alt="Image">
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        @if ($product->images)

                            <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                                <i class="fa fa-2x fa-angle-left text-dark"></i>
                            </a>
                            <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                                <i class="fa fa-2x fa-angle-right text-dark"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-7 h-auto mb-30 product_data">
                    <div class="h-100 bg-light p-30">
                        <h3>{{$product->name}}</h3>
                        <div class="d-flex  mt-2">
                        <h3 class="font-weight-semi-bold mb-4"> @if($product->sale_price) &#8377; {{ $product->sale_price}} @else &#8377; {{$product->regular_price}} @endif </h3> @if($product->sale_price) <h4 class="text-muted ml-2"><del> &#8377; {{$product->regular_price}}</del></h4> @endif
                        {{-- <h3 class="font-weight-semi-bold mb-4">$150.00</h3> --}}
                        </div>
                        <p class="mb-4">{{ $product->description }}</p>
                        <form method="POST" action="{{ route('add_to_cart') }}">
                            @csrf
                            <input type='hidden' name='product_id' value='{{$product->id}}' />
                            <div class="d-flex align-items-center mb-4 pt-2">
                                <div class="input-group quantity mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-minus">
                                            <i class="fa fa-minus" style="line-height: 1.5"></i>
                                        </button>
                                    </div>
                                    <input type="text" name='qty' class="form-control bg-secondary border-0 text-center product_qty" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-plus">
                                            <i class="fa fa-plus" style="line-height: 1.5"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="btn btn-primary px-3 addToCart" type="submit"><i class="fa fa-shopping-cart mr-1"></i>Add to Cart</button>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>

        <!-- Shop Detail End -->

    @include('layouts.footer')

    <script>
        $(document).ready(function(){
            $('.btn-plus').click(function(e){
                e.preventDefault();


                // var product_id = $(this).closest('.product_data').find('.product_id').val();
                // var product_qty = $(this).closest('.product_data').find('.product_qty').val();

                // $.ajax({
                //     method: 'POST',
                //     url : '/add_to_cart'
                //     data : {
                //         'product_id':product_id,
                //         'product_qty':product_qty
                //     }
                //     success: function(response){

                //     }
                // })
            });
            $('.btn-minus').click(function(e){
                e.preventDefault();
            });
        });
    </script>

    </body>

</html>
