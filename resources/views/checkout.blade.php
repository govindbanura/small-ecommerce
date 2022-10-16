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
                        <a class="breadcrumb-item text-dark" href="{{route('cart')}}">Shopping Cart</a>
                        <span class="breadcrumb-item active">Checkout</span>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <!-- Checkout Start -->
        <div class="container-fluid">
            <form action="{{route('checkout_cart')}}" method="post">
                @csrf
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="First Name" name='fname' required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Last Name" name='lname' required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="email" placeholder="example@email.com" name='email', value="{{Auth::user()->email}}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="number" placeholder="9876543210" name='mobile' required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street" name='address1' required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street" name='address2'>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <input class="form-control" type="text" placeholder="India" name='country' required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="Mumbai" name='city' required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="Maharastra" name='state' required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="number" placeholder="123456" name='pincode' required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            @php $total = 0 @endphp
                            @foreach ($items as $item)
                                <div class="d-flex justify-content-between">
                                <p>{{ $item->products->name}}</p>
                                @if($item->products->sale_price) @php $price = $item->products->sale_price @endphp @else @php $price = $item->products->regular_price @endphp @endif
                                @php $final_item_price = $item->product_qty * $price; $total = $total + $final_item_price @endphp
                                <p>&#8377; {{ $final_item_price }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6> &#8377; {{$total}}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>&#8377; {{ $total + 10}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="bg-light p-30">
                        <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">Place Order</button>
                        </div>
                    </div>
                </div>
                <p class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">We doesn't accept online payment currently. Please pay the whole amount at the time of the delivery.</span></p>
            </div>
            </form>
        </div>
        <!-- Checkout End -->

    @include('layouts.footer')

    </body>

</html>
