<template>
  <div class="login-view">
    <!-- Toast Notification -->
    <div v-if="toast.show" class="toast-notification" :class="toast.type">
      <div class="toast-line"></div>
      <div class="toast-content">
        <i v-if="toast.type === 'success'" class="ti ti-circle-check toast-icon success-icon" aria-hidden="true"></i>
        <i v-else class="ti ti-alert-triangle toast-icon error-icon" aria-hidden="true"></i>
        <span class="toast-message">{{ toast.message }}</span>
      </div>
    </div>

    <!-- Background -->
    <div class="bg-wrap" aria-hidden="true">
      <div class="bg-grid"></div>
      <div class="bg-glow"></div>
      <div class="bg-glow2"></div>
    </div>

    <main class="page-container" role="main">
      <!-- Logo -->
      <router-link to="/" class="portal-logo" aria-label="enterprise IT — return to homepage">
        <div class="logo-dot" aria-hidden="true"></div>
        <div class="logo-text"><em>enterprise</em> <strong>IT</strong></div>
        <span class="logo-badge">Client Portal</span>
      </router-link>

      <!-- Main card -->
      <div class="main-card" role="region" aria-label="Portal access">
        <!-- Tab strip -->
        <div class="tab-strip" role="tablist" aria-label="Portal options">
          <button 
            class="tab-btn" 
            :class="{ active: activeTab === 'login' }" 
            id="tab-login" 
            role="tab" 
            :aria-selected="activeTab === 'login'" 
            aria-controls="panel-login" 
            @click="activeTab = 'login'"
          >
            <i class="ti ti-lock" style="font-size:13px;margin-right:5px;" aria-hidden="true"></i>Client Login
          </button>
          <button 
            class="tab-btn" 
            :class="{ active: activeTab === 'onboard' }" 
            id="tab-onboard" 
            role="tab" 
            :aria-selected="activeTab === 'onboard'" 
            aria-controls="panel-onboard" 
            @click="activeTab = 'onboard'"
          >
            <i class="ti ti-user-plus" style="font-size:13px;margin-right:5px;" aria-hidden="true"></i>New Account
          </button>
        </div>

        <!-- ===== LOGIN PANEL ===== -->
        <div class="tab-panel" :class="{ active: activeTab === 'login' }" id="panel-login" role="tabpanel" aria-labelledby="tab-login">
          <div class="panel-eyebrow">Secure Access</div>
          <h1 class="panel-h">Welcome back.</h1>
          <p class="panel-sub">Sign in with your corporate Microsoft account to access your documents, assets, and support tickets securely.</p>

          <div class="session-info" aria-label="Security information">
            <div class="si-row">
              <i class="ti ti-shield-check" aria-hidden="true"></i>
              <div class="si-text"><strong>Sign in with your work account.</strong> No separate password to create or remember — and enterprise IT never sees or stores your credentials.</div>
            </div>
            <div class="si-row">
              <i class="ti ti-building" aria-hidden="true"></i>
              <div class="si-text"><strong>Your organisation stays in control.</strong> If your IT team disables your account, access to this portal ends at the same moment.</div>
            </div>
            <div class="si-row">
              <i class="ti ti-lock" aria-hidden="true"></i>
              <div class="si-text"><strong>Encrypted in transit.</strong> Every connection to this portal is protected with TLS encryption.</div>
            </div>
          </div>

          <!-- Corporate Email Input -->
          <div class="form-group" style="margin-bottom: 20px;">
            <label class="form-label">Corporate Email Address <span class="req">*</span></label>
            <div class="ob-input-wrap">
              <input 
                class="ob-input" 
                :class="{ error: errors.loginEmail }"
                type="email" 
                v-model="loginEmail" 
                placeholder="your.name@company.com.au" 
                aria-label="Corporate Email Address" 
                required
                @input="errors.loginEmail = false"
                @keydown.enter="handleMSLogin"
              />
            </div>
            <div class="ob-error" :class="{ visible: errors.loginEmail }">
              Please enter a valid registered corporate email address.
            </div>
          </div>

          <!-- Microsoft Sign-in Button -->
          <button class="ms-btn" :class="{ loading: loggingIn }" id="ms-signin-btn" @click="handleMSLogin" aria-label="Sign in with Microsoft" :disabled="loggingIn">
            <svg class="ms-logo" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <rect x="1" y="1" width="9" height="9" fill="#f25022"/>
              <rect x="11" y="1" width="9" height="9" fill="#7fba00"/>
              <rect x="1" y="11" width="9" height="9" fill="#00a4ef"/>
              <rect x="11" y="11" width="9" height="9" fill="#ffb900"/>
            </svg>
            <span class="ms-label">{{ loggingIn ? 'Redirecting to Microsoft...' : 'Sign in with Microsoft' }}</span>
          </button>

          <div class="divider" aria-hidden="true">
            <div class="divider-line"></div>
            <span class="divider-text">Authenticated via Microsoft Entra ID</span>
            <div class="divider-line"></div>
          </div>

          <p style="font-size:12px;color:rgba(255,255,255,0.35);text-align:center;line-height:1.55;margin: 0;">
            Access is restricted to authorised enterprise IT clients and partners. If you don't have an account, use the <button @click="activeTab = 'onboard'" style="background:none;border:none;color:rgba(255,255,255,0.6);font-size:12px;font-weight:600;cursor:pointer;padding:0;text-decoration:underline;font-family:inherit;">New Account</button> tab to request access.
          </p>
        </div>

        <!-- ===== ONBOARDING PANEL ===== -->
        <div class="tab-panel" :class="{ active: activeTab === 'onboard' }" id="panel-onboard" role="tabpanel" aria-labelledby="tab-onboard">
          <div class="panel-eyebrow">Account Setup</div>
          <h2 class="panel-h">Request portal access.</h2>
          <p class="panel-sub">Are you a partner or client? Enter your work email address below and our team will set up your secure account.</p>

          <!-- Form (visible by default) -->
          <div v-show="!onboardSubmitted" id="ob-form-wrap">
            <div class="ob-form" id="ob-form">
              <div>
                <label class="form-label">Work Email <span class="req">*</span></label>
                <div class="ob-input-wrap">
                  <input
                    class="ob-input"
                    :class="{ error: errors.onboardEmail }"
                    type="email"
                    v-model="onboardEmail"
                    placeholder="your.name@company.com.au"
                    autocomplete="email"
                    aria-label="Work email address"
                    aria-required="true"
                    @input="errors.onboardEmail = false"
                    @keydown.enter="handleOnboarding"
                  />
                </div>
                <div class="ob-error" :class="{ visible: errors.onboardEmail }">Please enter a valid work email address.</div>
              </div>

              <div>
                <label class="form-label">Organisation Name <span class="req">*</span></label>
                <div class="ob-input-wrap">
                  <input
                    class="ob-input"
                    :class="{ error: errors.onboardOrg }"
                    type="text"
                    v-model="onboardOrg"
                    placeholder="Organisation name"
                    autocomplete="organization"
                    aria-label="Organisation name"
                    aria-required="true"
                    @input="errors.onboardOrg = false"
                    @keydown.enter="handleOnboarding"
                  />
                </div>
                <div class="ob-error" :class="{ visible: errors.onboardOrg }">Please enter your organisation name.</div>
              </div>

              <div>
                <label class="form-label">Account Type <span class="req">*</span></label>
                <select 
                  class="ob-input" 
                  :class="{ error: errors.onboardType }"
                  v-model="onboardType" 
                  aria-label="Account type"
                  style="appearance:none;-webkit-appearance:none;background-image:url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'12\' height=\'12\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%23708090\' stroke-width=\'2.5\'%3E%3Cpolyline points=\'6 9 12 15 18 9\'%3E%3C/polyline%3E%3C/svg%3E');background-repeat:no-repeat;background-position:right 14px center;padding-right:36px;cursor:pointer;"
                  @change="errors.onboardType = false"
                >
                  <option value="">I am a…</option>
                  <option value="client">Client</option>
                  <option value="partner">Partner</option>
                </select>
                <div class="ob-error" :class="{ visible: errors.onboardType }">Please select your account type.</div>
              </div>

              <button class="ob-btn" id="ob-submit-btn" @click="handleOnboarding" type="button" aria-label="Request account setup" :disabled="onboarding">
                <i v-if="onboarding" class="ti ti-loader-2" style="animation:spin 0.8s linear infinite;" aria-hidden="true"></i>
                <i v-else class="ti ti-send" aria-hidden="true"></i>
                {{ onboarding ? 'Sending request…' : 'Request Account Setup' }}
              </button>

              <p class="ob-note">Our team will send you account setup instructions within one business day. Your access will be provisioned through Microsoft Entra ID (External Identities).</p>
            </div>
          </div>

          <!-- Success state (hidden by default) -->
          <div v-show="onboardSubmitted" class="ob-success" :class="{ visible: onboardSubmitted }" id="ob-success" aria-live="polite">
            <div class="ob-success-circle" aria-hidden="true">
              <i class="ti ti-check" aria-hidden="true"></i>
            </div>
            <div class="ob-success-h">Request Received</div>
            <p class="ob-success-msg">
              An account provisioning request has been sent to the enterprise IT support team. You'll receive setup instructions at <strong>{{ onboardEmailConfirm }}</strong> within one business day.
            </p>
            <button @click="resetOnboarding" style="margin-top:20px;background:none;border:0.5px solid rgba(255,255,255,0.2);color:rgba(255,255,255,0.55);font-size:12px;font-weight:600;padding:8px 16px;border-radius:6px;cursor:pointer;font-family:inherit;">Submit another request</button>
          </div>
        </div>
      </div><!-- /main-card -->

      <!-- Security badges -->
      <div class="security-row" aria-label="Security certifications">
        <div class="sec-badge"><i class="ti ti-brand-windows" aria-hidden="true"></i>Microsoft Entra ID</div>
        <div class="sec-badge"><i class="ti ti-map-pin" aria-hidden="true"></i>Australian Owned</div>
        <div class="sec-badge"><i class="ti ti-certificate" aria-hidden="true"></i>ISO Compliant</div>
        <div class="sec-badge"><i class="ti ti-lock" aria-hidden="true"></i>TLS Encrypted</div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="portal-footer">
      <div class="portal-footer-links">
        <a href="/" class="pfl">enterpriseit.com.au</a>
        <router-link to="/contact" class="pfl">Contact Support</router-link>
        <router-link to="/about" class="pfl">About Us</router-link>
        <router-link to="/privacy" class="pfl">Privacy Policy</router-link>
        <router-link to="/terms" class="pfl">Terms of Service</router-link>
      </div>
      <div class="portal-copy">© {{ currentYear }} ENTERPRISE IT PTY LTD · ABN 33 701 700 478 · Adelaide CBD, South Australia · All rights reserved</div>
    </footer>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { API_BASE_URL } from '../config';

const router = useRouter();

// Rendered into the footer copyright so it never goes stale.
const currentYear = new Date().getFullYear();

const activeTab = ref('login');

const loginEmail = ref('');
const loggingIn = ref(false);

const onboardEmail = ref('');
const onboardOrg = ref('');
const onboardType = ref('');
const onboarding = ref(false);
const onboardSubmitted = ref(false);
const onboardEmailConfirm = ref('');

const errors = reactive({
  loginEmail: false,
  onboardEmail: false,
  onboardOrg: false,
  onboardType: false
});

const toast = reactive({
  show: false,
  message: '',
  type: 'success'
});

const showToast = (msg, type = 'success') => {
  toast.message = msg;
  toast.type = type;
  toast.show = true;
  setTimeout(() => {
    toast.show = false;
  }, 4000);
};

const isValidEmail = (emailStr) => {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailStr);
};

const handleMSLogin = async () => {
  if (!loginEmail.value.trim() || !isValidEmail(loginEmail.value.trim())) {
    errors.loginEmail = true;
    showToast("Please enter a valid registered corporate email address.", "error");
    return;
  }

  loggingIn.value = true;

  try {
    const response = await fetch(`${API_BASE_URL}/api/auth/login`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      credentials: 'include', // Crucial for HttpOnly session cookie transmission
      body: JSON.stringify({
        email: loginEmail.value.trim(),
        id_token: `mock-id-token-${Math.random().toString(36).substring(2)}`
      })
    });

    const resData = await response.json();

    if (response.ok) {
      showToast("Sign in successful! Establishing secure session...", "success");
      localStorage.setItem('auth_user', JSON.stringify(resData.user));
      setTimeout(() => {
        if (resData.user && resData.user.account_type === 'admin') {
          router.push('/cms-admin');
        } else {
          router.push('/dashboard');
        }
      }, 1500);
    } else {
      if (response.status === 401) {
        showToast("Account not found. Please contact support or use the New Account tab to provision your client portal access.", "error");
      } else {
        showToast(resData.message || "Authentication failed.", "error");
      }
    }
  } catch (error) {
    console.error("Login request failed:", error);
    showToast("Connection error: Unable to reach the authentication server. Please ensure the backend is running.", "error");
  } finally {
    loggingIn.value = false;
  }
};

const handleOnboarding = async () => {
  let valid = true;

  if (!onboardEmail.value.trim() || !isValidEmail(onboardEmail.value.trim())) {
    errors.onboardEmail = true;
    valid = false;
  }

  if (onboardOrg.value.trim().length < 2) {
    errors.onboardOrg = true;
    valid = false;
  }

  if (!onboardType.value) {
    errors.onboardType = true;
    valid = false;
  }

  if (!valid) return;

  onboarding.value = true;

  try {
    const response = await fetch(`${API_BASE_URL}/api/auth/onboard`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      credentials: 'include',
      body: JSON.stringify({
        email: onboardEmail.value.trim(),
        organisation: onboardOrg.value.trim(),
        account_type: onboardType.value
      })
    });

    if (response.ok) {
      onboardEmailConfirm.value = onboardEmail.value.trim();
      onboardSubmitted.value = true;
      showToast("Portal onboarding request submitted successfully!", "success");
    } else {
      const resData = await response.json();
      showToast(resData.message || "Failed to submit request.", "error");
    }
  } catch (error) {
    console.error("Onboarding request failed:", error);
    showToast("Connection error: Unable to submit onboarding request.", "error");
  } finally {
    onboarding.value = false;
  }
};

const resetOnboarding = () => {
  onboardEmail.value = '';
  onboardOrg.value = '';
  onboardType.value = '';
  onboardSubmitted.value = false;
  errors.onboardEmail = false;
  errors.onboardOrg = false;
  errors.onboardType = false;
};

onMounted(() => {
  if (!document.getElementById('spin-keyframe')) {
    const style = document.createElement('style');
    style.id = 'spin-keyframe';
    style.textContent = '@keyframes spin{0%{transform:rotate(0deg);}100%{transform:rotate(360deg);}}';
    document.head.appendChild(style);
  }
});
</script>

<style scoped>
.login-view {
  background: #001440;
  min-height: 100vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  color: #444c5c;
  position: relative;
  overflow: hidden;
}

/* ============================================================
   BACKGROUND TEXTURE
============================================================ */
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
    linear-gradient(rgba(112,128,144,0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(112,128,144,0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
.bg-glow {
  position: absolute;
  width: 700px;
  height: 700px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(0,35,102,0.55) 0%, transparent 70%);
  top: -200px;
  left: 50%;
  transform: translateX(-50%);
}
.bg-glow2 {
  position: absolute;
  width: 400px;
  height: 400px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(112,128,144,0.08) 0%, transparent 70%);
  bottom: -100px;
  right: -100px;
}

/* ============================================================
   PAGE LAYOUT
============================================================ */
.page-container {
  position: relative;
  z-index: 1;
  min-height: calc(100vh - 80px);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 48px 20px 32px;
}

/* ============================================================
   LOGO HEADER
============================================================ */
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
  background: #4ade80;
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
  text-align: left;
}
.logo-text em {
  font-style: normal;
  font-weight: 300;
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

/* ============================================================
   MAIN CARD — tabs: LOGIN / ONBOARD
============================================================ */
.main-card {
  width: 100%;
  max-width: 440px;
  background: rgba(255, 255, 255, 0.04);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  border-radius: 16px;
  overflow: hidden;
  backdrop-filter: blur(12px);
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
}

/* Tab strip */
.tab-strip {
  display: grid;
  grid-template-columns: 1fr 1fr;
  border-bottom: 0.5px solid rgba(255, 255, 255, 0.08);
}
.tab-btn {
  padding: 14px 0;
  font-size: 12.5px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.45);
  background: none;
  border: none;
  text-align: center;
  cursor: pointer;
  border-bottom: 2px solid transparent;
  transition: color .15s, border-color .15s, background .15s;
  letter-spacing: 0.2px;
  outline: none;
}
.tab-btn.active {
  color: #fff;
  border-bottom-color: #002366;
  background: rgba(0, 35, 102, 0.15);
}
.tab-btn:hover:not(.active) {
  color: rgba(255, 255, 255, 0.7);
}

/* Panels */
.tab-panel {
  display: none;
  padding: 28px 28px 24px;
  text-align: left;
}
.tab-panel.active {
  display: block;
}

/* Panel heading */
.panel-eyebrow {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.3px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.38);
  margin-bottom: 8px;
}
.panel-h {
  font-size: 20px;
  font-weight: 800;
  color: #fff;
  letter-spacing: -0.4px;
  margin-bottom: 6px;
  line-height: 1.2;
}
.panel-sub {
  font-size: 13px;
  color: rgba(255, 255, 255, 0.5);
  line-height: 1.55;
  margin-bottom: 24px;
}

/* ---- SIGN IN BUTTON (Microsoft) ---- */
.ms-btn {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  background: #fff;
  color: #1a1a2e;
  font-size: 14px;
  font-weight: 600;
  padding: 13px 20px;
  border-radius: 8px;
  border: none;
  transition: opacity .15s, transform .15s;
  margin-bottom: 16px;
  cursor: pointer;
  outline: none;
  box-sizing: border-box;
}
.ms-btn:hover {
  opacity: 0.93;
  transform: translateY(-1px);
}
.ms-btn:active {
  transform: translateY(0);
}
.ms-logo {
  width: 20px;
  height: 20px;
  flex-shrink: 0;
}

.divider {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 18px 0;
}
.divider-line {
  flex: 1;
  height: 0.5px;
  background: rgba(255, 255, 255, 0.1);
}
.divider-text {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.3);
  white-space: nowrap;
}

/* Loading state */
.ms-btn.loading {
  opacity: 0.7;
  pointer-events: none;
}

/* ---- Secure session info box ---- */
.session-info {
  background: rgba(74, 222, 128, 0.06);
  border: 0.5px solid rgba(74, 222, 128, 0.18);
  border-radius: 8px;
  padding: 12px 14px;
  margin-bottom: 20px;
}
.si-row {
  display: flex;
  align-items: flex-start;
  gap: 9px;
  margin-bottom: 7px;
}
.si-row:last-child {
  margin-bottom: 0;
}
.si-row i {
  font-size: 14px;
  color: #4ade80;
  flex-shrink: 0;
  margin-top: 1px;
}
.si-text {
  font-size: 11.5px;
  color: rgba(255, 255, 255, 0.55);
  line-height: 1.45;
}
.si-text strong {
  color: rgba(255, 255, 255, 0.8);
  font-weight: 600;
}

/* ---- ONBOARDING PANEL ---- */
.ob-form {
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.ob-input-wrap {
  position: relative;
}
.ob-input {
  width: 100%;
  background: rgba(255, 255, 255, 0.06);
  border: 0.5px solid rgba(255, 255, 255, 0.15);
  border-radius: 8px;
  padding: 12px 14px;
  font-size: 13.5px;
  color: #fff;
  font-family: inherit;
  outline: none;
  transition: border-color .15s, background .15s, box-shadow .15s;
  box-sizing: border-box;
}
.ob-input::placeholder {
  color: rgba(255, 255, 255, 0.28);
}
.ob-input:focus {
  border-color: rgba(255, 255, 255, 0.35);
  background: rgba(255, 255, 255, 0.09);
  box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.05);
}
.ob-input.error {
  border-color: #ef4444 !important;
  background: rgba(239, 68, 68, 0.05) !important;
}
/* The open <option> list is drawn by the operating system, which ignores the
   translucent background above and falls back to a white surface. Without
   this, the inherited color:#fff renders white text on white. color-scheme
   makes the native popup dark; the explicit option colours are the fallback
   for browsers that ignore it. */
select.ob-input {
  color-scheme: dark;
}
.ob-input option {
  background-color: #0d1b3e;
  color: #fff;
}
.form-label {
  display: block;
  font-size: 12px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.7);
  margin-bottom: 6px;
}
.form-label span.req {
  color: #fbbf24;
  margin-left: 2px;
}
.ob-btn {
  width: 100%;
  background: #002366;
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
}
.ob-btn:hover {
  opacity: 0.9;
  transform: translateY(-1px);
}
.ob-btn:disabled {
  opacity: 0.7;
  pointer-events: none;
}
.ob-btn i {
  font-size: 15px;
}
.ob-note {
  font-size: 11.5px;
  color: rgba(255, 255, 255, 0.38);
  line-height: 1.5;
  text-align: center;
  margin-top: 4px;
}
.ob-error {
  font-size: 11.5px;
  color: #ef4444;
  margin-top: 4px;
  display: none;
}
.ob-error.visible {
  display: block;
}

/* Onboarding success */
.ob-success {
  text-align: center;
  padding: 8px 0 4px;
}
.ob-success-circle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: rgba(74, 222, 128, 0.12);
  border: 1px solid rgba(74, 222, 128, 0.3);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 14px;
}
.ob-success-circle i {
  font-size: 28px;
  color: #4ade80;
}
.ob-success-h {
  font-size: 16px;
  font-weight: 800;
  color: #fff;
  margin-bottom: 8px;
}
.ob-success-msg {
  font-size: 13px;
  color: rgba(255, 255, 255, 0.5);
  line-height: 1.6;
  max-width: 320px;
  margin: 0 auto;
}

/* ============================================================
   SECURITY BADGES ROW
============================================================ */
.security-row {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  flex-wrap: wrap;
  margin-top: 24px;
}
.sec-badge {
  display: flex;
  align-items: center;
  gap: 5px;
  background: rgba(255, 255, 255, 0.05);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  border-radius: 20px;
  padding: 5px 12px;
  font-size: 10.5px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.45);
}
.sec-badge i {
  font-size: 12px;
  color: rgba(112, 128, 144, 0.8);
}

/* ============================================================
   FOOTER
============================================================ */
.portal-footer {
  position: relative;
  z-index: 1;
  text-align: center;
  padding: 20px;
  margin-top: auto;
}
.portal-footer-links {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 16px;
  flex-wrap: wrap;
  margin-bottom: 8px;
}
.pfl {
  font-size: 11.5px;
  color: rgba(255, 255, 255, 0.3);
  transition: color .15s;
}
.pfl:hover {
  color: rgba(255, 255, 255, 0.6);
}
.portal-copy {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.18);
}

/* Toast Notification styling */
.toast-notification {
  position: fixed;
  top: 24px;
  right: 24px;
  display: flex;
  align-items: stretch;
  background-color: #ffffff;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  border-radius: 6px;
  overflow: hidden;
  z-index: 2000;
  max-width: 320px;
  animation: slideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}
@keyframes slideIn {
  from { opacity: 0; transform: translateY(-20px) scale(0.95); }
  to { opacity: 1; transform: translateY(0) scale(1); }
}
.toast-line {
  width: 5px;
  flex-shrink: 0;
}
.toast-notification.success .toast-line {
  background-color: #10b981;
}
.toast-notification.error .toast-line {
  background-color: #dc2626;
}
.toast-content {
  padding: 16px 20px;
  display: flex;
  align-items: center;
  gap: 12px;
}
.toast-icon {
  font-size: 20px;
  flex-shrink: 0;
}
.success-icon {
  color: #10b981;
}
.error-icon {
  color: #dc2626;
}
.toast-message {
  font-family: var(--font-body);
  font-size: 13px;
  color: #1a2233;
  line-height: 1.5;
  text-align: left;
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width: 480px){
  .tab-panel {
    padding: 22px 20px 20px;
  }
  .main-card {
    border-radius: 12px;
  }
}
</style>
