# Store & Pull Parts System - Store Module

## Overview
Sistem Store & Pull Parts adalah aplikasi manajemen inventori untuk PT. SANOH INDONESIA yang mengelola penyimpanan dan pengambilan part-part finish good (FG). Sistem ini dibangun menggunakan Laravel dengan Tailwind CSS untuk interface yang responsif dan modern.

## Fitur Utama

### 1. Dashboard Store (`/store`)
- Halaman utama dengan menu navigasi ke semua fitur
- Statistik real-time (total stored, today stored, pending, completed)
- Recent activity log
- Quick access cards untuk setiap modul

### 2. Posting F/G Dashboard (`/store/dashboard`)
- Interface utama untuk operator store
- Input fields untuk Part No., Rack, dan Scan
- QR Code display area
- Scan Rack button dengan visual feedback
- Quick action cards untuk akses cepat

### 3. Scan Container (`/store/scan-container`)
- Manajemen container dengan berbagai tipe (small, medium, large, pallet)
- Real-time status tracking (total, scanned, remaining)
- Input scan barcode/QR code
- Start/Stop scanning controls
- History scan dalam tabel

### 4. Scan Box (`/store/scan-box`)
- Manajemen box dengan tipe (small, medium, large)
- Status tracking untuk items dalam box
- Scan input dengan validasi
- Control scanning process
- Recent scan history

### 5. History (`/store/history`)
- Filter history berdasarkan tanggal, part number, dan status
- Statistik overview (total stored, today, pending, completed)
- Tabel history dengan pagination
- Export functionality
- Action buttons untuk view dan edit

### 6. Settings (`/store/settings`)
- **General Settings**: Company info, system name, timezone, language
- **Scanning Settings**: Timeout, auto-save, barcode type, sound
- **Notifications**: Email, SMS, Push notification toggles
- **User Management**: User list dengan role dan status

## Struktur File

```
resources/views/store/
├── index.blade.php          # Halaman utama store
├── dashboard.blade.php      # Dashboard Posting F/G
├── scan-container.blade.php # Halaman scan container
├── scan-box.blade.php       # Halaman scan box
├── history.blade.php        # Halaman history
└── settings.blade.php       # Halaman settings

app/Http/Controllers/
└── StoreController.php      # Controller untuk semua operasi store

routes/
└── web.php                  # Routes untuk store system
```

## Routes

### Store System Routes
```php
Route::prefix('store')->name('store.')->group(function () {
    Route::get('/', function () { return view('store.index'); })->name('index');
    Route::get('/dashboard', [StoreController::class, 'dashboard'])->name('dashboard');
    Route::get('/scan-container', [StoreController::class, 'scanContainer'])->name('scan-container');
    Route::get('/scan-box', [StoreController::class, 'scanBox'])->name('scan-box');
    Route::get('/history', [StoreController::class, 'history'])->name('history');
    Route::get('/settings', [StoreController::class, 'settings'])->name('settings');
    
    // API endpoints
    Route::post('/scan-container', [StoreController::class, 'processContainerScan'])->name('scan.container.process');
    Route::post('/scan-box', [StoreController::class, 'processBoxScan'])->name('scan.box.process');
    Route::get('/history-data', [StoreController::class, 'getHistory'])->name('history.data');
    Route::post('/save-settings', [StoreController::class, 'saveSettings'])->name('settings.save');
    Route::post('/export-history', [StoreController::class, 'exportHistory'])->name('history.export');
});
```

## Controller Methods

### StoreController
- `dashboard()` - Tampilkan dashboard Posting F/G
- `scanContainer()` - Tampilkan halaman scan container
- `scanBox()` - Tampilkan halaman scan box
- `history()` - Tampilkan halaman history
- `settings()` - Tampilkan halaman settings
- `processContainerScan()` - Proses scan container
- `processBoxScan()` - Proses scan box
- `getHistory()` - Ambil data history dengan filter
- `saveSettings()` - Simpan pengaturan sistem
- `exportHistory()` - Export data history

## Teknologi yang Digunakan

### Frontend
- **Tailwind CSS** - Framework CSS utility-first
- **Font Awesome** - Icon library
- **JavaScript ES6+** - Interaktivitas dan AJAX
- **Responsive Design** - Mobile-first approach

### Backend
- **Laravel 10** - PHP framework
- **MySQL/PostgreSQL** - Database
- **RESTful API** - Endpoint untuk operasi AJAX

### Fitur UI/UX
- **Real-time Clock** - Update setiap detik
- **Toast Notifications** - Feedback untuk user actions
- **Responsive Grid** - Layout yang adaptif
- **Hover Effects** - Interaksi visual
- **Status Indicators** - Color-coded status
- **Pagination** - Navigasi data yang efisien

## Cara Penggunaan

### 1. Akses Sistem
- Buka browser dan navigasi ke `/store`
- Halaman utama akan menampilkan menu dan statistik

### 2. Posting F/G
- Klik "Dashboard" atau navigasi ke `/store/dashboard`
- Input Part No., Rack, dan Scan data
- Gunakan tombol "Scan Rack" untuk memproses

### 3. Scan Container/Box
- Pilih "Scan Container" atau "Scan Box"
- Input informasi container/box
- Gunakan scanner atau input manual barcode
- Monitor status real-time

### 4. View History
- Klik "History" untuk melihat riwayat operasi
- Gunakan filter untuk mencari data spesifik
- Export data jika diperlukan

### 5. Configure Settings
- Akses "Settings" untuk konfigurasi sistem
- Pilih tab yang sesuai (General, Scanning, Notifications, Users)
- Simpan perubahan

## Development Notes

### Dependencies
- Laravel 10+
- PHP 8.1+
- MySQL 8.0+ atau PostgreSQL 13+
- Node.js (untuk asset compilation)

### Installation
1. Clone repository
2. Install dependencies: `composer install`
3. Setup environment: `cp .env.example .env`
4. Generate key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Start server: `php artisan serve`

### Customization
- **Colors**: Update CSS variables di `resources/css/app.css`
- **Layout**: Modify `resources/views/layouts/app.blade.php`
- **Icons**: Replace Font Awesome icons sesuai kebutuhan
- **Validation**: Update validation rules di StoreController

## Future Enhancements

### Planned Features
- **Barcode Generation** - Generate QR/barcode untuk items
- **Mobile App** - Native mobile application
- **Real-time Sync** - WebSocket untuk update real-time
- **Advanced Analytics** - Dashboard analytics yang lebih detail
- **Multi-language** - Support bahasa Indonesia dan Inggris
- **API Documentation** - Swagger/OpenAPI documentation

### Technical Improvements
- **Caching** - Redis untuk performance
- **Queue System** - Background job processing
- **Testing** - Unit dan integration tests
- **Logging** - Advanced logging system
- **Security** - Role-based access control (RBAC)

## Support & Maintenance

### Contact
- **Developer**: [Nama Developer]
- **Email**: [email@company.com]
- **Documentation**: [Link ke dokumentasi]

### Maintenance Schedule
- **Daily**: Backup database
- **Weekly**: Log rotation
- **Monthly**: System updates
- **Quarterly**: Security audit

---

**Version**: 1.0.0  
**Last Updated**: July 2025  
**Status**: Development/Testing
