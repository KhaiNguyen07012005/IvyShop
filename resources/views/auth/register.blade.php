@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<div class="container">
    <div class="auth auth-forgotpass">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form enctype="application/x-www-form-urlencoded" name="frm_register" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="register-summary__overview">
                        <h4>Thông tin khách hàng</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Họ:<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{ old('customer_firstname') }}" name="customer_firstname" placeholder="Họ..." style="width: 100%">
                                @error('customer_firstname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Tên:<span style="color: red">*</span></label>
                                <input class="form-control" type="text" value="{{ old('customer_display_name') }}" name="customer_display_name" placeholder="Tên..." style="width: 100%">
                                @error('customer_display_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Email:<span style="color: red">*</span></label>
                                <input id="email" class="form-control" type="email" name="customer_email" value="{{ old('customer_email') }}" placeholder="Email..." style="width: 100%">
                                @error('customer_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Điện thoại:<span style="color: red">*</span></label>
                                <input class="form-control" type="text" value="{{ old('customer_phone') }}" name="customer_phone" placeholder="Điện thoại..." style="width: 100%">
                                @error('customer_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Ngày sinh:<span style="color: red">*</span></label>
                                <input type="text" class="form-control datepicker hasDatepicker" name="customer_birthday" value="{{ old('customer_birthday') }}" placeholder="Ngày sinh..." style="width: 100%" id="dp1745114080745">
                                @error('customer_birthday')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Giới tính:<span style="color: red">*</span></label>
                                <select name="customer_sex" style="width: 100%" class="form-control">
                                    <option value="0" {{ old('customer_sex') == '0' ? 'selected' : '' }}>Nữ</option>
                                    <option value="1" {{ old('customer_sex') == '1' ? 'selected' : '' }}>Nam</option>
                                    <option value="2" {{ old('customer_sex') == '2' ? 'selected' : '' }}>Khác</option>
                                </select>
                                @error('customer_sex')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Tỉnh/TP:<span style="color: red">*</span></label>
                                <select class="form-control" name="register_region_id" id="register_region_id" style="width: 100%">
                                    <option value="-1">Chọn Tỉnh/Tp</option>
                                    @foreach([
                                        ['id' => 511, 'name' => 'Hà Nội'],
                                        ['id' => 507, 'name' => 'Hồ Chí Minh'],
                                        ['id' => 512, 'name' => 'Hải Phòng'],
                                        ['id' => 499, 'name' => 'Đà Nẵng'],
                                        ['id' => 485, 'name' => 'An Giang'],
                                        ['id' => 486, 'name' => 'Bình Dương'],
                                        ['id' => 487, 'name' => 'Bắc Giang'],
                                        ['id' => 488, 'name' => 'Bình Định'],
                                        ['id' => 490, 'name' => 'Bạc Liêu'],
                                        ['id' => 491, 'name' => 'Bắc Ninh'],
                                        ['id' => 492, 'name' => 'Bình Phước'],
                                        ['id' => 494, 'name' => 'Bình Thuận'],
                                        ['id' => 495, 'name' => 'Bến Tre'],
                                        ['id' => 496, 'name' => 'Cao Bằng'],
                                        ['id' => 497, 'name' => 'Cà Mau'],
                                        ['id' => 498, 'name' => 'Cần Thơ'],
                                        ['id' => 500, 'name' => 'Điện Biên'],
                                        ['id' => 502, 'name' => 'Đồng Nai'],
                                        ['id' => 504, 'name' => 'Đồng Tháp'],
                                        ['id' => 505, 'name' => 'Gia Lai'],
                                        ['id' => 506, 'name' => 'Hòa Bình'],
                                        ['id' => 508, 'name' => 'Hải Dương'],
                                        ['id' => 509, 'name' => 'Hà Giang'],
                                        ['id' => 510, 'name' => 'Hà Nam'],
                                        ['id' => 513, 'name' => 'Hà Tĩnh'],
                                        ['id' => 514, 'name' => 'Hậu Giang'],
                                        ['id' => 515, 'name' => 'Hưng Yên'],
                                        ['id' => 516, 'name' => 'Kiên Giang'],
                                        ['id' => 517, 'name' => 'Khánh Hòa'],
                                        ['id' => 518, 'name' => 'Kon Tum'],
                                        ['id' => 519, 'name' => 'Long An'],
                                        ['id' => 520, 'name' => 'Lâm Đồng'],
                                        ['id' => 521, 'name' => 'Lai Châu'],
                                        ['id' => 522, 'name' => 'Lào Cai'],
                                        ['id' => 523, 'name' => 'Lạng Sơn'],
                                        ['id' => 524, 'name' => 'Nghệ An'],
                                        ['id' => 525, 'name' => 'Ninh Bình'],
                                        ['id' => 526, 'name' => 'Nam Định'],
                                        ['id' => 527, 'name' => 'Ninh Thuận'],
                                        ['id' => 528, 'name' => 'Phú Thọ'],
                                        ['id' => 529, 'name' => 'Phú Yên'],
                                        ['id' => 530, 'name' => 'Quảng Bình'],
                                        ['id' => 531, 'name' => 'Quảng Ngãi'],
                                        ['id' => 532, 'name' => 'Quảng Nam'],
                                        ['id' => 533, 'name' => 'Quảng Ninh'],
                                        ['id' => 534, 'name' => 'Quảng Trị'],
                                        ['id' => 535, 'name' => 'Sơn La'],
                                        ['id' => 536, 'name' => 'Sóc Trăng'],
                                        ['id' => 537, 'name' => 'Thái Bình'],
                                        ['id' => 538, 'name' => 'Tiền Giang'],
                                        ['id' => 539, 'name' => 'Thanh Hóa'],
                                        ['id' => 540, 'name' => 'Tây Ninh'],
                                        ['id' => 541, 'name' => 'Tuyên Quang'],
                                        ['id' => 543, 'name' => 'Trà Vinh'],
                                        ['id' => 544, 'name' => 'Thái Nguyên'],
                                        ['id' => 545, 'name' => 'Vĩnh Long'],
                                        ['id' => 546, 'name' => 'Vĩnh Phúc'],
                                        ['id' => 547, 'name' => 'Yên Bái'],
                                        ['id' => 548, 'name' => 'Đắk Nông'],
                                        ['id' => 549, 'name' => 'Bắc Kạn'],
                                        ['id' => 550, 'name' => 'Thừa Thiên - Huế'],
                                        ['id' => 551, 'name' => 'Đắk Lắk'],
                                        ['id' => 552, 'name' => 'Bà Rịa - Vũng Tàu'],
                                    ] as $region)
                                        <option value="{{ $region['id'] }}" {{ old('register_region_id') == $region['id'] ? 'selected' : '' }}>{{ $region['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('register_region_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Quận/Huyện:<span style="color: red">*</span></label>
                                <select name="register_city_id" id="register_city_id" style="width: 100%" class="form-control">
                                    <option value="-1">Chọn Quận/Huyện</option>
                                </select>
                                @error('register_city_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Phường/Xã:<span style="color: red">*</span></label>
                                <select name="vnward_id" id="vnward_id" style="width: 100%" class="form-control">
                                    <option value="-1">Chọn Phường/Xã</option>
                                </select>
                                @error('vnward_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Địa chỉ:<span style="color: red">*</span></label>
                                <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="register-summary__overview">
                        <h4>Thông tin mật khẩu</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Mật khẩu:<span style="color: red">*</span></label>
                                <input class="form-control" type="password" name="customer_pass1" placeholder="Mật khẩu...">
                                @error('customer_pass1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nhập lại mật khẩu:<span style="color: red">*</span></label>
                                <input class="form-control" type="password" name="customer_pass1_confirmation" placeholder="Nhập lại mật khẩu...">
                                @error('customer_pass1_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Mời nhập các ký tự trong hình vào ô sau:<span style="color: red">*</span></label>
                                <input class="form-control" type="text" name="captcha">
                                @error('captcha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <p class="img_capcha">
                                <img src="https://ivymoda.com/ajax/captcha" border="0" class="img-responsive" id="captcha-image">
                                <a href="javascript:void(0)" onclick="refreshCaptcha()">Làm mới</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-check">
                                <input class="form-check-input checkboxs" type="checkbox" name="customer_agree" value="1" id="defaultCheck1" {{ old('customer_agree') ? 'checked' : '' }}>
                                <label style="margin-top: 4px;margin-left: 3px;" class="form-check-label" for="defaultCheck1">
                                    <span> Đồng ý với các <a style="color: #f31f1f" href="https://ivymoda.com/about/chinh-sach-bao-hanh">điều khoản</a> của IVY </span>
                                </label>
                                @error('customer_agree')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-check">
                                <input class="form-check-input checkboxs" type="checkbox" value="1" name="customer_subscribe" id="defaultCheck2" {{ old('customer_subscribe') ? 'checked' : '' }}>
                                <label style="margin-top: 4px;margin-left: 3px;" class="form-check-label" for="defaultCheck2">
                                    <span>Đăng ký nhận bản tin</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button id="bnt_register" class="btn btn--large" type="submit" style="width: 100%;margin-top: 15px">Đăng ký</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#register_region_id').change(function() {
        var region_id = $(this).val();
        console.log('Region ID:', region_id); // Debug
        if (region_id != -1) {
            $.ajax({
                url: '/cities/' + region_id,
                type: 'GET',
                success: function(data) {
                    $('#register_city_id').html('<option value="-1">Chọn Quận/Huyện</option>');
                    $.each(data, function(key, value) {
                        $('#register_city_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('#vnward_id').html('<option value="-1">Chọn Phường/Xã</option>');
                },
                error: function(xhr) {
                    alert('Lỗi khi tải Quận/Huyện: ' + xhr.statusText);
                }
            });
        } else {
            $('#register_city_id').html('<option value="-1">Chọn Quận/Huyện</option>');
            $('#vnward_id').html('<option value="-1">Chọn Phường/Xã</option>');
        }
    });

    $('#register_city_id').change(function() {
        var city_id = $(this).val();
        console.log('City ID:', city_id); // Debug
        if (city_id != -1) {
            $.ajax({
                url: '/wards/' + city_id,
                type: 'GET',
                success: function(data) {
                    $('#vnward_id').html('<option value="-1">Chọn Phường/Xã</option>');
                    $.each(data, function(key, value) {
                        $('#vnward_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function(xhr) {
                    alert('Lỗi khi tải Phường/Xã: ' + xhr.statusText);
                }
            });
        } else {
            $('#vnward_id').html('<option value="-1">Chọn Phường/Xã</option>');
        }
    });

    window.refreshCaptcha = function() {
        $.ajax({
            url: '{{ route("captcha") }}',
            type: 'GET',
            success: function(data) {
                $('#captcha-image').attr('src', 'https://ivymoda.com/ajax/captcha?' + new Date().getTime());
            },
            error: function() {
                alert('Lỗi khi làm mới captcha.');
            }
        });
    };
});

$('#bnt_register').click(function(e) {
    var pass1 = $('input[name="customer_pass1"]').val();
    var pass2 = $('input[name="customer_pass1_confirmation"]').val();
    if (pass1 !== pass2) {
        e.preventDefault();
        alert('Mật khẩu xác nhận không khớp!');
    }
});
</script>

@endsection