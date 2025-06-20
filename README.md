# 🧑‍🎓 Tutorial Frontend Laravel + AdminLTE (CRUD API Mahasiswa & Dosen)

Proyek ini merupakan implementasi **Frontend Laravel** dengan integrasi **AdminLTE** dan komunikasi ke backend **CodeIgniter REST API** untuk entitas **Mahasiswa** dan **Dosen**.

## 🧱 Teknologi yang Digunakan

- Laravel 10
- Bootstrap 4 (via AdminLTE)
- AdminLTE Template
- Axios (untuk konsumsi API)
- CodeIgniter (REST API backend)

---

## 📦 Instalasi & Setup

### 1. Clone Repository
```bash
git clone https://github.com/USERNAME/tugas_frontend.git
cd tugas_frontend
````

### 2. Install Dependency Laravel

```bash
composer install
npm install
```

### 3. Copy File Environment & Generate Key

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Set `.env` untuk Non-Database App

Kita hanya menggunakan API, jadi tidak perlu database lokal:

```dotenv
APP_NAME=Laravel
APP_URL=http://localhost:8000
SESSION_DRIVER=file
```

> **Tidak perlu konfigurasi DB karena semua data berasal dari API CodeIgniter.**

---

## 🧪 Jalankan Aplikasi

```bash
php artisan serve
```

Akses: [http://localhost:8000](http://localhost:8000)

---

## 🎨 Instalasi AdminLTE

```bash
composer require jeroennoten/laravel-adminlte
php artisan adminlte:install
```

> Paket ini akan mengatur layout dashboard AdminLTE secara otomatis.

---

## ⚙️ Struktur Menu & Navigasi

Tambahkan link menu Mahasiswa & Dosen di file `config/adminlte.php`:

```php
'menu' => [
    ['header' => 'MASTER DATA'],
    [
        'text' => 'Mahasiswa',
        'url'  => '/mahasiswa',
        'icon' => 'fas fa-user-graduate',
    ],
    [
        'text' => 'Dosen',
        'url'  => '/dosen',
        'icon' => 'fas fa-chalkboard-teacher',
    ],
],
```

---

## 📁 Routing

Di `routes/web.php`:

```php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;

Route::get('/', fn () => view('home'));

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('dosen', DosenController::class);
```

---

## 🧑‍💻 Controller

### Generate Controller:

```bash
php artisan make:controller MahasiswaController
php artisan make:controller DosenController
```

### Contoh `MahasiswaController.php`

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    protected $endpoint = 'http://localhost:8080/mahasiswa';

    public function index()
    {
        $response = Http::get($this->endpoint);
        $mahasiswa = $response->json();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        Http::post($this->endpoint, $request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function edit($id)
    {
        $data = Http::get("{$this->endpoint}/{$id}")->json();
        return view('mahasiswa.edit', ['mahasiswa' => $data]);
    }

    public function update(Request $request, $id)
    {
        Http::put("{$this->endpoint}/{$id}", $request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function destroy($id)
    {
        Http::delete("{$this->endpoint}/{$id}");
        return redirect()->route('mahasiswa.index');
    }
}
```

> Lakukan hal yang sama untuk `DosenController` dengan menyesuaikan endpoint.

---

## 🧾 View (Blade)

### 1. `resources/views/mahasiswa/index.blade.php`

```blade
@extends('adminlte::page')

@section('content')
    <h3>Data Mahasiswa</h3>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-2">Tambah Mahasiswa</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs['nim'] }}</td>
                    <td>{{ $mhs['nama'] }}</td>
                    <td>{{ $mhs['email'] }}</td>
                    <td>{{ $mhs['prodi'] }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mhs['nim']) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mhs['nim']) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
```

### 2. `create.blade.php` dan `edit.blade.php`

Buat file formulir input mahasiswa di folder `resources/views/mahasiswa`.

---

## ✅ Status CRUD

| Fitur     | Status |
| --------- | ------ |
| Tampilkan | ✅      |
| Tambah    | ✅      |
| Edit      | ✅      |
| Hapus     | ✅      |

---

## 🧠 Tips

* Jika error `could not find driver`, pastikan `ext-curl` dan `ext-pdo` aktif di `php.ini`.
* Backend harus dalam keadaan **running**: `php spark serve`.

---

## ☁️ Deployment

```bash
git init
git remote add origin https://github.com/username/repo.git
git add .
git commit -m "Initial commit"
git push -u origin main
```

---

## 🧾 Lisensi

Proyek ini dibuat untuk keperluan pembelajaran pribadi. Silakan modifikasi sesuai kebutuhanmu.

---
