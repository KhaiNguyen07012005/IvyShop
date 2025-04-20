@extends('layouts.app')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/banner1.png') }}" class="d-block w-100" alt="Banner 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/banner2.png') }}" class="d-block w-100" alt="Banner 2">
        </div>
      
    </div>
</div>
<!-- NEW ARRIVAL Section -->
<div class="text-center mb-4">
        <h2 class="section-title">NEW ARRIVAL</h2>
    </div>

    <div class="row">
    @if($products->isEmpty())
    <p>Không có sản phẩm nào.</p>
    @endif

        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                @if($product->is_new)
                    <span class="badge bg-warning position-absolute" style="top:10px; left:10px;">NEW</span>
                @endif
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h6 class="card-title">{{ $product->name }}</h6>

                    {{-- Màu --}}
                    <div class="mb-2">
                        @foreach(json_decode($product->colors) as $color)
                            <span class="d-inline-block rounded-circle me-1" style="width: 14px; height: 14px; background-color: {{ $color }};"></span>
                        @endforeach
                    </div>

                    {{-- Giá --}}
                    <p class="card-text fw-bold">
                        @if($product->sale_price)
                            <span class="text-danger">{{ number_format($product->sale_price, 0, ',', '.') }}đ</span>
                            <span class="text-muted text-decoration-line-through">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                        @else
                            {{ number_format($product->price, 0, ',', '.') }}đ
                        @endif
                    </p>

                    {{-- Thêm icon trái tim, giỏ hàng --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-outline-secondary btn-sm"><i class="far fa-heart"></i></button>
                        <button class="btn btn-dark btn-sm"><i class="fas fa-lock"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
