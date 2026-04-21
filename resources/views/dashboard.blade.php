<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sinh viên {{ Auth::user()->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-bold text-blue-600">EPU Social Login</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 hidden md:block">Xin chào, <strong>{{ Auth::user()->name }}</strong></span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i>Đăng xuất
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto mt-10 p-6">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="h-32 bg-gradient-to-r from-blue-500 to-purple-600"></div>

            <div class="relative px-6 pb-6">
                <div class="absolute -top-16 left-6">
                    <img class="w-32 h-32 rounded-full border-4 border-white shadow-md object-cover bg-white"
                        src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}"
                        alt="User Avatar">
                </div>

                <div class="mt-20 flex flex-col md:flex-row md:justify-between md:items-end">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">{{ Auth::user()->name }}</h1>
                        <p class="text-blue-600 font-medium">Sinh viên Công nghệ thông tin</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                            <i class="fa-solid fa-circle-check mr-1"></i> Đã xác thực qua {{ ucfirst(Auth::user()->provider_name) }}
                        </span>
                    </div>
                </div>

                <div class="mt-8 border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 uppercase tracking-wider">Thông tin chi tiết</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="bg-blue-100 p-3 rounded-lg text-blue-600 mr-4">
                                <i class="fa-solid fa-id-card text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Mã sinh viên</p>
                                <p class="text-lg font-bold text-gray-800">{{ Auth::user()->student_id ?? 'Chưa cập nhật' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="bg-purple-100 p-3 rounded-lg text-purple-600 mr-4">
                                <i class="fa-solid fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Địa chỉ Email</p>
                                <p class="text-lg font-bold text-gray-800">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="bg-yellow-100 p-3 rounded-lg text-yellow-600 mr-4">
                                <i class="fa-solid fa-key text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Social ID ({{ ucfirst(Auth::user()->provider_name) }})</p>
                                <p class="text-xs font-mono text-gray-600 break-all">{{ Auth::user()->provider_id }}</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="bg-green-100 p-3 rounded-lg text-green-600 mr-4">
                                <i class="fa-solid fa-calendar-check text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Ngày đăng ký hệ thống</p>
                                <p class="text-lg font-bold text-gray-800">{{ Auth::user()->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-10 text-center text-gray-500 pb-10">
            <div class="bg-white inline-block px-6 py-3 rounded-full shadow-sm border border-gray-200">
                <p class="text-sm">
                    <strong>Họ tên:</strong> Vũ Trương Giang |
                    <strong>MSV:</strong> {{ Auth::user()->student_id ?? 'Chưa cập nhật' }} |
                    <strong>Lớp:</strong> {{ Auth::user()->class ?? 'Chưa cập nhật' }}
                </p>
            </div>
        </footer>
    </div>

</body>

</html>