import { PublicClientApplication } from '@azure/msal-browser';

// Microsoft Entra ID (Azure AD) app registration for the client portal.
// Values come from Vercel env at build time:
//   VITE_AZURE_TENANT_ID  — Directory (tenant) ID
//   VITE_AZURE_CLIENT_ID  — Application (client) ID
const tenantId = import.meta.env.VITE_AZURE_TENANT_ID;
const clientId = import.meta.env.VITE_AZURE_CLIENT_ID;

// True only when both IDs are present, so the UI can fail gracefully before
// the app registration env vars are wired up on Vercel.
export const msalConfigured = Boolean(tenantId && clientId);

// Single-tenant authority. The redirect URI must exactly match one registered
// on the SPA platform of the app registration (…/login on each portal domain).
export const msalInstance = new PublicClientApplication({
  auth: {
    clientId: clientId || '',
    authority: `https://login.microsoftonline.com/${tenantId || 'common'}`,
    redirectUri: `${window.location.origin}/login`,
    postLogoutRedirectUri: `${window.location.origin}/login`,
  },
  cache: {
    // sessionStorage keeps the MSAL cache scoped to the tab and cleared on close.
    cacheLocation: 'sessionStorage',
    storeAuthStateInCookie: false,
  },
});

// OIDC scopes only — the backend consumes the ID token, not an access token.
export const loginRequest = {
  scopes: ['openid', 'profile', 'email'],
  prompt: 'select_account',
};

// MSAL v3 requires initialize() to have resolved before any login call.
let initPromise = null;
export function ensureMsalReady() {
  if (!initPromise) {
    initPromise = msalInstance.initialize();
  }
  return initPromise;
}
