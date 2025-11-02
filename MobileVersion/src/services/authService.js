import axios from 'axios';
import AsyncStorage from '@react-native-async-storage/async-storage';
import API_BASE_URL from '../config/api';

const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
});

// Interceptor untuk menambahkan token ke setiap request
api.interceptors.request.use(
  async (config) => {
    const token = await AsyncStorage.getItem('access_token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export const authService = {
  login: async (email, password) => {
    try {
      const response = await api.post('/login', { email, password });
      if (response.data.success) {
        // Simpan token dan user info ke AsyncStorage
        await AsyncStorage.setItem('access_token', response.data.access_token);
        await AsyncStorage.setItem('user', JSON.stringify(response.data.user));
        return response.data;
      }
      throw new Error('Login failed');
    } catch (error) {
      throw error;
    }
  },

  logout: async () => {
    try {
      await api.post('/logout');
      await AsyncStorage.removeItem('access_token');
      await AsyncStorage.removeItem('user');
    } catch (error) {
      // Hapus storage meskipun ada error
      await AsyncStorage.removeItem('access_token');
      await AsyncStorage.removeItem('user');
    }
  },

  getMe: async () => {
    try {
      const response = await api.get('/me');
      return response.data;
    } catch (error) {
      throw error;
    }
  },

  isLoggedIn: async () => {
    try {
      const token = await AsyncStorage.getItem('access_token');
      return !!token;
    } catch (error) {
      return false;
    }
  },

  getUser: async () => {
    try {
      const userStr = await AsyncStorage.getItem('user');
      return userStr ? JSON.parse(userStr) : null;
    } catch (error) {
      return null;
    }
  },
};

export default api;

