# Setup API untuk Mobile App

## ⚠️ Network Error?

Jika terjadi Network Error, ikuti langkah berikut:

### 1. Pastikan Backend API Berjalan

```bash
# Terminal 1 - Jalankan backend
cd WebVersion
php artisan serve --host=0.0.0.0 --port=8000
```

**Penting:** Gunakan `--host=0.0.0.0` agar bisa diakses dari device!

### 2. Set IP Address di Mobile App

Edit `MobileVersion/src/config/api.js`:

```javascript
// Linux
const API_BASE_URL = 'http://10.148.56.32:8000/api/v1'; // Ganti dengan IP Anda

// Android Emulator
const API_BASE_URL = 'http://10.0.2.2:8000/api/v1';

// iOS Simulator / Physical Device
const API_BASE_URL = 'http://192.168.1.X:8000/api/v1'; // Ganti dengan IP komputer
```

### 3. Cara Mendapatkan IP

**Linux:**
```bash
hostname -I
```

**Mac:**
```bash
ipconfig getifaddr en0
```

**Windows:**
```cmd
ipconfig
# Cari "IPv4 Address" di bagian Ethernet atau WiFi
```

### 4. Test API di Browser/Postman

Buka browser atau Postman dan test:
```
POST http://YOUR_IP:8000/api/v1/login
Content-Type: application/json

{
  "email": "admin@mail.com",
  "password": "password"
}
```

Jika berhasil, Anda akan mendapat:
```json
{
  "success": true,
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGc...",
  "token_type": "bearer",
  "expires_in": 3600,
  "user": {
    "id": 1,
    "name": "Super Admin",
    "email": "admin@mail.com",
    "ministry_id": null,
    "roles": ["Super Admin"]
  }
}
```

### 5. Firewall

Pastikan firewall tidak memblokir port 8000:

**Linux:**
```bash
sudo ufw allow 8000
```

**Mac/Windows:** 
Buka System Preferences > Firewall > Allow Laravel

### 6. Testing Mobile App

```bash
cd MobileVersion
npx expo start
# Scan QR dengan Expo Go
```

**Tip:** Jika masih error, cek console log di Expo untuk melihat error detailnya.

## Troubleshooting

### Error: "Network Error"
- ✅ Pastikan backend berjalan dengan `--host=0.0.2.0`
- ✅ Pastikan IP di `api.js` benar
- ✅ Pastikan device/emulator dan komputer di WiFi yang sama
- ✅ Test di browser/postman dulu

### Error: "401 Unauthorized"
- ✅ Pastikan email/password benar (admin@mail.com / password)
- ✅ Jalankan seeder: `php artisan db:seed`

### Error: "500 Internal Server Error"
- ✅ Jalankan `php artisan jwt:secret`
- ✅ Check Laravel log: `tail -f storage/logs/laravel.log`

## Kredensial Default

- **Email:** admin@mail.com
- **Password:** password

