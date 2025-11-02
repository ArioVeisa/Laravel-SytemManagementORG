# 🚀 Build APK Android

## Prerequisites

1. ✅ Backend + Ngrok running
2. ✅ Node.js terinstall
3. ✅ Expo CLI terinstall

## Method 1: EAS Build (Recommended - Paling Mudah)

### Install EAS CLI

```bash
npm install -g eas-cli
eas login
```

### Configure Project

```bash
cd MobileVersion
eas build:configure
```

Pilih:
- **Platform:** Android
- **Build type:** APK

### Build APK

```bash
# Build di cloud (Recommended - gratis untuk free tier)
eas build -p android

# Atau build lokal
eas build -p android --local
```

**APK akan muncul di:**
- Cloud build: Download dari Expo dashboard
- Local build: `MobileVersion/build-*.apk`

## Method 2: Manual Build (Alternative)

### Step 1: Prebuild Native Code

```bash
cd MobileVersion

# Clean previous builds
rm -rf android ios

# Generate native folders
npx expo prebuild --clean
```

### Step 2: Build APK

```bash
cd android

# Build APK
./gradlew assembleRelease

# APK di: android/app/build/outputs/apk/release/app-release.apk
```

### Step 3: Install

```bash
# Via ADB
adb install android/app/build/outputs/apk/release/app-release.apk

# Atau copy manual ke device
```

## Method 3: Development Build (For Testing)

```bash
cd MobileVersion

# Generate APK untuk development
npx expo run:android --variant release

# APK di: android/app/build/outputs/apk/release/
```

## Troubleshooting

### Build Error: "No such file or directory: android"

```bash
cd MobileVersion
npx expo prebuild --clean
```

### Build Error: "Failed to fetch"

```bash
# Use local build
eas build -p android --local

# Or check internet connection
```

### Gradle Error

```bash
cd MobileVersion/android
./gradlew clean
./gradlew assembleRelease
```

### JDK Not Found

```bash
# Install JDK 17
sudo apt install openjdk-17-jdk

# Set JAVA_HOME
export JAVA_HOME=/usr/lib/jvm/java-17-openjdk-amd64
```

## Quick Start (EAS Build)

```bash
cd MobileVersion

# First time setup
npm install -g eas-cli
eas login
eas build:configure

# Build
eas build -p android

# Download APK dari dashboard
```

## Production Checklist

- [ ] Backend stable & deployed
- [ ] Ngrok running atau production URL
- [ ] API URL correct di `api.js`
- [ ] Test login berhasil di Expo Go
- [ ] Version updated di `app.json`
- [ ] Icon & splash screen updated
- [ ] Build APK successful
- [ ] APK tested di device

---

**Recommended: Pakai EAS Build (Method 1) - paling mudah & reliable!** 🎉

