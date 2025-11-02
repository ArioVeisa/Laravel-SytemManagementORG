# ⚡ Quick Build APK

## 1. Start Backend + Ngrok

```bash
# Terminal 1
cd WebVersion
php artisan serve --host=0.0.0.0 --port=8000

# Terminal 2
ngrok http 8000
# Copy HTTPS URL (misal: https://abc-123.ngrok-free.app)
```

## 2. Update API URL (SUDAH DONE!)

API sudah di-set ke ngrok di `MobileVersion/src/config/api.js`

## 3. Build APK

**Opsi A - EAS Build (Recommended):**
```bash
cd MobileVersion

# First time
npm install -g eas-cli
eas login
eas build:configure

# Build
eas build -p android
```

**Opsi B - Manual Build:**
```bash
cd MobileVersion

# Generate native code
npx expo prebuild --clean

# Build
cd android
./gradlew assembleRelease

# APK di: android/app/build/outputs/apk/release/app-release.apk
```

## 4. Install

```bash
# Via ADB
adb install <path-to-apk>

# Atau copy manual ke device
```

---

**Note:** Baca `BUILD_APK.md` untuk detail lengkap!

