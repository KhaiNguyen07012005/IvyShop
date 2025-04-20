<!-- resources/views/partials/header.blade.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        font-weight: 100;
        font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    }
    a:hover{
	color: #AC2F33;
	text-decoration:none;
}
   
</style>

<header class="sticky-top border-bottom shadow-sm bg-white py-3">

    <div class="container d-flex justify-content-between align-items-center">
        <!-- Menu trái -->
        <div class="d-flex gap-3 align-items-center">
            <a href="#" class="text-decoration-none fw-semibold text-dark small">NỮ</a>
            <a href="#" class="text-decoration-none fw-semibold text-dark small">NAM</a>
            <a href="#" class="text-decoration-none fw-semibold text-danger small ">SIÊU DEAL T4 - SALE UPTO 70%</a>
            <a href="#" class="text-decoration-none fw-semibold text-dark small">BỘ SƯU TẬP</a>
            <a href="#" class="text-decoration-none fw-semibold text-dark small">VỀ CHÚNG TÔI</a>
        </div>

        <!-- Logo ở giữa -->
        <div>
        <a href="{{ route('home.page') }}">
             <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
        </a>
        </div>

        <!-- Menu phải -->
        <div class="d-flex gap-3 align-items-center">
            <!-- Ô tìm kiếm -->
            <div class="position-relative">
                <input type="text" class="form-control form-control-sm" placeholder="TÌM KIẾM SẢN PHẨM" style="width: 220px;">
                <i class="fa fa-search position-absolute top-50 end-0 translate-middle-y me-2 text-secondary"></i>
            </div>
            <a href="#" class="text-dark"><i class="fa fa-headphones fa-lg"></i></a>
            <a href="{{ route('login') }}" class="text-dark"><i class="fa fa-user fa-lg"></i></a>

            <a href="#" class="text-dark position-relative">
                <i class="fa fa-shopping-bag fa-lg"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark text-white">
                    0
                </span>
            </a>
        </div>
    </div>
</header>
