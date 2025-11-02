# Troubleshooting Guide - BEM TEL-U Mobile App

## Common Issues and Solutions

### Issue 1: "java.lang.String cannot be cast to java.lang.Boolean"

**Cause:** SafeAreaProvider compatibility issue with Expo SDK

**Solution:**
- Removed `SafeAreaProvider` wrapper from App.js
- Using plain `NavigationContainer` only
- See commit: `a59d968`

### Issue 2: React Version Conflicts

**Cause:** Expo SDK 54 with React Native 0.81.5 requires React 19.1.0

**Solution:**
- Keep React 19.1.0 as required by React Native
- Use `--legacy-peer-deps` flag for npm install
- Disabled `newArchEnabled` in app.json

### Issue 3: Android Build Errors

**Cause:** Old build artifacts or incompatible native modules

**Solution:**
```bash
cd MobileVersion
rm -rf android ios node_modules
npx expo prebuild --clean
npm install --legacy-peer-deps
npx expo start --clear
```

### Issue 4: Node Version Warning

**Warning:** Node 18.20.4 < Required 20.19.4

**Impact:** Build warnings but app still runs

**Solution (Recommended):**
- Upgrade Node.js to v20.19.4 or higher
- Or use Expo Go for development (no build needed)

## Quick Start

### Development Mode (Recommended)
```bash
cd MobileVersion
npm install --legacy-peer-deps
npx expo start
# Scan QR code with Expo Go app
```

### Production Build
```bash
# Make sure you have Node.js 20.19.4+
cd MobileVersion
npm install --legacy-peer-deps
npx expo prebuild --clean
npx expo run:android  # or run:ios
```

## Testing Without Navigation

If you still encounter errors, test with basic version:

1. Rename files:
```bash
mv App.js App-full.js
mv App-basic.js App.js
```

2. Run app:
```bash
npx expo start
```

3. If App-basic works, the issue is with React Navigation setup

4. To restore:
```bash
mv App.js App-basic.js
mv App-full.js App.js
```

## Known Working Configuration

- **Expo SDK:** 54.0.20
- **React:** 19.1.0
- **React Native:** 0.81.5
- **React Navigation:** 7.1.19
- **Android:** API 33+
- **Node:** 20.19.4+ (recommended) or 18.20.4 (with warnings)

## Contact

For more issues, check:
- Expo documentation: https://docs.expo.dev
- React Navigation docs: https://reactnavigation.org
- Project README: README.md

