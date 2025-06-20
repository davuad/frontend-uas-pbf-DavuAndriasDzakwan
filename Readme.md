# 🏥 Sistem Rumah Sakit

Proyek ini adalah aplikasi CRUD data pasien dan obat berbasis web yang dibangun menggunakan:

- **Frontend:** Laravel (Blade)
- **Backend:** CodeIgniter 4 (RESTful API)

## Instalasi
1. Download Laravel (gunakan terminal)
> Karna ini menggunakan template frontend dari github pak abdau, maka gunakan:

``` git clone https://github.com/abdau88/tugas_frontend ```

> Bisa juga download langsung menggunakan composer

``` composer create-project "laravel/laravel:^11.0" frontend-uas-230102077 ```

> Setelah selesai clone, rename project menjadi frontend-uas-230102077

2. Konfigurasi Laravel
> Buka kembali terminal, jangan lupa masuk ke projek dengan
``` cd frontend-uas-230102077 ```
> lakukan konfigurasi untuk Install Dependency Laravel
```
cp .env.example .env
php artisan key:generate
```
>  Instalasi AdminLTE
'''
composer require jeroennoten/laravel-adminlte
php artisan adminlte:install
'''
> Struktur Menu & Navigasi
Tambahkan link menu Obat & Pasien di file `config/adminlte.php`:
```
'menu' => [
    ['header' => 'MASTER DATA'],
    [
        'text' => 'Obat',
        'url'  => '/obat',
        'icon' => 'fas fa-user-graduate',
    ],
    [
        'text' => 'Pasien',
        'url'  => '/pasien',
        'icon' => 'fas fa-chalkboard-teacher',
    ],
],
```
3. Jalankan Projek

``` php artisan migrate ```

> Untuk menuju menu Obat, akses link berikut

``` http://localhost:8080/obat ```

> Untuk menuju menu Pasien, akses link berikut

``` http://localhost:8080/pasien ```




