# 🔧 Install Android SDK untuk Build APK

## Problem

```
Failed to resolve the Android SDK path. Default install location not found: /home/xrey/Android/sdk
```

## Solution: Install Android SDK

### Method 1: Install Android Studio (Easiest)

```bash
# Download Android Studio
cd ~/Downloads
wget https://redirector.gvt1.com/edgedl/android/studio/ide-zips/2024.1.1.15/android-studio-2024.1.1.15-linux.tar.gz

# Extract
tar -xzf android-studio-*.tar.gz

# Run installer
cd android-studio/bin
./studio.sh
```

**Follow wizard:**
1. Install Android SDK
2. Install Android SDK Platform Tools
3. Agree terms

**After install:**
```bash
# Set ANDROID_HOME
export ANDROID_HOME=$HOME/Android/Sdk
export PATH=$PATH:$ANDROID_HOME/platform-tools
export PATH=$PATH:$ANDROID_HOME/tools
export PATH=$PATH:$ANDROID_HOME/tools/bin

# Add to ~/.bashrc
echo 'export ANDROID_HOME=$HOME/Android/Sdk' >> ~/.bashrc
echo 'export PATH=$PATH:$ANDROID_HOME/platform-tools' >> ~/.bashrc
echo 'export PATH=$PATH:$ANDROID_HOME/tools' >> ~/.bashrc
echo 'export PATH=$PATH:$ANDROID_HOME/tools/bin' >> ~/.bashrc

# Reload
source ~/.bashrc
```

### Method 2: Install SDK Tools Only (Lightweight)

```bash
# Install command line tools
cd ~
mkdir Android
cd Android
mkdir sdk

# Download SDK command line tools
wget https://dl.google.com/android/repository/commandlinetools-linux-11076708_latest.zip

# Extract
unzip commandlinetools-linux-*_latest.zip
mkdir -p cmdline-tools/latest
mv cmdline-tools/* cmdline-tools/latest/

# Set environment
export ANDROID_HOME=$HOME/Android/sdk
export PATH=$PATH:$ANDROID_HOME/cmdline-tools/latest/bin
export PATH=$PATH:$ANDROID_HOME/platform-tools

# Install SDK components
sdkmanager --licenses
sdkmanager "platform-tools" "platforms;android-34" "build-tools;34.0.0"

# Add to ~/.bashrc
echo 'export ANDROID_HOME=$HOME/Android/sdk' >> ~/.bashrc
echo 'export PATH=$PATH:$ANDROID_HOME/cmdline-tools/latest/bin' >> ~/.bashrc
echo 'export PATH=$PATH:$ANDROID_HOME/platform-tools' >> ~/.bashrc

source ~/.bashrc
```

### Method 3: Use Snap (Fastest)

```bash
# Install via snap
sudo snap install android-studio --classic

# Set ANDROID_HOME
export ANDROID_HOME=$HOME/snap/android-studio/current/android-studio/sdk
export PATH=$PATH:$ANDROID_HOME/platform-tools

# Add to ~/.bashrc
echo 'export ANDROID_HOME=$HOME/snap/android-studio/current/android-studio/sdk' >> ~/.bashrc
echo 'export PATH=$PATH:$ANDROID_HOME/platform-tools' >> ~/.bashrc

source ~/.bashrc
```

## Verify Installation

```bash
# Check ANDROID_HOME
echo $ANDROID_HOME

# Check adb
adb version

# List SDKs
sdkmanager --list_installed
```

## Retry Build

```bash
cd /home/xrey/Documents/Laravel-SytemManagementORG/MobileVersion
npx expo run:android --variant release
```

## If Network Still Slow

```bash
# Set proxy if needed
export HTTP_PROXY=http://proxy.example.com:8080
export HTTPS_PROXY=http://proxy.example.com:8080

# Or download SDK components manual
```

---

**Recommendation: Method 2 (Lightweight) or Method 3 (Snap) - fastest!** 🚀

