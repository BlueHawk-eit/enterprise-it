<template>
  <div class="app-layout">
    <!-- Main Header / Navigation -->
    <nav v-if="showNav" class="nav" id="main-nav" aria-label="Main navigation" :class="{ 'nav-scrolled': isScrolled }">
      <router-link to="/" class="logo" aria-label="enterprise IT — home" @click="closeMobileNav">
        <div class="logo-dot" aria-hidden="true"></div>
        <div class="logo-text"><em>enterprise</em> <strong>IT</strong></div>
      </router-link>

      <!-- Desktop Nav links -->
      <div class="nav-r" role="list">
        <router-link to="/" class="nl" role="listitem" :class="{ active: route.path === '/' }">Home</router-link>
        <!-- SERVICES dropdown trigger -->
        <div style="position:relative;" role="listitem" @mouseenter="servicesDropdownOpen = true" @mouseleave="servicesDropdownOpen = false">
          <button class="nl" id="nav-services" aria-haspopup="true" :aria-expanded="servicesDropdownOpen" aria-controls="dd-services" :class="{ active: route.path === '/services', open: servicesDropdownOpen }" @click="toggleServices">
            Services <i class="ti ti-chevron-down" aria-hidden="true"></i>
          </button>
          
          <!-- Services mega-dropdown -->
          <div class="dropdown" id="dd-services" role="menu" aria-labelledby="nav-services" :class="{ open: servicesDropdownOpen }">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:0 24px;">
              <div>
                <div class="drop-section">
                  <div class="drop-section-label">Pillar 1 — ICT Lifecycle</div>
                  <router-link to="/services#deployment" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon navy"><i class="ti ti-device-laptop" aria-hidden="true"></i></div><div><div class="drop-item-name">Deployment &amp; Mobility</div><div class="drop-item-desc">Device imaging, zero-touch provisioning</div></div></router-link>
                  <router-link to="/services#logistics" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon navy"><i class="ti ti-truck" aria-hidden="true"></i></div><div><div class="drop-item-name">Logistics &amp; Infrastructure</div><div class="drop-item-desc">GPS-tracked transit, relocations</div></div></router-link>
                  <router-link to="/services#itad" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon slate"><i class="ti ti-recycle" aria-hidden="true"></i></div><div><div class="drop-item-name">Certified ITAD</div><div class="drop-item-desc">NIST 800-88, Certificates of Destruction</div></div></router-link>
                  <router-link to="/services#esg" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon green"><i class="ti ti-leaf" aria-hidden="true"></i></div><div><div class="drop-item-name">Sustainability &amp; ESG</div><div class="drop-item-desc">ESG reporting, EPP, tech donation</div></div></router-link>
                </div>
              </div>
              <div>
                <div class="drop-section">
                  <div class="drop-section-label">Pillar 2 — Cyber Defence</div>
                  <router-link to="/services#soc" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon navy"><i class="ti ti-radar" aria-hidden="true"></i></div><div><div class="drop-item-name">SOC Operations</div><div class="drop-item-desc">24/7 managed detection, SIEM/SOAR</div></div></router-link>
                  <router-link to="/services#iam" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon purple"><i class="ti ti-lock-access" aria-hidden="true"></i></div><div><div class="drop-item-name">Identity &amp; Access (IAM)</div><div class="drop-item-desc">Lifecycle management, MFA, Zero Trust</div></div></router-link>
                  <router-link to="/services#forensics" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon amber"><i class="ti ti-alert-triangle" aria-hidden="true"></i></div><div><div class="drop-item-name">Incident Response</div><div class="drop-item-desc">Forensics, data recovery, ransomware</div></div></router-link>
                  <router-link to="/services#analytics" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon teal"><i class="ti ti-chart-bar" aria-hidden="true"></i></div><div><div class="drop-item-name">Analytics &amp; Governance</div><div class="drop-item-desc">Power BI, Tableau, data governance</div></div></router-link>
                </div>
              </div>
            </div>
            <div class="drop-footer">
              <router-link to="/services" class="drop-footer-btn ghost" role="menuitem" @click="closeDropdowns"><i class="ti ti-layout-grid" aria-hidden="true"></i>All Services</router-link>
              <router-link to="/contact#quote" class="drop-footer-btn primary" role="menuitem" @click="closeDropdowns"><i class="ti ti-file-invoice" aria-hidden="true"></i>Get a 24-Hour Quote</router-link>
            </div>
          </div>
        </div>

        <!-- RESOURCES dropdown trigger -->
        <div style="position:relative;" role="listitem" @mouseenter="resourcesDropdownOpen = true" @mouseleave="resourcesDropdownOpen = false">
          <button class="nl" id="nav-resources" aria-haspopup="true" :aria-expanded="resourcesDropdownOpen" aria-controls="dd-resources" :class="{ active: route.path.startsWith('/resources'), open: resourcesDropdownOpen }" @click="toggleResources">
            Resources <i class="ti ti-chevron-down" aria-hidden="true"></i>
          </button>
          <div class="dropdown resources" id="dd-resources" role="menu" aria-labelledby="nav-resources" :class="{ open: resourcesDropdownOpen }">
            <div class="drop-section-label" style="padding:0 8px 8px;">Browse Resources</div>
            <router-link to="/resources/sustainability" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon green"><i class="ti ti-leaf" aria-hidden="true"></i></div><div><div class="drop-item-name">Sustainability</div><div class="drop-item-desc">ESG framework, green IT practices</div></div></router-link>
            <router-link to="/resources/blog" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon navy"><i class="ti ti-article" aria-hidden="true"></i></div><div><div class="drop-item-name">Blog</div><div class="drop-item-desc">Cybersecurity, ITAD &amp; analytics insights</div></div></router-link>
            <router-link to="/resources/news" class="drop-item" role="menuitem" @click="closeDropdowns"><div class="drop-item-icon slate"><i class="ti ti-news" aria-hidden="true"></i></div><div><div class="drop-item-name">News</div><div class="drop-item-desc">Company &amp; industry updates</div></div></router-link>
          </div>
        </div>

        <router-link to="/about" class="nl" role="listitem" :class="{ active: route.path === '/about' }">About Us</router-link>
        <router-link to="/contact" class="nl" role="listitem" :class="{ active: route.path === '/contact' }">Contact</router-link>

        <div class="ndiv" aria-hidden="true"></div>
        <router-link to="/login" class="nportal" role="listitem"><i class="ti ti-lock" aria-hidden="true"></i>Client Portal</router-link>

        <!-- Hamburger (visible on mobile only) -->
        <button class="hamburger" id="hamburger" aria-label="Open navigation menu" :aria-expanded="mobileMenuOpen" aria-controls="mobile-nav" :class="{ open: mobileMenuOpen }" @click="toggleMobileMenu">
          <span></span><span></span><span></span>
        </button>
      </div>
    </nav>

    <!-- MOBILE NAV DRAWER -->
    <div class="mob-overlay" id="mob-overlay" aria-hidden="true" :class="{ open: mobileMenuOpen }" @click="closeMobileNav"></div>
    <nav class="mobile-nav" id="mobile-nav" aria-label="Mobile navigation" :aria-hidden="!mobileMenuOpen" :class="{ open: mobileMenuOpen }">
      <div class="mobile-nav-inner">
        <div class="mob-section-label">General</div>
        <router-link to="/" class="mob-link" @click="closeMobileNav"><span class="mob-link-inner"><i class="ti ti-home" aria-hidden="true"></i>Home</span></router-link>

        <div class="mob-section-label">Services</div>
        <!-- Services expandable -->
        <button class="mob-expand-btn" id="mob-svc-btn" :aria-expanded="mobileServicesOpen" aria-controls="mob-svc-sub" :class="{ open: mobileServicesOpen }" @click="mobileServicesOpen = !mobileServicesOpen">
          <span style="display:flex;align-items:center;gap:10px;"><i class="ti ti-layout-grid" style="font-size:16px;color:var(--slate)"></i>Services</span>
          <i class="ti ti-chevron-down mob-chevron" aria-hidden="true"></i>
        </button>
        <div class="mob-sub" id="mob-svc-sub" :aria-hidden="!mobileServicesOpen" :class="{ open: mobileServicesOpen }">
          <router-link to="/services#deployment" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-device-laptop" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Deployment &amp; Mobility</div><div class="mob-sub-desc">Device imaging, provisioning</div></div></router-link>
          <router-link to="/services#logistics" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-truck" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Logistics &amp; Infrastructure</div><div class="mob-sub-desc">GPS-tracked transit, relocations</div></div></router-link>
          <router-link to="/services#itad" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-recycle" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Certified ITAD</div><div class="mob-sub-desc">NIST 800-88, CoD issuance</div></div></router-link>
          <router-link to="/services#esg" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-leaf" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Sustainability &amp; ESG</div><div class="mob-sub-desc">ESG reports, EPP, donation</div></div></router-link>
          <router-link to="/services#soc" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-radar" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">SOC Operations</div><div class="mob-sub-desc">24/7 managed detection</div></div></router-link>
          <router-link to="/services#iam" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-lock-access" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Identity &amp; Access</div><div class="mob-sub-desc">IAM, MFA, Zero Trust</div></div></router-link>
          <router-link to="/services#forensics" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-alert-triangle" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Incident Response</div><div class="mob-sub-desc">Forensics &amp; data recovery</div></div></router-link>
          <router-link to="/services#analytics" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-chart-bar" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Analytics &amp; Governance</div><div class="mob-sub-desc">Power BI, Tableau, MDM</div></div></router-link>
        </div>

        <div class="mob-section-label">Resources</div>
        <button class="mob-expand-btn" id="mob-res-btn" :aria-expanded="mobileResourcesOpen" aria-controls="mob-res-sub" :class="{ open: mobileResourcesOpen }" @click="mobileResourcesOpen = !mobileResourcesOpen">
          <span style="display:flex;align-items:center;gap:10px;"><i class="ti ti-books" style="font-size:16px;color:var(--slate)"></i>Resources</span>
          <i class="ti ti-chevron-down mob-chevron" aria-hidden="true"></i>
        </button>
        <div class="mob-sub" id="mob-res-sub" :aria-hidden="!mobileResourcesOpen" :class="{ open: mobileResourcesOpen }">
          <router-link to="/resources/sustainability" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-leaf" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Sustainability</div><div class="mob-sub-desc">ESG &amp; green IT</div></div></router-link>
          <router-link to="/resources/blog" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-article" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">Blog</div><div class="mob-sub-desc">Insights &amp; guides</div></div></router-link>
          <router-link to="/resources/news" class="mob-sub-item" @click="closeMobileNav"><i class="ti ti-news" aria-hidden="true"></i><div class="mob-sub-item-text"><div class="mob-sub-name">News</div><div class="mob-sub-desc">Company &amp; industry updates</div></div></router-link>
        </div>

        <div class="mob-section-label">Company</div>
        <router-link to="/about" class="mob-link" @click="closeMobileNav"><span class="mob-link-inner"><i class="ti ti-building" aria-hidden="true"></i>About Us</span></router-link>
        <router-link to="/contact" class="mob-link" @click="closeMobileNav"><span class="mob-link-inner"><i class="ti ti-mail" aria-hidden="true"></i>Contact</span></router-link>
        <router-link to="/privacy" class="mob-link" @click="closeMobileNav"><span class="mob-link-inner"><i class="ti ti-shield-check" aria-hidden="true"></i>Privacy Policy</span></router-link>
        <router-link to="/login" class="mob-link" @click="closeMobileNav"><span class="mob-link-inner"><i class="ti ti-lock" aria-hidden="true"></i>Client Portal</span></router-link>

        <div class="mob-ctas">
          <router-link to="/contact#quote" class="mob-cta-btn primary" @click="closeMobileNav"><i class="ti ti-file-invoice" aria-hidden="true"></i>Get a 24-Hour Quote</router-link>
          <router-link to="/contact#urgent" class="mob-cta-btn amber" @click="closeMobileNav"><i class="ti ti-alert-triangle" aria-hidden="true"></i>Urgent Data Recovery</router-link>
        </div>
      </div>
    </nav>

    <!-- Main Content Body -->
    <main class="main-content" :style="{ paddingTop: mainContentPadding }">
      <router-view />
    </main>

    <!-- Footer -->
    <footer v-if="showFooter" class="footer">
      <div class="footer-in">
        <div class="footer-top">
          <div>
            <div class="flogo"><em>enterprise</em> <strong>IT</strong></div>
            <p class="ftagline">SA Owned &amp; Operated. Servicing enterprise clients Australia-wide from our Adelaide CBD headquarters. ISO compliant. NIST 800-88 compliant.</p>
            <div class="fsocial">
              <a href="https://www.linkedin.com/company/enterpriseitau/" class="fsoc" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></a>
            </div>
          </div>
          <div>
            <div class="fctitle">Services</div>
            <router-link to="/services#deployment" class="flink">ICT Lifecycle</router-link>
            <router-link to="/services#itad" class="flink">Asset Disposition (ITAD)</router-link>
            <router-link to="/services#soc" class="flink">Cyber Defence (SOC)</router-link>
            <router-link to="/services#iam" class="flink">Identity &amp; Access (IAM)</router-link>
            <router-link to="/services#data-security" class="flink">Data Governance</router-link>
            <router-link to="/services#analytics" class="flink">Analytics &amp; Reporting</router-link>
          </div>
          <div>
            <div class="fctitle">Contact</div>
            <div class="fcontact"><i class="ti ti-map-pin" aria-hidden="true"></i>Adelaide CBD, South Australia</div>
            <div class="fcontact"><i class="ti ti-phone" aria-hidden="true"></i>+61 494 614 221</div>
            <div class="fcontact"><i class="ti ti-mail" aria-hidden="true"></i>support@enterpriseit.com.au</div>
            <div class="fcontact"><i class="ti ti-world" aria-hidden="true"></i>enterpriseit.com.au</div>
            <div style="margin-top:18px;">
              <div class="fctitle">Company</div>
              <router-link to="/about" class="flink">About Us</router-link>
              <router-link to="/resources/sustainability" class="flink">Sustainability</router-link>
              <router-link to="/resources/blog" class="flink">Blog &amp; News</router-link>
              <router-link to="/privacy" class="flink">Privacy Policy</router-link>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="fcopy">© 2025 enterprise IT Pty Ltd · All rights reserved</div>
          <div class="fcerts">
            <span class="fcert">ISO</span>
            <span class="fcert">NIST 800-88</span>
            <span class="fcert">ESG</span>
            <span class="fcert">ITAR</span>
          </div>
        </div>
      </div>
    </footer>

    <!-- Floating client portal access link (Only shown when not on portal pages) -->
    <router-link v-if="showFloatingPortal" to="/login" class="portal-float" aria-label="Access the client portal">
      <i class="ti ti-lock" aria-hidden="true"></i>Client Portal Login
    </router-link>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed, watch } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();

// Navigation state
const servicesDropdownOpen = ref(false);
const resourcesDropdownOpen = ref(false);
const mobileMenuOpen = ref(false);
const mobileServicesOpen = ref(false);
const mobileResourcesOpen = ref(false);

const isScrolled = ref(false);

// Toggles for dropdown triggers
const toggleServices = (e) => {
  e.stopPropagation();
  servicesDropdownOpen.value = !servicesDropdownOpen.value;
  resourcesDropdownOpen.value = false;
};

const toggleResources = (e) => {
  e.stopPropagation();
  resourcesDropdownOpen.value = !resourcesDropdownOpen.value;
  servicesDropdownOpen.value = false;
};

const closeDropdowns = () => {
  servicesDropdownOpen.value = false;
  resourcesDropdownOpen.value = false;
};

const toggleMobileMenu = (e) => {
  e.stopPropagation();
  mobileMenuOpen.value = !mobileMenuOpen.value;
  if (!mobileMenuOpen.value) {
    closeMobileNav();
  } else {
    document.body.style.overflow = 'hidden';
  }
};

const closeMobileNav = () => {
  mobileMenuOpen.value = false;
  mobileServicesOpen.value = false;
  mobileResourcesOpen.value = false;
  document.body.style.overflow = '';
};

// Window events
const handleGlobalClick = () => {
  closeDropdowns();
};

const handleKeyDown = (e) => {
  if (e.key === 'Escape') {
    closeDropdowns();
    closeMobileNav();
  }
};

const handleScroll = () => {
  isScrolled.value = window.scrollY > 8;
};

// Layout visibility rules
const showNav = computed(() => {
  return route.path !== '/dashboard' && route.path !== '/cms-admin' && route.path !== '/admin-login';
});

const showFooter = computed(() => {
  return route.path !== '/dashboard' && route.path !== '/cms-admin' && route.path !== '/admin-login';
});

const showFloatingPortal = computed(() => {
  return route.path !== '/login' && route.path !== '/dashboard' && route.path !== '/cms-admin' && route.path !== '/admin-login';
});

const mainContentPadding = computed(() => {
  if (route.path === '/dashboard' || route.path === '/cms-admin' || route.path === '/admin-login') return '0px';
  return '58px'; // standard topbar height
});

// Watch route path changes to close active mobile nav drawers
watch(() => route.path, () => {
  closeMobileNav();
  closeDropdowns();
});

onMounted(() => {
  window.addEventListener('scroll', handleScroll, { passive: true });
  window.addEventListener('click', handleGlobalClick);
  window.addEventListener('keydown', handleKeyDown);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
  window.removeEventListener('click', handleGlobalClick);
  window.removeEventListener('keydown', handleKeyDown);
});
</script>

<style scoped>
/* ─── TOKENS ─── */
:root {
  --navy: #002366;
  --navy-l: #1a3a6e;
  --slate: #708090;
  --green: #16a34a;
  --amber: #d97706;
  --purple: #7c3aed;
  --border: #dde1e9;
  --surface: #f7f8fb;
  --off: #f2f4f8;
  --text: #1a2233;
  --muted: #6b7280;
  --light: #b0b8c8;
}

.app-layout {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.main-content {
  flex: 1;
}

/* ─── MAIN NAV ─── */
.nav {
  background: #002366;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 32px;
  height: 58px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.07);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 500;
  transition: border-color .2s, box-shadow .2s;
}

.nav-scrolled {
  border-bottom-color: rgba(255, 255, 255, 0.13);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

.logo {
  color: #fff;
  font-size: 18px;
  letter-spacing: -0.3px;
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
}

.logo-text em {
  font-style: normal;
  font-weight: 300;
}

.logo-text strong {
  font-weight: 800;
  text-transform: uppercase;
}

.logo-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #4ade80;
  animation: ndot 2.5s ease-in-out infinite;
  flex-shrink: 0;
}

@keyframes ndot {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: .6; transform: scale(.85); }
}

/* Desktop nav links */
.nav-r {
  display: flex;
  align-items: center;
  gap: 2px;
}

.nl {
  color: rgba(255, 255, 255, 0.75);
  font-size: 13px;
  padding: 6px 11px;
  border-radius: 4px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 3px;
  background: none;
  border: none;
  font-family: inherit;
  text-decoration: none;
  transition: color .15s, background .15s;
  position: relative;
  white-space: nowrap;
}

.nl:hover, .nl.active, .nl.open {
  color: #fff;
  background: rgba(255, 255, 255, 0.07);
}

.nl.active {
  font-weight: 600;
}

.nl i {
  font-size: 11px;
  transition: transform .2s;
}

.nl.open i {
  transform: rotate(180deg);
}

.ndiv {
  width: 1px;
  height: 18px;
  background: rgba(255, 255, 255, 0.12);
  margin: 0 8px;
}

.nportal {
  background: rgba(112, 128, 144, 0.9);
  color: #fff;
  font-size: 11px;
  font-weight: 700;
  padding: 7px 14px;
  border-radius: 4px;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  border: none;
  display: flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  transition: background .15s;
}

.nportal:hover {
  background: #5a6878;
}

/* Hamburger (mobile) */
.hamburger {
  display: none;
  flex-direction: column;
  gap: 4px;
  background: none;
  border: none;
  padding: 6px;
  cursor: pointer;
  z-index: 600;
}

.hamburger span {
  display: block;
  width: 20px;
  height: 2px;
  background: #fff;
  border-radius: 1px;
  transition: all .25s;
}

.hamburger.open span:nth-child(1) {
  transform: translateY(6px) rotate(45deg);
}

.hamburger.open span:nth-child(2) {
  opacity: 0;
}

.hamburger.open span:nth-child(3) {
  transform: translateY(-6px) rotate(-45deg);
}

/* ─── MEGA DROPDOWN ─── */
.dropdown {
  position: absolute;
  top: calc(100% + 4px);
  left: 50%;
  transform: translateX(-50%) translateY(-6px);
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
  padding: 18px;
  min-width: 560px;
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  transition: opacity .18s, transform .18s, visibility .18s;
  z-index: 499;
}

.dropdown.open {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
  transform: translateX(-50%) translateY(0);
}

.dropdown-grid {
  display: grid;
  gap: 6px;
}

.drop-section {
  margin-bottom: 10px;
}

.drop-section-label {
  font-size: 9.5px;
  font-weight: 700;
  letter-spacing: 1.4px;
  text-transform: uppercase;
  color: #b0b8c8;
  margin-bottom: 6px;
  padding: 0 8px;
}

.drop-item {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  padding: 9px 10px;
  border-radius: 8px;
  text-decoration: none;
  transition: background .12s;
  text-align: left;
}

.drop-item:hover {
  background: #f7f8fb;
}

.drop-item-icon {
  width: 32px;
  height: 32px;
  border-radius: 7px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  margin-top: 1px;
}

.drop-item-icon i {
  font-size: 16px;
}

.drop-item-icon.navy { background: #e8eef8; }
.drop-item-icon.navy i { color: #002366; }
.drop-item-icon.green { background: #f0fdf4; }
.drop-item-icon.green i { color: #16a34a; }
.drop-item-icon.purple { background: #faf5ff; }
.drop-item-icon.purple i { color: #7c3aed; }
.drop-item-icon.slate { background: #f7f8fb; }
.drop-item-icon.slate i { color: #708090; }
.drop-item-icon.amber { background: #fef3c7; }
.drop-item-icon.amber i { color: #d97706; }
.drop-item-icon.teal { background: #f0fdfa; }
.drop-item-icon.teal i { color: #0d9488; }

.drop-item-name {
  font-size: 13px;
  font-weight: 600;
  color: #002366;
  line-height: 1.2;
  margin-bottom: 2px;
}

.drop-item-desc {
  font-size: 11.5px;
  color: #6b7280;
  line-height: 1.35;
}

.drop-footer {
  border-top: 0.5px solid #dde1e9;
  margin-top: 12px;
  padding-top: 12px;
  display: flex;
  gap: 8px;
}

.drop-footer-btn {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  padding: 9px 14px;
  border-radius: 7px;
  font-size: 12.5px;
  font-weight: 700;
  text-decoration: none;
  transition: all .15s;
}

.drop-footer-btn.primary {
  background: #002366;
  color: #fff;
}

.drop-footer-btn.primary:hover {
  opacity: .9;
}

.drop-footer-btn.ghost {
  background: #f7f8fb;
  color: #002366;
  border: 0.5px solid #dde1e9;
}

.drop-footer-btn.ghost:hover {
  background: #eef2fb;
}

.drop-footer-btn i {
  font-size: 14px;
}

/* Resources dropdown (narrower) */
.dropdown.resources {
  min-width: 320px;
}

/* ─── MOBILE DRAWER ─── */
.mobile-nav {
  position: fixed;
  top: 58px;
  left: 0;
  right: 0;
  bottom: 0;
  background: #fff;
  z-index: 490;
  overflow-y: auto;
  transform: translateX(100%);
  transition: transform .28s cubic-bezier(.4, 0, .2, 1);
}

.mobile-nav.open {
  transform: translateX(0);
}

.mobile-nav-inner {
  padding: 16px 0 32px;
}

.mob-section-label {
  font-size: 9.5px;
  font-weight: 700;
  letter-spacing: 1.4px;
  text-transform: uppercase;
  color: #b0b8c8;
  padding: 14px 22px 5px;
  text-align: left;
}

.mob-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 22px;
  font-size: 14px;
  font-weight: 500;
  color: #6b7280;
  border-bottom: 0.5px solid #f5f7fa;
  text-decoration: none;
  transition: color .12s, background .12s;
  text-align: left;
}

.mob-link:hover, .mob-link.active {
  color: #002366;
  background: #f7f8fb;
}

.mob-link.active {
  font-weight: 600;
}

.mob-link i {
  font-size: 16px;
  flex-shrink: 0;
}

.mob-link-inner {
  display: flex;
  align-items: center;
  gap: 10px;
}

.mob-expand-btn {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 22px;
  font-size: 14px;
  font-weight: 500;
  color: #6b7280;
  border-bottom: 0.5px solid #f5f7fa;
  cursor: pointer;
  background: none;
  border: none;
  width: 100%;
  font-family: inherit;
  transition: color .12s, background .12s;
}

.mob-expand-btn:hover {
  color: #002366;
  background: #f7f8fb;
}

.mob-expand-btn .mob-chevron {
  font-size: 15px;
  transition: transform .2s;
  flex-shrink: 0;
}

.mob-expand-btn.open .mob-chevron {
  transform: rotate(180deg);
}

.mob-sub {
  overflow: hidden;
  max-height: 0;
  transition: max-height .3s ease;
  background: #fafafc;
}

.mob-sub.open {
  max-height: 600px;
}

.mob-sub-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 22px 10px 42px;
  font-size: 13px;
  color: #6b7280;
  border-bottom: 0.5px solid #f9fafb;
  text-decoration: none;
  transition: color .12s, background .12s;
  text-align: left;
}

.mob-sub-item:hover {
  color: #002366;
  background: #f7f8fb;
}

.mob-sub-item i {
  font-size: 15px;
  flex-shrink: 0;
}

.mob-sub-name {
  font-size: 13px;
  font-weight: 600;
  color: #1a2233;
}

.mob-sub-desc {
  font-size: 11px;
  color: #6b7280;
  margin-top: 1px;
}

.mob-ctas {
  padding: 18px 22px;
  display: flex;
  flex-direction: column;
  gap: 9px;
  border-top: 0.5px solid #dde1e9;
  margin-top: 8px;
}

.mob-cta-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  padding: 13px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 700;
  text-decoration: none;
  transition: opacity .15s;
}

.mob-cta-btn.primary {
  background: #002366;
  color: #fff;
}

.mob-cta-btn.primary:hover {
  opacity: .9;
}

.mob-cta-btn.amber {
  background: #d97706;
  color: #fff;
}

.mob-cta-btn.amber:hover {
  opacity: .9;
}

.mob-cta-btn i {
  font-size: 16px;
}

/* Mobile overlay */
.mob-overlay {
  position: fixed;
  inset: 0;
  top: 58px;
  background: rgba(0, 0, 0, 0.35);
  z-index: 489;
  opacity: 0;
  visibility: hidden;
  transition: opacity .25s, visibility .25s;
}

.mob-overlay.open {
  opacity: 1;
  visibility: visible;
}

/* ─── FOOTER ─── */
.footer {
  background: #001440;
  padding: 44px 32px 22px;
}

.footer-in {
  max-width: 1080px;
  margin: 0 auto;
}

.footer-top {
  display: grid;
  grid-template-columns: 1.6fr 1fr 1fr;
  gap: 36px;
  padding-bottom: 28px;
  border-bottom: 0.5px solid rgba(255, 255, 255, 0.08);
  margin-bottom: 20px;
}

.flogo {
  color: #fff;
  font-size: 18px;
  margin-bottom: 9px;
  text-align: left;
}

.flogo em {
  font-style: normal;
  font-weight: 300;
}

.flogo strong {
  font-weight: 800;
  text-transform: uppercase;
}

.ftagline {
  color: rgba(255, 255, 255, 0.38);
  font-size: 12px;
  line-height: 1.6;
  margin-bottom: 16px;
  max-width: 280px;
  text-align: left;
}

.fsocial {
  display: flex;
  gap: 8px;
}

.fsoc {
  width: 32px;
  height: 32px;
  border-radius: 5px;
  background: rgba(255, 255, 255, 0.07);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: rgba(255, 255, 255, 0.6);
  transition: background 0.2s;
  text-decoration: none;
}

.fsoc:hover {
  background: rgba(255, 255, 255, 0.12);
  color: #fff;
}

.fsoc i {
  font-size: 15px;
}

.fctitle {
  color: rgba(255, 255, 255, 0.3);
  font-size: 10px;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  font-weight: 600;
  margin-bottom: 12px;
  text-align: left;
}

.flink {
  color: rgba(255, 255, 255, 0.58);
  font-size: 13px;
  display: block;
  margin-bottom: 8px;
  text-decoration: none;
  transition: color 0.15s;
  text-align: left;
}

.flink:hover {
  color: #fff;
}

.fcontact {
  color: rgba(255, 255, 255, 0.58);
  font-size: 13px;
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 8px;
  text-align: left;
}

.fcontact i {
  font-size: 13px;
  color: #708090;
  flex-shrink: 0;
}

.footer-bottom {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.fcopy {
  color: rgba(255, 255, 255, 0.22);
  font-size: 11px;
}

.fcerts {
  display: flex;
  gap: 7px;
}

.fcert {
  background: rgba(255, 255, 255, 0.05);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.38);
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 0.5px;
  padding: 4px 9px;
  border-radius: 3px;
}

/* PORTAL FIXED */
.portal-float {
  position: fixed;
  bottom: 28px;
  right: 28px;
  z-index: 200;
  background: #002366;
  border: 0.5px solid rgba(255, 255, 255, 0.2);
  color: #fff;
  font-family: inherit;
  font-size: 12px;
  font-weight: 600;
  padding: 10px 18px;
  border-radius: 30px;
  display: flex;
  align-items: center;
  gap: 7px;
  cursor: pointer;
  box-shadow: 0 4px 20px rgba(0, 35, 102, 0.35);
  transition: transform 0.2s, box-shadow 0.2s;
  text-decoration: none;
}

.portal-float:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 28px rgba(0, 35, 102, 0.45);
}

.portal-float i {
  font-size: 14px;
}

/* ─── RESPONSIVE ─── */
@media(max-width: 768px) {
  .nav-r .nl:not(.nportal-wrap) {
    display: none;
  }

  .ndiv {
    display: none;
  }

  .nportal {
    display: none;
  }

  .hamburger {
    display: flex;
  }
}

@media(min-width: 769px) {
  .mobile-nav, .mob-overlay {
    display: none !important;
  }
}

@media(max-width: 900px) {
  .footer-top {
    grid-template-columns: 1fr 1fr;
  }

  .footer-top > div:first-child {
    grid-column: span 2;
  }
}

@media(max-width: 600px) {
  .footer-top {
    grid-template-columns: 1fr;
  }

  .footer-top > div:first-child {
    grid-column: span 1;
  }

  .footer-bottom {
    flex-direction: column;
    gap: 12px;
    align-items: flex-start;
  }

  .nav {
    padding: 0 20px;
  }
}
</style>
