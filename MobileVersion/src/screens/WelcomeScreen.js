import React, { useEffect, useState } from 'react';
import {
  View,
  Text,
  TouchableOpacity,
  StyleSheet,
  Alert,
} from 'react-native';
import { authService } from '../services/authService';

const WelcomeScreen = ({ navigation }) => {
  const [user, setUser] = useState(null);

  useEffect(() => {
    loadUser();
  }, []);

  const loadUser = async () => {
    const userData = await authService.getUser();
    setUser(userData);
  };

  const handleLogout = async () => {
    Alert.alert(
      'Logout',
      'Yakin ingin logout?',
      [
        {
          text: 'Batal',
          style: 'cancel',
        },
        {
          text: 'Logout',
          onPress: async () => {
            await authService.logout();
            navigation.replace('Login');
          },
        },
      ]
    );
  };

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Selamat Datang!</Text>
      <Text style={styles.emoji}>👋</Text>

      {user && (
        <View style={styles.userInfo}>
          <Text style={styles.label}>Nama:</Text>
          <Text style={styles.value}>{user.name}</Text>

          <Text style={styles.label}>Email:</Text>
          <Text style={styles.value}>{user.email}</Text>

          <Text style={styles.label}>Role:</Text>
          <Text style={styles.value}>
            {user.roles && user.roles.length > 0 ? user.roles.join(', ') : 'N/A'}
          </Text>

          {user.ministry_id && (
            <>
              <Text style={styles.label}>Ministry ID:</Text>
              <Text style={styles.value}>{user.ministry_id}</Text>
            </>
          )}
        </View>
      )}

      <TouchableOpacity style={styles.logoutButton} onPress={handleLogout}>
        <Text style={styles.logoutButtonText}>Logout</Text>
      </TouchableOpacity>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#000',
    alignItems: 'center',
    justifyContent: 'center',
    padding: 20,
  },
  title: {
    fontSize: 32,
    fontWeight: 'bold',
    color: '#fff',
    marginBottom: 20,
  },
  emoji: {
    fontSize: 80,
    marginBottom: 40,
  },
  userInfo: {
    width: '100%',
    maxWidth: 400,
    backgroundColor: '#1a1a1a',
    borderRadius: 12,
    padding: 20,
    marginBottom: 30,
    borderWidth: 1,
    borderColor: '#333',
  },
  label: {
    fontSize: 14,
    color: '#888',
    marginTop: 10,
    marginBottom: 4,
    fontWeight: '600',
  },
  value: {
    fontSize: 16,
    color: '#fff',
    marginBottom: 10,
  },
  logoutButton: {
    backgroundColor: '#ff0000',
    borderRadius: 8,
    padding: 15,
    width: '100%',
    maxWidth: 400,
    alignItems: 'center',
  },
  logoutButtonText: {
    color: '#fff',
    fontSize: 18,
    fontWeight: 'bold',
  },
});

export default WelcomeScreen;

