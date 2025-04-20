<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store - {{ $title ?? '' }}</title>
    <link rel="stylesheet" href="https://pubcdn.ivymoda.com/ivy2/css/new_style/custom.css?v=6">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pubcdn.ivymoda.com/ivy2/css/select2.min.css">
    <link rel="stylesheet" href="https://pubcdn.ivymoda.com/ivy2/css/video.css">
    <link rel="stylesheet" href="https://pubcdn.ivymoda.com/ivy2/css/new_style/style_02.css?v=17">
    <link rel="stylesheet" href="https://pubcdn.ivymoda.com/ivy2/css/new_style/responsive.css">

 
    <link rel="stylesheet" href="https://pubcdn.ivymoda.com/ivy2/js/fancybox/jquery.fancybox.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.header')
    
    <main class="container py-4">
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
