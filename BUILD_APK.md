# 🚀 Cara Build APK Android

## Prerequisites

1. ✅ Backend running dengan ngrok
2. ✅ Node.js terinstall
3. ✅ Expo CLI terinstall

## Step 1: Jalankan Backend + Ngrok

```bash
# Terminal 1 - Start Laravel
cd WebVersion
php artisan serve --host=0.0.0.0 --port=8000

# Terminal 2 - Start Ngrok (ganti dengan ngrok token kamu)
ngrok http 8000
```

Copy ngrok HTTPS URL (misal: `https://xxxx-xx-xxx-xxx.ngrok-free.app`)

## Step 2: Update API URL di Mobile App

Edit `MobileVersion/src/config/api.js`:
```javascript
const API_BASE_URL = 'https://xxxx-xx-xxx-xxx.ngrok-free.app/api/v1';
```

## Step 3: Build APK dengan EAS Build

```bash
cd MobileVersion

# Install EAS CLI (first time only)
npm install -g eas-cli

# Login ke Expo account
eas login

# Configure build
eas build:configure

# Build APK (local)
eas build -p android --local

# Atau build di cloud (gratis untuk free tier)
eas build -p android
```

**APK akan tersimpan di:** `MobileVersion/build-*.apk`

## Step 4: Install APK ke Device

```bash
# Via ADB
adb install MobileVersion/build-*.apk

# Atau copy manual ke device dan install
```

## Alternative: Build Manual (Expo Classic)

```bash
cd MobileVersion

# Prebuild (generate native folders)
npx expo prebuild --clean

# Build APK with Gradle
cd android
./gradlew assembleRelease

# APK di: android/app/build/outputs/apk/release/app-release.apk
```

## Troubleshooting

### Build Error?
```bash
cd MobileVersion
rm -rf android ios node_modules
npx expo prebuild --clean
eas build -p android --local
```

### ngrok Warning?
Already handled di `authService.js` dengan header `ngrok-skip-browser-warning`

### Port Conflict?
```bash
# Check port 8000
lsof -i :8000
kill -9 <PID>
```

## Production Build Checklist

- [ ] Backend stable & deployed
- [ ] Ngrok running atau production URL
- [ ] API URL updated di `api.js`
- [ ] Version updated di `app.json`
- [ ] Test login berhasil
- [ ] Build APK successful
- [ ] APK tested di device

---

**Happy Building! 🎉**

