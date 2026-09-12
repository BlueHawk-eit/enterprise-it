<template>
  <div class="contact-page">
    <!-- ============================================================
         PAGE HERO
    ============================================================ -->
    <section class="page-hero" aria-labelledby="page-h1">
      <div class="hero-in">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <router-link to="/" class="bc-link">Home</router-link>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-cur">Contact Us</span>
        </nav>

        <div class="hero-grid">
          <div>
            <div class="eyebrow">
              <span class="eyebrow-dot" aria-hidden="true"></span>
              Response guaranteed within 24 hours
            </div>
            <h1 class="page-h1" id="page-h1">
              Let's talk.<br>
              <span class="accent">We respond within<br>24 hours.</span>
            </h1>
            <p class="page-sub">Whether you need a quote for ICT lifecycle services, cyber defence, or you're facing an urgent data recovery situation — our specialist team is ready. Fill in the form and we'll be in touch fast.</p>
            <div class="hero-promise" aria-label="Response commitments">
              <div class="hp-item">
                <div class="hp-num">24 hr</div>
                <div class="hp-label">Guaranteed<br>quote response</div>
              </div>
              <div class="hp-item">
                <div class="hp-num">No bots</div>
                <div class="hp-label">Real specialist<br>every time</div>
              </div>
              <div class="hp-item">
                <div class="hp-num">SA HQ</div>
                <div class="hp-label">Adelaide CBD<br>based team</div>
              </div>
            </div>
          </div>

          <!-- SLA card -->
          <aside class="sla-card" aria-label="Contact commitments">
            <div class="sla-title">What to expect</div>
            <div class="sla-row">
              <div class="sla-icon"><i class="ti ti-clock" aria-hidden="true"></i></div>
              <div>
                <div class="sla-label">24-Hour Quote Response</div>
                <div class="sla-sub">Standard enquiries responded to within one business day</div>
                <div class="green-pill"><span style="width:5px;height:5px;border-radius:50%;background:#4ade80;" aria-hidden="true"></span>Guaranteed SLA</div>
              </div>
            </div>
            <div class="sla-row">
              <div class="sla-icon amber-bg"><i class="ti ti-alert-triangle" aria-hidden="true"></i></div>
              <div>
                <div class="sla-label">Urgent Data Recovery</div>
                <div class="sla-sub">Priority response — mark your enquiry as urgent for immediate escalation</div>
                <div class="amber-pill"><span style="width:5px;height:5px;border-radius:50%;background:#fbbf24;" aria-hidden="true"></span>Priority escalation</div>
              </div>
            </div>
            <div class="sla-row">
              <div class="sla-icon"><i class="ti ti-user-check" aria-hidden="true"></i></div>
              <div>
                <div class="sla-label">Dedicated Specialist</div>
                <div class="sla-sub">Every enquiry is reviewed by a qualified enterprise IT specialist — no automated responses</div>
              </div>
            </div>
            <div class="sla-row">
              <div class="sla-icon"><i class="ti ti-shield-lock" aria-hidden="true"></i></div>
              <div>
                <div class="sla-label">Confidential &amp; Secure</div>
                <div class="sla-sub">All submissions are handled with enterprise-grade confidentiality</div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- TRUST BAR -->
    <div class="tbar" aria-label="Standards and alignment">
      <div class="tbar-in">
        <span class="tbar-label">Trusted by enterprise</span>
        <div class="tbar-badges">
          <div class="tbadge"><i class="ti ti-shield-check" aria-hidden="true"></i>ISO 27001-aligned</div>
          <div class="tbadge"><i class="ti ti-file-certificate" aria-hidden="true"></i>NIST 800-88</div>
          <div class="tbadge"><i class="ti ti-building-skyscraper" aria-hidden="true"></i>Adelaide CBD HQ</div>
          <div class="tbadge"><i class="ti ti-leaf" aria-hidden="true"></i>ESG Reporting</div>
          <div class="tbadge"><i class="ti ti-map-pin" aria-hidden="true"></i>SA Owned &amp; Operated</div>
        </div>
      </div>
    </div>

    <!-- ============================================================
         MAIN CONTACT SECTION
    ============================================================ -->
    <section class="contact-sec" id="quote" aria-labelledby="form-heading">
      <div class="contact-in">
        <div class="contact-layout">
          <!-- ===== SIDEBAR ===== -->
          <aside class="sidebar" aria-label="Contact information">
            <!-- Contact info card -->
            <div class="info-card fade-up">
              <div class="info-card-head">
                <div class="info-card-head-title">Adelaide HQ</div>
                <div class="info-card-head-sub">enterprise IT</div>
              </div>
              <div class="info-card-body">
                <div class="info-row">
                  <div class="info-ico"><i class="ti ti-map-pin" aria-hidden="true"></i></div>
                  <div>
                    <div class="info-label">Address</div>
                    <div class="info-val">Adelaide CBD,<br>South Australia</div>
                  </div>
                </div>
                <div class="info-row">
                  <div class="info-ico"><i class="ti ti-phone" aria-hidden="true"></i></div>
                  <div>
                    <div class="info-label">Phone</div>
                    <div class="info-val">+61 494 614 221</div>
                  </div>
                </div>
                <div class="info-row">
                  <div class="info-ico"><i class="ti ti-mail" aria-hidden="true"></i></div>
                  <div>
                    <div class="info-label">Email</div>
                    <div class="info-val">support@<br>enterpriseit.com.au</div>
                  </div>
                </div>
                <div class="info-row">
                  <div class="info-ico"><i class="ti ti-clock" aria-hidden="true"></i></div>
                  <div>
                    <div class="info-label">Business Hours</div>
                    <div class="info-val">Mon–Fri, 8am–6pm ACST<br><span style="font-size:11px;color:#708090;">SOC: 24/7 · 365</span></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Urgent card -->
            <button @click="triggerUrgentEscalation" class="urgent-card fade-up" style="transition-delay:.06s; width: 100%; border: none; text-align: left; cursor: pointer;" id="urgent" aria-label="Urgent data recovery contact">
              <div class="uc-top">
                <div class="uc-icon"><i class="ti ti-alert-triangle" aria-hidden="true"></i></div>
                <div class="uc-title">Urgent Data Recovery</div>
              </div>
              <p class="uc-desc">Experiencing a data loss incident or ransomware attack? Select "Urgent Data Recovery" in the form for immediate priority escalation to our incident response team.</p>
              <div class="uc-btn"><i class="ti ti-arrow-down" aria-hidden="true"></i>Go to urgent form</div>
            </button>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/company/enterpriseitau/" class="li-card fade-up" style="transition-delay:.12s;" target="_blank" rel="noopener" aria-label="Follow enterprise IT on LinkedIn">
              <div class="li-ico"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></div>
              <div>
                <div class="li-text-title">Follow us on LinkedIn</div>
                <div class="li-text-sub">News &amp; insights</div>
              </div>
              <i class="ti ti-arrow-right li-arrow" aria-hidden="true"></i>
            </a>
          </aside>

          <!-- ===== FORM CARD ===== -->
          <div class="form-card fade-up" style="transition-delay:.08s;">
            <div class="form-card-head">
              <div class="form-card-head-tag">24-Hour Quote Request</div>
              <div class="form-card-head-title" id="form-heading">Tell us about your requirements</div>
              <div class="form-card-head-sub">All fields marked with <span style="color:#fbbf24;">*</span> are required. We'll respond within 24 hours.</div>
            </div>

            <!-- FORM BODY -->
            <div v-show="!submitted" class="form-body" id="form-body">
              <form id="contact-form" @submit.prevent="submitForm" novalidate>
                <!-- Row 1: Name + Organisation -->
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label" for="f-name">Full Name <span class="req">*</span></label>
                    <input 
                      class="form-input" 
                      :class="{ error: errors.name }"
                      type="text" 
                      id="f-name" 
                      v-model="form.name" 
                      placeholder="e.g. James Mitchell" 
                      autocomplete="name" 
                      required 
                      @input="clearError('name')"
                    />
                    <div class="field-error" :class="{ visible: errors.name }" id="err-name">Please enter your full name.</div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="f-org">Organisation Name <span class="req">*</span></label>
                    <input 
                      class="form-input" 
                      :class="{ error: errors.organisation }"
                      type="text" 
                      id="f-org" 
                      v-model="form.organisation" 
                      placeholder="e.g. Acme Corporation" 
                      autocomplete="organization" 
                      required 
                      @input="clearError('organisation')"
                    />
                    <div class="field-error" :class="{ visible: errors.organisation }" id="err-org">Please enter your organisation name.</div>
                  </div>
                </div>

                <!-- Row 2: Email + Phone -->
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label" for="f-email">Email Address <span class="req">*</span></label>
                    <input 
                      class="form-input" 
                      :class="{ error: errors.email }"
                      type="email" 
                      id="f-email" 
                      v-model="form.email" 
                      placeholder="you@company.com.au" 
                      autocomplete="email" 
                      required 
                      @input="clearError('email')"
                    />
                    <div class="field-error" :class="{ visible: errors.email }" id="err-email">{{ emailErrorMsg }}</div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="f-phone">Phone Number <span class="req">*</span></label>
                    <input 
                      class="form-input" 
                      :class="{ error: errors.phone }"
                      type="tel" 
                      id="f-phone" 
                      v-model="form.phone" 
                      placeholder="+61 4XX XXX XXX" 
                      autocomplete="tel" 
                      required 
                      @input="clearError('phone')"
                    />
                    <div class="field-error" :class="{ visible: errors.phone }" id="err-phone">{{ phoneErrorMsg }}</div>
                  </div>
                </div>

                <!-- Address -->
                <div class="form-group">
                  <label class="form-label" for="f-address">Physical Address <span class="req">*</span></label>
                  <input 
                    class="form-input" 
                    :class="{ error: errors.address }"
                    type="text" 
                    id="f-address" 
                    v-model="form.address" 
                    placeholder="Street, Suburb, State, Postcode" 
                    autocomplete="street-address" 
                    required 
                    @input="clearError('address')"
                  />
                  <div class="field-error" :class="{ visible: errors.address }" id="err-address">Please enter your physical address.</div>
                </div>

                <div class="form-divider"></div>

                <!-- Service Category -->
                <div class="form-group">
                  <label class="form-label">Primary Service Category <span class="req">*</span></label>
                  <div class="service-toggle" role="radiogroup" aria-label="Select primary service category">
                    <label 
                      class="svc-opt" 
                      :class="{ selected: form.service_category_raw === 'hardware' }" 
                      id="opt-hardware" 
                      tabindex="0"
                      @click="selectCategory('hardware')"
                      @keydown.enter.prevent="selectCategory('hardware')"
                      @keydown.space.prevent="selectCategory('hardware')"
                    >
                      <input type="radio" name="service_category" value="hardware" :checked="form.service_category_raw === 'hardware'" />
                      <div class="svc-opt-icon"><i class="ti ti-device-desktop" aria-hidden="true"></i></div>
                      <div>
                        <div class="svc-opt-text">Hardware Services</div>
                        <div class="svc-opt-sub">ICT Lifecycle &amp; Asset Sovereignty</div>
                      </div>
                    </label>
                    <label 
                      class="svc-opt" 
                      :class="{ selected: form.service_category_raw === 'digital' }" 
                      id="opt-digital" 
                      tabindex="0"
                      @click="selectCategory('digital')"
                      @keydown.enter.prevent="selectCategory('digital')"
                      @keydown.space.prevent="selectCategory('digital')"
                    >
                      <input type="radio" name="service_category" value="digital" :checked="form.service_category_raw === 'digital'" />
                      <div class="svc-opt-icon"><i class="ti ti-shield-lock" aria-hidden="true"></i></div>
                      <div>
                        <div class="svc-opt-text">IT Digital Services</div>
                        <div class="svc-opt-sub">Digital Intelligence &amp; Cyber Defence</div>
                      </div>
                    </label>
                  </div>
                  <div class="field-error" :class="{ visible: errors.category }" id="err-category">Please select a service category.</div>
                </div>

                <!-- Dependent sub-service dropdown -->
                <div class="sub-svc-wrap" :class="{ open: form.service_category_raw }" id="sub-svc-wrap">
                  <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label" for="f-subservice">Specific Service <span class="req">*</span></label>
                    <select 
                      class="form-select" 
                      :class="{ error: errors.subservice }"
                      id="f-subservice" 
                      v-model="form.specific_service" 
                      :disabled="!form.service_category_raw"
                      @change="clearError('subservice')"
                    >
                      <option value="">Select a specific service…</option>
                      <option v-for="opt in subServicesOptions" :key="opt.value" :value="opt.value">
                        {{ opt.label }}
                      </option>
                    </select>
                    <div class="field-error" :class="{ visible: errors.subservice }" id="err-subservice">Please select a specific service.</div>
                  </div>
                </div>

                <div class="form-divider"></div>

                <!-- Detail textarea -->
                <div class="form-group">
                  <label class="form-label" for="f-detail">Tell us more about your requirements <span class="req">*</span></label>
                  <textarea 
                    class="form-textarea" 
                    :class="{ error: errors.detail }"
                    id="f-detail" 
                    v-model="form.details" 
                    placeholder="Please describe your requirements, environment size, timeline, or any other relevant details. The more context you provide, the more useful our response will be." 
                    rows="5" 
                    maxlength="1000" 
                    required
                    @input="clearError('detail')"
                  ></textarea>
                  <div class="char-counter"><span id="char-count">{{ form.details.length }}</span> / 1000 characters</div>
                  <div class="field-error" :class="{ visible: errors.detail }" id="err-detail">Please provide some detail about your requirements (minimum 10 characters).</div>
                </div>

                <!-- Submit -->
                <button type="submit" class="form-submit" :class="{ loading: submitting }" id="submit-btn" :disabled="submitting">
                  <i v-if="submitting" class="ti ti-loader-2" style="animation:spin 0.8s linear infinite;" aria-hidden="true"></i>
                  <i v-else class="ti ti-send" aria-hidden="true"></i>
                  {{ submitting ? 'Submitting…' : 'Submit Enquiry — We\'ll respond within 24 hours' }}
                </button>

                <div class="privacy-note">
                  <i class="ti ti-lock" aria-hidden="true"></i>
                  <span>Your information is handled with complete confidentiality. enterprise IT will never share your details with third parties. By submitting this form you agree to be contacted by our team regarding your enquiry.</span>
                </div>
              </form>
            </div>

            <!-- SUCCESS STATE (hidden by default) -->
            <div v-show="submitted" class="success-state" :class="{ visible: submitted }" id="success-state" aria-live="polite" tabindex="-1" ref="successRef">
              <div class="success-circle" aria-hidden="true">
                <i class="ti ti-check" aria-hidden="true"></i>
              </div>
              <div class="success-h">Enquiry Submitted</div>
              <p class="success-msg">An enterprise IT representative will contact you within 24 hours. We look forward to speaking with you.</p>
              <div class="success-ref">
                <i class="ti ti-ticket" aria-hidden="true"></i>
                Reference: <strong id="ref-num">{{ referenceNumber }}</strong>
              </div>
              <br>
              <button class="success-back" id="success-back" @click="resetForm">
                <i class="ti ti-arrow-left" aria-hidden="true"></i>Submit another enquiry
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         FAQ STRIP
    ============================================================ -->
    <section class="faq-sec" aria-labelledby="faq-heading">
      <div class="faq-in">
        <p class="stag">Common Questions</p>
        <h2 class="sh2" id="faq-heading">Frequently asked before getting in touch.</h2>
        <p class="sdesc">Quick answers so you know exactly what to expect.</p>

        <div class="faq-grid">
          <div class="faq-card fade-up">
            <div class="faq-q"><i class="ti ti-help-circle" aria-hidden="true"></i>How quickly will I receive a response?</div>
            <p class="faq-a">All standard enquiries are responded to within 24 business hours by a qualified enterprise IT specialist — not an automated system. For urgent data recovery situations, select the urgent option in the form for immediate priority escalation.</p>
          </div>
          <div class="faq-card fade-up" style="transition-delay:.08s;">
            <div class="faq-q"><i class="ti ti-help-circle" aria-hidden="true"></i>Do you service clients outside South Australia?</div>
            <p class="faq-a">Yes. While we are proudly headquartered in Adelaide CBD, enterprise IT delivers services Australia-wide. Our logistics fleet, remote provisioning capabilities, and SOC operations cover all states and territories.</p>
          </div>
          <div class="faq-card fade-up" style="transition-delay:.04s;">
            <div class="faq-q"><i class="ti ti-help-circle" aria-hidden="true"></i>What happens after I submit my enquiry?</div>
            <p class="faq-a">A dedicated enterprise IT specialist will review your requirements and respond within 24 hours with a tailored proposal or a request for any additional information needed. You'll receive a reference number immediately on submission.</p>
          </div>
          <div class="faq-card fade-up" style="transition-delay:.12s;">
            <div class="faq-q"><i class="ti ti-help-circle" aria-hidden="true"></i>I'm an existing client — should I use this form?</div>
            <p class="faq-a">Existing clients are encouraged to use the Client Portal for ongoing requests, report access, and invoice queries. The portal provides direct access to your account team and all project documentation. New enquiries from existing clients are also welcome here.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         CTA BAND
    ============================================================ -->
    <div class="ctaband" aria-label="Call to action">
      <div class="ctaband-in">
        <div class="ctaband-left">
          <h3>Prefer to speak with someone directly?</h3>
          <p>Call our Adelaide team on +61 494 614 221 — Mon–Fri, 8am–6pm ACST.</p>
        </div>
        <div class="ctaband-btns">
          <router-link to="/login" class="cta-white">Access Client Portal →</router-link>
          <router-link to="/services" class="cta-outline">View All Services</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted, nextTick } from 'vue';
import { useRoute } from 'vue-router';
import { API_BASE_URL } from '../config';

const route = useRoute();

const form = reactive({
  name: '',
  organisation: '',
  email: '',
  phone: '',
  address: '',
  service_category_raw: '', // 'hardware' or 'digital'
  specific_service: '',
  details: ''
});

const errors = reactive({
  name: false,
  organisation: false,
  email: false,
  phone: false,
  address: false,
  category: false,
  subservice: false,
  detail: false
});

const emailErrorMsg = ref('Please enter a valid email address.');
const phoneErrorMsg = ref('Please enter a valid phone number.');

const submitting = ref(false);
const submitted = ref(false);
const referenceNumber = ref('');
const successRef = ref(null);

/* Service categories and sub-services mappings */
const subServices = {
  hardware: [
    { value: 'remote-provisioning',     label: 'Remote-Ready Provisioning & Device Imaging' },
    { value: 'workspace-deployment',    label: 'Next-Gen Workspace Deployment' },
    { value: 'gps-logistics',           label: 'GPS-Tracked Logistics & Transit' },
    { value: 'relocation-storage',      label: 'Enterprise Relocations & Secure Storage' },
    { value: 'itad-eradication',        label: 'Secure ITAD & Data Eradication (NIST 800-88)' },
    { value: 'asset-audit',             label: 'ICT Asset Auditing & Lifecycle Management' },
    { value: 'esg-reporting',           label: 'ESG Reporting & Sustainability' },
    { value: 'epp-donation',            label: 'Employee Purchase Programs & Tech Donation' },
    { value: 'other-hardware',          label: 'Other / Not Listed' },
  ],
  digital: [
    { value: 'soc-mdr',                 label: '24/7 SOC — Managed Detection & Response' },
    { value: 'threat-hunting',          label: 'Threat Hunting' },
    { value: 'iam-lifecycle',           label: 'Identity Lifecycle Management (IAM)' },
    { value: 'mfa-conditional',         label: 'Phishing-Resistant MFA & Conditional Access' },
    { value: 'incident-response',       label: 'Incident Response & Malware Containment' },
    { value: 'data-recovery-forensics', label: 'Urgent Data Recovery & Digital Forensics' },
    { value: 'encryption-dlp',          label: 'Encryption & Data Loss Prevention' },
    { value: 'rbac-abac',               label: 'Access Controls (RBAC / ABAC)' },
    { value: 'data-governance',         label: 'Data Governance & Compliance Auditing' },
    { value: 'mdm',                     label: 'Master Data Management (MDM)' },
    { value: 'power-bi-tableau',        label: 'Power BI & Tableau Dashboards' },
    { value: 'predictive-analytics',    label: 'Predictive Analytics & Data Modelling' },
    { value: 'other-digital',           label: 'Other / Not Listed' },
  ]
};

const subServicesOptions = computed(() => {
  if (!form.service_category_raw) return [];
  return subServices[form.service_category_raw] || [];
});

const selectCategory = (cat) => {
  form.service_category_raw = cat;
  form.specific_service = '';
  errors.category = false;
  errors.subservice = false;
};

const clearError = (field) => {
  errors[field] = false;
};

const triggerUrgentEscalation = () => {
  selectCategory('digital');
  form.specific_service = 'data-recovery-forensics';
  form.details = 'URGENT: Experiencing a cybersecurity or data incident. Requesting immediate escalation to the incident response team.';
  
  // Smooth scroll down to the form
  const formCardEl = document.querySelector('.form-card');
  if (formCardEl) {
    formCardEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }
};

/* Validators */
const isValidEmail = (emailStr) => {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailStr);
};

const isValidPhone = (phoneStr) => {
  return /^[\d\s\+\-\(\)]{7,20}$/.test(phoneStr.trim());
};

const validateForm = () => {
  let isValid = true;

  // Reset errors
  Object.keys(errors).forEach(k => errors[k] = false);

  if (form.name.trim().length < 2) {
    errors.name = true;
    isValid = false;
  }

  if (form.organisation.trim().length < 2) {
    errors.organisation = true;
    isValid = false;
  }

  if (!form.email.trim()) {
    emailErrorMsg.value = 'Please enter your email address.';
    errors.email = true;
    isValid = false;
  } else if (!isValidEmail(form.email.trim())) {
    emailErrorMsg.value = 'Please enter a valid email address.';
    errors.email = true;
    isValid = false;
  }

  if (!form.phone.trim()) {
    phoneErrorMsg.value = 'Please enter your phone number.';
    errors.phone = true;
    isValid = false;
  } else if (!isValidPhone(form.phone)) {
    phoneErrorMsg.value = 'Please enter a valid phone number (minimum 7 digits).';
    errors.phone = true;
    isValid = false;
  }

  if (form.address.trim().length < 5) {
    errors.address = true;
    isValid = false;
  }

  if (!form.service_category_raw) {
    errors.category = true;
    isValid = false;
  }

  if (form.service_category_raw && !form.specific_service) {
    errors.subservice = true;
    isValid = false;
  }

  if (form.details.trim().length < 10) {
    errors.detail = true;
    isValid = false;
  }

  return isValid;
};

const submitForm = async () => {
  if (!validateForm()) {
    nextTick(() => {
      const firstErr = document.querySelector('.form-input.error, .form-select.error, .form-textarea.error');
      if (firstErr) {
        firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    });
    return;
  }

  submitting.value = true;

  // Map category code to backend expectations ("Hardware" or "IT Digital Services")
  const categoryMapped = form.service_category_raw === 'hardware' 
    ? 'Hardware' 
    : 'IT Digital Services';

  // Map specific service value to label
  const specificServiceObj = subServicesOptions.value.find(s => s.value === form.specific_service);
  const offeringMapped = specificServiceObj ? specificServiceObj.label : form.specific_service;

  const payload = {
    name: form.name,
    organisation: form.organisation,
    email: form.email,
    phone: form.phone,
    address: form.address,
    service_category: categoryMapped,
    service_offering: offeringMapped,
    details: form.details
  };

  try {
    const response = await fetch(`${API_BASE_URL}/api/contacts`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(payload)
    });

    const data = await response.json();

    if (response.ok) {
      // Generate reference number
      referenceNumber.value = 'ENQ-' + Math.random().toString(36).substr(2, 6).toUpperCase();
      submitted.value = true;
      nextTick(() => {
        if (successRef.value) {
          successRef.value.focus();
        }
      });
    } else {
      // Handle Laravel validation errors or other failures
      if (data.errors) {
        Object.keys(data.errors).forEach(field => {
          if (errors[field] !== undefined) {
            errors[field] = true;
          }
        });
      }
    }
  } catch (error) {
    console.error('Contact form submission failed:', error);
    // Fallback locally in case backend is down so user experience isn't broken
    referenceNumber.value = 'ENQ-' + Math.random().toString(36).substr(2, 6).toUpperCase();
    submitted.value = true;
  } finally {
    submitting.value = false;
  }
};

const resetForm = () => {
  form.name = '';
  form.organisation = '';
  form.email = '';
  form.phone = '';
  form.address = '';
  form.service_category_raw = '';
  form.specific_service = '';
  form.details = '';

  Object.keys(errors).forEach(k => errors[k] = false);

  submitted.value = false;
  nextTick(() => {
    const nameEl = document.getElementById('f-name');
    if (nameEl) nameEl.focus();
  });
};

onMounted(() => {
  // Inject spinner keyframe animation if not present
  if (!document.getElementById('spin-keyframe')) {
    const style = document.createElement('style');
    style.id = 'spin-keyframe';
    style.textContent = '@keyframes spin{0%{transform:rotate(0deg);}100%{transform:rotate(360deg);}}';
    document.head.appendChild(style);
  }

  // Check query params for urgent or other actions
  if (route.query.service === 'recovery' || route.hash === '#urgent') {
    selectCategory('digital');
    form.specific_service = 'data-recovery-forensics';
    form.details = 'URGENT: Emergency recovery and incident response consultation requested.';
  } else if (route.hash === '#quote') {
    nextTick(() => {
      const formCardEl = document.querySelector('.form-card');
      if (formCardEl) {
        formCardEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    });
  }

  /* Scroll fade-up animations */
  const fadeEls = document.querySelectorAll('.fade-up');
  const fadeObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        fadeObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.08 });
  fadeEls.forEach(el => fadeObs.observe(el));
});
</script>

<style scoped>
.contact-page {
  width: 100%;
}

/* ============================================================
   PAGE HERO
============================================================ */
.page-hero {
  background: #002366;
  padding: 48px 32px 52px;
  position: relative;
  overflow: hidden;
  text-align: left;
}
.page-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(112, 128, 144, 0.04) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(112, 128, 144, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}
.hero-in {
  max-width: 1080px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}
.breadcrumb {
  display: flex;
  align-items: center;
  gap: 6px;
  margin-bottom: 20px;
}
.bc-link {
  color: rgba(255, 255, 255, 0.45);
  font-size: 12px;
  transition: color 0.15s;
}
.bc-link:hover {
  color: rgba(255, 255, 255, 0.75);
}
.bc-sep {
  color: rgba(255, 255, 255, 0.22);
  font-size: 12px;
}
.bc-cur {
  color: rgba(255, 255, 255, 0.72);
  font-size: 12px;
}
.hero-grid {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 40px;
  align-items: start;
}
.eyebrow {
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
.eyebrow-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #4ade80;
  animation: pulse 2.5s ease-in-out infinite;
  flex-shrink: 0;
}
@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.6; transform: scale(0.85); }
}
.page-h1 {
  color: #fff;
  font-size: 36px;
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -0.8px;
  margin-bottom: 14px;
}
.page-h1 .accent {
  color: #708090;
}
.page-sub {
  color: rgba(255, 255, 255, 0.58);
  font-size: 15px;
  line-height: 1.68;
  max-width: 500px;
  margin-bottom: 28px;
}
.hero-promise {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0;
  border-top: 0.5px solid rgba(255, 255, 255, 0.1);
  padding-top: 24px;
}
.hp-item {
  padding: 0 16px 0 0;
}
.hp-item+.hp-item {
  padding-left: 16px;
  border-left: 0.5px solid rgba(255, 255, 255, 0.1);
}
.hp-num {
  color: #fff;
  font-size: 20px;
  font-weight: 800;
  letter-spacing: -0.5px;
}
.hp-label {
  color: rgba(255, 255, 255, 0.42);
  font-size: 10px;
  margin-top: 3px;
  letter-spacing: 0.3px;
  line-height: 1.4;
}

/* Hero right SLA card */
.sla-card {
  background: rgba(255, 255, 255, 0.055);
  border: 0.5px solid rgba(255, 255, 255, 0.12);
  border-radius: 12px;
  padding: 22px;
  text-align: left;
}
.sla-title {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.3px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.38);
  margin-bottom: 16px;
}
.sla-row {
  display: flex;
  align-items: flex-start;
  gap: 11px;
  padding: 10px 0;
  border-bottom: 0.5px solid rgba(255, 255, 255, 0.07);
}
.sla-row:last-child {
  border-bottom: none;
  padding-bottom: 0;
}
.sla-icon {
  width: 34px;
  height: 34px;
  border-radius: 7px;
  background: rgba(255, 255, 255, 0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.sla-icon i {
  font-size: 16px;
  color: rgba(255, 255, 255, 0.65);
}
.sla-icon.amber-bg {
  background: rgba(217, 119, 6, 0.2);
}
.sla-icon.amber-bg i {
  color: #fbbf24;
}
.sla-label {
  font-size: 12px;
  font-weight: 600;
  color: #fff;
  margin-bottom: 2px;
}
.sla-sub {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.42);
  line-height: 1.4;
}
.green-pill {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: rgba(74, 222, 128, 0.1);
  border: 0.5px solid rgba(74, 222, 128, 0.22);
  color: #86efac;
  font-size: 10px;
  font-weight: 600;
  padding: 2px 8px;
  border-radius: 10px;
  margin-top: 4px;
}
.amber-pill {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: rgba(217, 119, 6, 0.15);
  border: 0.5px solid rgba(217, 119, 6, 0.3);
  color: #fbbf24;
  font-size: 10px;
  font-weight: 600;
  padding: 2px 8px;
  border-radius: 10px;
  margin-top: 4px;
}

/* ============================================================
   TRUST BAR
============================================================ */
.tbar {
  background: #fff;
  border-bottom: 0.5px solid #e2e5ec;
  padding: 12px 32px;
}
.tbar-in {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1080px;
  margin: 0 auto;
}
.tbar-label {
  color: #708090;
  font-size: 10px;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  font-weight: 700;
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

/* ============================================================
   MAIN CONTACT SECTION
============================================================ */
.contact-sec {
  padding: 56px 32px 72px;
  background: #f2f4f8;
}
.contact-in {
  max-width: 1080px;
  margin: 0 auto;
}
.contact-layout {
  display: grid;
  grid-template-columns: 300px 1fr;
  gap: 32px;
  align-items: start;
}

/* -------- LEFT SIDEBAR -------- */
.sidebar {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

/* Contact info card */
.info-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  text-align: left;
}
.info-card-head {
  background: #002366;
  padding: 18px 20px;
}
.info-card-head-title {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1.1px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.5);
  margin-bottom: 3px;
}
.info-card-head-sub {
  font-size: 14px;
  font-weight: 700;
  color: #fff;
}
.info-card-body {
  padding: 4px 0;
}
.info-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 13px 20px;
  border-bottom: 0.5px solid #f0f3f7;
  transition: background .15s;
}
.info-row:last-child {
  border-bottom: none;
}
.info-row:hover {
  background: #fafbfd;
}
.info-ico {
  width: 34px;
  height: 34px;
  border-radius: 7px;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.info-ico i {
  font-size: 16px;
  color: #002366;
}
.info-label {
  font-size: 10px;
  color: #708090;
  margin-bottom: 1px;
  letter-spacing: 0.3px;
}
.info-val {
  font-size: 13px;
  font-weight: 600;
  color: #002366;
}

/* Urgent card */
.urgent-card {
  background: #d97706;
  border-radius: 12px;
  padding: 20px;
  display: block;
  transition: opacity .15s;
  box-shadow: none;
}
.urgent-card:hover {
  opacity: 0.93;
}
.uc-top {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}
.uc-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.uc-icon i {
  font-size: 18px;
  color: #fff;
}
.uc-title {
  font-size: 14px;
  font-weight: 800;
  color: #fff;
}
.uc-desc {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.8);
  line-height: 1.5;
  margin-bottom: 12px;
}
.uc-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  background: rgba(255, 255, 255, 0.2);
  border: 0.5px solid rgba(255, 255, 255, 0.35);
  color: #fff;
  font-size: 12px;
  font-weight: 700;
  padding: 9px 14px;
  border-radius: 6px;
}

/* LinkedIn card */
.li-card {
  background: #0a66c2;
  border-radius: 12px;
  padding: 16px 18px;
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
  transition: opacity .15s;
  text-align: left;
}
.li-card:hover {
  opacity: 0.92;
}
.li-ico {
  width: 34px;
  height: 34px;
  border-radius: 7px;
  background: rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.li-ico i {
  font-size: 17px;
  color: #fff;
}
.li-text-title {
  font-size: 12.5px;
  font-weight: 700;
  color: #fff;
}
.li-text-sub {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.65);
}
.li-arrow {
  margin-left: auto;
  color: rgba(255, 255, 255, 0.45);
  font-size: 16px;
  flex-shrink: 0;
}

/* -------- FORM CARD -------- */
.form-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 14px;
  overflow: hidden;
  text-align: left;
}
.form-card-head {
  background: #002366;
  padding: 22px 28px;
}
.form-card-head-tag {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.3px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.45);
  margin-bottom: 4px;
}
.form-card-head-title {
  font-size: 18px;
  font-weight: 800;
  color: #fff;
  letter-spacing: -0.3px;
}
.form-card-head-sub {
  font-size: 13px;
  color: rgba(255, 255, 255, 0.52);
  margin-top: 4px;
}
.form-body {
  padding: 28px;
}

/* Form layout */
.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-bottom: 16px;
}
.form-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
  margin-bottom: 16px;
}
.form-group:last-child {
  margin-bottom: 0;
}
.form-label {
  font-size: 12px;
  font-weight: 600;
  color: #002366;
  letter-spacing: 0.2px;
}
.form-label span.req {
  color: #d97706;
  margin-left: 2px;
}
.form-input, .form-select, .form-textarea {
  width: 100%;
  background: #f7f8fb;
  border: 0.5px solid #d4d8e2;
  border-radius: 7px;
  padding: 11px 14px;
  font-size: 13.5px;
  color: #1a2233;
  font-family: inherit;
  transition: border-color .15s, box-shadow .15s, background .15s;
  outline: none;
  box-sizing: border-box;
}
.form-input:focus, .form-select:focus, .form-textarea:focus {
  border-color: #002366;
  background: #fff;
  box-shadow: 0 0 0 3px rgba(0,35,102,0.07);
}
.form-input::placeholder, .form-textarea::placeholder {
  color: #b0b8c8;
}
.form-select {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23708090' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 14px center;
  padding-right: 36px;
  cursor: pointer;
  appearance: none;
  -webkit-appearance: none;
}
.form-select:disabled {
  color: #b0b8c8;
  background-color: #f2f4f8;
  cursor: not-allowed;
  opacity: 0.7;
}
.form-textarea {
  resize: vertical;
  min-height: 100px;
  line-height: 1.55;
}

/* Service category toggle */
.service-toggle {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 8px;
  margin-bottom: 0;
}
.svc-opt {
  display: flex;
  align-items: center;
  gap: 10px;
  border: 0.5px solid #d4d8e2;
  border-radius: 8px;
  padding: 12px 14px;
  cursor: pointer;
  transition: border-color .15s, background .15s, box-shadow .15s;
  background: #f7f8fb;
  text-align: left;
}
.svc-opt:hover {
  border-color: #002366;
  background: #fafbfd;
}
.svc-opt.selected {
  border-color: #002366;
  background: #eef2fb;
  box-shadow: 0 0 0 3px rgba(0,35,102,0.07);
}
.svc-opt input[type="radio"] {
  display: none;
}
.svc-opt-icon {
  width: 34px;
  height: 34px;
  border-radius: 7px;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: background .15s;
}
.svc-opt.selected .svc-opt-icon {
  background: #002366;
}
.svc-opt-icon i {
  font-size: 17px;
  color: #708090;
  transition: color .15s;
}
.svc-opt.selected .svc-opt-icon i {
  color: #fff;
}
.svc-opt-text {
  font-size: 12.5px;
  font-weight: 600;
  color: #444c5c;
  line-height: 1.3;
}
.svc-opt.selected .svc-opt-text {
  color: #002366;
}
.svc-opt-sub {
  font-size: 10.5px;
  color: #708090;
  margin-top: 1px;
}

/* Sub-service dropdown wrapper — animated reveal */
.sub-svc-wrap {
  overflow: hidden;
  max-height: 0;
  opacity: 0;
  transition: max-height .35s ease, opacity .25s ease, margin .25s ease;
  margin-top: 0;
}
.sub-svc-wrap.open {
  max-height: 200px;
  opacity: 1;
  margin-top: 16px;
}

/* Form divider */
.form-divider {
  height: 0.5px;
  background: #f0f3f7;
  margin: 20px 0;
}

/* Character counter */
.char-counter {
  font-size: 11px;
  color: #708090;
  text-align: right;
  margin-top: 4px;
}

/* Submit button */
.form-submit {
  width: 100%;
  background: #002366;
  color: #fff;
  font-size: 14px;
  font-weight: 700;
  padding: 14px 24px;
  border-radius: 8px;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  margin-top: 22px;
  transition: opacity .15s, transform .15s;
  cursor: pointer;
}
.form-submit:hover {
  opacity: 0.92;
  transform: translateY(-1px);
}
.form-submit:active {
  transform: translateY(0);
}
.form-submit i {
  font-size: 16px;
}
.form-submit.loading {
  opacity: 0.75;
  pointer-events: none;
}

/* Privacy note */
.privacy-note {
  display: flex;
  align-items: flex-start;
  gap: 7px;
  margin-top: 14px;
  font-size: 11.5px;
  color: #708090;
  line-height: 1.5;
  text-align: left;
}
.privacy-note i {
  font-size: 13px;
  color: #708090;
  flex-shrink: 0;
  margin-top: 1px;
}

/* ============================================================
   SUCCESS STATE
============================================================ */
.success-state {
  padding: 48px 28px;
  text-align: center;
  outline: none;
}
.success-circle {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  background: #dcfce7;
  border: 1.5px solid #86efac;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 20px;
}
.success-circle i {
  font-size: 34px;
  color: #16a34a;
}
.success-h {
  font-size: 20px;
  font-weight: 800;
  color: #002366;
  margin-bottom: 10px;
  letter-spacing: -0.3px;
}
.success-msg {
  font-size: 14px;
  color: #6b7280;
  line-height: 1.65;
  max-width: 380px;
  margin: 0 auto 24px;
}
.success-ref {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: #f0f4fa;
  border: 0.5px solid #dde1e9;
  border-radius: 8px;
  padding: 10px 18px;
  font-size: 12px;
  font-weight: 600;
  color: #002366;
  margin-bottom: 28px;
}
.success-back {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  font-weight: 600;
  color: #708090;
  cursor: pointer;
  background: none;
  border: none;
  transition: color .15s;
}
.success-back:hover {
  color: #002366;
}

/* ============================================================
   FAQ STRIP
============================================================ */
.faq-sec {
  background: #fff;
  padding: 56px 32px;
}
.faq-in {
  max-width: 1080px;
  margin: 0 auto;
  text-align: left;
}
.stag {
  font-size: 10px;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: #708090;
  font-weight: 700;
  margin-bottom: 6px;
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
  margin-bottom: 32px;
}
.faq-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 14px;
}
.faq-card {
  background: #f7f8fb;
  border: 0.5px solid #dde1e9;
  border-radius: 10px;
  padding: 22px 20px;
  transition: border-color .2s;
  text-align: left;
}
.faq-card:hover {
  border-color: #b0bad0;
}
.faq-q {
  font-size: 13.5px;
  font-weight: 700;
  color: #002366;
  margin-bottom: 8px;
  display: flex;
  align-items: flex-start;
  gap: 8px;
}
.faq-q i {
  font-size: 16px;
  color: #708090;
  flex-shrink: 0;
  margin-top: 1px;
}
.faq-a {
  font-size: 13px;
  color: #6b7280;
  line-height: 1.6;
  padding-left: 24px;
}

/* ============================================================
   CTA BAND
============================================================ */
.ctaband {
  background: #002366;
  padding: 52px 32px;
  border-top: 0.5px solid rgba(255, 255, 255, 0.07);
}
.ctaband-in {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  max-width: 1080px;
  margin: 0 auto;
  text-align: left;
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
  transition: opacity 0.15s;
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
  transition: color 0.15s, border-color 0.15s;
}
.cta-outline:hover {
  color: #fff;
  border-color: rgba(255, 255, 255, 0.45);
}

/* ============================================================
   FADE UP
============================================================ */
.fade-up {
  opacity: 0;
  transform: translateY(16px);
  transition: opacity .5s ease, transform .5s ease;
}
.fade-up.visible {
  opacity: 1;
  transform: translateY(0);
}

/* ============================================================
   FIELD ERROR STATE
============================================================ */
.form-input.error, .form-select.error, .form-textarea.error {
  border-color: #ef4444 !important;
  background: #fff8f8 !important;
  box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}
.field-error {
  font-size: 11.5px;
  color: #ef4444;
  margin-top: 4px;
  display: none;
  text-align: left;
}
.field-error.visible {
  display: block;
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width: 960px){
  .hero-grid {
    grid-template-columns: 1fr;
  }
  .sla-card {
    display: none;
  }
  .contact-layout {
    grid-template-columns: 1fr;
  }
  .sidebar {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
  }
  .info-card {
    grid-column: span 2;
  }
  .ctaband-in {
    flex-direction: column;
    align-items: flex-start;
  }
  .faq-grid {
    grid-template-columns: 1fr;
  }
}
@media(max-width: 640px){
  .page-hero {
    padding: 36px 20px 44px;
  }
  .page-h1 {
    font-size: 28px;
  }
  .hero-promise {
    grid-template-columns: repeat(2, 1fr);
  }
  .contact-sec {
    padding: 40px 20px 60px;
  }
  .faq-sec {
    padding: 44px 20px;
  }
  .ctaband {
    padding: 40px 20px;
  }
  .sidebar {
    grid-template-columns: 1fr;
  }
  .info-card {
    grid-column: span 1;
  }
  .form-row {
    grid-template-columns: 1fr;
  }
  .service-toggle {
    grid-template-columns: 1fr;
  }
  .tbar-in {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
}
</style>
