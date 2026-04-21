# 📘 BÀI TẬP: TÍCH HỢP ĐĂNG NHẬP GOOGLE & FACEBOOK (LARAVEL SOCIALITE)

## 👤 Thông tin sinh viên
- **Họ tên:** Vũ Trường Giang  
- **Mã sinh viên:** 23810310117
- **Lớp:** D18CNPM2
- **Trường:** Đại học Điện lực (Electric Power University)  

---

## 📌 1. Mô tả chung
Dự án xây dựng chức năng xác thực người dùng thông qua bên thứ ba (**Google** và **Facebook**) sử dụng **Laravel Framework** và thư viện **Socialite**.

Hệ thống cho phép:
- Tự động đăng ký tài khoản mới bằng thông tin từ mạng xã hội  
- Đăng nhập nếu tài khoản đã tồn tại  
- Lưu trữ thông tin người dùng (tên, email, avatar, provider)

---

## ⚙️ 2. Cài đặt hệ thống

### A. Cấu hình Database
Tạo database:
```sql
CREATE DATABASE social_login_db;
```

Cập nhật file `.env`:
```env
DB_DATABASE=social_login_db
DB_USERNAME=root
DB_PASSWORD=
```

---

### B. Chạy lệnh khởi tạo

```bash
composer install
php artisan migrate
php artisan key:generate
```

---

## 🔐 3. Cấu hình OAuth 2.0

### A. Google OAuth
- Truy cập: https://console.cloud.google.com  
- Tạo OAuth Client ID  

Redirect URI:
```
http://127.0.0.1:8000/auth/google/callback
```

---

### B. Facebook OAuth

Chạy Ngrok:
```bash
ngrok http 8000
```

Redirect URI:
```
https://your-ngrok-id.ngrok-free.app/auth/facebook/callback
```

---

## 🔑 4. Cấu hình `.env`

```env
# Google
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback

# Facebook
FACEBOOK_CLIENT_ID=your_facebook_client_id
FACEBOOK_CLIENT_SECRET=your_facebook_client_secret
FACEBOOK_REDIRECT_URI=https://your-ngrok-url/auth/facebook/callback
```

---

## 🧱 5. Cấu trúc chính

- `app/Http/Controllers/SocialController.php`
- `database/migrations/create_users_table.php`
- `resources/views/login.blade.php`
- `resources/views/dashboard.blade.php`

---

## 🎯 6. Demo chức năng

- ✅ Đăng nhập Google  
- ✅ Đăng nhập Facebook  
- ✅ Tạo tài khoản tự động  
- ✅ Hiển thị: tên, email, avatar  
- ✅ Hiển thị: mã sinh viên, lớp  
- ✅ Logout (xóa session)  

---

## 📌 7. Công nghệ sử dụng
- Laravel  
- Laravel Socialite  
- MySQL  
- OAuth 2.0  
- Ngrok  

---

## 📎 8. Ghi chú
- Facebook yêu cầu HTTPS → dùng Ngrok khi chạy local  
- Không hard-code thông tin OAuth  
- Luôn lưu config trong `.env`
