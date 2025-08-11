<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Store & Pull Parts System</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .login-bg {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><rect width="1200" height="800" fill="%23f8fafc"/><rect x="200" y="100" width="800" height="600" fill="%23ffffff" rx="20"/><text x="600" y="200" text-anchor="middle" font-family="Arial" font-size="48" fill="%231e3a8a">SANOH</text><text x="600" y="280" text-anchor="middle" font-family="Arial" font-size="24" fill="%236b7280">WELCOME TO PT. SANOH INDONESIA</text></svg>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .login-form {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Mobile Status Bar Simulation -->
    <div class="bg-black text-white px-4 py-2 text-sm flex justify-between items-center">
        <span>5:13 PM</span>
        <div class="flex items-center space-x-2">
            <i class="fas fa-clock"></i>
            <i class="fas fa-bluetooth-b"></i>
            <i class="fas fa-wifi"></i>
            <div class="flex space-x-1">
                <div class="w-1 h-3 bg-white rounded-sm"></div>
                <div class="w-1 h-3 bg-white rounded-sm"></div>
                <div class="w-1 h-3 bg-white rounded-sm"></div>
                <div class="w-1 h-3 bg-white rounded-sm"></div>
            </div>
            <div class="w-6 h-3 border border-white rounded-sm">
                <div class="w-4 h-1 bg-white rounded-sm m-0.5"></div>
            </div>
        </div>
    </div>

    <!-- Browser Address Bar Simulation -->
    <div class="bg-white border-b px-4 py-2 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <i class="fas fa-home text-gray-600"></i>
            <i class="fas fa-lock text-green-600"></i>
            <span class="text-sm text-gray-700">sanoh-storagebox.com</span>
        </div>
        <div class="flex items-center space-x-2">
            <div class="w-6 h-6 border border-gray-300 rounded-full flex items-center justify-center text-xs">1</div>
            <i class="fas fa-ellipsis-v text-gray-600"></i>
        </div>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen login-bg flex items-center justify-center p-4">
        <div class="login-form w-full max-w-sm rounded-lg shadow-2xl p-8">
            <h1 class="text-3xl font-bold text-center text-gray-900 mb-8">Login Page</h1>
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-900 mb-2">Username</label>
                    <input type="text" id="username" name="username" required
                           class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter username">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter password">
                </div>
                
                <button type="submit" 
                        class="w-full bg-blue-900 text-white font-semibold py-3 px-6 rounded-md hover:bg-blue-800 transition-colors duration-200 uppercase tracking-wide">
                    LOGIN
                </button>
            </form>
        </div>
    </div>
</body>
</html>
