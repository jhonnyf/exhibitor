<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Console | Gedra Tecnologia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ URL::asset('assets/console/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/console/css/icons.min.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/console/css/app.min.css') }} " rel="stylesheet" type="text/css" />
    
    @include('console.layouts.shared.head')
    <style>
        .danger {
            color: red;
        }
    </style>
</head>

<body>
    @yield('content')
    @include('console.layouts.shared.footer-script')
</body>

</html>