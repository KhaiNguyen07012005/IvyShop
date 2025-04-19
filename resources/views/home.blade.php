@extends('layouts.app')

@section('content')
    <div class="banner mb-4">
        <div class="p-5 bg-dark text-white rounded-3">
            <h2>Lấy sắc sinh là tim chế điện bao quản chọn tiếng ke thành nhà và hòa tất sở trong mãi khí, giúp năng khác hơn làm linh mặt soy có dòng số hiệu đại.</h2>
        </div>
    </div>

    <section class="new-arrival mb-5">
        <h2 class="text-center mb-4">NEW ARRIVAL</h2>
        <div class="row">
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x400" class="card-img-top" alt="Product">
                        <div class="card-body">
                            <h5 class="card-title">Sản phẩm {{ $i+1 }}</h5>
                            <p class="card-text">Mô tả sản phẩm ngắn</p>
                            <p class="text-danger fw-bold">500.000đ <span class="text-decoration-line-through text-muted">700.000đ</span></p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection