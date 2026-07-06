const getApiUrl = () => {
  if (import.meta.env.VITE_API_BASE_URL) {
    return import.meta.env.VITE_API_BASE_URL;
  }
  if (typeof window !== 'undefined') {
    const origin = window.location.origin;
    if (origin.includes('localhost') || origin.includes('127.0.0.1')) {
      return 'http://localhost:8000';
    }
    // Automatically point to the api subdomain (e.g., https://example.com -> https://api.example.com)
    return origin.replace('://', '://api.');
  }
  return 'http://localhost:8000';
};

export const API_BASE_URL = getApiUrl();
