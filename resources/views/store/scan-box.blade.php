<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Scan QR Box - Store System</title>
    
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
        <h2 class="text-xl font-bold text-gray-900">Scan QR Box</h2>
        <div class="text-sm text-gray-500" id="current-time">
            <!-- Time will be updated by JavaScript -->
        </div>
    </div>

    <!-- Main Content -->
    <div class="scan-bg min-h-screen p-4">
        <div class="space-y-4">
            <!-- Box Information -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Box Information</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Box ID</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter box ID">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Box Type</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Small Box</option>
                            <option>Medium Box</option>
                            <option>Large Box</option>
                            <option>Pallet</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- QR Code Scanner Section -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Scan Box QR Code</h3>
                <div class="flex items-center space-x-6">
                    <!-- QR Code Placeholder -->
                    <div class="qr-placeholder w-32 h-32 rounded-lg flex items-center justify-center">
                        <div class="text-center text-white text-xs">
                            <div class="font-bold">BOX QR</div>
                            <div>SCAN HERE</div>
                        </div>
                    </div>
                    
                    <!-- Scanner Status -->
                    <div class="flex-1">
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Scanner Ready</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Waiting for Scan</span>
                            </div>
                            <div class="text-xs text-gray-500">Point scanner at box QR code</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scan Input Field -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <label class="block text-sm font-medium text-gray-900 mb-2">Manual Entry (if needed)</label>
                <input type="text" class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter QR code manually or scan above">
            </div>

            <!-- Action Buttons -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <div class="grid grid-cols-2 gap-4">
                    <button class="bg-green-600 text-white font-semibold py-3 px-4 rounded-md hover:bg-green-700 transition-colors duration-200 flex items-center justify-center space-x-2">
                        <i class="fas fa-play text-lg"></i>
                        <span>Start Scan</span>
                    </button>
                    <button class="bg-red-600 text-white font-semibold py-3 px-4 rounded-md hover:bg-red-700 transition-colors duration-200 flex items-center justify-center space-x-2">
                        <i class="fas fa-stop text-lg"></i>
                        <span>Stop Scan</span>
                    </button>
                </div>
            </div>

            <!-- Scan History -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Scans</h3>
                <div class="space-y-2">
                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                        <span class="text-sm text-gray-700">Box-001</span>
                        <span class="text-xs text-gray-500">2 min ago</span>
                    </div>
                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                        <span class="text-sm text-gray-700">Box-002</span>
                        <span class="text-xs text-gray-500">5 min ago</span>
                    </div>
                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                        <span class="text-sm text-gray-700">Box-003</span>
                        <span class="text-xs text-gray-500">8 min ago</span>
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
