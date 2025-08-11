<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Scan QR Slot - Store System</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .scan-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
        
        .qr-placeholder {
            background: linear-gradient(45deg, #000 25%, transparent 25%), 
                        linear-gradient(-45deg, #000 25%, transparent 25%), 
                        linear-gradient(45deg, transparent 75%, #000 75%), 
                        linear-gradient(-45deg, transparent 75%, #000 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    

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
        <h2 class="text-xl font-bold text-gray-900">Posting F/G</h2>
        <div class="text-sm text-gray-500" id="current-time">
            <!-- Time will be updated by JavaScript -->
        </div>
    </div>

    <!-- Main Content -->
    <div class="scan-bg min-h-screen p-4">
        <div class="space-y-4">
            <!-- Top Input Fields -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Part No.</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Rack</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Scan</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <!-- Rack Address Section -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Rack Address</h3>
                <div class="flex items-center space-x-6">
                    <!-- QR Code Placeholder -->
                    <div class="qr-placeholder w-32 h-32 rounded-lg flex items-center justify-center">
                        <div class="text-center text-white text-xs">
                            <div class="font-bold">QR CODE</div>
                            <div>SCAN HERE</div>
                        </div>
                    </div>
                    
                    <!-- Worker Illustration -->
                    <div class="flex-1 flex justify-center">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                <i class="fas fa-user-hard-hat text-3xl text-blue-600"></i>
                            </div>
                            <div class="text-sm text-gray-600">Worker with Scanner</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Part No. Field -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <label class="block text-sm font-medium text-gray-900 mb-2">Part No.</label>
                <input type="text" class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter part number">
            </div>

            <!-- Scan Rack Button -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <button class="w-full bg-blue-900 text-white font-semibold py-4 px-6 rounded-md hover:bg-blue-800 transition-colors duration-200 flex items-center justify-center space-x-3">
                    <i class="fas fa-th-large text-xl"></i>
                    <span class="text-lg">Scan Rack</span>
                </button>
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
