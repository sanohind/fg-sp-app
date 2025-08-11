<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menu - Store & Pull Parts System</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .menu-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Mobile Status Bar Simulation -->
    

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

    <!-- Menu Header -->
    <div class="bg-white px-4 py-4 flex items-center justify-between border-b">
        <h2 class="text-xl font-bold text-gray-900">Menu</h2>
        <div class="text-sm text-gray-500" id="current-time">
            <!-- Time will be updated by JavaScript -->
        </div>
    </div>

    <!-- Main Menu Options -->
    <div class="menu-bg min-h-screen p-4">
        <div class="space-y-4">
            <!-- Store Option -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-blue-900 mb-2">Store</h3>
                            <p class="text-gray-600 text-sm">Store finished goods and manage inventory</p>
                        </div>
                        <div class="ml-4">
                            <div class="w-20 h-20 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-warehouse text-3xl text-blue-600"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('store.scanBox') }}" 
                           class="block w-full bg-blue-900 text-white text-center py-3 px-4 rounded-md hover:bg-blue-800 transition-colors duration-200 font-semibold">
                            Enter Store System
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pull Option -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-green-900 mb-2">Pull</h3>
                            <p class="text-gray-600 text-sm">Pull parts from storage for production</p>
                        </div>
                        <div class="ml-4">
                            <div class="w-20 h-20 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-truck text-3xl text-green-600"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('pull.index') }}" 
                           class="block w-full bg-green-900 text-white text-center py-3 px-4 rounded-md hover:bg-green-800 transition-colors duration-200 font-semibold">
                            Enter Pull System
                        </a>
                    </div>
                </div>
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
