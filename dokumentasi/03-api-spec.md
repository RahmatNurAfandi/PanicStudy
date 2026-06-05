# API Specification

> Dokumentasikan setiap endpoint yang dikembangkan maupun yang dikonsumsi dari layanan eksternal.
> Salin dan ulangi blok di bawah untuk setiap endpoint tambahan.

---

## Login User

**Method:** `POST`

**URL:** `/api/v1/auth/login`

**Deskripsi:** Melakukan autentikasi pengguna dan menghasilkan token akses.

**Autentikasi Diperlukan:** `Tidak`

**Sumber:** `Internal System`

**Request Headers:**

```
Content-Type: application/json
```

**Request Body:**

```json
{
  "email": "user@email.com",
  "password": "password123"
}
```

**Response Sukses (`200 OK`):**

```json
{
  "status": "success",
  "token": "jwt_token",
  "user": {
    "id": 1,
    "name": "Mahasiswa"
  }
}
```

**Response Gagal:**

```json
{
  "status": "error",
  "message": "Email atau password salah"
}
```

---

## Get Dashboard

**Method:** `GET`

**URL:** `/api/v1/dashboard`

**Deskripsi:** Mengambil ringkasan aktivitas pengguna seperti jumlah tugas aktif, tugas selesai, dan jadwal hari ini.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**

```
Authorization: Bearer <token>
```

**Response Sukses (`200 OK`):**

```json
{
  "status": "success",
  "data": {
    "active_tasks": 5,
    "completed_tasks": 12,
    "today_schedule": 3
  }
}
```

**Response Gagal:**

```json
{
  "status": "error",
  "message": "Unauthorized"
}
```

---

## Create Study Plan

**Method:** `POST`

**URL:** `/api/v1/study-plans`

**Deskripsi:** Menambahkan rencana belajar baru beserta target dan deadline.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Body:**

```json
{
  "title": "Belajar Basis Data",
  "deadline": "2026-06-15",
  "priority": "high"
}
```

**Response Sukses (`201 Created`):**

```json
{
  "status": "success",
  "message": "Study plan berhasil dibuat"
}
```

**Response Gagal:**

```json
{
  "status": "error",
  "message": "Data tidak valid"
}
```

---

## Get Tasks

**Method:** `GET`

**URL:** `/api/v1/tasks`

**Deskripsi:** Menampilkan daftar tugas yang dimiliki pengguna.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Response Sukses (`200 OK`):**

```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "title": "Tugas Pemrograman Web",
      "deadline": "2026-06-20",
      "status": "pending"
    }
  ]
}
```

**Response Gagal:**

```json
{
  "status": "error",
  "message": "Unauthorized"
}
```

---

## Get National Holidays

**Method:** `GET`

**URL:** `/api/v1/holidays`

**Deskripsi:** Mengambil daftar hari libur nasional untuk membantu penyusunan jadwal belajar.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Third-Party API — Calendarific`

**Request Headers:**

```
Authorization: Bearer <token>
```

**Response Sukses (`200 OK`):**

```json
{
  "status": "success",
  "data": [
    {
      "date": "2026-08-17",
      "holiday": "Hari Kemerdekaan Indonesia"
    }
  ]
}
```

**Response Gagal:**

```json
{
  "status": "error",
  "message": "Failed to fetch holiday data"
}
```