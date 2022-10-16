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
                        <a class="breadcrumb-item text-dark" href="{{route('view_orders')}}">Orders</a>
                        <span class="breadcrumb-item active">{{ $items->tracking_id }}</span>
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
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order View</span></h5>

                <div class="col-lg-4">
                    <div class="bg-light p-30 mb-5">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Name</h6>
                            <h6>{{$items->fname.' '.$items->lname}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Email</h6>
                            <h6>{{$items->email}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Mobile No.</h6>
                            <h6>{{$items->mobile}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Address Line 1</h6>
                            <h6>{{$items->address1}}</h6>
                        </div>
                        @if($items->address2)
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Address Line 2</h6>
                            <h6>{{$items->address2}}</h6>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between mb-3">
                            <h6>City</h6>
                            <h6>{{$items->city}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>State</h6>
                            <h6>{{$items->state}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Country</h6>
                            <h6>{{$items->country}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Pin Code</h6>
                            <h6>{{$items->pincode}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody class="align-middle">
                            @foreach ($items->orderItems as $item)
                            <tr>
                                <td class="align-middle"><img src="{{URL::asset('img/'.$item->products->image)}}" alt="" style="width: 50px;">  {{$item->products->name}}</td>
                                <td class="align-middle"> {{$item->product_qty }}</td>
                                <td class="align-middle">&#8377; {{$item->product_price}}</td>
                                <td class="align-middle"> &#8377; {{$item->product_price * $item->product_qty}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>Shipping Charges</th>
                                <td></td>
                                <td></td>
                                <td class="align-middle"> &#8377; 10</td>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <td></td>
                                <td></td>
                                <th class="align-middle"> &#8377; {{$items->total_price}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    @include('layouts.footer')

    </body>

</html>
