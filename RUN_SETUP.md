# 🚀 Run Setup - Backend + Ngrok + Mobile

## Step 1: Jalankan Backend Laravel

```bash
cd WebVersion
php artisan serve --host=0.0.0.0 --port=8000
```

Biarkan terminal ini terbuka!

## Step 2: Jalankan Ngrok

**Buka terminal baru:**

```bash
ngrok http 8000
```

Anda akan melihat:
```
Forwarding    https://xxxx-xxxx-xxxx.ngrok-free.app -> http://localhost:8000
```

**COPY URL HTTPS** (yang ada `ngrok-free.app` atau `.ngrok.app`)

## Step 3: Update API URL di Mobile

Edit `MobileVersion/src/config/api.js`:

```javascript
const API_BASE_URL = 'https://xxxx-xxxx-xxxx.ngrok-free.app/api/v1';
```

**Ganti `xxxx-xxxx-xxxx` dengan URL ngrok kamu!**

## Step 4: Restart Mobile App

```bash
cd MobileVersion
npx expo start
# Tekan 'r' untuk reload
```

## ✅ Test

1. Buka Expo Go
2. Scan QR code
3. Login dengan: admin@mail.com / password
4. Harusnya berhasil!

## 🔥 Troubleshooting

**404 Error?**
- ✅ Backend running? Check terminal 1
- ✅ Ngrok running? Check terminal 2
- ✅ API URL sudah benar di `api.js`?

**Ngrok Warning?**
- ✅ Header sudah ditambahkan di `authService.js`
- ✅ Skip browser warning enabled

**Still 404?**
- Test di browser: `https://xxxx.ngrok-free.app/api/v1/login`
- Harusnya dapat JSON response (not HTML)

---

**TL;DR: Backend + Ngrok + Update api.js = Success!** 🎉

