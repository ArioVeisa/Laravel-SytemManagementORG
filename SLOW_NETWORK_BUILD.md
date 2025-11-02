# 🐌 Build APK dengan Koneksi Lambat

## Problem
- Koneksi internet lambat/timeout
- EAS CLI install failed
- Gradle download failed

## ✅ Solution: Build Development APK via Expo

**Cara termudah & paling cepat:**

```bash
cd MobileVersion

# Build APK development version
npx expo build:android -t apk
```

Atau jika sudah ada config:

```bash
# Generate APK
npx expo export:embed

# Atau langsung run ke device
npx expo run:android
```

## Alternative: Manual APK tanpa Gradle

### Step 1: Download Gradle Manual

```bash
# Download Gradle distribution
cd ~/Downloads
wget https://services.gradle.org/distributions/gradle-8.14.3-bin.zip

# Extract
unzip gradle-8.14.3-bin.zip

# Copy ke cache
mkdir -p ~/.gradle/wrapper/dists/gradle-8.14.3-bin
cp gradle-8.14.3-bin.zip ~/.gradle/wrapper/dists/gradle-8.14.3-bin/

# Try build again
cd /home/xrey/Documents/Laravel-SytemManagementORG/MobileVersion/android
./gradlew assembleRelease
```

### Step 2: Or Use Cached Gradle

```bash
# Check if Gradle already cached
ls -la ~/.gradle/wrapper/dists/

# If exists, just retry
cd MobileVersion/android
./gradlew assembleRelease
```

## Quick Alternative: React Native CLI

```bash
cd MobileVersion

# Use React Native CLI
npm install -g react-native-cli

# Build APK
react-native build-android --mode=release
```

## Best Solution: Use Better Network

1. **Switch to faster network** (mobile hotspot, different WiFi)
2. **Use offline cache** (see manual Gradle download)
3. **Build on cloud** (but EAS CLI already failed)
4. **Wait for connection** (try during off-peak hours)

## Development Build (No APK Needed)

If you just want to test:

```bash
cd MobileVersion

# Run on connected device
npx expo run:android

# Or generate APK later when network is better
```

---

**Recommendation:** Try `npx expo build:android -t apk` first! 🚀

