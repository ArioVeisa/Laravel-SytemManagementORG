# 🔧 FIX Network Error - Langkah Cepat

## ⚠️ Error: "Network Error"

**Penyebab:** Backend Laravel API belum berjalan!

## ✅ Solusi (2 Langkah)

### 1. Jalankan Backend API

Buka **Terminal baru** dan jalankan:

```bash
cd WebVersion
php artisan serve --host=0.0.0.0 --port=8000
```

**PENTING:** 
- Harus pakai `--host=0.0.0.0` (bukan `localhost`)
- Biarkan terminal ini tetap terbuka

Anda akan lihat:
```
INFO  Server running on [http://0.0.0.0:8000]
```

### 2. Reload Mobile App

Di Expo Go:
- Tekan **r** untuk reload
- Atau shake device > Reload

Atau restart Expo:
```bash
cd MobileVersion
npx expo start
```

## 🧪 Test

1. Klik **Login** di mobile app
2. Masukkan:
   - Email: admin@mail.com
   - Password: password
3. Seharusnya masuk ke Welcome Screen! 🎉

## ❌ Masih Error?

### Checklist:

- [ ] Backend running dengan `--host=0.0.0.0`?
- [ ] Port 8000 tidak dipakai aplikasi lain?
- [ ] Device dan komputer di WiFi yang sama?
- [ ] IP di `MobileVersion/src/config/api.js` benar?

### Test API di Browser

Buka browser dan kunjungi:
```
http://10.148.56.32:8000/api/v1/login
```

Harusnya dapat error (karena tidak POST), berarti backend running.

### Test dengan curl

```bash
curl -X POST http://10.148.56.32:8000/api/v1/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@mail.com","password":"password"}'
```

Harusnya dapat response JSON dengan `access_token`.

## 📱 Update IP

Jika IP komputer berbeda, ganti di:
```
MobileVersion/src/config/api.js
```

```javascript
const API_BASE_URL = 'http://YOUR_IP:8000/api/v1';
```

Cek IP:
- Linux: `hostname -I`
- Mac: `ipconfig getifaddr en0`  
- Windows: `ipconfig` (cari IPv4)

## 🎯 TL;DR

```bash
# Terminal 1
cd WebVersion
php artisan serve --host=0.0.0.0 --port=8000

# Terminal 2  
cd MobileVersion
npx expo start

# Scan QR & Login
```

---

**Itu dia!** 🚀

