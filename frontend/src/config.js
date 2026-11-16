const getApiUrl = () => {
  if (import.meta.env.VITE_API_BASE_URL) {
    return import.meta.env.VITE_API_BASE_URL;
  }
  if (typeof window !== 'undefined') {
    const origin = window.location.origin;
    if (origin.includes('localhost') || origin.includes('127.0.0.1')) {
      return 'http://localhost:8000';
    }
    // Never guess an API host from the page address: a guessed host could be
    // one we don't own. Fall back to the known production API instead.
    return 'https://enterprise-it-pub8.onrender.com';
  }
  return 'http://localhost:8000';
};

export const API_BASE_URL = getApiUrl();
