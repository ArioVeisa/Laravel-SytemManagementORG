# 🚀 Quick Start - Mobile App

## Yang Sudah Diperbaiki ✅

1. ✅ Placeholder email/password sekarang **WARNA ABU-ABU** (bisa dilihat!)
2. ✅ IP API sudah di-update ke **10.148.56.32:8000**
3. ✅ Error "Cannot read property" sudah fixed
4. ✅ All dependencies compatible dengan Expo SDK 54

## Cara Menjalankan

### Step 1: Jalankan Backend API

**Terminal 1:**
```bash
cd WebVersion
php artisan serve --host=0.0.0.0 --port=8000
```

**⚠️ PENTING:** Harus pakai `--host=0.0.0.0` biar bisa diakses dari device!

### Step 2: Jalankan Mobile App

**Terminal 2:**
```bash
cd MobileVersion
npm install --legacy-peer-deps  # Kalo belum install
npx expo start
```

### Step 3: Test di Device

1. Buka **Expo Go** di Android/iOS
2. Scan QR code yang muncul di terminal
3. App akan load...

### Step 4: Login

Gunakan:
- **Email:** admin@mail.com
- **Password:** password

## Jika Masih Network Error

### Checklist:

1. ✅ Backend berjalan dengan `--host=0.0.0.0`?
2. ✅ Port 8000 tidak dipakai aplikasi lain?
3. ✅ Device dan komputer di WiFi yang sama?
4. ✅ IP di `src/config/api.js` sudah benar?

### Test API Manual

Buka browser atau Postman:
```
POST http://10.148.56.32:8000/api/v1/login
```

Header:
```
Content-Type: application/json
```

Body:
```json
{
  "email": "admin@mail.com",
  "password": "password"
}
```

Harusnya dapat response:
```json
{
  "success": true,
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGc...",
  "user": { ... }
}
```

Jika dapat ini, berarti API OK. Masalahnya di network mobile app.

## Update IP Address

Jika IP komputer kamu berbeda, edit:
```
MobileVersion/src/config/api.js
```

Ganti baris:
```javascript
const API_BASE_URL = 'http://10.148.56.32:8000/api/v1';
```

Dengan IP kamu:
```bash
# Linux
hostname -I

# Mac  
ipconfig getifaddr en0

# Windows
ipconfig
```

## Android Emulator

Jika pakai Android Emulator, gunakan IP khusus:
```javascript
const API_BASE_URL = 'http://10.0.2.2:8000/api/v1';
```

## iOS Simulator / Physical Device

Gunakan IP komputer sebenarnya (bukan localhost):
```javascript
const API_BASE_URL = 'http://YOUR_IP:8000/api/v1';
```

## Need Help?

Lihat:
- `SETUP_API.md` - Setup detail
- `FIXES_APPLIED.md` - Yang sudah diperbaiki
- `TROUBLESHOOTING.md` - Troubleshooting guide

