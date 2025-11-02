# Fix: EAS CLI Permission Error

## Problem
```
Error: EACCES: permission denied, mkdir '/usr/local/lib/node_modules/eas-cli'
```

## Solution

### Option 1: Install with sudo (Quick Fix)

```bash
sudo npm install -g eas-cli
```

### Option 2: Install Locally (Recommended - No Root)

```bash
cd MobileVersion

# Install EAS CLI locally (no global install needed)
npx eas-cli login
npx eas-cli build:configure
npx eas-cli build -p android
```

### Option 3: Fix npm Permissions (Permanent Fix)

```bash
# Create directory for global packages
mkdir ~/.npm-global

# Configure npm to use new directory
npm config set prefix '~/.npm-global'

# Add to PATH (add to ~/.bashrc or ~/.zshrc)
export PATH=~/.npm-global/bin:$PATH

# Reload shell
source ~/.bashrc  # or source ~/.zshrc

# Now install without sudo
npm install -g eas-cli
```

## Quick Build (No EAS CLI)

If you don't want to use EAS, use **Method 2: Manual Build**:

```bash
cd MobileVersion

# Prebuild
npx expo prebuild --clean

# Build APK
cd android
./gradlew assembleRelease

# APK di: android/app/build/outputs/apk/release/app-release.apk
```

---

**Recommendation:** Use **Option 2** or **Manual Build** - no permission issues! 🎉

