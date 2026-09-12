<template>
  <div class="admin-login-view">
    <!-- Toast Notification -->
    <div v-if="toast.show" class="toast-notification" :class="toast.type">
      <div class="toast-line"></div>
      <div class="toast-content">
        <i v-if="toast.type === 'success'" class="ti ti-circle-check toast-icon success-icon" aria-hidden="true"></i>
        <i v-else class="ti ti-alert-triangle toast-icon error-icon" aria-hidden="true"></i>
        <span class="toast-message">{{ toast.message }}</span>
      </div>
    </div>

    <!-- Background texture and glows matching the site -->
    <div class="bg-wrap" aria-hidden="true">
      <div class="bg-grid"></div>
      <div class="bg-glow"></div>
      <div class="bg-glow2"></div>
    </div>

    <main class="page-container" role="main">
      <!-- Logo matching the corporate header -->
      <router-link to="/" class="portal-logo" aria-label="enterprise IT — return to homepage">
        <div class="logo-dot" aria-hidden="true"></div>
        <div class="logo-text"><em>enterprise</em> <strong>IT</strong></div>
        <span class="logo-badge">CMS Admin</span>
      </router-link>

      <!-- Main login card matched to site card styling -->
      <div class="login-card" role="region" aria-label="Admin authentication">
        <div class="card-eyebrow">Secure Access</div>
        <h1 class="card-title">Console Sign In</h1>
        <p class="card-sub">Authenticate using your administrator credentials to access the content management system panel.</p>

        <form v-if="!twoFactorRequired" @submit.prevent="handleAdminLogin" class="login-form">
          <!-- Email Input -->
          <div class="form-group">
            <label class="form-label" for="admin-email">Administrator Email</label>
            <div class="input-wrap">
              <i class="ti ti-mail input-icon" aria-hidden="true"></i>
              <input 
                id="admin-email"
                type="email" 
                class="form-input" 
                v-model="email" 
                placeholder="admin@enterpriseit.com.au" 
                required
              />
            </div>
          </div>

          <!-- Password Input -->
          <div class="form-group">
            <label class="form-label" for="admin-password">Password</label>
            <div class="input-wrap">
              <i class="ti ti-lock input-icon" aria-hidden="true"></i>
              <input 
                id="admin-password"
                :type="showPassword ? 'text' : 'password'" 
                class="form-input" 
                v-model="password" 
                placeholder="••••••••" 
                required
              />
              <button 
                type="button" 
                class="toggle-pass-btn" 
                @click="showPassword = !showPassword" 
                :aria-label="showPassword ? 'Hide password' : 'Show password'"
              >
                <i class="ti" :class="showPassword ? 'ti-eye-off' : 'ti-eye'" aria-hidden="true"></i>
              </button>
            </div>
          </div>

          <!-- Submit Button matching the site button styling -->
          <button type="submit" class="submit-btn" :disabled="loggingIn">
            <i v-if="loggingIn" class="ti ti-loader-2 spin-animation" aria-hidden="true"></i>
            <i v-else class="ti ti-shield-lock" aria-hidden="true"></i>
            <span>{{ loggingIn ? 'Authenticating...' : 'Sign In' }}</span>
          </button>
        </form>

        <!-- Two-factor step -->
        <form v-else @submit.prevent="handleTwoFactor" class="login-form">
          <div class="form-group">
            <label class="form-label" for="admin-2fa">Authenticator code</label>
            <div class="input-wrap">
              <i class="ti ti-shield-lock input-icon" aria-hidden="true"></i>
              <input
                id="admin-2fa"
                type="text"
                inputmode="numeric"
                autocomplete="one-time-code"
                class="form-input"
                v-model="code"
                placeholder="6-digit code"
                required
                autofocus
              />
            </div>
            <p style="font-size:12px;color:rgba(255,255,255,0.45);margin:2px 0 0;text-align:left;">
              Enter the code from your authenticator app, or a recovery code if you've lost your device.
            </p>
          </div>
          <button type="submit" class="submit-btn" :disabled="verifying">
            <i v-if="verifying" class="ti ti-loader-2 spin-animation" aria-hidden="true"></i>
            <i v-else class="ti ti-lock-check" aria-hidden="true"></i>
            <span>{{ verifying ? 'Verifying…' : 'Verify &amp; Sign In' }}</span>
          </button>
          <button type="button" class="back-link" style="background:none;border:none;cursor:pointer;margin-top:4px;" @click="cancelTwoFactor">
            Cancel
          </button>
        </form>

        <div class="card-footer">
          <p>This is a restricted administrative system. Unauthorized access attempts are logged and audited.</p>
          <router-link to="/login" class="back-link">Return to Client/Partner Portal</router-link>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { API_BASE_URL } from '../config';

const router = useRouter();

const email = ref('');
const password = ref('');
const showPassword = ref(false);
const loggingIn = ref(false);

const twoFactorRequired = ref(false);
const code = ref('');
const verifying = ref(false);

const toast = reactive({
  show: false,
  message: '',
  type: 'success'
});

const showToast = (message, type = 'success') => {
  toast.message = message;
  toast.type = type;
  toast.show = true;
  setTimeout(() => {
    toast.show = false;
  }, 4000);
};

onMounted(async () => {
  const savedUser = localStorage.getItem('auth_user');
  if (savedUser) {
    try {
      const parsed = JSON.parse(savedUser);
      if (parsed.account_type === 'admin') {
        router.push('/cms-admin');
      }
    } catch (e) {
      // Ignored
    }
  }
});

const handleAdminLogin = async () => {
  if (loggingIn.value) return;

  loggingIn.value = true;

  try {
    const response = await fetch(`${API_BASE_URL}/api/auth/admin/login`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-EIT-CSRF': '1'
      },
      credentials: 'include',
      body: JSON.stringify({
        email: email.value.trim(),
        password: password.value
      })
    });

    const resData = await response.json();

    if (response.ok && resData.two_factor_required) {
      // Password accepted; prompt for the authenticator code.
      twoFactorRequired.value = true;
      code.value = '';
    } else if (response.ok) {
      showToast("Access granted. Loading administration console...", "success");
      localStorage.setItem('auth_user', JSON.stringify(resData.user));
      setTimeout(() => {
        router.push('/cms-admin');
      }, 1500);
    } else {
      showToast(resData.message || "Invalid credentials. Access denied.", "error");
    }
  } catch (error) {
    console.error("Admin login request failed:", error);
    showToast("Connection error: Unable to reach the authentication server.", "error");
  } finally {
    loggingIn.value = false;
  }
};

const handleTwoFactor = async () => {
  if (verifying.value) return;
  verifying.value = true;
  try {
    const response = await fetch(`${API_BASE_URL}/api/auth/admin/login/2fa`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-EIT-CSRF': '1'
      },
      credentials: 'include',
      body: JSON.stringify({ code: code.value.trim() })
    });
    const resData = await response.json();
    if (response.ok && resData.success) {
      showToast("Access granted. Loading administration console...", "success");
      localStorage.setItem('auth_user', JSON.stringify(resData.user));
      setTimeout(() => { router.push('/cms-admin'); }, 1200);
    } else {
      showToast(resData.message || "Invalid code.", "error");
      // If the challenge expired, return to the password step.
      if (response.status === 401 && /expired/i.test(resData.message || '')) {
        twoFactorRequired.value = false;
        password.value = '';
      }
    }
  } catch (error) {
    console.error("2FA verification failed:", error);
    showToast("Connection error during verification.", "error");
  } finally {
    verifying.value = false;
  }
};

const cancelTwoFactor = () => {
  twoFactorRequired.value = false;
  code.value = '';
  password.value = '';
};
</script>

<style scoped>
.admin-login-view {
  background: #001440; /* Matched to site login background */
  min-height: 100vh;
  position: relative;
  display: flex;
  flex-direction: column;
  color: #444c5c;
  width: 100%;
}

/* BACKGROUND TEXTURE MATCHED TO PORTAL LOGIN */
.bg-wrap {
  position: absolute;
  inset: 0;
  z-index: 0;
  background: #001440;
  overflow: hidden;
  pointer-events: none;
}

.bg-grid {
  position: absolute;
  inset: 0;
  background-image: 
    linear-gradient(rgba(112, 128, 144, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(112, 128, 144, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}

.bg-glow {
  position: absolute;
  width: 700px;
  height: 700px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(0, 35, 102, 0.55) 0%, transparent 70%);
  top: -200px;
  left: 50%;
  transform: translateX(-50%);
}

.bg-glow2 {
  position: absolute;
  width: 400px;
  height: 400px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(112, 128, 144, 0.08) 0%, transparent 70%);
  bottom: -100px;
  right: -100px;
}

/* PAGE LAYOUT CONTAINER */
.page-container {
  position: relative;
  z-index: 1;
  min-height: calc(100vh - 80px);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 48px 20px 32px;
  box-sizing: border-box;
}

/* LOGO HEADER MATCHED TO APP.VUE LOGO */
.portal-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 36px;
  text-decoration: none;
}

.logo-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #4ade80; /* pulsing green dot */
  animation: pulse 2.5s ease-in-out infinite;
}

@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.6; transform: scale(0.85); }
}

.logo-text {
  font-size: 20px;
  color: #fff;
  letter-spacing: -0.3px;
}

.logo-text em {
  font-style: normal;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.7);
}

.logo-text strong {
  font-weight: 800;
  text-transform: uppercase;
}

.logo-badge {
  background: rgba(112, 128, 144, 0.25);
  border: 0.5px solid rgba(112, 128, 144, 0.35);
  color: rgba(255, 255, 255, 0.55);
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  padding: 3px 9px;
  border-radius: 4px;
}

/* LOGIN CARD MATCHED TO PORTAL LOGIN */
.login-card {
  width: 100%;
  max-width: 440px;
  background: rgba(255, 255, 255, 0.04);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  border-radius: 16px;
  padding: 36px 36px 30px;
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
  box-sizing: border-box;
}

.card-eyebrow {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.3px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.38);
  margin-bottom: 8px;
  text-align: left;
}

.card-title {
  font-size: 20px;
  font-weight: 800;
  color: #fff;
  letter-spacing: -0.4px;
  margin-bottom: 6px;
  line-height: 1.2;
  text-align: left;
}

.card-sub {
  font-size: 13px;
  color: rgba(255, 255, 255, 0.5);
  line-height: 1.55;
  margin-bottom: 24px;
  text-align: left;
}

/* FORM ELEMENTS MATCHED TO SITE STYLE */
.login-form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.form-label {
  font-size: 12px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.7);
  text-align: left;
}

.input-wrap {
  position: relative;
  width: 100%;
}

.input-icon {
  position: absolute;
  left: 14px;
  top: 50%;
  transform: translateY(-50%);
  color: rgba(255, 255, 255, 0.3);
  font-size: 14px;
}

.form-input {
  width: 100%;
  background: rgba(255, 255, 255, 0.06);
  border: 0.5px solid rgba(255, 255, 255, 0.15);
  border-radius: 8px;
  padding: 12px 14px 12px 38px;
  font-size: 13.5px;
  color: #fff;
  outline: none;
  transition: border-color .15s, background .15s, box-shadow .15s;
  box-sizing: border-box;
}

.form-input::placeholder {
  color: rgba(255, 255, 255, 0.28);
}

.form-input:focus {
  border-color: rgba(255, 255, 255, 0.35);
  background: rgba(255, 255, 255, 0.09);
  box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.05);
}

.toggle-pass-btn {
  position: absolute;
  right: 14px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  color: rgba(255, 255, 255, 0.3);
  cursor: pointer;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: color 0.15s;
}

.toggle-pass-btn:hover {
  color: rgba(255, 255, 255, 0.6);
}

/* SUBMIT BUTTON MATCHED TO OB-BTN */
.submit-btn {
  width: 100%;
  background: #002366; /* Deep navy button matching brand */
  color: #fff;
  font-size: 13.5px;
  font-weight: 700;
  padding: 13px 20px;
  border-radius: 8px;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  transition: opacity .15s, transform .15s;
  cursor: pointer;
  outline: none;
  box-sizing: border-box;
  margin-top: 8px;
}

.submit-btn:hover:not(:disabled) {
  opacity: 0.9;
  transform: translateY(-1px);
}

.submit-btn:active:not(:disabled) {
  transform: translateY(0);
}

.submit-btn:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}

/* FOOTER IN THE CARD */
.card-footer {
  margin-top: 24px;
  border-top: 0.5px solid rgba(255, 255, 255, 0.08);
  padding-top: 18px;
  text-align: center;
}

.card-footer p {
  font-size: 11.5px;
  color: rgba(255, 255, 255, 0.35);
  line-height: 1.5;
  margin: 0 0 14px 0;
}

.back-link {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.6);
  text-decoration: underline;
  font-weight: 600;
  transition: color 0.15s;
}

.back-link:hover {
  color: #fff;
}

/* SPINNING LOADER ANIMATION */
.spin-animation {
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

/* TOAST ALERTS MATCHED TO PORTAL TOASTS */
.toast-notification {
  position: fixed;
  top: 24px;
  right: 24px;
  z-index: 1000;
  display: flex;
  align-items: stretch;
  background: rgba(15, 23, 42, 0.9);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
  animation: slide-in 0.35s cubic-bezier(0.16, 1, 0.3, 1);
  max-width: 380px;
}

.toast-line {
  width: 4px;
}

.toast-notification.success .toast-line {
  background: #10b981;
}

.toast-notification.error .toast-line {
  background: #ef4444;
}

.toast-content {
  padding: 14px 18px;
  display: flex;
  align-items: center;
  gap: 12px;
}

.toast-icon {
  font-size: 18px;
}

.success-icon {
  color: #10b981;
}

.error-icon {
  color: #ef4444;
}

.toast-message {
  font-size: 13px;
  color: #f1f5f9;
  font-weight: 500;
  line-height: 1.4;
}

@keyframes slide-in {
  from { transform: translateX(100%); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}

/* RESPONSIVE DESIGN */
@media (max-width: 480px) {
  .login-card {
    padding: 28px 20px;
  }
}
</style>
