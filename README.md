# Cấu trúc Thư mục Laravel

Laravel là một framework PHP theo kiến trúc MVC (Model - View - Controller), với cấu trúc thư mục rõ ràng và linh hoạt. Dưới đây là mô tả chi tiết các thư mục chính trong một dự án Laravel:

---

## 📁 app/

Chứa phần logic chính của ứng dụng:

- `Console/`: Các lệnh Artisan tuỳ chỉnh.
- `Exceptions/`: Quản lý lỗi và ngoại lệ.
- `Http/`:
  - `Controllers/`: Xử lý các request từ người dùng.
  - `Middleware/`: Lớp trung gian xử lý request.
  - `Requests/`: Validate dữ liệu gửi lên.
- `Models/`: Các lớp đại diện cho bảng trong cơ sở dữ liệu.
- `Providers/`: Các service provider được sử dụng để khởi tạo ứng dụng.

---

## 📁 bootstrap/

- `app.php`: File khởi tạo ứng dụng Laravel.
- `cache/`: Cache cho routes, config, view,...

---

## 📁 config/

Chứa tất cả các file cấu hình:

- `app.php`: Cấu hình chung của ứng dụng.
- `database.php`: Cấu hình cơ sở dữ liệu.
- `auth.php`: Cấu hình xác thực người dùng.
- `mail.php`, `queue.php`, v.v.

---

## 📁 database/

- `migrations/`: Định nghĩa cấu trúc bảng CSDL.
- `seeders/`: Thêm dữ liệu mẫu vào CSDL.
- `factories/`: Tạo dữ liệu giả để test.

---

## 📁 public/

Thư mục duy nhất truy cập được từ bên ngoài:

- `index.php`: Điểm vào chính của ứng dụng.
- Chứa tài nguyên tĩnh: hình ảnh, CSS, JS,...

---

## 📁 resources/

Chứa các tài nguyên chưa được biên dịch:

- `views/`: Các file giao diện Blade.
- `lang/`: File ngôn ngữ cho đa ngôn ngữ.
- `js/`, `css/`: Chứa mã nguồn front-end.

---

## 📁 routes/

Chứa các định nghĩa tuyến (route) của ứng dụng:

- `web.php`: Route dành cho giao diện web.
- `api.php`: Route dành cho API.
- `console.php`: Route cho các lệnh Artisan.
- `channels.php`: Route cho broadcast (nếu dùng).

---

## 📁 storage/

Chứa dữ liệu phát sinh khi chạy ứng dụng:

- `logs/`: Ghi log lỗi.
- `app/`: File upload, file tạm.
- `framework/`: View cache, session,...

---

## 📁 tests/

Thư mục chứa các file kiểm thử (test):

- `Feature/`: Test tính năng.
- `Unit/`: Test đơn vị (unit test).

---

## 📁 vendor/

Chứa các thư viện được cài đặt qua Composer, bao gồm cả core của Laravel và các package bên ngoài.

---

## Gợi ý thêm:

Bạn có thể chạy các lệnh sau để hiểu hơn về cấu trúc:
```bash
php artisan list      # Xem danh sách các lệnh Artisan
php artisan route:list  # Xem danh sách route
