<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pull System - Store & Pull Parts</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .pull-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
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

    <!-- Application Header -->
    <div class="bg-white px-4 py-3 flex items-center justify-between border-b">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold text-blue-900">SAN<span class="text-red-500">O</span>h</h1>
        </div>
        <div class="flex items-center space-x-2">
            <i class="fas fa-user-circle text-2xl text-gray-600"></i>
            <span class="text-sm text-gray-700">user1ky</span>
        </div>
    </div>

    <!-- Page Header -->
    <div class="bg-white px-4 py-4 flex items-center justify-between border-b">
        <h2 class="text-xl font-bold text-gray-900">Pull System</h2>
        <div class="text-sm text-gray-500" id="current-time">
            <!-- Time will be updated by JavaScript -->
        </div>
    </div>

    <!-- Main Content -->
    <div class="pull-bg min-h-screen p-4">
        <div class="space-y-4">
            <!-- Welcome Section -->
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Welcome to Pull System</h3>
                <p class="text-gray-600">Pull parts from storage for production</p>
            </div>

            <!-- Pull Operations -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Pull Parts Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-green-900">Pull Parts</h3>
                            <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-hand-holding-box text-2xl text-green-600"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Pull parts from storage locations</p>
                        <button class="w-full bg-green-900 text-white text-center py-3 px-4 rounded-md hover:bg-green-800 transition-colors duration-200 font-semibold">
                            Enter Pull Parts
                        </button>
                    </div>
                </div>

                <!-- Pull History Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-blue-900">Pull History</h3>
                            <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-history text-2xl text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">View pull operation history</p>
                        <button class="w-full bg-blue-900 text-white text-center py-3 px-4 rounded-md hover:bg-blue-800 transition-colors duration-200 font-semibold">
                            View History
                        </button>
                    </div>
                </div>
            </div>

            <!-- Back to Menu -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <a href="{{ route('menu.index') }}" 
                   class="block w-full bg-gray-600 text-white text-center py-3 px-4 rounded-md hover:bg-gray-700 transition-colors duration-200 font-semibold">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Menu
                </a>
            </div>
        </div>
    </div>

    <script>
        function updateTime() {
            const now = new Date();
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            document.getElementById('current-time').textContent = `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
        }
        
        // Update time immediately and then every second
        updateTime();
        setInterval(updateTime, 1000);
    </script>
</body>
</html>
