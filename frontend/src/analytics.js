/**
 * Lightweight, dependency-free analytics + conversion tracking.
 *
 * Loads GA4, Google Ads, and the LinkedIn Insight Tag only when their IDs are
 * configured (via Vite env vars) AND the visitor hasn't opted out. Nothing is
 * loaded and no cookies are set until IDs exist, so the site is safe to ship
 * before the ad accounts are created.
 *
 * Consent model: implied consent (standard and lawful in Australia) — analytics
 * loads by default with a visible notice and an opt-out, and we honour the
 * browser Do-Not-Track signal. To switch to explicit opt-in, change
 * shouldLoadByDefault() to `return false`.
 */

const GA4_ID = import.meta.env.VITE_GA4_ID;                                 // e.g. G-XXXXXXXXXX
const ADS_ID = import.meta.env.VITE_GOOGLE_ADS_ID;                          // e.g. AW-XXXXXXXXXX
const ADS_LEAD_LABEL = import.meta.env.VITE_GOOGLE_ADS_LEAD_LABEL;          // conversion label
const LI_PARTNER_ID = import.meta.env.VITE_LINKEDIN_PARTNER_ID;             // numeric partner id
const LI_LEAD_CONVERSION_ID = import.meta.env.VITE_LINKEDIN_LEAD_CONVERSION_ID; // numeric conversion id

const CONSENT_KEY = 'eit_cookie_consent';
let tagsLoaded = false;

export function anyTagConfigured() {
  return Boolean(GA4_ID || ADS_ID || LI_PARTNER_ID);
}

function storedConsent() {
  try { return localStorage.getItem(CONSENT_KEY); } catch { return null; }
}
export function consentDecided() {
  return storedConsent() !== null;
}
function doNotTrack() {
  const v = navigator.doNotTrack || window.doNotTrack || navigator.msDoNotTrack;
  return v === '1' || v === 'yes';
}
/** Implied consent: load unless the visitor has declined or set DNT. */
function shouldLoad() {
  const c = storedConsent();
  if (c === 'declined') return false;
  if (c === 'accepted') return true;
  return !doNotTrack(); // no decision yet → load unless DNT
}

export function setConsent(accepted) {
  try { localStorage.setItem(CONSENT_KEY, accepted ? 'accepted' : 'declined'); } catch { /* ignore */ }
  if (accepted) {
    loadTags();
  } else if (GA4_ID) {
    // Disable GA collection if it was already loaded this session.
    window['ga-disable-' + GA4_ID] = true;
  }
}

function injectScript(src) {
  const s = document.createElement('script');
  s.async = true;
  s.src = src;
  document.head.appendChild(s);
}

function loadTags() {
  if (tagsLoaded || !anyTagConfigured() || !shouldLoad()) return;
  tagsLoaded = true;

  // Google (GA4 + Ads share one gtag.js)
  if (GA4_ID || ADS_ID) {
    injectScript('https://www.googletagmanager.com/gtag/js?id=' + (GA4_ID || ADS_ID));
    window.dataLayer = window.dataLayer || [];
    window.gtag = function () { window.dataLayer.push(arguments); };
    window.gtag('js', new Date());
    // send_page_view:false — we send page_view manually on every SPA route change.
    if (GA4_ID) window.gtag('config', GA4_ID, { anonymize_ip: true, send_page_view: false });
    if (ADS_ID) window.gtag('config', ADS_ID);
  }

  // LinkedIn Insight Tag
  if (LI_PARTNER_ID) {
    window._linkedin_partner_id = String(LI_PARTNER_ID);
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(String(LI_PARTNER_ID));
    if (!window.lintrk) {
      window.lintrk = function (a, b) { window.lintrk.q.push([a, b]); };
      window.lintrk.q = [];
    }
    injectScript('https://snap.licdn.com/li.lms-analytics/insight.min.js');
  }
}

/** Called once at startup. */
export function initAnalytics() {
  if (shouldLoad()) loadTags();
}

/** Fire on every SPA route change. */
export function trackPageView(path) {
  if (!tagsLoaded) return;
  try {
    if (window.gtag && GA4_ID) {
      window.gtag('event', 'page_view', { page_path: path, page_location: window.location.href, page_title: document.title });
    }
  } catch { /* ignore */ }
}

/** Fire when a lead/quote form is submitted successfully. */
export function trackLead(meta = {}) {
  if (!tagsLoaded) return;
  try {
    if (window.gtag) {
      if (GA4_ID) window.gtag('event', 'generate_lead', meta);
      if (ADS_ID && ADS_LEAD_LABEL) window.gtag('event', 'conversion', { send_to: ADS_ID + '/' + ADS_LEAD_LABEL });
    }
    if (window.lintrk && LI_LEAD_CONVERSION_ID) {
      window.lintrk('track', { conversion_id: Number(LI_LEAD_CONVERSION_ID) });
    }
  } catch { /* ignore */ }
}

/** Optional: fire on phone/email click. */
export function trackContactClick(kind) {
  if (!tagsLoaded || !window.gtag) return;
  try { window.gtag('event', 'contact_click', { method: kind }); } catch { /* ignore */ }
}
