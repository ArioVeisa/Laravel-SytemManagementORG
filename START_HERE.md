# 🎯 START HERE - Cara Pakai Mobile App

## ✅ Yang Sudah Diperbaiki

1. ✅ **Placeholder email/password** sekarang warna abu-abu (bisa keliatan!)
2. ✅ **IP API** sudah di-set ke **10.148.56.32:8000**
3. ✅ **Network Error** diperbaiki dengan setting IP yang benar
4. ✅ **Semua dependency** compatible dengan Expo SDK 54

## 🚀 Cara Menjalankan (2 Terminal)

### Terminal 1 - Backend API

```bash
cd WebVersion
php artisan serve --host=0.0.0.0 --port=8000
```

**⚠️ PENTING:** Harus pakai `--host=0.0.0.0` biar device bisa akses!

### Terminal 2 - Mobile App

```bash
cd MobileVersion
npx expo start
```

Lalu scan QR code dengan **Expo Go** di Android/iOS.

## 🔐 Login

- **Email:** admin@mail.com
- **Password:** password

## ❌ Jika Masih Network Error

**👉 Baca [FIX_NETWORK_ERROR.md](FIX_NETWORK_ERROR.md) untuk solusi lengkap!**

### Checklist:

1. ✅ Backend running dengan `--host=0.0.0.0`?
2. ✅ Device & komputer di WiFi yang sama?
3. ✅ IP di `MobileVersion/src/config/api.js` sudah benar?

### Test API Manual (Browser/Postman)

```
POST http://10.148.56.32:8000/api/v1/login
Content-Type: application/json

{
  "email": "admin@mail.com",
  "password": "password"
}
```

Harusnya dapat response:
```json
{
  "success": true,
  "access_token": "eyJ0eXAi...",
  "user": { "name": "Super Admin", ... }
}
```

## 📱 Update IP Address

Jika IP komputer kamu berbeda:

```bash
# Cek IP kamu
hostname -I  # Linux
ipconfig getifaddr en0  # Mac
ipconfig  # Windows (cari IPv4 Address)
```

Edit: `MobileVersion/src/config/api.js`
```javascript
const API_BASE_URL = 'http://YOUR_IP:8000/api/v1';
```

## 📂 File Penting

- `MobileVersion/QUICK_START.md` - Panduan lengkap
- `MobileVersion/SETUP_API.md` - Setup API detail
- `MobileVersion/FIXES_APPLIED.md` - Yang sudah diperbaiki
- `MobileVersion/TROUBLESHOOTING.md` - Troubleshooting guide

## 🆘 Masih Error?

1. Baca error message di console Expo
2. Check log Laravel: `tail -f WebVersion/storage/logs/laravel.log`
3. Test API manual dulu di browser/postman
4. Pastikan firewall tidak blokir port 8000

---

**Happy Coding! 🚀**

