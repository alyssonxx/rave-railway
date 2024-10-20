<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    @yield('styles')
    <title>@yield('title', 'Minha Aplicação')</title>
</head>
<body>

    <!-- Incluindo a navbar -->
    @include('components.navbar')

    <!-- Conteúdo da página -->
    <div class="master">
        @yield('content')
    </div>
    
    @include('components.footer')
    <script src="/assets/libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    @yield('scripts')
    
</body>
</html>