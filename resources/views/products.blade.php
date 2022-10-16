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
                        <span class="breadcrumb-item active">{{$category->name}}</span>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

            <!-- Shop Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">

                @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ URL::secure_asset('img/'.$product->image) }}" alt="">
                            {{-- <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            </div> --}}
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{route('product',$product->id)}}">{{$product->name}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>@if($product->sale_price) &#8377; {{$product->sale_price}} @else &#8377; {{$product->regular_price}} @endif </h5>@if($product->sale_price) <h6 class="text-muted ml-2"><del> &#8377; {{$product->regular_price}}</del></h6> @endif
                            </div>
                            <div class="d-flex  justify-content-center mb-1">
                                <p>{{ substr($product->short_description,0,50); }} ...</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- Shop End -->



    @include('layouts.footer')
    </body>

</html>
