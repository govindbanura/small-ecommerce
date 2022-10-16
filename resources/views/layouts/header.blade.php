<html>
    <head>
        <meta charset="utf-8">
        <title>{{$pagetitle ?? 'Admin Page'}}</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="Admin Dashboard" name="description">
        <meta content="ThemeDesign" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}">
        <!-- Dropzone css -->
        {{-- <link href="{{ URL::asset('plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css"> --}}
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/bootstrap-grid.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/bootstrap-grid.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/bootstrap-reboot.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Libraries Stylesheet -->
        <link href="{{ URL::asset('lib/animate/animate.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">

        <link href="{{ URL::asset('img/favicon.ico') }}" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        {{-- <script src="{{ URL::asset('plugins/raphael/raphael-min.js') }}"></script>
        <script src="{{ URL::asset('plugins/morris/morris.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('plugins/morris/morris.css') }}"> --}}


    </head>
