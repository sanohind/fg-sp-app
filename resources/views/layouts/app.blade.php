<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Store & Pull Parts System')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('sanoh-favicon.png') }}?v=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('sanoh-favicon.png') }}?v=1">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    .sanoh-blue {
        background-color: #1e3a8a;
    }

    .sanoh-blue-light {
        background-color: #3b82f6;
    }

    .progress-bar {
        background: linear-gradient(90deg, #fbbf24 0%, #fbbf24 100%);
    }

    /* Fixed header styles */
    .fixed-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
        background: white;
    }

    /* Desktop sidebar styles */
    .fixed-sidebar {
        position: fixed;
        top: 80px;
        /* Height of header */
        left: 0;
        bottom: 0;
        width: 256px;
        /* w-64 = 16rem = 256px */
        z-index: 40;
        overflow-y: auto;
        transition: transform 0.3s ease-in-out;
    }

    /* Mobile sidebar styles */
    @media (max-width: 1023px) {
        .fixed-sidebar {
            transform: translateX(-100%);
            top: 0;
            height: 100vh;
            z-index: 60;
        }

        .fixed-sidebar.show {
            transform: translateX(0);
        }
    }

    /* Desktop content layout */
    .content-with-fixed-layout {
        margin-top: 80px;
        /* Height of header */
        margin-left: 256px;
        /* Width of sidebar */
        min-height: calc(100vh - 80px);
    }

    /* Mobile content layout */
    @media (max-width: 1023px) {
        .content-with-fixed-layout {
            margin-left: 0;
        }
    }

    /* Overlay for mobile */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 55;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
    }

    .sidebar-overlay.show {
        opacity: 1;
        visibility: visible;
    }

    /* Hamburger menu animation */
    .hamburger-line {
        width: 24px;
        height: 2px;
        background-color: #374151;
        transition: all 0.3s ease;
        transform-origin: center;
    }

    .hamburger.active .hamburger-line:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger.active .hamburger-line:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active .hamburger-line:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Fixed Header -->
    <header class="fixed-header bg-white shadow-sm border-b">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <!-- Hamburger Menu Button (Mobile Only) -->
                    <button id="hamburgerBtn"
                        class="lg:hidden flex flex-col space-y-1 p-2 hover:bg-gray-100 rounded-md transition-colors duration-200">
                        <div class="hamburger-line"></div>
                        <div class="hamburger-line"></div>
                        <div class="hamburger-line"></div>
                    </button>

                    <div>
                        <img src="{{ asset('Logo-sanoh-2.png') }}" alt="Sanoh Logo" class="h-10 w-auto"
                            onerror="this.style.display='none'">
                    </div>
                </div>
                <div class="text-sm text-gray-600" id="realtime-clock">
                    <!-- Waktu akan tampil di sini -->
                </div>
                <script>
                function updateClock() {
                    const now = new Date();
                    const pad = n => n.toString().padStart(2, '0');
                    const formatted =
                        pad(now.getDate()) + '/' +
                        pad(now.getMonth() + 1) + '/' +
                        now.getFullYear() + ' ' +
                        pad(now.getHours()) + ':' +
                        pad(now.getMinutes()) + ':' +
                        pad(now.getSeconds());
                    document.getElementById('realtime-clock').textContent = formatted;
                }
                updateClock();
                setInterval(updateClock, 1000);
                </script>
            </div>
        </div>
    </header>

    <!-- Sidebar Overlay (Mobile Only) -->
    <div id="sidebarOverlay" class="sidebar-overlay lg:hidden"></div>

    <!-- Fixed Sidebar -->
    <div id="sidebar" class="fixed-sidebar">
        <div class="bg-white shadow h-full">
            <!-- Mobile Header (for close button) -->
            <div class="lg:hidden flex items-center justify-between p-4 border-b">
                <div>
                    <img src="{{ asset('Logo-sanoh-2.png') }}" alt="Sanoh Logo" class="h-8 w-auto"
                        onerror="this.style.display='none'">
                </div>
                <button id="closeSidebarBtn" class="p-2 hover:bg-gray-100 rounded-md transition-colors duration-200">
                    <i class="fas fa-times text-gray-600"></i>
                </button>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-1 p-4">
                <!-- Store System Section -->
                <div class="mb-4">
                    <h3 class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        STORE SYSTEM
                    </h3>
                    <div class="space-y-1 mt-2">
                        <a href="{{ route('store.index') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md 
                                  {{ request()->routeIs('store.index') ? 'bg-blue-900 text-white' : 'text-gray-700 hover:bg-gray-50' }}">
                            <i class="fas fa-home mr-3"></i>
                            Dashboard Store
                        </a>

                        <a href="{{ route('store.dashboard') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md 
                                  {{ request()->routeIs('store.dashboard') ? 'bg-blue-900 text-white' : 'text-gray-700 hover:bg-gray-50' }}">
                            <i class="fas fa-box mr-3"></i>
                            Posting F/G
                        </a>

                        <a href="{{ route('store.scan-container') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md
                                  {{ request()->routeIs('store.scan-container') ? 'bg-blue-900 text-white' : 'text-gray-700 hover:bg-gray-50' }}">
                            <i class="fas fa-shipping-fast mr-3"></i>
                            Scan Container
                        </a>

                        <a href="{{ route('store.scan-box') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md
                                  {{ request()->routeIs('store.scan-box') ? 'bg-blue-900 text-white' : 'text-gray-700 hover:bg-gray-50' }}">
                            <i class="fas fa-boxes mr-3"></i>
                            Scan Box
                        </a>

                        <a href="{{ route('store.history') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md
                                  {{ request()->routeIs('store.history') ? 'bg-blue-900 text-white' : 'text-gray-700 hover:bg-gray-50' }}">
                            <i class="fas fa-history mr-3"></i>
                            Store History
                        </a>

                        <a href="{{ route('store.settings') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md
                                  {{ request()->routeIs('store.settings') ? 'bg-blue-900 text-white' : 'text-gray-700 hover:bg-gray-50' }}">
                            <i class="fas fa-cog mr-3"></i>
                            Store Settings
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="content-with-fixed-layout">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Alert Messages -->
            @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif

            <!-- Page Content -->
            <div class="bg-white rounded-lg shadow">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Global Toast Notifications -->
    <!-- Success Notification Toast -->
    <div id="successToast"
        class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50"
        style="display: none;">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-3"></i>
            <div>
                <h4 class="font-semibold" id="toastTitle">Success!</h4>
                <p class="text-sm opacity-90" id="toastMessage">Operation completed successfully.</p>
            </div>
        </div>
    </div>

    <!-- Error Notification Toast -->
    <div id="errorToast"
        class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50"
        style="display: none;">
        <div class="flex items-center">
            <i class="fas fa-exclamation-triangle mr-3"></i>
            <div>
                <h4 class="font-semibold">Error!</h4>
                <p class="text-sm opacity-90" id="errorToastMessage">An error occurred.</p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // CSRF Token setup for AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);

    // Responsive Sidebar Logic
    $(document).ready(function() {
        const hamburgerBtn = $('#hamburgerBtn');
        const sidebar = $('#sidebar');
        const sidebarOverlay = $('#sidebarOverlay');
        const closeSidebarBtn = $('#closeSidebarBtn');

        // Toggle sidebar on hamburger click
        hamburgerBtn.on('click', function() {
            toggleSidebar();
        });

        // Close sidebar on overlay click
        sidebarOverlay.on('click', function() {
            closeSidebar();
        });

        // Close sidebar on close button click
        closeSidebarBtn.on('click', function() {
            closeSidebar();
        });

        // Close sidebar on ESC key press
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });

        // Close sidebar when clicking on navigation links (mobile only)
        sidebar.find('nav a').on('click', function() {
            if (window.innerWidth < 1024) {
                closeSidebar();
            }
        });

        function toggleSidebar() {
            const isOpen = sidebar.hasClass('show');
            if (isOpen) {
                closeSidebar();
            } else {
                openSidebar();
            }
        }

        function openSidebar() {
            sidebar.addClass('show');
            sidebarOverlay.addClass('show');
            hamburgerBtn.addClass('active');
            $('body').addClass('overflow-hidden lg:overflow-auto');
        }

        function closeSidebar() {
            sidebar.removeClass('show');
            sidebarOverlay.removeClass('show');
            hamburgerBtn.removeClass('active');
            $('body').removeClass('overflow-hidden lg:overflow-auto');
        }

        // Handle window resize
        $(window).on('resize', function() {
            if (window.innerWidth >= 1024) {
                closeSidebar();
            }
        });
    });

    // Global Toast Notification Functions
    function showSuccessToast(title, message) {
        const toast = document.getElementById('successToast');
        if (toast) {
            const titleEl = toast.querySelector('#toastTitle');
            const messageEl = toast.querySelector('#toastMessage');
            if (titleEl) titleEl.textContent = title;
            if (messageEl) messageEl.textContent = message;

            // Show and animate
            toast.style.display = 'block';
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
                toast.classList.add('translate-x-0');
            }, 10);

            // Auto hide after 3 seconds
            setTimeout(() => {
                hideSuccessToast();
            }, 3000);
        }
    }

    function hideSuccessToast() {
        const toast = document.getElementById('successToast');
        if (toast) {
            toast.classList.remove('translate-x-0');
            toast.classList.add('translate-x-full');

            // Hide completely after animation
            setTimeout(() => {
                toast.style.display = 'none';
            }, 300);
        }
    }

    function showErrorToast(title, message) {
        const toast = document.getElementById('errorToast');
        if (toast) {
            const messageEl = toast.querySelector('#errorToastMessage');
            if (messageEl) messageEl.textContent = message;

            // Show and animate
            toast.style.display = 'block';
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
                toast.classList.add('translate-x-0');
            }, 10);

            // Auto hide after 3 seconds
            setTimeout(() => {
                hideErrorToast();
            }, 3000);
        }
    }

    function hideErrorToast() {
        const toast = document.getElementById('errorToast');
        if (toast) {
            toast.classList.remove('translate-x-0');
            toast.classList.add('translate-x-full');

            // Hide completely after animation
            setTimeout(() => {
                toast.style.display = 'none';
            }, 300);
        }
    }

    // Test functions (optional - hapus jika tidak diperlukan)
    function testSuccessToast() {
        showSuccessToast('Test Success', 'This is a test success message!');
    }

    function testErrorToast() {
        showErrorToast('Test Error', 'This is a test error message!');
    }
    </script>

    @yield('scripts')
</body>

</html>