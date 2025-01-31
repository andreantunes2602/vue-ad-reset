import axios from "axios";

const instance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',
  timeout: 10000
});;

const token = localStorage.getItem('token');

if (token){
  instance.defaults.headers['Authorization'] = `Bearer ${token}`;
}

export default instance;
