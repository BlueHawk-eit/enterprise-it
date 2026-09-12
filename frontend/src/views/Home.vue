<template>
  <div class="home-v2-view">
    <!-- HERO -->
    <section class="hero" aria-labelledby="hero-heading">
      <div class="hero-grid">
        <div>
          <div class="hero-eyebrow">
            <span
              style="
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: #4ade80;
                flex-shrink: 0;
                animation: pulse 2.5s ease-in-out infinite;
              "
              aria-hidden="true"
            ></span>
            SA Owned &amp; Operated · Adelaide CBD
          </div>
          <h1 class="hero-h1" id="hero-heading">
            Australia's Enterprise IT<br />Partner —
            <span class="accent">From<br />Device to Defence.</span>
          </h1>
          <p class="hero-sub">
            End-to-end ICT lifecycle management and cyber defence. GPS-tracked logistics,
            military-grade data sanitisation, and 24/7 SOC — one partner, full coverage.
          </p>
          <div class="hero-ctas">
            <router-link to="/contact#quote" class="btn-white"
              ><i class="ti ti-file-invoice" aria-hidden="true"></i>Get 24-Hour
              Quote</router-link
            >
            <router-link to="/contact#urgent" class="btn-amber"
              ><i class="ti ti-alert-triangle" aria-hidden="true"></i>Urgent Data
              Recovery</router-link
            >
          </div>
          <div class="hero-stats" aria-label="Key service metrics">
            <div class="hstat">
              <div class="hstat-num">24/7</div>
              <div class="hstat-label">SOC Operations<br />SIEM/SOAR</div>
            </div>
            <div class="hstat">
              <div class="hstat-num">NIST<br />800-88</div>
              <div class="hstat-label">Data Sanitisation<br />Standard</div>
            </div>
            <div class="hstat">
              <div class="hstat-num">ISO</div>
              <div class="hstat-label">Compliant</div>
            </div>
            <div class="hstat">
              <div class="hstat-num">AUS-wide</div>
              <div class="hstat-label">Device Shipping<br />&amp; Logistics</div>
            </div>
          </div>
        </div>

        <!-- Status card -->
        <aside class="hero-card" aria-label="Live service status">
          <div class="hc-title">Live Services Status</div>
          <div class="hc-item">
            <div class="hc-icon"><i class="ti ti-radar" aria-hidden="true"></i></div>
            <div>
              <div class="hc-label">SOC Operations</div>
              <div class="hc-sub">Threat monitoring active</div>
              <div class="hc-badge">
                <span
                  style="width: 5px; height: 5px; border-radius: 50%; background: #4ade80"
                  aria-hidden="true"
                ></span
                >Operational
              </div>
            </div>
          </div>
          <div class="hc-item">
            <div class="hc-icon"><i class="ti ti-truck" aria-hidden="true"></i></div>
            <div>
              <div class="hc-label">Logistics &amp; Fleet</div>
              <div class="hc-sub">GPS tracking enabled</div>
              <div class="hc-badge">
                <span
                  style="width: 5px; height: 5px; border-radius: 50%; background: #4ade80"
                  aria-hidden="true"
                ></span
                >Active
              </div>
            </div>
          </div>
          <div class="hc-item">
            <div class="hc-icon"><i class="ti ti-shield-check" aria-hidden="true"></i></div>
            <div>
              <div class="hc-label">Data Sanitisation</div>
              <div class="hc-sub">Secure ITAD processing</div>
              <div class="hc-badge">
                <span
                  style="width: 5px; height: 5px; border-radius: 50%; background: #4ade80"
                  aria-hidden="true"
                ></span
                >Ready
              </div>
            </div>
          </div>
          <div
            style="
              margin-top: 16px;
              padding-top: 14px;
              border-top: 0.5px solid rgba(255, 255, 255, 0.08);
            "
          >
            <div class="hc-resp-label">GUARANTEED RESPONSE TIME</div>
            <div class="hc-resp-bar">
              <div class="resp-track"><div class="resp-fill"></div></div>
              <div class="resp-val">≤24 hrs</div>
            </div>
          </div>
        </aside>
      </div>
    </section>

    <!-- TRUST BAR -->
    <div class="tbar" aria-label="Standards and alignment">
      <div class="tbar-inner">
        <span class="tbar-left">Standards &amp; Alignment</span>
        <div class="tbar-badges">
          <div class="tbadge"><i class="ti ti-shield-check" aria-hidden="true"></i>ISO 27001-aligned</div>
          <div class="tbadge"><i class="ti ti-file-certificate" aria-hidden="true"></i>NIST 800-88</div>
          <div class="tbadge"><i class="ti ti-building-skyscraper" aria-hidden="true"></i>Adelaide CBD HQ</div>
          <div class="tbadge"><i class="ti ti-leaf" aria-hidden="true"></i>ESG Reporting</div>
          <div class="tbadge"><i class="ti ti-map-pin" aria-hidden="true"></i>SA Owned &amp; Operated</div>
        </div>
      </div>
    </div>

    <!-- METRICS BAND -->
    <div class="metrics" id="metrics-section" aria-label="Key performance metrics">
      <div class="metrics-in">
        <div class="metric">
          <div><span class="metric-num">{{ metrics.m1 }}</span><span class="metric-unit">%</span></div>
          <div class="metric-label">Data breach rate<br />on managed assets</div>
        </div>
        <div class="metric">
          <div><span class="metric-num">{{ metrics.m2 }}</span><span class="metric-unit"> hr</span></div>
          <div class="metric-label">Guaranteed quote<br />response time</div>
        </div>
        <div class="metric">
          <div><span class="metric-num">{{ metrics.m3 }}</span><span class="metric-unit">+</span></div>
          <div class="metric-label">Enterprise clients<br />Australia-wide</div>
        </div>
        <div class="metric">
          <div><span class="metric-num">{{ metrics.m4 }}</span><span class="metric-unit">/7</span></div>
          <div class="metric-label">SOC monitoring<br />SIEM &amp; SOAR</div>
        </div>
      </div>
    </div>

    <!-- SERVICE PILLARS -->
    <section class="sec sec-alt" aria-labelledby="services-heading">
      <div class="sec-in">
        <p class="stag">Core Services</p>
        <h2 class="sh2" id="services-heading">Two pillars. One trusted partner.</h2>
        <p class="sdesc">
          Complete enterprise IT coverage — physical asset lifecycle through digital security and
          compliance.
        </p>
        <div class="svc-panels">
          <article class="svc-panel fade-up">
            <div class="svc-ph">
              <div class="svc-pnum">Pillar 01</div>
              <div class="svc-ptitle">ICT Lifecycle &amp;<br />Asset Sovereignty</div>
            </div>
            <div class="svc-pb">
              <div class="svc-kpi">
                <div class="svc-kpi-val long-val">Data Sanitisation</div>
                <div class="svc-kpi-label long-label">Military-grade<br />data eradication</div>
              </div>
              <ul class="svc-list">
                <li class="svc-li">
                  <i class="ti ti-device-laptop" aria-hidden="true"></i>Remote-ready device
                  deployment &amp; imaging
                </li>
                <li class="svc-li">
                  <i class="ti ti-truck" aria-hidden="true"></i>Precision relocations, GPS-tracked
                  logistics
                </li>
                <li class="svc-li">
                  <i class="ti ti-recycle" aria-hidden="true"></i>Secure ITAD — military-grade
                  data eradication
                </li>
                <li class="svc-li">
                  <i class="ti ti-leaf" aria-hidden="true"></i>ESG reporting &amp; Employee Purchase
                  Programs
                </li>
                <li class="svc-li">
                  <i class="ti ti-clipboard-check" aria-hidden="true"></i>ICT asset auditing &amp;
                  lifecycle management
                </li>
              </ul>
              <router-link to="/services" class="svc-link">
                Explore ICT Lifecycle <i class="ti ti-arrow-right" aria-hidden="true"></i>
              </router-link>
            </div>
          </article>
          <article class="svc-panel fade-up">
            <div class="svc-ph alt">
              <div class="svc-pnum">Pillar 02</div>
              <div class="svc-ptitle">Digital Intelligence &amp;<br />Cyber Defence</div>
            </div>
            <div class="svc-pb">
              <div class="svc-kpi" style="background: #edf0fb">
                <div class="svc-kpi-val">24/7</div>
                <div class="svc-kpi-label">Managed detection<br />SIEM / SOAR</div>
              </div>
              <ul class="svc-list">
                <li class="svc-li">
                  <i class="ti ti-radar" aria-hidden="true"></i>24/7 SOC — threat hunting &amp;
                  managed detection
                </li>
                <li class="svc-li">
                  <i class="ti ti-users" aria-hidden="true"></i>IAM — full identity lifecycle &amp;
                  phishing-resistant MFA
                </li>
                <li class="svc-li">
                  <i class="ti ti-database" aria-hidden="true"></i>Data governance, DLP &amp;
                  compliance auditing
                </li>
                <li class="svc-li">
                  <i class="ti ti-chart-bar" aria-hidden="true"></i>Power BI &amp; Tableau analytics
                  &amp; KPI dashboards
                </li>
                <li class="svc-li">
                  <i class="ti ti-bug" aria-hidden="true"></i>Incident response, forensics &amp;
                  data recovery
                </li>
              </ul>
              <router-link to="/services" class="svc-link">
                Explore Cyber Defence <i class="ti ti-arrow-right" aria-hidden="true"></i>
              </router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section class="sec sec-bg" aria-labelledby="why-heading">
      <div class="sec-in">
        <p class="stag">Why enterprise IT</p>
        <h2 class="sh2" id="why-heading">Built for enterprise. Proven in the field.</h2>
        <p class="sdesc">
          A single partner for the full technology lifecycle — from deployment through secure
          decommission.
        </p>
        <div class="why-grid">
          <div class="why-card fade-up">
            <div class="why-ico"><i class="ti ti-world" aria-hidden="true"></i></div>
            <div class="why-title">National Scale</div>
            <p class="why-desc">
              Australia-wide shipping and next-gen workspace deployment across all states and
              territories.
            </p>
            <div class="why-proof">
              <i class="ti ti-check" aria-hidden="true"></i>All states &amp; territories
            </div>
          </div>
          <div class="why-card fade-up">
            <div class="why-ico"><i class="ti ti-shield-lock" aria-hidden="true"></i></div>
            <div class="why-title">Military-grade Security</div>
            <p class="why-desc">
              NIST 800-88 eradication and enterprise encryption to protect data at every stage.
            </p>
            <div class="why-proof"><i class="ti ti-check" aria-hidden="true"></i>Zero breach record</div>
          </div>
          <div class="why-card fade-up">
            <div class="why-ico"><i class="ti ti-leaf" aria-hidden="true"></i></div>
            <div class="why-title">Sustainable Legacy</div>
            <p class="why-desc">
              Full ESG reporting, green technology donation programs, and responsible sustainable
              disposal.
            </p>
            <div class="why-proof">
              <i class="ti ti-check" aria-hidden="true"></i>ESG reporting
            </div>
          </div>
          <div class="why-card fade-up">
            <div class="why-ico"><i class="ti ti-clock" aria-hidden="true"></i></div>
            <div class="why-title">24-Hour Response</div>
            <p class="why-desc">
              Guaranteed response from an enterprise IT specialist within 24 hours — no bots, no
              queues.
            </p>
            <div class="why-proof"><i class="ti ti-check" aria-hidden="true"></i>Guaranteed SLA</div>
          </div>
          <div class="why-card fade-up">
            <div class="why-ico"><i class="ti ti-building" aria-hidden="true"></i></div>
            <div class="why-title">SA Owned &amp; Operated</div>
            <p class="why-desc">
              Proudly headquartered in Adelaide CBD — local accountability, national capability.
            </p>
            <div class="why-proof"><i class="ti ti-check" aria-hidden="true"></i>Adelaide CBD HQ</div>
          </div>
          <div class="why-card fade-up">
            <div class="why-ico"><i class="ti ti-file-certificate" aria-hidden="true"></i></div>
            <div class="why-title">Compliance-first</div>
            <p class="why-desc">
              ISO, NIST and premier cybersecurity standards embedded across every service we
              deliver.
            </p>
            <div class="why-proof">
              <i class="ti ti-check" aria-hidden="true"></i>ISO 27001 &amp; NIST aligned
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="sec sec-alt" aria-labelledby="process-heading">
      <div class="sec-in">
        <p class="stag">How It Works</p>
        <h2 class="sh2" id="process-heading">Simple from day one.</h2>
        <p class="sdesc" style="margin-bottom: 40px">
          From first contact to secure onboarding — fast, transparent, and easy.
        </p>
        <div class="process-grid">
          <div class="pstep fade-up">
            <div class="pstep-num">01</div>
            <div class="pstep-title">Submit a quote</div>
            <p class="pstep-desc">Fill in the 24-hour quote form — hardware, digital services, or both.</p>
          </div>
          <div class="pstep fade-up">
            <div class="pstep-num">02</div>
            <div class="pstep-title">Specialist review</div>
            <p class="pstep-desc">
              A dedicated enterprise IT specialist reviews your requirements within 24 hours.
            </p>
          </div>
          <div class="pstep fade-up">
            <div class="pstep-num">03</div>
            <div class="pstep-title">Tailored proposal</div>
            <p class="pstep-desc">
              You receive a scoped, transparent proposal covering your exact needs.
            </p>
          </div>
          <div class="pstep fade-up">
            <div class="pstep-num">04</div>
            <div class="pstep-title">Secure onboarding</div>
            <p class="pstep-desc">
              Client portal access issued — documents, reports, and invoices in one secure place.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA BAND -->
    <div class="ctaband">
      <div class="ctaband-in">
        <div class="ctaband-left">
          <h3>Ready to talk to our team?</h3>
          <p>Get a response from an enterprise IT specialist within 24 hours — guaranteed.</p>
        </div>
        <div class="ctaband-btns">
          <router-link to="/contact#quote" class="cta-white">Request a 24-Hour Quote →</router-link>
          <router-link to="/contact" class="cta-outline">Contact Us</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted } from 'vue';

const metrics = reactive({
  m1: 0,
  m2: 0,
  m3: 0,
  m4: 0,
});

let fadeObserver = null;
let metricsObserver = null;

// Count-up helper function
const runCountUp = (key, target, duration) => {
  const start = performance.now();
  const tick = (now) => {
    const elapsed = now - start;
    const progress = Math.min(elapsed / duration, 1);
    const ease = 1 - Math.pow(1 - progress, 3); // Cubic ease out
    metrics[key] = Math.round(ease * target);
    if (progress < 1) {
      requestAnimationFrame(tick);
    } else {
      metrics[key] = target;
    }
  };
  requestAnimationFrame(tick);
};

onMounted(() => {
  // Setup fade-up observer
  const fadeEls = document.querySelectorAll('.fade-up');
  fadeObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          fadeObserver.unobserve(e.target);
        }
      });
    },
    { threshold: 0.1 }
  );
  fadeEls.forEach((el) => fadeObserver.observe(el));

  // Setup metrics count observer
  const metricsSection = document.getElementById('metrics-section');
  metricsObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          runCountUp('m1', 0, 800);
          runCountUp('m2', 24, 1200);
          runCountUp('m3', 200, 1400);
          runCountUp('m4', 24, 1000);
          metricsObserver.disconnect();
        }
      });
    },
    { threshold: 0.3 }
  );
  if (metricsSection) {
    metricsObserver.observe(metricsSection);
  }
});

onUnmounted(() => {
  if (fadeObserver) fadeObserver.disconnect();
  if (metricsObserver) metricsObserver.disconnect();
});
</script>

<style scoped>
.home-v2-view {
  font-family: 'Inter', system-ui, sans-serif;
  background: #f2f4f8;
  color: #444c5c;
  text-align: left;
}

/* HERO */
.hero {
  background: #002366;
  padding: 52px 32px 48px;
  position: relative;
  overflow: hidden;
}
.hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(112, 128, 144, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(112, 128, 144, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}
.hero-grid {
  display: grid;
  grid-template-columns: 1fr 280px;
  gap: 32px;
  align-items: start;
  max-width: 1080px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}
.hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: rgba(255, 255, 255, 0.06);
  border: 0.5px solid rgba(255, 255, 255, 0.14);
  color: rgba(255, 255, 255, 0.7);
  font-size: 10px;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  padding: 5px 12px;
  border-radius: 20px;
  margin-bottom: 18px;
}
.hero-h1 {
  color: #fff;
  font-size: 34px;
  font-weight: 800;
  line-height: 1.12;
  letter-spacing: -0.8px;
  margin-bottom: 14px;
}
.hero-h1 .accent {
  color: #708090;
}
.hero-sub {
  color: rgba(255, 255, 255, 0.6);
  font-size: 14px;
  line-height: 1.65;
  margin-bottom: 26px;
  max-width: 460px;
}
.hero-ctas {
  display: flex;
  gap: 10px;
  margin-bottom: 36px;
}
.btn-white {
  background: #fff;
  color: #002366;
  font-size: 13px;
  font-weight: 700;
  padding: 11px 20px;
  border-radius: 5px;
  cursor: pointer;
  border: none;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  font-family: inherit;
}
.btn-white:hover {
  opacity: 0.92;
}
.btn-amber {
  background: #d97706;
  color: #fff;
  font-size: 13px;
  font-weight: 700;
  padding: 11px 20px;
  border-radius: 5px;
  cursor: pointer;
  border: none;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  font-family: inherit;
}
.btn-amber:hover {
  opacity: 0.9;
}
.btn-amber i,
.btn-white i {
  font-size: 14px;
}

/* HERO STATS */
.hero-stats {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  border-top: 0.5px solid rgba(255, 255, 255, 0.1);
  padding-top: 24px;
}
.hstat {
  padding: 0 16px 0 0;
}
.hstat + .hstat {
  padding-left: 16px;
  border-left: 0.5px solid rgba(255, 255, 255, 0.1);
}
.hstat-num {
  color: #fff;
  font-size: 20px;
  font-weight: 800;
  letter-spacing: -0.5px;
}
.hstat-label {
  color: rgba(255, 255, 255, 0.45);
  font-size: 10px;
  margin-top: 3px;
  letter-spacing: 0.3px;
  line-height: 1.4;
}

/* HERO RIGHT CARD */
.hero-card {
  background: rgba(255, 255, 255, 0.06);
  border: 0.5px solid rgba(255, 255, 255, 0.12);
  border-radius: 10px;
  padding: 20px;
  text-align: left;
}
.hc-title {
  color: rgba(255, 255, 255, 0.5);
  font-size: 10px;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  margin-bottom: 14px;
}
.hc-item {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  padding: 10px 0;
  border-bottom: 0.5px solid rgba(255, 255, 255, 0.07);
}
.hc-item:last-of-type {
  border-bottom: none;
}
.hc-icon {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  background: rgba(255, 255, 255, 0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.hc-icon i {
  font-size: 15px;
  color: rgba(255, 255, 255, 0.7);
}
.hc-label {
  color: #fff;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 2px;
}
.hc-sub {
  color: rgba(255, 255, 255, 0.45);
  font-size: 11px;
  line-height: 1.4;
}
.hc-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: rgba(74, 222, 128, 0.12);
  border: 0.5px solid rgba(74, 222, 128, 0.25);
  color: #4ade80;
  font-size: 10px;
  font-weight: 600;
  padding: 2px 7px;
  border-radius: 10px;
  margin-top: 5px;
}
.hc-resp-label {
  color: rgba(255, 255, 255, 0.35);
  font-size: 10px;
  letter-spacing: 0.6px;
  margin-bottom: 9px;
}
.hc-resp-bar {
  display: flex;
  align-items: center;
  gap: 10px;
}
.resp-track {
  flex: 1;
  height: 3px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 2px;
  overflow: hidden;
}
.resp-fill {
  width: 85%;
  height: 100%;
  background: #4ade80;
  border-radius: 2px;
}
.resp-val {
  font-size: 12px;
  font-weight: 700;
  color: #fff;
  white-space: nowrap;
}

/* TRUST BAR */
.tbar {
  background: #fff;
  border-bottom: 0.5px solid #e2e5ec;
  padding: 12px 32px;
}
.tbar-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1080px;
  margin: 0 auto;
  flex-wrap: wrap;
}
.tbar-left {
  color: #708090;
  font-size: 10px;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  font-weight: 600;
}
.tbar-badges {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
}
.tbadge {
  display: flex;
  align-items: center;
  gap: 6px;
  background: #f5f7fa;
  border: 0.5px solid #dde1e9;
  border-radius: 20px;
  padding: 5px 12px;
  font-size: 11px;
  font-weight: 600;
  color: #002366;
}
.tbadge i {
  font-size: 13px;
  color: #708090;
}

/* METRICS */
.metrics {
  background: #002366;
  padding: 36px 32px;
}
.metrics-in {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  max-width: 1080px;
  margin: 0 auto;
}
.metric {
  padding: 0 24px;
  text-align: center;
}
.metric + .metric {
  border-left: 0.5px solid rgba(255, 255, 255, 0.1);
}
.metric-num {
  color: #fff;
  font-size: 28px;
  font-weight: 800;
  letter-spacing: -1px;
}
.metric-unit {
  color: #708090;
  font-size: 14px;
  font-weight: 600;
}
.metric-label {
  color: rgba(255, 255, 255, 0.45);
  font-size: 11px;
  margin-top: 4px;
  letter-spacing: 0.3px;
}

/* SECTION SHARED */
.sec {
  padding: 52px 32px;
}
.sec-bg {
  background: #fff;
}
.sec-alt {
  background: #f2f4f8;
}
.sec-in {
  max-width: 1080px;
  margin: 0 auto;
}
.stag {
  font-size: 10px;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: #708090;
  font-weight: 700;
  margin-bottom: 5px;
}
.sh2 {
  font-size: 28px;
  font-weight: 800;
  color: #002366;
  margin-bottom: 8px;
  letter-spacing: -0.5px;
}
.sdesc {
  font-size: 14px;
  color: #6b7280;
  line-height: 1.65;
  margin-bottom: 28px;
}

/* SERVICE PILLARS */
.svc-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px;
}
.svc-panel {
  background: #fff;
  border-radius: 10px;
  border: 0.5px solid #dde1e9;
  overflow: hidden;
  transition: transform 0.2s;
}
.svc-panel:hover {
  transform: translateY(-3px);
}
.svc-ph {
  background: #002366;
  padding: 16px 18px;
}
.svc-ph.alt {
  background: #1a3a6e;
}
.svc-pnum {
  font-size: 10px;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.45);
  margin-bottom: 3px;
}
.svc-ptitle {
  font-size: 13px;
  font-weight: 700;
  color: #fff;
  line-height: 1.3;
}
.svc-pb {
  padding: 16px 18px;
}
.svc-kpi {
  background: #f0f4fa;
  border-radius: 7px;
  padding: 10px 14px;
  margin-bottom: 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.svc-kpi-val {
  font-size: 18px;
  font-weight: 800;
  color: #002366;
}
.svc-kpi-val.long-val {
  font-size: 14px;
}
.svc-kpi-label {
  font-size: 11px;
  color: #708090;
  line-height: 1.3;
  text-align: right;
  max-width: 100px;
}
.svc-kpi-label.long-label {
  max-width: 150px;
}
.svc-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 7px;
}
.svc-li {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  font-size: 12px;
  color: #444;
  line-height: 1.4;
}
.svc-li i {
  font-size: 14px;
  color: #708090;
  flex-shrink: 0;
  margin-top: 1px;
}
.svc-link {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  margin-top: 14px;
  font-size: 12px;
  font-weight: 700;
  color: #002366;
  text-decoration: none;
  transition: gap 0.15s;
}
.svc-link:hover {
  gap: 8px;
}
.svc-link i {
  font-size: 13px;
}

/* WHY CHOOSE */
.why-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px;
}
.why-card {
  background: #fff;
  border-radius: 10px;
  border: 0.5px solid #dde1e9;
  padding: 22px 18px;
  transition: transform 0.2s, border-color 0.2s;
}
.why-card:hover {
  transform: translateY(-2px);
  border-color: #b0bad0;
}
.why-ico {
  width: 42px;
  height: 42px;
  border-radius: 8px;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
}
.why-ico i {
  font-size: 20px;
  color: #002366;
}
.why-title {
  font-size: 13px;
  font-weight: 700;
  color: #002366;
  margin-bottom: 7px;
}
.why-desc {
  font-size: 12px;
  color: #6b7280;
  line-height: 1.55;
}
.why-proof {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  margin-top: 12px;
  font-size: 11px;
  font-weight: 600;
  color: #002366;
  background: #eef2fb;
  border-radius: 5px;
  padding: 5px 8px;
}
.why-proof i {
  font-size: 12px;
}

/* PROCESS */
.process-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  position: relative;
}
.process-grid::before {
  content: '';
  position: absolute;
  top: 20px;
  left: 6%;
  width: 88%;
  height: 0.5px;
  background: #dde1e9;
  z-index: 0;
}
.pstep {
  padding: 0 20px;
  position: relative;
  z-index: 1;
}
.pstep-num {
  width: 42px;
  height: 42px;
  border-radius: 8px;
  background: #002366;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 15px;
  font-weight: 800;
  color: #fff;
  margin-bottom: 16px;
}
.pstep-title {
  font-size: 13.5px;
  font-weight: 700;
  color: #002366;
  margin-bottom: 7px;
}
.pstep-desc {
  font-size: 12.5px;
  color: #6b7280;
  line-height: 1.55;
}

/* TESTIMONIALS */
.testi-sec {
  background: #001a4d;
  padding: 52px 32px;
}
.testi-in {
  max-width: 1080px;
  margin: 0 auto;
}
.testi-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-top: 24px;
}
.tcard {
  background: rgba(255, 255, 255, 0.05);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  padding: 24px;
  transition: background 0.2s;
}
.tcard:hover {
  background: rgba(255, 255, 255, 0.08);
}
.tcard-stars {
  display: flex;
  gap: 3px;
  margin-bottom: 14px;
  justify-content: center;
}
.tcard-stars i {
  font-size: 14px;
  color: #f59e0b;
}
.tcard-quote {
  font-size: 13.5px;
  color: rgba(255, 255, 255, 0.8);
  line-height: 1.65;
  margin-bottom: 18px;
  font-style: italic;
}
.tcard-author {
  display: flex;
  align-items: center;
  gap: 12px;
  justify-content: center;
}
.tcard-avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: rgba(112, 128, 144, 0.35);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: 700;
  color: rgba(255, 255, 255, 0.7);
  flex-shrink: 0;
}
.tcard-name {
  font-size: 12.5px;
  font-weight: 600;
  color: #fff;
}
.tcard-role {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.38);
  margin-top: 2px;
}

/* CTA BAND */
.ctaband {
  background: #002366;
  padding: 40px 32px;
  border-top: 0.5px solid rgba(255, 255, 255, 0.07);
}
.ctaband-in {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  max-width: 1080px;
  margin: 0 auto;
}
.ctaband-left h3 {
  color: #fff;
  font-size: 22px;
  font-weight: 800;
  margin-bottom: 5px;
  letter-spacing: -0.3px;
}
.ctaband-left p {
  color: rgba(255, 255, 255, 0.55);
  font-size: 13px;
}
.ctaband-btns {
  display: flex;
  gap: 10px;
  flex-shrink: 0;
}
.cta-white {
  background: #fff;
  color: #002366;
  font-size: 13px;
  font-weight: 700;
  padding: 12px 22px;
  border-radius: 5px;
  border: none;
  white-space: nowrap;
  text-decoration: none;
  font-family: inherit;
}
.cta-white:hover {
  opacity: 0.92;
}
.cta-outline {
  background: transparent;
  color: rgba(255, 255, 255, 0.8);
  font-size: 13px;
  font-weight: 600;
  padding: 12px 22px;
  border-radius: 5px;
  border: 0.5px solid rgba(255, 255, 255, 0.25);
  white-space: nowrap;
  text-decoration: none;
  font-family: inherit;
}
.cta-outline:hover {
  color: #fff;
  border-color: rgba(255, 255, 255, 0.45);
}

/* FADE UP */
.fade-up {
  opacity: 0;
  transform: translateY(18px);
  transition: opacity 0.5s ease, transform 0.5s ease;
}
.fade-up.visible {
  opacity: 1;
  transform: translateY(0);
}

@keyframes pulse {
  0%,
  100% {
    opacity: 1;
    transform: scale(1);
  }
  50% {
    opacity: 0.6;
    transform: scale(0.85);
  }
}

/* RESPONSIVE */
@media (max-width: 900px) {
  .hero-grid {
    grid-template-columns: 1fr;
  }
  .hero-card {
    display: none;
  }
  .svc-panels,
  .testi-grid {
    grid-template-columns: 1fr;
  }
  .why-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .process-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
  }
  .process-grid::before {
    display: none;
  }
  .metrics-in {
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  .metric + .metric {
    border-left: none;
  }
  .ctaband-in {
    flex-direction: column;
    align-items: flex-start;
  }
}
@media (max-width: 600px) {
  .hero-h1 {
    font-size: 28px;
  }
  .hero-ctas {
    flex-direction: column;
  }
  .hero-stats {
    grid-template-columns: repeat(2, 1fr);
  }
  .why-grid {
    grid-template-columns: 1fr;
  }
  .process-grid {
    grid-template-columns: 1fr;
  }
  .tbar-inner {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
}
</style>
