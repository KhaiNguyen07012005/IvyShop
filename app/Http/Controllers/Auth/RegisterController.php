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
    public function showRegistrationForm()
    {
        \Log::info('Showing registration form');
        return view('auth.register');
    }

    public function register(Request $request)
    {
        \Log::info('Register attempt', $request->all());

        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        \Log::info('User created: ', $user->toArray());

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
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
            'customer_pass1_confirmation' => ['required', 'same:customer_pass1'],
            'customer_agree' => ['required', 'accepted'],
        ], [
            'customer_pass1_confirmation.same' => 'Mật khẩu xác nhận không khớp.',
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
        \Log::info('Fetching cities for region_id: ' . $region_id);
        try {
            $cities = City::where('region_id', $region_id)
                ->select('id', 'name')
                ->get()
                ->groupBy('name')
                ->map(function ($group) {
                    return $group->sortBy('id')->first();
                })
                ->values();
            \Log::info('Cities found: ' . $cities->count() . ', Data: ' . $cities->toJson());
            return response()->json($cities);
        } catch (\Exception $e) {
            \Log::error('Error fetching cities: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching cities'], 500);
        }
    }

    public function getWards($city_id)
    {
        \Log::info('Fetching wards for city_id: ' . $city_id);
        try {
            $wards = Ward::where('city_id', $city_id)->get(['id', 'name']);
            \Log::info('Wards found: ' . $wards->count() . ', Data: ' . $wards->toJson());
            return response()->json($wards);
        } catch (\Exception $e) {
            \Log::error('Error fetching wards: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching wards'], 500);
        }
    }
}
?>