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
                        <span class="breadcrumb-item active">Shopping Cart</span>
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

        <!-- Cart Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @php $total = 0 @endphp
                            @foreach ($cart as $cart_item)
                            <tr>
                                <td class="align-middle"><img src="{{URL::secure_asset('img/'.$cart_item->products->image)}}" alt="" style="width: 50px;">{{$cart_item->products->name}}</td>
                                @if($cart_item->products->sale_price) @php $price = $cart_item->products->sale_price @endphp @else @php $price = $cart_item->products->regular_price @endphp @endif
                                <td class="align-middle"> &#8377; {{ $price }}</td>
                                <td class="align-middle">{{$cart_item->product_qty}}</td>
                                @php $final_item_price = $cart_item->product_qty * $price; $total = $total + $final_item_price @endphp
                                <td class="align-middle"> &#8377; {{ $final_item_price }}</td>

                                <form id="deleteform{{$cart_item->id}}" method="post" action="{{route('deleteItem',$cart_item->id)}}">
                                    @method('DELETE') @csrf
                                    <td class="align-middle"><button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-times"></i></button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">

                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                    @if ($cart->count() > 0)
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>&#8377; {{$total}}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">&#8377; 10</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>&#8377; {{ $total + 10 }}</h5>
                            </div>
                            <a href="{{ route('checkout') }}">
                                <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="bg-light p-30 mb-5"> Cart is empty!!</div>
                    @endif
                </div>
            </div>
        </div>

    @include('layouts.footer')

    </body>

</html>
