import axios from 'axios';
export const apiConfig = axios.create({
  withCredentials:true,
  baseURL: 'http://localhost:8000/api/',
})