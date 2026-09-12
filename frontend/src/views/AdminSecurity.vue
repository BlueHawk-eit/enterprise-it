<template>
  <div class="sec-view">
    <div class="topbar">
      <div class="tb-brand">
        <i class="ti ti-shield-lock"></i>
        <span>Account Security</span>
      </div>
      <button class="tb-back" @click="router.push('/cms-admin')">
        <i class="ti ti-arrow-left"></i> Back to Dashboard
      </button>
    </div>

    <div class="sec-wrap" v-if="ready">
      <p class="sec-user" v-if="adminUser">
        Signed in as <strong>{{ adminUser.email }}</strong>
      </p>

      <!-- Change password -->
      <section class="card">
        <div class="card-head">
          <i class="ti ti-key"></i>
          <div>
            <h2>Change password</h2>
            <p>Use a strong, unique password of at least 12 characters.</p>
          </div>
        </div>
        <form class="card-body" @submit.prevent="submitPassword">
          <label>Current password</label>
          <input type="password" v-model="pw.current" autocomplete="current-password" required />

          <label>New password</label>
          <input type="password" v-model="pw.next" autocomplete="new-password" required />
          <ul class="reqs">
            <li :class="{ ok: rules.len }">At least 12 characters</li>
            <li :class="{ ok: rules.case }">Upper &amp; lower case letters</li>
            <li :class="{ ok: rules.num }">A number</li>
            <li :class="{ ok: rules.sym }">A symbol</li>
          </ul>

          <label>Confirm new password</label>
          <input type="password" v-model="pw.confirm" autocomplete="new-password" required />
          <p class="mismatch" v-if="pw.confirm && pw.next !== pw.confirm">Passwords do not match.</p>

          <button class="btn-primary" type="submit" :disabled="pwSaving || !passwordValid">
            {{ pwSaving ? 'Updating…' : 'Update password' }}
          </button>
        </form>
      </section>

      <!-- Two-factor -->
      <section class="card">
        <div class="card-head">
          <i class="ti ti-device-mobile"></i>
          <div>
            <h2>Two-factor authentication</h2>
            <p>Protect your account with a time-based code from an authenticator app
               (Microsoft Authenticator, Google Authenticator, etc.).</p>
          </div>
          <span class="pill" :class="twoFa.enabled ? 'pill-on' : 'pill-off'">
            {{ twoFa.enabled ? 'Enabled' : 'Disabled' }}
          </span>
        </div>

        <!-- Enabled: allow disabling -->
        <div class="card-body" v-if="twoFa.enabled && !twoFa.setup">
          <p class="note">Two-factor authentication is active on your account. You'll be asked
             for a code each time you sign in.</p>
          <form @submit.prevent="disableTwoFa">
            <label>Confirm your password to disable</label>
            <input type="password" v-model="disablePw" autocomplete="current-password" required />
            <button class="btn-danger" type="submit" :disabled="twoFa.busy">
              {{ twoFa.busy ? 'Disabling…' : 'Disable two-factor' }}
            </button>
          </form>
        </div>

        <!-- Disabled and not mid-setup: start -->
        <div class="card-body" v-else-if="!twoFa.enabled && !twoFa.setup">
          <button class="btn-primary" @click="startSetup" :disabled="twoFa.busy">
            {{ twoFa.busy ? 'Preparing…' : 'Set up two-factor' }}
          </button>
        </div>

        <!-- Mid-setup wizard -->
        <div class="card-body" v-else-if="twoFa.setup">
          <ol class="steps">
            <li>
              <strong>Scan this QR code</strong> with your authenticator app, or enter the key manually.
              <div class="qr-row">
                <img v-if="qrDataUrl" :src="qrDataUrl" alt="Two-factor QR code" class="qr" />
                <div class="qr-manual">
                  <span class="qr-manual-label">Manual entry key</span>
                  <code class="secret">{{ twoFa.setup.secret }}</code>
                </div>
              </div>
            </li>
            <li>
              <strong>Save your recovery codes.</strong> Store them somewhere safe — each can be
              used once if you lose access to your authenticator.
              <div class="codes">
                <code v-for="c in twoFa.setup.recovery_codes" :key="c">{{ c }}</code>
              </div>
              <button class="btn-ghost" type="button" @click="copyCodes">
                <i class="ti ti-copy"></i> {{ copied ? 'Copied' : 'Copy codes' }}
              </button>
            </li>
            <li>
              <strong>Enter the 6-digit code</strong> from your app to finish.
              <form class="confirm-row" @submit.prevent="confirmTwoFa">
                <input type="text" v-model="confirmCode" inputmode="numeric" maxlength="6"
                       placeholder="000000" autocomplete="one-time-code" />
                <button class="btn-primary" type="submit" :disabled="twoFa.busy">
                  {{ twoFa.busy ? 'Verifying…' : 'Verify &amp; enable' }}
                </button>
                <button class="btn-ghost" type="button" @click="cancelSetup">Cancel</button>
              </form>
            </li>
          </ol>
        </div>
      </section>
    </div>

    <transition name="toast">
      <div v-if="toast.show" class="toast" :class="toast.type">{{ toast.msg }}</div>
    </transition>
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { API_BASE_URL } from '../config';

const router = useRouter();
const ready = ref(false);
const adminUser = ref(null);

const pw = reactive({ current: '', next: '', confirm: '' });
const pwSaving = ref(false);

const twoFa = reactive({ enabled: false, setup: null, busy: false });
const qrDataUrl = ref('');
const confirmCode = ref('');
const disablePw = ref('');
const copied = ref(false);

const toast = reactive({ show: false, msg: '', type: 'ok' });
let toastTimer = null;
const notify = (msg, type = 'ok') => {
  toast.msg = msg; toast.type = type; toast.show = true;
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => (toast.show = false), 3500);
};

const rules = computed(() => ({
  len: pw.next.length >= 12,
  case: /[a-z]/.test(pw.next) && /[A-Z]/.test(pw.next),
  num: /[0-9]/.test(pw.next),
  sym: /[^A-Za-z0-9]/.test(pw.next),
}));
const passwordValid = computed(() =>
  rules.value.len && rules.value.case && rules.value.num && rules.value.sym &&
  pw.next === pw.confirm && pw.current.length > 0
);

const mutatingHeaders = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-EIT-CSRF': '1',
};

const guard = async () => {
  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/user`, { credentials: 'include' });
    if (res.status === 401) { router.push('/admin-login'); return false; }
    const data = await res.json();
    if (data.authenticated && data.user && data.user.account_type === 'admin') {
      adminUser.value = data.user;
      return true;
    }
    router.push('/admin-login');
    return false;
  } catch (e) {
    router.push('/admin-login');
    return false;
  }
};

const loadStatus = async () => {
  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/2fa/status`, { credentials: 'include' });
    if (res.ok) {
      const data = await res.json();
      twoFa.enabled = !!data.enabled;
    }
  } catch (e) { /* leave as disabled */ }
};

const submitPassword = async () => {
  if (!passwordValid.value) return;
  pwSaving.value = true;
  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/password`, {
      method: 'POST',
      credentials: 'include',
      headers: mutatingHeaders,
      body: JSON.stringify({
        current_password: pw.current,
        password: pw.next,
        password_confirmation: pw.confirm,
      }),
    });
    const data = await res.json();
    if (res.ok && data.success) {
      notify('Password updated.', 'ok');
      pw.current = ''; pw.next = ''; pw.confirm = '';
    } else {
      notify(data.message || firstError(data) || 'Could not update password.', 'err');
    }
  } catch (e) {
    notify('Network error updating password.', 'err');
  } finally {
    pwSaving.value = false;
  }
};

const renderQr = async (uri) => {
  qrDataUrl.value = '';
  try {
    const mod = await import('qrcode');
    const QRCode = mod.default || mod;
    qrDataUrl.value = await QRCode.toDataURL(uri, { width: 200, margin: 1 });
  } catch (e) {
    // If the QR library is unavailable, the manual-entry key still works.
    qrDataUrl.value = '';
  }
};

const startSetup = async () => {
  twoFa.busy = true;
  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/2fa/setup`, {
      method: 'POST',
      credentials: 'include',
      headers: mutatingHeaders,
    });
    const data = await res.json();
    if (res.ok && data.success) {
      twoFa.setup = { secret: data.secret, otpauth_uri: data.otpauth_uri, recovery_codes: data.recovery_codes };
      confirmCode.value = '';
      await renderQr(data.otpauth_uri);
    } else {
      notify(data.message || 'Could not start setup.', 'err');
    }
  } catch (e) {
    notify('Network error starting setup.', 'err');
  } finally {
    twoFa.busy = false;
  }
};

const confirmTwoFa = async () => {
  twoFa.busy = true;
  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/2fa/confirm`, {
      method: 'POST',
      credentials: 'include',
      headers: mutatingHeaders,
      body: JSON.stringify({ code: confirmCode.value.trim() }),
    });
    const data = await res.json();
    if (res.ok && data.success) {
      twoFa.enabled = true;
      twoFa.setup = null;
      qrDataUrl.value = '';
      notify('Two-factor authentication enabled.', 'ok');
    } else {
      notify(data.message || 'Invalid code. Try again.', 'err');
    }
  } catch (e) {
    notify('Network error verifying code.', 'err');
  } finally {
    twoFa.busy = false;
  }
};

const cancelSetup = () => {
  twoFa.setup = null;
  qrDataUrl.value = '';
  confirmCode.value = '';
};

const disableTwoFa = async () => {
  twoFa.busy = true;
  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/2fa/disable`, {
      method: 'POST',
      credentials: 'include',
      headers: mutatingHeaders,
      body: JSON.stringify({ password: disablePw.value }),
    });
    const data = await res.json();
    if (res.ok && data.success) {
      twoFa.enabled = false;
      disablePw.value = '';
      notify('Two-factor authentication disabled.', 'ok');
    } else {
      notify(data.message || 'Could not disable two-factor.', 'err');
    }
  } catch (e) {
    notify('Network error.', 'err');
  } finally {
    twoFa.busy = false;
  }
};

const copyCodes = async () => {
  if (!twoFa.setup) return;
  try {
    await navigator.clipboard.writeText(twoFa.setup.recovery_codes.join('\n'));
    copied.value = true;
    setTimeout(() => (copied.value = false), 2000);
  } catch (e) {
    notify('Copy failed — select the codes manually.', 'err');
  }
};

const firstError = (data) => {
  if (data && data.errors) {
    const k = Object.keys(data.errors)[0];
    if (k && Array.isArray(data.errors[k])) return data.errors[k][0];
  }
  return null;
};

onMounted(async () => {
  const ok = await guard();
  if (ok) await loadStatus();
  ready.value = true;
});
</script>

<style scoped>
.sec-view {
  font-family: 'Inter', system-ui, sans-serif;
  background: #f2f4f8;
  color: #1a2233;
  min-height: 100vh;
  font-size: 13.5px;
}
.topbar {
  position: fixed; top: 0; left: 0; right: 0; height: 52px;
  background: #002366; color: #fff;
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 20px; z-index: 100;
}
.tb-brand { display: flex; align-items: center; gap: 9px; font-weight: 600; }
.tb-brand i { font-size: 18px; }
.tb-back {
  background: rgba(255,255,255,0.1); color: #fff; border: none;
  padding: 7px 13px; border-radius: 6px; cursor: pointer; font-size: 12.5px;
  display: flex; align-items: center; gap: 6px;
}
.tb-back:hover { background: rgba(255,255,255,0.18); }
.sec-wrap { max-width: 640px; margin: 0 auto; padding: 84px 20px 60px; }
.sec-user { color: #6b7280; font-size: 12.5px; margin: 0 0 18px; }
.card {
  background: #fff; border: 1px solid #dde1e9; border-radius: 12px;
  margin-bottom: 22px; overflow: hidden;
}
.card-head {
  display: flex; align-items: flex-start; gap: 13px;
  padding: 20px; border-bottom: 1px solid #eef1f5;
}
.card-head i { font-size: 22px; color: #002366; margin-top: 2px; }
.card-head h2 { margin: 0; font-size: 15px; }
.card-head p { margin: 3px 0 0; color: #6b7280; font-size: 12.5px; }
.pill {
  margin-left: auto; font-size: 11px; font-weight: 600;
  padding: 3px 10px; border-radius: 999px; white-space: nowrap;
}
.pill-on { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
.pill-off { background: #f3f4f6; color: #6b7280; border: 1px solid #e5e7eb; }
.card-body { padding: 20px; }
label { display: block; font-size: 12px; font-weight: 600; margin: 14px 0 5px; }
label:first-child { margin-top: 0; }
input {
  width: 100%; padding: 9px 11px; border: 1px solid #dde1e9;
  border-radius: 8px; font-size: 13.5px; box-sizing: border-box;
}
input:focus { outline: none; border-color: #002366; }
.reqs { list-style: none; padding: 0; margin: 8px 0 0; font-size: 12px; color: #6b7280; }
.reqs li { padding-left: 20px; position: relative; margin: 3px 0; }
.reqs li::before { content: '○'; position: absolute; left: 4px; }
.reqs li.ok { color: #16a34a; }
.reqs li.ok::before { content: '✓'; }
.mismatch { color: #ef4444; font-size: 12px; margin: 6px 0 0; }
.btn-primary {
  margin-top: 18px; background: #002366; color: #fff; border: none;
  padding: 10px 18px; border-radius: 8px; font-size: 13px; font-weight: 600;
  cursor: pointer;
}
.btn-primary:hover:not(:disabled) { background: #1a3a6e; }
.btn-primary:disabled { opacity: 0.55; cursor: not-allowed; }
.btn-danger {
  margin-top: 16px; background: #ef4444; color: #fff; border: none;
  padding: 10px 18px; border-radius: 8px; font-size: 13px; font-weight: 600;
  cursor: pointer;
}
.btn-danger:hover:not(:disabled) { background: #dc2626; }
.btn-danger:disabled { opacity: 0.55; cursor: not-allowed; }
.btn-ghost {
  background: #f2f4f8; color: #1a2233; border: 1px solid #dde1e9;
  padding: 8px 14px; border-radius: 8px; font-size: 12.5px; cursor: pointer;
  display: inline-flex; align-items: center; gap: 6px;
}
.btn-ghost:hover { background: #e9edf3; }
.note {
  background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d;
  padding: 11px 13px; border-radius: 8px; font-size: 12.5px; margin: 0 0 4px;
}
.steps { padding-left: 20px; margin: 0; }
.steps li { margin-bottom: 22px; font-size: 13px; }
.qr-row { display: flex; gap: 18px; align-items: center; margin-top: 12px; flex-wrap: wrap; }
.qr { width: 168px; height: 168px; border: 1px solid #dde1e9; border-radius: 8px; }
.qr-manual-label { display: block; font-size: 11.5px; color: #6b7280; margin-bottom: 5px; }
.secret {
  display: inline-block; background: #f2f4f8; border: 1px solid #dde1e9;
  padding: 8px 11px; border-radius: 8px; font-size: 14px; letter-spacing: 1.5px;
  word-break: break-all;
}
.codes {
  display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;
  margin: 12px 0;
}
.codes code {
  background: #f2f4f8; border: 1px solid #dde1e9; padding: 7px 10px;
  border-radius: 6px; font-size: 13px; text-align: center; letter-spacing: 1px;
}
.confirm-row { display: flex; gap: 10px; margin-top: 10px; flex-wrap: wrap; align-items: center; }
.confirm-row input {
  width: 130px; text-align: center; letter-spacing: 4px; font-size: 16px;
}
.confirm-row .btn-primary { margin-top: 0; }
.toast {
  position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%);
  padding: 11px 20px; border-radius: 8px; color: #fff; font-size: 13px;
  font-weight: 500; z-index: 200;
}
.toast.ok { background: #16a34a; }
.toast.err { background: #ef4444; }
.toast-enter-active, .toast-leave-active { transition: opacity 0.3s, transform 0.3s; }
.toast-enter-from, .toast-leave-to { opacity: 0; transform: translateX(-50%) translateY(10px); }
</style>
