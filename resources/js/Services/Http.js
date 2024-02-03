import axios from "axios";

const baseUrl = import.meta.env.VITE_APP_URL || 'https://your-prod.url.com';

const httpRequest = axios.create({
  baseURL: baseUrl,
  timeout: 5000, 
});

httpRequest.interceptors.response.use(
  (response) => {
    // Log the response details or perform other actions when the response is received
    console.log('Received response:', response);
    return response;
  },
  (error) => {
    // Handle response error
    console.error('Response error:', error);
    return Promise.reject(error);
  }
);

export default httpRequest;