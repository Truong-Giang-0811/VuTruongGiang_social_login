<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            // Trường mật khẩu cho phép null vì đăng nhập Social không cần pass ban đầu
            $table->string('password')->nullable();

            // --- CÁC TRƯỜNG THÊM MỚI THEO YÊU CẦU ---
            $table->string('student_id')->nullable(); // Yêu cầu cá nhân hóa (Mã sinh viên)
            $table->string('avatar')->nullable();     // Lưu link ảnh đại diện từ Google/FB
            $table->string('provider_name')->nullable(); // Để phân biệt 'google' hay 'facebook'
            $table->string('provider_id')->nullable();   // ID định danh của user từ bên thứ 3
            // ---------------------------------------

            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
