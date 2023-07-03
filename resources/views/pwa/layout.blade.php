<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta name="theme-color" content="#0d0072" />
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/0297ba9f6f.js" crossorigin="anonymous"></script>
    <link rel="manifest" href="{{ pwaAssets('/') }}/js/web.webmanifest">
    <link rel="apple-touch-icon" href="{{ pwaAssets('/') }}/img/icon.png">
    <link rel="stylesheet" href="{{ pwaAssets('/') }}/css/style.css">
    @livewireStyles
</head>

<body>
    @yield('content')
    @livewireScripts
    <script src="{{ pwaAssets('/') }}/js/register.js"></script>
</body>

</html>
