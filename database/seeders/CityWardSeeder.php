<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Ward;

class CityWardSeeder extends Seeder
{
    public function run()
    {
        // Thêm dữ liệu cho cities
        City::create(['name' => 'Quận 1', 'region_id' => 507]);
        City::create(['name' => 'Quận 3', 'region_id' => 507]);
        City::create(['name' => 'Quận 7', 'region_id' => 507]);
        City::create(['name' => 'Quận Bình Thạnh', 'region_id' => 507]);
        City::create(['name' => 'Huyện Nhà Bè', 'region_id' => 507]);
        City::create(['name' => 'Quận Hoàn Kiếm', 'region_id' => 511]);
        City::create(['name' => 'Quận Ba Đình', 'region_id' => 511]);
        City::create(['name' => 'Quận Cầu Giấy', 'region_id' => 511]);
        City::create(['name' => 'Quận Thanh Xuân', 'region_id' => 511]);
        City::create(['name' => 'Huyện Đông Anh', 'region_id' => 511]);
        City::create(['name' => 'Quận Hải Châu', 'region_id' => 499]);
        City::create(['name' => 'Quận Thanh Khê', 'region_id' => 499]);
        City::create(['name' => 'Quận Sơn Trà', 'region_id' => 499]);
        City::create(['name' => 'Quận Hồng Bàng', 'region_id' => 512]);
        City::create(['name' => 'Quận Lê Chân', 'region_id' => 512]);

        // Thêm dữ liệu cho wards
        Ward::create(['name' => 'Phường Bến Nghé', 'city_id' => 1]);
        Ward::create(['name' => 'Phường Bến Thành', 'city_id' => 1]);
        Ward::create(['name' => 'Phường Nguyễn Thái Bình', 'city_id' => 1]);
        Ward::create(['name' => 'Phường Hàng Gai', 'city_id' => 6]);
        Ward::create(['name' => 'Phường Hàng Bạc', 'city_id' => 6]);
        Ward::create(['name' => 'Phường Tràng Tiền', 'city_id' => 6]);
        Ward::create(['name' => 'Phường Hải Châu I', 'city_id' => 11]);
        Ward::create(['name' => 'Phường Hòa Thuận Đông', 'city_id' => 11]);
        Ward::create(['name' => 'Phường Hạ Lý', 'city_id' => 14]);
        Ward::create(['name' => 'Phường Thượng Lý', 'city_id' => 14]);
    }
}
?>