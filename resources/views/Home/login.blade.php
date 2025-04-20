@extends('layouts.app')

   <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

   @section('content')
   <main id="main" class="site-main">
       <div class="container">
           <div class="auth">
               <div class="auth-container">
                   <div class="auth-row">
                       <div class="auth__login auth__block">
                           <h3 class="auth__title">Bạn đã có tài khoản IVY</h3>
                           <div class="auth__login__content">
                               <p class="auth__description">
                                   Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm
                                   thành viên và nhận được những ưu đãi tốt hơn!
                               </p>
                               <form id="login-form" class="auth__form login-form" role="login" name="frm_customer_account_email" enctype="application/x-www-form-urlencoded" method="post" action="{{ route('login') }}" autocomplete="off">
                                   @csrf
                                   <div class="form-group">
                                       <input class="form-control" name="customer_account" type="text" placeholder="Email/SĐT" value="{{ old('customer_account') }}"/>
                                       @error('customer_account')
                                           <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                   </div>
                                   <div class="form-group">
                                       <input class="form-control" name="customer_password" type="password" placeholder="Mật khẩu"/>
                                       @error('customer_password')
                                           <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                   </div>
                                   <div class="auth__form__options">
                                       <div class="form-checkbox">
                                           <label>
                                               <input class="checkboxs" value="1" name="customer_remember" type="checkbox" {{ old('customer_remember') ? 'checked' : '' }}/>
                                               <span style="margin-left: 5px"> Ghi nhớ đăng nhập</span>
                                           </label>
                                       </div>
                                       <a class="auth__form__link" href="#">Quên mật khẩu?</a>
                                   </div>
                                   <div class="auth__form__options">
                                       <a class="auth__form__link login-with-qr" href="javascript:void(0)">Đăng nhập bằng mã QR</a>
                                       <a class="auth__form__link" href="#">Đăng nhập bằng OTP</a>
                                   </div>
                                   <div class="auth__form__buttons">
                                       <button id="but_login_email" name="but_login_email" class="btn btn--large g-recaptcha" data-sitekey="6Lcy5uEmAAAAADhosFdXQK6Em8axmw6Um7m4mnU5" data-callback="onSubmitLogin">Đăng nhập</button>
                                   </div>
                               </form>
                           </div>
                       </div>
                       <div class="auth__register auth__block">
                           <h3 class="auth__title">Khách hàng mới của IVY moda</h3>
                           <div class="auth__login__content">
                               <p class="auth__description">
                                   Nếu bạn chưa có tài khoản trên ivymoda.com, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng ký.
                               </p>
                               <p class="auth__description">
                                   Bằng cách cung cấp cho IVY moda thông tin chi tiết của bạn, quá trình mua hàng trên ivymoda.com sẽ là một trải nghiệm thú vị và nhanh chóng hơn!
                               </p>
                               <div class="auth__form__buttons">
                                   <a href="{{ route('register') }}"><button class="btn btn--large">Đăng ký</button></a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="modal fade modal-qr" id="modal-qr" tabindex="-1" role="dialog" aria-labelledby="modal-qr" aria-hidden="true">
                   <div class="modal-dialog modal-dialog-centered" role="document">
                       <div class="modal-content">
                           <div class="modal-body text-center">
                               <p class="scan-pls">Vui lòng quét mã QR để đăng nhập</p>
                               <div class="qr-code">
                                   <div id="qr-code-generate" class="qr-image"></div>
                                   <div class="expired d-none">
                                       <p style="font-weight: 600;">Mã QR đã hết hạn!</p>
                                       <a href="javascript:void(0)" class="btn--small btn-refresh-qr-login">Lấy mã mới</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </main>
   @endsection

   @section('scripts')
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/jquery.min.js" type="text/javascript"></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/jquery-ui.min.js"></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/affix.js" type="text/javascript"></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/js.cookie.js" type="text/javascript"></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/angular.min.js?v=1"></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/angular-sanitize.js"></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/qrcode.js"></script>
   <script src="https://pubcdn.ivymoda.com/ivy2/js/login.js" type="text/javascript"></script>
   <script>
       // Debug form submission
       $(document).ready(function() {
           $('#login-form').on('submit', function(e) {
               console.log('Form method:', $(this).attr('method'));
               console.log('Form action:', $(this).attr('action'));
           });

           // Define onSubmitLogin for reCAPTCHA
           window.onSubmitLogin = function(token) {
               console.log('reCAPTCHA token:', token);
               $('#login-form').submit();
           };
       });

       window.fbAsyncInit = function() {
           FB.init({
               appId: '1311336238962080',
               xfbml: true,
               version: 'v2.8'
           });
           FB.AppEvents.logPageView();
       };

       (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_US/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

       $('#bnt_register').click(function(e) {
    var pass1 = $('input[name="customer_pass1"]').val();
    var pass2 = $('input[name="customer_pass1_confirmation"]').val();
    if (pass1 !== pass2) {
        e.preventDefault();
        alert('Mật khẩu xác nhận không khớp!');
    }
});
   </script>
   <script src="https://apis.google.com/js/platform.js" async defer></script>
   
   @endsection