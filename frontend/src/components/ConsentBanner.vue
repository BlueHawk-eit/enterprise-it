<template>
  <transition name="cb-fade">
    <div v-if="show" class="cb" role="dialog" aria-label="Cookie notice">
      <div class="cb-text">
        We use cookies to understand site traffic and improve your experience. See our
        <router-link to="/privacy" class="cb-link">Privacy Policy</router-link>.
      </div>
      <div class="cb-actions">
        <button class="cb-btn cb-decline" @click="decide(false)">Decline</button>
        <button class="cb-btn cb-accept" @click="decide(true)">Accept</button>
      </div>
    </div>
  </transition>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { anyTagConfigured, consentDecided, setConsent } from '../analytics';

const show = ref(false);

onMounted(() => {
  // Only surface the notice if tracking is actually configured and the visitor
  // hasn't already chosen. (Analytics has already started under implied consent;
  // this lets them opt out.)
  if (anyTagConfigured() && !consentDecided()) show.value = true;
});

const decide = (accepted) => {
  setConsent(accepted);
  show.value = false;
};
</script>

<style scoped>
.cb {
  position: fixed;
  left: 16px;
  right: 16px;
  bottom: 16px;
  z-index: 9999;
  max-width: 720px;
  margin: 0 auto;
  background: #002366;
  color: #fff;
  border-radius: 12px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.28);
  padding: 14px 18px;
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
  font-family: 'Inter', system-ui, sans-serif;
  font-size: 13.5px;
  line-height: 1.5;
}
.cb-text { flex: 1 1 280px; }
.cb-link { color: #b9ccf5; text-decoration: underline; }
.cb-actions { display: flex; gap: 10px; flex-shrink: 0; }
.cb-btn {
  border: none;
  border-radius: 7px;
  padding: 9px 18px;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  font-family: inherit;
}
.cb-decline { background: rgba(255, 255, 255, 0.12); color: #fff; }
.cb-decline:hover { background: rgba(255, 255, 255, 0.2); }
.cb-accept { background: #fff; color: #002366; }
.cb-accept:hover { background: #eef2fb; }
.cb-fade-enter-active, .cb-fade-leave-active { transition: opacity 0.3s, transform 0.3s; }
.cb-fade-enter-from, .cb-fade-leave-to { opacity: 0; transform: translateY(12px); }
</style>
