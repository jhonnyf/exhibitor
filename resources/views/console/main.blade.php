<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONSOLE</title>
    <link rel="stylesheet" href="{{ asset('css/console/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/console/main.css') }}">
</head>
<body>
    @include('console.shared.header')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 menu">
                    @include('console.shared.menu')
                </div>
                <div class="col-md-10 main-content">
                    @yield('breadcrumbs')
                    <div class="container">
                        <div class="mt-3 p-3 content-page">
                            @yield('content')
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </main>
    @include('console.shared.footer')
    <script src="{{ asset('js/console/vendor.js') }}"></script> 
</body>
</html>