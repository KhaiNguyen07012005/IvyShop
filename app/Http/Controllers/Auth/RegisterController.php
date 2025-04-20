<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'customer_account' => 'required',
            'customer_password' => 'required',
        ]);

        // Thay bằng logic auth()->attempt() thật
        return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        if ($request->captcha !== session('captcha')) {
            throw ValidationException::withMessages(['captcha' => 'Captcha không hợp lệ.']);
        }

        $user = $this->create($request->all());
        auth()->login($user);

        return redirect()->route('home')->with('success', 'Đăng ký thành công!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'customer_firstname' => ['required', 'string', 'max:255'],
            'customer_display_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'customer_phone' => ['required', 'string', 'max:15'],
            'customer_birthday' => ['required', 'date'],
            'customer_sex' => ['required', 'in:0,1,2'],
            'register_region_id' => ['required', 'not_in:-1'],
            'register_city_id' => ['required', 'not_in:-1'],
            'vnward_id' => ['required', 'not_in:-1'],
            'address' => ['required', 'string', 'max:500'],
            'customer_pass1' => ['required', 'string', 'min:8'],
            'customer_pass2' => ['required', 'same:customer_pass1'],
            'captcha' => ['required'],
            'customer_agree' => ['required', 'accepted'],
        ], [
            'customer_pass2.same' => 'Mật khẩu xác nhận không khớp.',
            'customer_agree.accepted' => 'Bạn phải đồng ý với các điều khoản.',
            'register_region_id.not_in' => 'Vui lòng chọn Tỉnh/TP.',
            'register_city_id.not_in' => 'Vui lòng chọn Quận/Huyện.',
            'vnward_id.not_in' => 'Vui lòng chọn Phường/Xã.',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['customer_firstname'] . ' ' . $data['customer_display_name'],
            'email' => $data['customer_email'],
            'password' => Hash::make($data['customer_pass1']),
            'phone' => $data['customer_phone'],
            'birthday' => $data['customer_birthday'],
            'sex' => $data['customer_sex'],
            'region_id' => $data['register_region_id'],
            'city_id' => $data['register_city_id'],
            'ward_id' => $data['vnward_id'],
            'address' => $data['address'],
            'subscribe' => isset($data['customer_subscribe']) ? 1 : 0,
        ]);
    }

    public function getCities($region_id)
    {
        return response()->json(City::where('region_id', $region_id)->get(['id', 'name']));
    }

    public function getWards($city_id)
    {
        return response()->json(Ward::where('city_id', $city_id)->get(['id', 'name']));
    }
}
?>