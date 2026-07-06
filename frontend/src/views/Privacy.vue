<template>
  <div class="privacy-view">
    <!-- PAGE HERO -->
    <section class="page-hero">
      <div class="hero-in">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <router-link to="/" class="bc-link">Home</router-link>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-cur" aria-current="page">Privacy Policy</span>
        </nav>
        <div class="eyebrow">
          <i class="ti ti-shield-check" aria-hidden="true"></i>Legal &amp; Compliance
        </div>
        <h1 class="page-h1">Privacy Policy</h1>
        <p class="page-sub">
          This policy explains how enterprise IT Pty Ltd collects, uses, stores, and protects your personal information in accordance with the <em>Privacy Act 1988</em> (Cth) and the Australian Privacy Principles (APPs).
        </p>
        <div class="updated-badge">
          <i class="ti ti-calendar" aria-hidden="true"></i>
          Last updated: 1 June 2025 &nbsp;·&nbsp; Effective: 1 June 2025
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
            <nav class="toc-list" aria-label="Policy sections">
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
              <a href="mailto:privacy@enterpriseit.com.au" class="contact-privacy-btn">
                <i class="ti ti-mail" aria-hidden="true"></i>Privacy enquiries
              </a>
            </div>
          </div>
        </aside>

        <!-- POLICY SECTIONS -->
        <article>
          <!-- 1. WHO WE ARE -->
          <div class="pol-section" id="who-we-are">
            <h2 class="pol-h2"><span class="sec-num">1</span>Who We Are</h2>
            <p class="pol-p">
              <strong>enterprise IT Pty Ltd</strong> ("<strong>enterprise IT</strong>", "<strong>we</strong>", "<strong>us</strong>", "<strong>our</strong>") is an information technology services company headquartered in Adelaide CBD, South Australia. We provide ICT lifecycle management, certified IT asset disposition (ITAD), cybersecurity operations, data governance, and related enterprise technology services.
            </p>
            <p class="pol-p">
              We are a South Australian owned and operated business. Our registered address is Adelaide CBD, South Australia 5000, Australia.
            </p>
            <p class="pol-p">
              This Privacy Policy applies to all personal information we collect through our website (<router-link to="/">enterpriseit.com.au</router-link>), our Client Portal, our contact forms, our newsletter subscription, and in connection with our service delivery.
            </p>
          </div>

          <!-- 2. INFORMATION WE COLLECT -->
          <div class="pol-section" id="information-we-collect">
            <h2 class="pol-h2"><span class="sec-num">2</span>Information We Collect</h2>
            <p class="pol-p">
              We collect and hold personal information that is reasonably necessary to provide our services and operate our business. The types of personal information we may collect include:
            </p>

            <h3 class="pol-h3">Contact and identity information</h3>
            <ul class="pol-ul">
              <li>Full name and job title</li>
              <li>Organisation name</li>
              <li>Work email address and phone number</li>
              <li>Physical or postal address (for logistics, ITAD collection, and account setup)</li>
            </ul>

            <h3 class="pol-h3">Enquiry and service information</h3>
            <ul class="pol-ul">
              <li>Details of your IT services enquiry or quote request</li>
              <li>Information about your organisation's IT environment and requirements</li>
              <li>Records of communications between you and enterprise IT</li>
            </ul>

            <h3 class="pol-h3">Account and portal information</h3>
            <ul class="pol-ul">
              <li>
                Microsoft account identity (email address and display name, via Microsoft Entra ID External Identities) for Client Portal access
              </li>
              <li>Account provisioning request details (email, organisation, account type)</li>
              <li>Portal activity logs (document access and download records)</li>
            </ul>

            <h3 class="pol-h3">Website usage information</h3>
            <ul class="pol-ul">
              <li>IP address and browser type</li>
              <li>Pages visited and time spent on site</li>
              <li>Referring URLs</li>
              <li>Cookie identifiers (see Section 9)</li>
            </ul>

            <div class="pol-callout">
              <i class="ti ti-info-circle" aria-hidden="true"></i>
              <div class="pol-callout-text">
                <strong>Sensitive information:</strong> We do not intentionally collect sensitive information (as defined under the Privacy Act 1988) through our website or standard service delivery. If sensitive information is inadvertently shared with us in the context of a service engagement, it will be handled with the same protections as all personal information.
              </div>
            </div>
          </div>

          <!-- 3. HOW WE COLLECT -->
          <div class="pol-section" id="how-we-collect">
            <h2 class="pol-h2"><span class="sec-num">3</span>How We Collect Information</h2>
            <p class="pol-p">
              We collect personal information directly from you or your organisation, primarily through the following means:
            </p>
            <table class="pol-table" aria-label="Collection methods">
              <thead>
                <tr>
                  <th>Collection point</th>
                  <th>Information collected</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Contact &amp; Quote form</td>
                  <td>Name, organisation, email, phone, address, service category, requirements</td>
                </tr>
                <tr>
                  <td>Newsletter subscription</td>
                  <td>Email address, organisation (optional)</td>
                </tr>
                <tr>
                  <td>Client Portal onboarding</td>
                  <td>Email address, organisation name, account type (client/partner)</td>
                </tr>
                <tr>
                  <td>Client Portal login</td>
                  <td>Microsoft account identity (via Entra ID — we receive only what Microsoft provides)</td>
                </tr>
                <tr>
                  <td>Email correspondence</td>
                  <td>Contact details and content of communications</td>
                </tr>
                <tr>
                  <td>Service delivery</td>
                  <td>Asset register data, logistics details, site addresses</td>
                </tr>
                <tr>
                  <td>Website analytics</td>
                  <td>Usage data, IP address, device info (anonymised where possible)</td>
                </tr>
              </tbody>
            </table>
            <p class="pol-p">
              We do not collect personal information from third parties without your knowledge, except in the limited circumstances where this is permitted under the Privacy Act 1988 (for example, from public registers for business verification purposes).
            </p>
          </div>

          <!-- 4. WHY WE COLLECT -->
          <div class="pol-section" id="why-we-collect">
            <h2 class="pol-h2"><span class="sec-num">4</span>Why We Collect Your Information</h2>
            <p class="pol-p">
              We collect and use personal information for the following primary purposes:
            </p>
            <ul class="pol-ul">
              <li>
                <strong>Responding to enquiries and quotes</strong> — to contact you about your service request and provide proposals
              </li>
              <li>
                <strong>Delivering IT services</strong> — to provision, manage, and fulfil the services you have engaged us to provide
              </li>
              <li>
                <strong>Client Portal access</strong> — to authenticate your identity and provide secure access to your documents, reports, and invoices
              </li>
              <li>
                <strong>Newsletter and communications</strong> — to send you our newsletter and service updates, where you have subscribed or consented
              </li>
              <li>
                <strong>Legal and compliance obligations</strong> — including record-keeping, tax, contract management, and regulatory compliance
              </li>
              <li>
                <strong>Improving our services</strong> — to analyse how our website and services are used to improve their quality
              </li>
              <li>
                <strong>Security</strong> — to protect our systems, prevent fraud, and maintain the integrity of our IT infrastructure
              </li>
            </ul>
            <p class="pol-p">
              We will not use your personal information for any purpose other than those listed above (or directly related purposes) without your consent, unless required or permitted by law.
            </p>
          </div>

          <!-- 5. DISCLOSURE -->
          <div class="pol-section" id="disclosure">
            <h2 class="pol-h2"><span class="sec-num">5</span>Disclosure of Your Information</h2>
            <p class="pol-p">
              We do not sell, rent, or trade your personal information to third parties for marketing purposes. We may disclose your personal information to the following categories of third parties, only to the extent necessary for the purposes described in this policy:
            </p>
            <ul class="pol-ul">
              <li>
                <strong>IT service providers</strong> — including our cloud infrastructure provider (Microsoft Azure), email delivery service, and website hosting provider, who assist us in operating our systems. These providers are bound by confidentiality obligations and are not permitted to use your data for their own purposes.
              </li>
              <li>
                <strong>Microsoft Corporation</strong> — for Client Portal authentication via Microsoft Entra ID External Identities. Microsoft's privacy practices are governed by the
                <a href="https://privacy.microsoft.com" target="_blank" rel="noopener">Microsoft Privacy Statement</a>.
              </li>
              <li>
                <strong>Analytics providers</strong> — website analytics services (see Section 9) operating in an anonymised or aggregated manner.
              </li>
              <li>
                <strong>Professional advisers</strong> — including our legal advisers, accountants, and auditors, who are bound by professional confidentiality obligations.
              </li>
              <li>
                <strong>Law enforcement and regulators</strong> — where required by law, court order, or regulatory obligation.
              </li>
            </ul>
            <p class="pol-p">
              We require all third parties who handle personal information on our behalf to comply with the Australian Privacy Principles and to maintain appropriate security measures.
            </p>
          </div>

          <!-- 6. OVERSEAS -->
          <div class="pol-section" id="overseas">
            <h2 class="pol-h2"><span class="sec-num">6</span>Overseas Disclosure</h2>
            <p class="pol-p">
              Some of our service providers (including Microsoft for Client Portal authentication and cloud infrastructure) may store or process personal information outside Australia, including in the United States and other countries. Where this occurs, we take reasonable steps to ensure that overseas recipients handle personal information in a manner consistent with the Australian Privacy Principles.
            </p>
            <p class="pol-p">
              By providing us with your personal information, you acknowledge that it may be transferred to, stored, or processed in countries outside Australia, which may have different privacy laws from those in Australia.
            </p>
            <div class="pol-callout green">
              <i class="ti ti-shield-check" aria-hidden="true"></i>
              <div class="pol-callout-text">
                <strong>Our primary operations are Australian.</strong> Our servers, staff, and business operations are based in Australia. We select service providers with appropriate data handling agreements and security standards.
              </div>
            </div>
          </div>

          <!-- 7. ITAD DATA -->
          <div class="pol-section" id="itad-data">
            <h2 class="pol-h2"><span class="sec-num">7</span>ITAD &amp; Data Disposal Services</h2>
            <p class="pol-p">
              A core part of our business is the secure disposal of data stored on IT assets. In performing these services:
            </p>
            <ul class="pol-ul">
              <li>
                We apply <strong>NIST 800-88 media sanitisation standards</strong> to all data-bearing devices we handle, ensuring that data is irrecoverably destroyed before any device is retired, donated, or recycled.
              </li>
              <li>
                We <strong>do not access, read, copy, or retain</strong> the content of data stored on client devices. Our sanitisation process is designed to destroy data without examination.
              </li>
              <li>
                We issue a <strong>Certificate of Destruction</strong> for each device or batch, documenting the sanitisation method applied and the outcome.
              </li>
              <li>Chain-of-custody documentation records all handling of your assets from collection to final disposition.</li>
            </ul>
            <p class="pol-p">
              Any personal information collected in connection with ITAD service delivery (such as your name, organisation, site address, and asset registers) is handled in accordance with this policy and retained only for as long as necessary for legal, compliance, and ESG reporting purposes (see Section 10).
            </p>
          </div>

          <!-- 8. CLIENT PORTAL -->
          <div class="pol-section" id="portal">
            <h2 class="pol-h2"><span class="sec-num">8</span>Client Portal &amp; Security</h2>
            <p class="pol-p">
              Our Client Portal is accessible at
              <router-link to="/login">enterpriseit.com.au/portal</router-link> and provides authenticated clients and partners with secure access to certificates of destruction, audit reports, invoices, and project documentation.
            </p>
            <h3 class="pol-h3">Authentication</h3>
            <p class="pol-p">
              The portal integrates with <strong>Microsoft Entra ID</strong> (OIDC) with multi-factor authentication, keeping client documents secure. We do not store your Microsoft account credentials — these are managed entirely by Microsoft.
            </p>
            <h3 class="pol-h3">Session security</h3>
            <p class="pol-p">
              Upon successful authentication, your session is secured using <strong>HttpOnly, Secure, SameSite=Strict cookies</strong>. This means session tokens are not accessible via JavaScript, reducing the risk of cross-site scripting attacks.
            </p>
            <h3 class="pol-h3">Portal data</h3>
            <p class="pol-p">
              Documents accessible through the portal (certificates, reports, invoices) are stored securely on Australian-based infrastructure. Access is logged for security and audit purposes. Portal users are responsible for maintaining the confidentiality of their Microsoft account credentials.
            </p>
          </div>

          <!-- 9. COOKIES -->
          <div class="pol-section" id="cookies">
            <h2 class="pol-h2"><span class="sec-num">9</span>Cookies &amp; Analytics</h2>
            <p class="pol-p">
              Our website uses cookies and similar technologies to improve your experience and understand how our site is used. The types of cookies we use include:
            </p>
            <table class="pol-table" aria-label="Cookie types">
              <thead>
                <tr>
                  <th>Cookie type</th>
                  <th>Purpose</th>
                  <th>Duration</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Essential cookies</td>
                  <td>Required for the website and portal to function (session management, security)</td>
                  <td>Session</td>
                </tr>
                <tr>
                  <td>Analytics cookies</td>
                  <td>Anonymised usage data to understand site performance (page views, traffic sources)</td>
                  <td>Up to 2 years</td>
                </tr>
                <tr>
                  <td>Preference cookies</td>
                  <td>Remembering your settings and preferences</td>
                  <td>Up to 1 year</td>
                </tr>
              </tbody>
            </table>
            <p class="pol-p">
              You can control cookies through your browser settings. Note that disabling essential cookies may affect the functionality of our website and Client Portal. We do not use third-party advertising cookies or sell browsing data to advertisers.
            </p>
          </div>

          <!-- 10. RETENTION -->
          <div class="pol-section" id="retention">
            <h2 class="pol-h2"><span class="sec-num">10</span>Retention &amp; Storage</h2>
            <p class="pol-p">
              We retain personal information only for as long as it is necessary to fulfil the purposes for which it was collected, or as required by law. Our general retention guidelines are:
            </p>
            <table class="pol-table" aria-label="Retention periods">
              <thead>
                <tr>
                  <th>Data type</th>
                  <th>Retention period</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Enquiry and quote records</td>
                  <td>3 years from last contact, or 7 years if a contract resulted</td>
                </tr>
                <tr>
                  <td>Service delivery records (including ITAD)</td>
                  <td>7 years from service completion (for tax, legal, and ESG compliance)</td>
                </tr>
                <tr>
                  <td>Certificates of Destruction</td>
                  <td>7 years minimum (compliance and audit requirements)</td>
                </tr>
                <tr>
                  <td>Portal access logs</td>
                  <td>2 years</td>
                </tr>
                <tr>
                  <td>Newsletter subscriptions</td>
                  <td>Until unsubscribed, plus 1 year</td>
                </tr>
                <tr>
                  <td>Website analytics</td>
                  <td>Up to 2 years (anonymised)</td>
                </tr>
              </tbody>
            </table>
            <p class="pol-p">
              Personal information is stored securely on Australian or Microsoft Azure infrastructure. When personal information is no longer required, it is securely deleted or de-identified using our certified data destruction processes.
            </p>
          </div>

          <!-- 11. YOUR RIGHTS -->
          <div class="pol-section" id="your-rights">
            <h2 class="pol-h2"><span class="sec-num">11</span>Your Rights</h2>
            <p class="pol-p">
              Under the Privacy Act 1988 (Cth) and the Australian Privacy Principles, you have the following rights in relation to your personal information:
            </p>
            <div class="pol-dl">
              <div>
                <div class="pol-dt">Access</div>
                <div class="pol-dd">
                  You have the right to request access to the personal information we hold about you. We will respond to access requests within 30 days. We may charge a reasonable fee to cover the cost of providing access.
                </div>
              </div>
              <div>
                <div class="pol-dt">Correction</div>
                <div class="pol-dd">
                  If you believe personal information we hold about you is inaccurate, incomplete, or out of date, you may request that we correct it. We will correct information or provide reasons why correction is not appropriate within 30 days.
                </div>
              </div>
              <div>
                <div class="pol-dt">Opt-out of direct marketing</div>
                <div class="pol-dd">
                  You may opt out of receiving our newsletter and marketing communications at any time by clicking the unsubscribe link in any email, or by contacting us directly. We will process opt-out requests promptly.
                </div>
              </div>
              <div>
                <div class="pol-dt">Anonymity</div>
                <div class="pol-dd">
                  Where practicable, you may interact with us anonymously or using a pseudonym. However, we may not be able to provide all services if we cannot identify you.
                </div>
              </div>
            </div>
            <p class="pol-p">To exercise any of these rights, please contact our Privacy Officer using the details in Section 14.</p>
          </div>

          <!-- 12. COMPLAINTS -->
          <div class="pol-section" id="complaints">
            <h2 class="pol-h2"><span class="sec-num">12</span>Complaints</h2>
            <p class="pol-p">
              If you believe we have mishandled your personal information or breached the Australian Privacy Principles, we encourage you to contact us first so we can attempt to resolve your concern. Please contact our Privacy Officer using the details in Section 14.
            </p>
            <p class="pol-p">
              We will acknowledge your complaint within 5 business days and provide a substantive response within 30 days. If you are not satisfied with our response, you may lodge a complaint with the <strong>Office of the Australian Information Commissioner (OAIC)</strong>:
            </p>
            <ul class="pol-ul">
              <li>Website: <a href="https://www.oaic.gov.au" target="_blank" rel="noopener">www.oaic.gov.au</a></li>
              <li>Phone: 1300 363 992</li>
              <li>Post: GPO Box 5218, Sydney NSW 2001</li>
            </ul>
          </div>

          <!-- 13. CHANGES -->
          <div class="pol-section" id="changes">
            <h2 class="pol-h2"><span class="sec-num">13</span>Changes to This Policy</h2>
            <p class="pol-p">
              We may update this Privacy Policy from time to time to reflect changes in our practices, technology, or legal obligations. When we make material changes, we will update the "Last updated" date at the top of this page and, where appropriate, notify registered portal users or newsletter subscribers.
            </p>
            <p class="pol-p">
              We encourage you to review this policy periodically. Your continued use of our website or services after any changes constitutes your acceptance of the updated policy.
            </p>
          </div>

          <!-- 14. CONTACT -->
          <div class="pol-section" id="contact-us">
            <h2 class="pol-h2"><span class="sec-num">14</span>Contact Us</h2>
            <p class="pol-p">For any privacy-related enquiries, access requests, corrections, or complaints, please contact our Privacy Officer:</p>
            <ul class="pol-ul">
              <li><strong>Privacy Officer</strong> — enterprise IT Pty Ltd</li>
              <li><strong>Email:</strong> <a href="mailto:privacy@enterpriseit.com.au">privacy@enterpriseit.com.au</a></li>
              <li><strong>Phone:</strong> +61 494 614 221 (Mon–Fri, 8am–6pm ACST)</li>
              <li><strong>Post:</strong> Privacy Officer, enterprise IT Pty Ltd, Adelaide CBD, South Australia 5000</li>
            </ul>
            <p class="pol-p" style="margin-top: 14px">
              For general enquiries about our services, please use our <router-link to="/contact">contact page</router-link> or call our main number.
            </p>
          </div>

          <!-- CONTACT BOX -->
          <div class="contact-box">
            <div>
              <div class="cb-title">Privacy questions?</div>
              <div class="cb-desc">Our Privacy Officer responds to all enquiries within 5 business days.</div>
            </div>
            <div class="cb-btns">
              <a href="mailto:privacy@enterpriseit.com.au" class="cb-btn-white">Email Privacy Officer</a>
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

const activeSection = ref('who-we-are');

const tocItems = [
  { id: 'who-we-are', label: '1. Who We Are' },
  { id: 'information-we-collect', label: '2. Information We Collect' },
  { id: 'how-we-collect', label: '3. How We Collect It' },
  { id: 'why-we-collect', label: '4. Why We Collect It' },
  { id: 'disclosure', label: '5. Disclosure of Information' },
  { id: 'overseas', label: '6. Overseas Disclosure' },
  { id: 'itad-data', label: '7. ITAD & Data Disposal' },
  { id: 'portal', label: '8. Client Portal & Security' },
  { id: 'cookies', label: '9. Cookies & Analytics' },
  { id: 'retention', label: '10. Retention & Storage' },
  { id: 'your-rights', label: '11. Your Rights' },
  { id: 'complaints', label: '12. Complaints' },
  { id: 'changes', label: '13. Changes to This Policy' },
  { id: 'contact-us', label: '14. Contact Us' },
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
