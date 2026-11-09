<template>
  <div class="not-found-view">
    <!-- Background ambient dots -->
    <div class="bg-dots" aria-hidden="true">
      <span style="left: 10%; animation-duration: 18s; animation-delay: 0s"></span>
      <span style="left: 25%; animation-duration: 22s; animation-delay: 3s"></span>
      <span style="left: 45%; animation-duration: 16s; animation-delay: 7s"></span>
      <span style="left: 65%; animation-duration: 20s; animation-delay: 1s"></span>
      <span style="left: 80%; animation-duration: 14s; animation-delay: 5s"></span>
      <span style="left: 90%; animation-duration: 24s; animation-delay: 9s"></span>
    </div>

    <!-- MAIN 404 CONTENT -->
    <main class="main" role="main">
      <div class="err-wrap">
        <!-- Big faded number + icon -->
        <div class="err-num" aria-hidden="true">404</div>
        <div class="err-icon-wrap" aria-hidden="true">
          <i class="ti ti-map-pin-off"></i>
        </div>

        <p class="err-tag">Error 404 · Page not found</p>
        <h1 class="err-h1">This page doesn't exist.</h1>
        <p class="err-desc">
          The page you're looking for may have moved, been renamed, or never existed. Try
          searching, use the links below, or head back to the homepage.
        </p>

        <!-- Primary CTAs -->
        <div class="err-ctas">
          <router-link to="/" class="btn-primary">
            <i class="ti ti-home" aria-hidden="true"></i>Back to Homepage
          </router-link>
          <router-link to="/contact" class="btn-ghost">
            <i class="ti ti-headset" aria-hidden="true"></i>Contact Support
          </router-link>
        </div>

        <!-- Quick navigation links -->
        <p class="quick-label">Or go directly to</p>
        <div class="quick-grid" role="navigation" aria-label="Quick links">
          <router-link to="/services" class="quick-card" aria-label="View Services">
            <div class="qc-icon"><i class="ti ti-layout-grid" aria-hidden="true"></i></div>
            <div>
              <div class="qc-name">Services</div>
              <div class="qc-desc">ICT lifecycle &amp; cyber defence</div>
            </div>
          </router-link>
          <router-link to="/about" class="quick-card" aria-label="View About Us">
            <div class="qc-icon"><i class="ti ti-building" aria-hidden="true"></i></div>
            <div>
              <div class="qc-name">About Us</div>
              <div class="qc-desc">SA owned &amp; operated</div>
            </div>
          </router-link>
          <router-link to="/resources/blog" class="quick-card" aria-label="Visit Blog">
            <div class="qc-icon"><i class="ti ti-article" aria-hidden="true"></i></div>
            <div>
              <div class="qc-name">Blog</div>
              <div class="qc-desc">Insights &amp; expert guides</div>
            </div>
          </router-link>
          <router-link to="/contact#quote" class="quick-card" aria-label="Get a 24-hour quote">
            <div class="qc-icon"><i class="ti ti-file-invoice" aria-hidden="true"></i></div>
            <div>
              <div class="qc-name">Get a Quote</div>
              <div class="qc-desc">Reply within 24 hours</div>
            </div>
          </router-link>
          <router-link to="/contact#urgent" class="quick-card" aria-label="Urgent incident help">
            <div class="qc-icon" style="background: #fef3c7">
              <i
                class="ti ti-alert-triangle"
                aria-hidden="true"
                style="color: #d97706"
              ></i>
            </div>
            <div>
              <div class="qc-name">Urgent Incident Help</div>
              <div class="qc-desc">Security incidents &amp; data loss</div>
            </div>
          </router-link>
          <router-link to="/login" class="quick-card" aria-label="Client portal login">
            <div class="qc-icon"><i class="ti ti-lock" aria-hidden="true"></i></div>
            <div>
              <div class="qc-name">Client Portal</div>
              <div class="qc-desc">Secure document access</div>
            </div>
          </router-link>
        </div>

        <!-- Site search -->
        <div class="search-wrap" role="search" aria-label="Search the site">
          <input
            v-model="searchQuery"
            class="search-input"
            type="search"
            placeholder="Search the site, e.g. NIST 800-88, MFA, ITAD…"
            aria-label="Search enterprise IT"
            @keydown.enter="handleSearch"
          />
          <button class="search-btn" aria-label="Submit search" @click="handleSearch">
            <i class="ti ti-search" aria-hidden="true"></i>
          </button>
          <p class="search-hint">Press Enter or click the search icon</p>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const searchQuery = ref('');
const router = useRouter();

const handleSearch = () => {
  if (searchQuery.value.trim()) {
    router.push({
      path: '/resources/blog',
      query: { search: searchQuery.value.trim() },
    });
  }
};
</script>

<style scoped>
.not-found-view {
  min-height: calc(100vh - 120px);
  display: flex;
  flex-direction: column;
  position: relative;
  background: #f2f4f8;
  color: #444c5c;
}

/* 404 MAIN */
.main {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 60px 32px;
  position: relative;
  z-index: 1;
}
.err-wrap {
  max-width: 600px;
  width: 100%;
  text-align: center;
}

/* Big 404 number */
.err-num {
  font-size: 120px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -6px;
  line-height: 1;
  margin-bottom: 8px;
  opacity: 0.08;
  user-select: none;
}
.err-icon-wrap {
  margin: -80px auto 24px;
  width: 80px;
  height: 80px;
  border-radius: 20px;
  background: #002366;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 8px 32px rgba(0, 35, 102, 0.18);
  position: relative;
  z-index: 1;
}
.err-icon-wrap i {
  font-size: 38px;
  color: #fff;
}

.err-tag {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.6px;
  text-transform: uppercase;
  color: #708090;
  margin-bottom: 10px;
}
.err-h1 {
  font-size: 28px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -0.5px;
  margin-bottom: 12px;
  line-height: 1.2;
}
.err-desc {
  font-size: 15px;
  color: #6b7280;
  line-height: 1.65;
  margin-bottom: 32px;
  max-width: 460px;
  margin-left: auto;
  margin-right: auto;
}

/* CTA buttons */
.err-ctas {
  display: flex;
  gap: 10px;
  justify-content: center;
  flex-wrap: wrap;
  margin-bottom: 44px;
}
.btn-primary {
  background: #002366;
  color: #fff;
  font-size: 13.5px;
  font-weight: 700;
  padding: 12px 22px;
  border-radius: 6px;
  border: none;
  display: flex;
  align-items: center;
  gap: 7px;
  text-decoration: none;
  transition: opacity 0.15s, transform 0.15s;
}
.btn-primary:hover {
  opacity: 0.9;
  transform: translateY(-1px);
}
.btn-ghost {
  background: #fff;
  color: #002366;
  font-size: 13.5px;
  font-weight: 600;
  padding: 12px 22px;
  border-radius: 6px;
  border: 0.5px solid #dde1e9;
  display: flex;
  align-items: center;
  gap: 7px;
  text-decoration: none;
  transition: all 0.15s;
}
.btn-ghost:hover {
  border-color: #b0bad0;
  background: #f0f4fc;
}
.btn-primary i,
.btn-ghost i {
  font-size: 15px;
}

/* Quick links */
.quick-label {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.4px;
  text-transform: uppercase;
  color: #b0b8c8;
  margin-bottom: 14px;
}
.quick-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  max-width: 540px;
  margin: 0 auto;
}
.quick-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 10px;
  padding: 14px 14px;
  text-align: left;
  text-decoration: none;
  transition: all 0.15s;
  display: flex;
  align-items: flex-start;
  gap: 10px;
}
.quick-card:hover {
  border-color: #b0bad0;
  transform: translateY(-2px);
  box-shadow: 0 4px 16px rgba(0, 35, 102, 0.07);
}
.qc-icon {
  width: 32px;
  height: 32px;
  border-radius: 7px;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.qc-icon i {
  font-size: 16px;
  color: #002366;
}
.qc-name {
  font-size: 12.5px;
  font-weight: 700;
  color: #002366;
  margin-bottom: 2px;
}
.qc-desc {
  font-size: 11px;
  color: #708090;
  line-height: 1.35;
}

/* Search bar */
.search-wrap {
  position: relative;
  max-width: 400px;
  margin: 32px auto 0;
}
.search-input {
  width: 100%;
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 8px;
  padding: 12px 44px 12px 16px;
  font-size: 13.5px;
  color: #1a2233;
  font-family: inherit;
  outline: none;
  transition: border-color 0.15s, box-shadow 0.15s;
}
.search-input:focus {
  border-color: #002366;
  box-shadow: 0 0 0 3px rgba(0, 35, 102, 0.07);
}
.search-input::placeholder {
  color: #b0b8c8;
}
.search-btn {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  background: #002366;
  border: none;
  border-radius: 5px;
  width: 28px;
  height: 28px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: opacity 0.15s;
}
.search-btn:hover {
  opacity: 0.85;
}
.search-btn i {
  font-size: 14px;
  color: #fff;
}
.search-hint {
  font-size: 11px;
  color: #b0b8c8;
  text-align: center;
  margin-top: 8px;
}

/* Animated background dots */
.bg-dots {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  overflow: hidden;
}
.bg-dots span {
  position: absolute;
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: #002366;
  opacity: 0.08;
  animation: float linear infinite;
}
@keyframes float {
  0% {
    transform: translateY(100vh) rotate(0);
  }
  100% {
    transform: translateY(-100px) rotate(360deg);
  }
}

@media (max-width: 600px) {
  .main {
    padding: 40px 20px;
  }
  .err-num {
    font-size: 80px;
  }
  .quick-grid {
    grid-template-columns: 1fr 1fr;
  }
  .err-ctas {
    flex-direction: column;
    align-items: center;
  }
}
</style>
