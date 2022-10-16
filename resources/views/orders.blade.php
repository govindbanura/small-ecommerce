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
                        <span class="breadcrumb-item active">My Orders</span>
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
                <div class="col-lg-12 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Order ID</th>
                                <th>Placed For</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">

                            @foreach ($items as $item)
                            <tr>
                                <td class="align-middle">{{$item->tracking_id}}</td>
                                <td class="align-middle">{{$item->fname.' '.$item->lname}}</td>
                                <td class="align-middle"> &#8377; {{ $item->total_price }}</td>
                                <td class="align-middle"> {{ $item->status == 0 ? 'Placed' : 'Cancelled' }}</td>
                                <td class="align-middle"><a href='{{route('order-details',$item->id)}}' class='btn btn-primary'>View</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @include('layouts.footer')

    </body>

</html>
