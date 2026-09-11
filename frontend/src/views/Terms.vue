<template>
  <div class="terms-view">
    <!-- PAGE HERO -->
    <section class="page-hero">
      <div class="hero-in">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <router-link to="/" class="bc-link">Home</router-link>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-cur" aria-current="page">Terms of Service</span>
        </nav>
        <div class="eyebrow">
          <i class="ti ti-file-text" aria-hidden="true"></i>Legal &amp; Compliance
        </div>
        <h1 class="page-h1">Terms of Service</h1>
        <p class="page-sub">
          These terms govern your use of the enterprise IT website and Client Portal. Please read them before using either.
        </p>
        <div class="updated-badge">
          <i class="ti ti-calendar" aria-hidden="true"></i>
          Last updated: 14 September 2026 &nbsp;·&nbsp; Effective: 14 September 2026
        </div>
      </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="policy-wrap">
      <div class="policy-layout">
        <!-- TABLE OF CONTENTS -->
        <aside>
          <div class="toc-card" aria-label="Table of contents">
            <div class="toc-head">
              <div class="toc-title">
                <i class="ti ti-list" aria-hidden="true"></i>Contents
              </div>
            </div>
            <nav class="toc-list" aria-label="Terms sections">
              <a
                v-for="item in tocItems"
                :key="item.id"
                :href="'#' + item.id"
                class="toc-item"
                :class="{ active: activeSection === item.id }"
                @click.prevent="scrollToSection(item.id)"
              >
                {{ item.label }}
              </a>
            </nav>
            <div class="toc-footer">
              <router-link to="/contact" class="contact-privacy-btn">
                <i class="ti ti-mail" aria-hidden="true"></i>Contact us
              </router-link>
            </div>
          </div>
        </aside>

        <!-- TERMS SECTIONS -->
        <article>
          <!-- 1. ABOUT THESE TERMS -->
          <div class="pol-section" id="about-terms">
            <h2 class="pol-h2"><span class="sec-num">1</span>About These Terms</h2>
            <p class="pol-p">
              These Terms of Service ("<strong>Terms</strong>") govern your access to and use of the enterprise IT website at <router-link to="/">enterpriseit.com.au</router-link> (the "<strong>Website</strong>") and our Client Portal (the "<strong>Portal</strong>").
            </p>
            <p class="pol-p">
              By accessing or using the Website or the Portal, you agree to be bound by these Terms. If you do not agree to them, please do not use the Website or the Portal.
            </p>
            <div class="pol-callout">
              <i class="ti ti-info-circle" aria-hidden="true"></i>
              <div class="pol-callout-text">
                <strong>These Terms cover the Website only.</strong> If we deliver services to your organisation, those services are governed by a separate written agreement. Where that agreement conflicts with these Terms, the agreement prevails.
              </div>
            </div>
          </div>

          <!-- 2. WHO WE ARE -->
          <div class="pol-section" id="who-we-are">
            <h2 class="pol-h2"><span class="sec-num">2</span>Who We Are</h2>
            <p class="pol-p">
              The Website and Portal are operated by <strong>ENTERPRISE IT PTY LTD</strong> (ABN 33 701 700 478, ACN 701 700 478), a South Australian owned and operated company headquartered in Adelaide CBD, South Australia.
            </p>
            <p class="pol-p">
              References in these Terms to "<strong>enterprise IT</strong>", "<strong>we</strong>", "<strong>us</strong>" and "<strong>our</strong>" are references to that company.
            </p>
          </div>

          <!-- 3. USING THIS WEBSITE -->
          <div class="pol-section" id="using-website">
            <h2 class="pol-h2"><span class="sec-num">3</span>Using This Website</h2>
            <p class="pol-p">You may use the Website for lawful purposes only. You agree not to:</p>
            <ul class="pol-ul">
              <li>use the Website in any way that breaches any applicable law or regulation;</li>
              <li>attempt to gain unauthorised access to the Website, the Portal, or any server, system or network connected to them;</li>
              <li>introduce any malicious code, or attempt to interfere with the proper operation of the Website;</li>
              <li>use automated systems to scrape, harvest or extract data from the Website without our prior written consent;</li>
              <li>reproduce, duplicate or resell any part of the Website except as permitted under these Terms.</li>
            </ul>
            <p class="pol-p">
              We may suspend, withdraw or restrict availability of all or part of the Website for business or operational reasons, and we will try to give reasonable notice where we can.
            </p>
          </div>

          <!-- 4. CLIENT PORTAL ACCESS -->
          <div class="pol-section" id="portal-access">
            <h2 class="pol-h2"><span class="sec-num">4</span>Client Portal Access</h2>
            <p class="pol-p">
              The Portal is provided to authorised representatives of our clients and partners. Access is granted at our discretion and may be varied, suspended or withdrawn at any time.
            </p>
            <h3 class="pol-h3">Your responsibilities</h3>
            <ul class="pol-ul">
              <li>You must keep your account credentials confidential and must not share them with any other person.</li>
              <li>You must notify us promptly if you believe your account has been accessed without authorisation.</li>
              <li>You must only access documents and information relating to the organisation you represent.</li>
              <li>You must notify us when a person who has Portal access no longer requires it — for example, when they leave your organisation.</li>
            </ul>
            <p class="pol-p">
              Documents made available through the Portal — including certificates of destruction, reports and invoices — are provided for your organisation's internal use. You may share them with your auditors and regulators as required.
            </p>
          </div>

          <!-- 5. INTELLECTUAL PROPERTY -->
          <div class="pol-section" id="intellectual-property">
            <h2 class="pol-h2"><span class="sec-num">5</span>Intellectual Property</h2>
            <p class="pol-p">
              Unless otherwise stated, we own or are licensed to use all intellectual property rights in the Website and the Portal, including their text, graphics, layout, design and underlying code.
            </p>
            <p class="pol-p">
              You may view, download and print content from the Website for your own internal business use. You must not otherwise reproduce, modify, republish or distribute any part of it without our prior written permission.
            </p>
            <p class="pol-p">
              Third-party names, standards and trade marks referred to on the Website remain the property of their respective owners, and their use does not imply any affiliation with or endorsement by those owners.
            </p>
          </div>

          <!-- 6. ACCURACY OF INFORMATION -->
          <div class="pol-section" id="accuracy">
            <h2 class="pol-h2"><span class="sec-num">6</span>Accuracy of Information</h2>
            <p class="pol-p">
              Content on the Website is provided for general information only. It is not professional, technical, security or legal advice, and it should not be relied on as the sole basis for any decision.
            </p>
            <p class="pol-p">
              We take reasonable care to keep the Website accurate and up to date, but we do not warrant that it is complete, current or free from error. Service descriptions, capabilities and indicative figures may change without notice.
            </p>
            <p class="pol-p">
              Nothing on the Website constitutes an offer capable of acceptance, or a quote or commitment to provide services on particular terms or at a particular price.
            </p>
          </div>

          <!-- 7. THIRD-PARTY LINKS -->
          <div class="pol-section" id="third-party">
            <h2 class="pol-h2"><span class="sec-num">7</span>Third-Party Links and Services</h2>
            <p class="pol-p">
              The Website may contain links to third-party websites and rely on third-party services, including Microsoft for Portal authentication. We provide those links and services for convenience and do not control or endorse their content.
            </p>
            <p class="pol-p">
              We are not responsible for the availability, content, or privacy and security practices of third-party websites or services. Your use of them is governed by their own terms.
            </p>
          </div>

          <!-- 8. LIABILITY -->
          <div class="pol-section" id="liability">
            <h2 class="pol-h2"><span class="sec-num">8</span>Liability</h2>
            <div class="pol-callout green">
              <i class="ti ti-shield-check" aria-hidden="true"></i>
              <div class="pol-callout-text">
                <strong>Your rights under Australian Consumer Law are not affected.</strong> Nothing in these Terms excludes, restricts or modifies any guarantee, right or remedy you may have under the <em>Competition and Consumer Act 2010</em> (Cth), including the Australian Consumer Law, that cannot lawfully be excluded or limited.
              </div>
            </div>
            <p class="pol-p">
              Subject to the paragraph above, and to the maximum extent permitted by law:
            </p>
            <ul class="pol-ul">
              <li>the Website and Portal are provided on an "as is" and "as available" basis, without warranties of any kind;</li>
              <li>we do not warrant that the Website or Portal will be uninterrupted, timely, secure or error-free;</li>
              <li>we are not liable for any indirect, incidental, special or consequential loss, or for any loss of profit, revenue, data or business opportunity, arising from your use of the Website or Portal.</li>
            </ul>
            <p class="pol-p">
              Where our liability cannot be excluded but can be limited, our liability is limited, at our option, to resupplying the relevant services or paying the cost of having them resupplied.
            </p>
          </div>

          <!-- 9. PRIVACY -->
          <div class="pol-section" id="privacy">
            <h2 class="pol-h2"><span class="sec-num">9</span>Privacy</h2>
            <p class="pol-p">
              We handle personal information in accordance with the <em>Privacy Act 1988</em> (Cth) and the Australian Privacy Principles. Our <router-link to="/privacy">Privacy Policy</router-link> explains what we collect, why we collect it, how we store it, and how you can access or correct it.
            </p>
            <p class="pol-p">
              By using the Website or the Portal, you acknowledge that we handle personal information as described in that policy.
            </p>
          </div>

          <!-- 10. GOVERNING LAW -->
          <div class="pol-section" id="governing-law">
            <h2 class="pol-h2"><span class="sec-num">10</span>Governing Law</h2>
            <p class="pol-p">
              These Terms are governed by the laws of South Australia and the Commonwealth of Australia. You and we submit to the non-exclusive jurisdiction of the courts of South Australia and the courts able to hear appeals from them.
            </p>
          </div>

          <!-- 11. CHANGES TO THESE TERMS -->
          <div class="pol-section" id="changes">
            <h2 class="pol-h2"><span class="sec-num">11</span>Changes to These Terms</h2>
            <p class="pol-p">
              We may update these Terms from time to time to reflect changes to our services, our systems, or the law. The current version is always published on this page, with the date it took effect shown at the top.
            </p>
            <p class="pol-p">
              Your continued use of the Website or Portal after we publish a change means you accept the updated Terms. If a change is significant, we will take reasonable steps to notify Portal users directly.
            </p>
          </div>

          <!-- 12. CONTACT US -->
          <div class="pol-section" id="contact-us">
            <h2 class="pol-h2"><span class="sec-num">12</span>Contact Us</h2>
            <p class="pol-p">If you have any questions about these Terms, please contact us:</p>
            <ul class="pol-ul">
              <li><strong>Entity:</strong> ENTERPRISE IT PTY LTD (ABN 33 701 700 478)</li>
              <li><strong>Email:</strong> <a href="mailto:support@enterpriseit.com.au">support@enterpriseit.com.au</a></li>
              <li><strong>Phone:</strong> +61 494 614 221 (Mon–Fri, 8am–6pm ACST)</li>
              <li><strong>Post:</strong> ENTERPRISE IT PTY LTD, Adelaide CBD, South Australia 5000</li>
            </ul>
          </div>

          <!-- CONTACT BOX -->
          <div class="contact-box">
            <div>
              <div class="cb-title">Questions about these terms?</div>
              <div class="cb-desc">Our team responds to all enquiries within one business day.</div>
            </div>
            <div class="cb-btns">
              <a href="mailto:support@enterpriseit.com.au" class="cb-btn-white">Email Us</a>
              <router-link to="/contact" class="cb-btn-outline">Contact Us</router-link>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const activeSection = ref('about-terms');

const tocItems = [
  { id: 'about-terms', label: '1. About These Terms' },
  { id: 'who-we-are', label: '2. Who We Are' },
  { id: 'using-website', label: '3. Using This Website' },
  { id: 'portal-access', label: '4. Client Portal Access' },
  { id: 'intellectual-property', label: '5. Intellectual Property' },
  { id: 'accuracy', label: '6. Accuracy of Information' },
  { id: 'third-party', label: '7. Third-Party Links' },
  { id: 'liability', label: '8. Liability' },
  { id: 'privacy', label: '9. Privacy' },
  { id: 'governing-law', label: '10. Governing Law' },
  { id: 'changes', label: '11. Changes to These Terms' },
  { id: 'contact-us', label: '12. Contact Us' },
];

let observer = null;

const scrollToSection = (id) => {
  const element = document.getElementById(id);
  if (element) {
    const yOffset = -96; // Offset for navbar
    const y = element.getBoundingClientRect().top + window.scrollY + yOffset;
    window.scrollTo({ top: y, behavior: 'smooth' });
    activeSection.value = id;
  }
};

onMounted(() => {
  const sections = document.querySelectorAll('.pol-section[id]');
  observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          activeSection.value = entry.target.id;
        }
      });
    },
    { rootMargin: '-20% 0px -75% 0px' }
  );

  sections.forEach((sec) => observer.observe(sec));
});

onUnmounted(() => {
  if (observer) {
    observer.disconnect();
  }
});
</script>

<style scoped>
/* PAGE HERO */
.page-hero {
  background: #002366;
  padding: 44px 32px 48px;
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
  margin-bottom: 18px;
}
.bc-link {
  color: rgba(255, 255, 255, 0.45);
  font-size: 12px;
  transition: color 0.15s;
  text-decoration: none;
}
.bc-link:hover {
  color: rgba(255, 255, 255, 0.75);
}
.bc-sep {
  color: rgba(255, 255, 255, 0.22);
  font-size: 12px;
}
.bc-cur {
  color: rgba(255, 255, 255, 0.7);
  font-size: 12px;
}
.eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(255, 255, 255, 0.06);
  border: 0.5px solid rgba(255, 255, 255, 0.14);
  color: rgba(255, 255, 255, 0.7);
  font-size: 10px;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  padding: 5px 12px;
  border-radius: 20px;
  margin-bottom: 14px;
}
.page-h1 {
  color: #fff;
  font-size: 32px;
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -0.6px;
  margin-bottom: 10px;
}
.page-sub {
  color: rgba(255, 255, 255, 0.55);
  font-size: 14px;
  line-height: 1.65;
  max-width: 560px;
  margin-bottom: 22px;
}
.updated-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(255, 255, 255, 0.07);
  border: 0.5px solid rgba(255, 255, 255, 0.13);
  color: rgba(255, 255, 255, 0.55);
  font-size: 11.5px;
  padding: 5px 12px;
  border-radius: 6px;
}
.updated-badge i {
  font-size: 13px;
}

/* MAIN LAYOUT */
.policy-wrap {
  max-width: 1080px;
  margin: 0 auto;
  padding: 40px 32px 72px;
}
.policy-layout {
  display: grid;
  grid-template-columns: 260px 1fr;
  gap: 36px;
  align-items: start;
}

/* TABLE OF CONTENTS */
.toc-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  position: sticky;
  top: 78px;
  text-align: left;
}
.toc-head {
  padding: 13px 18px;
  border-bottom: 0.5px solid #f0f3f7;
}
.toc-title {
  font-size: 13px;
  font-weight: 800;
  color: #002366;
  display: flex;
  align-items: center;
  gap: 7px;
}
.toc-title i {
  font-size: 15px;
  color: #708090;
}
.toc-list {
  padding: 6px 0;
}
.toc-item {
  display: block;
  padding: 7px 18px;
  font-size: 12.5px;
  color: #6b7280;
  text-decoration: none;
  border-left: 2px solid transparent;
  transition: all 0.12s;
  line-height: 1.3;
}
.toc-item:hover {
  color: #002366;
  background: #f7f8fb;
}
.toc-item.active {
  color: #002366;
  font-weight: 600;
  border-left-color: #002366;
  background: #eef2fb;
}
.toc-footer {
  padding: 12px 18px;
  border-top: 0.5px solid #f0f3f7;
}
.contact-privacy-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  background: #002366;
  color: #fff;
  font-size: 12px;
  font-weight: 700;
  padding: 9px 14px;
  border-radius: 6px;
  text-decoration: none;
  transition: opacity 0.15s;
}
.contact-privacy-btn:hover {
  opacity: 0.9;
}
.contact-privacy-btn i {
  font-size: 14px;
}

/* POLICY CONTENT */
.pol-section {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  padding: 28px 30px;
  margin-bottom: 16px;
  text-align: left;
}
.pol-section:last-child {
  margin-bottom: 0;
}
.pol-h2 {
  font-size: 18px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -0.3px;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  gap: 10px;
}
.pol-h2 .sec-num {
  width: 28px;
  height: 28px;
  border-radius: 6px;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  color: #002366;
  flex-shrink: 0;
}
.pol-h3 {
  font-size: 14.5px;
  font-weight: 700;
  color: #002366;
  margin: 20px 0 8px;
}
.pol-p {
  font-size: 13.5px;
  color: #555;
  line-height: 1.72;
  margin-bottom: 14px;
}
.pol-p:last-child {
  margin-bottom: 0;
}
.pol-p strong {
  color: #1a2233;
  font-weight: 600;
}
.pol-p a {
  color: #002366;
  text-decoration: underline;
  text-underline-offset: 2px;
  transition: color 0.15s;
}
.pol-p a:hover {
  color: #1a3a6e;
}
.pol-ul {
  margin: 8px 0 14px 20px;
}
.pol-ul li {
  font-size: 13.5px;
  color: #555;
  line-height: 1.65;
  margin-bottom: 6px;
}
.pol-ul li::marker {
  color: #708090;
}
.pol-ul li strong {
  color: #1a2233;
  font-weight: 600;
}
/* Definition list */
.pol-dl {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin: 10px 0 14px;
}
.pol-dt {
  font-size: 13px;
  font-weight: 700;
  color: #002366;
  margin-bottom: 2px;
}
.pol-dd {
  font-size: 13px;
  color: #555;
  line-height: 1.6;
  padding-left: 14px;
  border-left: 2px solid #dde1e9;
}
/* Info callout */
.pol-callout {
  display: flex;
  align-items: flex-start;
  gap: 11px;
  background: #eef2fb;
  border: 0.5px solid #dde8f5;
  border-radius: 8px;
  padding: 14px 16px;
  margin: 16px 0;
}
.pol-callout i {
  font-size: 16px;
  color: #002366;
  flex-shrink: 0;
  margin-top: 1px;
}
.pol-callout-text {
  font-size: 13px;
  color: #444c5c;
  line-height: 1.55;
}
.pol-callout-text strong {
  color: #002366;
}
/* Green callout */
.pol-callout.green {
  background: #f0fdf4;
  border-color: #bbf7d0;
}
.pol-callout.green i {
  color: #16a34a;
}
/* Table */
.pol-table {
  width: 100%;
  border-collapse: collapse;
  margin: 14px 0;
  border-radius: 8px;
  overflow: hidden;
  border: 0.5px solid #dde1e9;
}
.pol-table thead tr {
  background: #002366;
}
.pol-table thead th {
  padding: 10px 14px;
  text-align: left;
  font-size: 11px;
  font-weight: 700;
  color: #fff;
  letter-spacing: 0.6px;
  text-transform: uppercase;
}
.pol-table tbody tr {
  border-bottom: 0.5px solid #f0f3f7;
}
.pol-table tbody tr:last-child {
  border-bottom: none;
}
.pol-table tbody tr:nth-child(even) {
  background: #fafbfd;
}
.pol-table tbody tr:hover {
  background: #f0f4fb;
}
.pol-table td {
  padding: 10px 14px;
  font-size: 13px;
  color: #444c5c;
  vertical-align: top;
}
.pol-table td:first-child {
  font-weight: 600;
  color: #002366;
}
/* Contact box at bottom */
.contact-box {
  background: #002366;
  border-radius: 12px;
  padding: 26px 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}
.cb-title {
  font-size: 16px;
  font-weight: 800;
  color: #fff;
  margin-bottom: 5px;
}
.cb-desc {
  color: rgba(255, 255, 255, 0.55);
  font-size: 13px;
  line-height: 1.5;
}
.cb-btns {
  display: flex;
  gap: 9px;
  flex-shrink: 0;
  flex-wrap: wrap;
}
.cb-btn-white {
  background: #fff;
  color: #002366;
  font-size: 13px;
  font-weight: 700;
  padding: 10px 18px;
  border-radius: 5px;
  text-decoration: none;
  transition: opacity 0.15s;
  white-space: nowrap;
}
.cb-btn-white:hover {
  opacity: 0.92;
}
.cb-btn-outline {
  background: transparent;
  color: rgba(255, 255, 255, 0.8);
  font-size: 13px;
  font-weight: 600;
  padding: 10px 18px;
  border-radius: 5px;
  border: 0.5px solid rgba(255, 255, 255, 0.25);
  text-decoration: none;
  transition: all 0.15s;
  white-space: nowrap;
}
.cb-btn-outline:hover {
  color: #fff;
  border-color: rgba(255, 255, 255, 0.5);
}

@media (max-width: 900px) {
  .policy-layout {
    grid-template-columns: 1fr;
  }
  .toc-card {
    position: static;
    margin-bottom: 20px;
  }
  .contact-box {
    flex-direction: column;
    align-items: flex-start;
  }
}
@media (max-width: 600px) {
  .page-hero {
    padding: 36px 20px 44px;
  }
  .page-h1 {
    font-size: 26px;
  }
  .policy-wrap {
    padding: 28px 20px 56px;
  }
  .pol-section {
    padding: 20px 18px;
  }
}
</style>
