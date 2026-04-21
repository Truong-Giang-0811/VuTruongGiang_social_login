<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Xin chào!</h1>
        <p class="text-gray-500 mb-8">Vui lòng chọn phương thức đăng nhập</p>

        @if(session('error'))
        <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4 text-sm text-left">
            <i class="fa-solid fa-circle-exclamation mr-2"></i> {{ session('error') }}
        </div>
        @endif

        <div class="space-y-4">
            <a href="{{ route('social.redirect', 'google') }}"
                class="flex items-center justify-center w-full bg-white border border-gray-300 text-gray-700 px-4 py-3 rounded-xl hover:bg-gray-50 transition duration-300 shadow-sm">
                <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" class="w-5 h-5 mr-3" alt="Google">
                <span class="font-semibold">Đăng nhập với Google</span>
            </a>

            <a href="{{ route('social.redirect', 'facebook') }}"
                class="flex items-center justify-center w-full bg-[#1877F2] text-white px-4 py-3 rounded-xl hover:bg-blue-700 transition duration-300 shadow-sm">
                <i class="fa-brands fa-facebook text-xl mr-3"></i>
                <span class="font-semibold">Đăng nhập với Facebook</span>
            </a>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100">
            <p class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-2">Thông tin sinh viên</p>
            <p class="text-sm text-gray-600 font-medium">Vũ Trương Giang</p>
            <p class="text-xs text-gray-500">Trường Đại học Điện lực</p>
        </div>
    </div>

</body>

</html>