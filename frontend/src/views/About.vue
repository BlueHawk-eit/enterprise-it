<template>
  <div class="about-page">
    <!-- ============================================================
         PAGE HERO
    ============================================================ -->
    <section class="page-hero" aria-labelledby="page-h1">
      <div class="hero-in">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <router-link to="/" class="bc-link">Home</router-link>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-cur">About Us</span>
        </nav>

        <div class="hero-layout">
          <div>
            <div class="eyebrow">
              <span class="eyebrow-dot" aria-hidden="true"></span>
              Proudly SA Owned &amp; Operated · Est. Adelaide CBD
            </div>
            <h1 class="page-h1" id="page-h1">
              Built in Adelaide.<br>
              <span class="accent">Trusted across<br>Australia.</span>
            </h1>
            <p class="page-sub">
              enterprise IT is South Australia's premier full-spectrum technology partner — combining deep ICT lifecycle expertise with enterprise-grade cyber defence to serve organisations across the country. We are proudly local, uncompromisingly professional, and relentlessly committed to quality, security, and sustainability.
            </p>
            <div class="hero-actions">
              <router-link to="/contact" class="btn-white"><i class="ti ti-mail" aria-hidden="true"></i>Get in Touch</router-link>
              <a href="https://www.linkedin.com/company/enterpriseitau/" class="btn-slate" target="_blank" rel="noopener"><i class="ti ti-brand-linkedin" aria-hidden="true"></i>Follow us on LinkedIn</a>
            </div>
            <div class="hero-stats" aria-label="Company highlights">
              <div class="hstat"><div class="hstat-num">SA</div><div class="hstat-label">Owned &amp;<br>Operated</div></div>
              <div class="hstat"><div class="hstat-num">24/7</div><div class="hstat-label">SOC &amp; Cyber<br>Operations</div></div>
              <div class="hstat"><div class="hstat-num">ISO</div><div class="hstat-label">Compliant</div></div>
              <div class="hstat"><div class="hstat-num">AUS</div><div class="hstat-label">-wide Service<br>Delivery</div></div>
            </div>
          </div>

          <!-- Right info card -->
          <aside class="info-card" aria-label="Quick company facts">
            <div class="ic-title">Company at a glance</div>
            <div class="ic-row">
              <div class="ic-icon"><i class="ti ti-map-pin" aria-hidden="true"></i></div>
              <div>
                <div class="ic-label">Headquarters</div>
                <div class="ic-val">Adelaide CBD<br>South Australia</div>
                <div class="green-pill"><span style="width:5px;height:5px;border-radius:50%;background:#4ade80;" aria-hidden="true"></span>SA Owned &amp; Operated</div>
              </div>
            </div>
            <div class="ic-row">
              <div class="ic-icon"><i class="ti ti-world" aria-hidden="true"></i></div>
              <div>
                <div class="ic-label">Service Coverage</div>
                <div class="ic-val">Australia-wide<br>All states &amp; territories</div>
              </div>
            </div>
            <div class="ic-row">
              <div class="ic-icon"><i class="ti ti-shield-check" aria-hidden="true"></i></div>
              <div>
                <div class="ic-label">Standards Alignment</div>
                <div class="ic-val">Aligned to ISO 27001 · NIST 800-88<br>ESG reporting frameworks</div>
              </div>
            </div>
            <div class="ic-row">
              <div class="ic-icon"><i class="ti ti-radar" aria-hidden="true"></i></div>
              <div>
                <div class="ic-label">SOC Operations</div>
                <div class="ic-val">24/7 · 365 days</div>
                <div class="green-pill"><span style="width:5px;height:5px;border-radius:50%;background:#4ade80;" aria-hidden="true"></span>Monitoring active</div>
              </div>
            </div>
            <div class="ic-row">
              <div class="ic-icon"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></div>
              <div>
                <div class="ic-label">Connect with us</div>
                <div class="ic-val">enterprise IT on LinkedIn</div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- TRUST BAR -->
    <div class="tbar" aria-label="Standards and alignment">
      <div class="tbar-in">
        <span class="tbar-label">Standards We Align To</span>
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
         OUR STORY
    ============================================================ -->
    <section class="sec sec-white" aria-labelledby="story-heading">
      <div class="sec-in">
        <p class="stag">Our Story</p>
        <h2 class="sh2" id="story-heading">South Australian roots.<br>National reach.</h2>

        <div class="story-grid">
          <div class="story-body fade-up">
            <p>
              <strong>enterprise IT was founded with a clear conviction:</strong> Australian enterprises deserve a technology partner that truly understands their environment — one built here, operating here, and accountable here. From our Adelaide CBD headquarters, we set out to build the kind of full-spectrum IT capability that was previously only accessible through large national firms disconnected from the businesses they served.
            </p>
            <div class="story-pull">
              "We don't just manage technology — we protect it, optimise it, and retire it responsibly."
            </div>
            <p>
              What started as a focus on ICT asset management has grown into a comprehensive two-pillar service architecture: <strong>ICT Lifecycle &amp; Asset Sovereignty</strong> covering everything from device deployment and GPS-tracked logistics through to secure ITAD and ESG reporting, and <strong>Digital Intelligence &amp; Cyber Defence</strong> encompassing 24/7 SOC operations, identity governance, data security, compliance, and advanced analytics.
            </p>
            <p>
              Today enterprise IT serves clients across every state and territory in Australia. We are proudly <strong>SA Owned and Operated</strong> — meaning our leadership, our team, and our decision-making remain rooted in South Australia, with the agility and accountability that only a local organisation can provide.
            </p>
          </div>

          <div class="story-right fade-up" style="transition-delay:0.12s;">
            <div class="story-stat-card navy">
              <div><span class="story-stat-num">200</span><span class="story-stat-unit">+</span></div>
              <div class="story-stat-label">Enterprise clients served across Australia — from SA government agencies to national logistics groups</div>
            </div>
            <div class="story-stat-row">
              <div class="story-stat-card">
                <div><span class="story-stat-num">24</span><span class="story-stat-unit">/7</span></div>
                <div class="story-stat-label">SOC coverage, 365 days per year</div>
              </div>
              <div class="story-stat-card">
                <div><span class="story-stat-num">0</span><span class="story-stat-unit">%</span></div>
                <div class="story-stat-label">Data breach rate on all managed &amp; retired assets</div>
              </div>
            </div>
            <div class="story-stat-row">
              <div class="story-stat-card">
                <div><span class="story-stat-num">NIST</span></div>
                <div class="story-stat-label">Sanitisation to NIST 800-88 — every single job</div>
              </div>
              <div class="story-stat-card">
                <div><span class="story-stat-num">SA</span></div>
                <div class="story-stat-label">Owned, operated, and led from Adelaide CBD</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         OUR VALUES
    ============================================================ -->
    <section class="sec sec-alt" aria-labelledby="values-heading">
      <div class="sec-in">
        <p class="stag">Our Values</p>
        <h2 class="sh2" id="values-heading">What drives everything we do.</h2>
        <p class="sdesc">Six principles that guide every engagement, every decision, and every outcome we deliver for our clients.</p>

        <div class="values-grid">
          <div class="val-card fade-up">
            <div class="val-icon navy"><i class="ti ti-shield-lock" aria-hidden="true"></i></div>
            <div class="val-title">Security Without Compromise</div>
            <p class="val-desc">We apply military-grade rigour to every engagement. From NIST 800-88 data eradication to 24/7 threat monitoring — security is never an afterthought. It is the foundation.</p>
          </div>
          <div class="val-card fade-up" style="transition-delay:0.08s;">
            <div class="val-icon green"><i class="ti ti-leaf" aria-hidden="true"></i></div>
            <div class="val-title">Sustainable by Design</div>
            <p class="val-desc">Environmental responsibility is embedded into our operations — not bolted on. We measure, report, and actively reduce the environmental footprint of every technology lifecycle we manage.</p>
          </div>
          <div class="val-card fade-up" style="transition-delay:0.16s;">
            <div class="val-icon navy"><i class="ti ti-building" aria-hidden="true"></i></div>
            <div class="val-title">Local Accountability</div>
            <p class="val-desc">Being SA Owned and Operated means our decisions are made here — by people who understand the local enterprise landscape and are directly accountable to the clients they serve.</p>
          </div>
          <div class="val-card fade-up" style="transition-delay:0.04s;">
            <div class="val-icon amber"><i class="ti ti-clock" aria-hidden="true"></i></div>
            <div class="val-title">Relentless Responsiveness</div>
            <p class="val-desc">A 24-hour quote guarantee is just the baseline. We operate with urgency across everything — from rapid incident response to same-day certificate delivery — because our clients cannot afford delays.</p>
          </div>
          <div class="val-card fade-up" style="transition-delay:0.12s;">
            <div class="val-icon slate"><i class="ti ti-certificate" aria-hidden="true"></i></div>
            <div class="val-title">Standards-first Excellence</div>
            <p class="val-desc">ISO 27001, NIST, and other recognised cybersecurity frameworks are not marketing badges for us — they are the benchmark against which we hold every service we deliver.</p>
          </div>
          <div class="val-card fade-up" style="transition-delay:0.2s;">
            <div class="val-icon navy"><i class="ti ti-users" aria-hidden="true"></i></div>
            <div class="val-title">Partnership Over Transactions</div>
            <p class="val-desc">We invest in understanding our clients' environments deeply. Every engagement is an ongoing relationship — not a one-off job. Our Client Portal, dedicated specialists, and proactive reporting reflect this commitment.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         STANDARDS & CERTIFICATIONS
    ============================================================ -->
    <!-- Scrolling standards strip -->
    <div class="standards-strip" aria-hidden="true" @mouseenter="pauseMarquee" @mouseleave="resumeMarquee">
      <div class="strip-inner" ref="marqueeRef">
        <!-- duplicated for seamless loop -->
        <div class="strip-item"><i class="ti ti-certificate"></i>ISO 27001</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-shield"></i>NIST 800-88</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-file-certificate"></i>NIST CSF</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-leaf"></i>ESG reporting</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-radar"></i>MITRE ATT&CK</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-users"></i>Zero Trust</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-database-lock"></i>ASD ISM</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-shield-check"></i>Privacy Act 1988</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-building"></i>SA Owned &amp; Operated</div><div class="strip-sep"></div>
        <!-- duplicate -->
        <div class="strip-item"><i class="ti ti-certificate"></i>ISO 27001</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-shield"></i>NIST 800-88</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-file-certificate"></i>NIST CSF</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-leaf"></i>ESG reporting</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-radar"></i>MITRE ATT&CK</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-users"></i>Zero Trust</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-database-lock"></i>ASD ISM</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-shield-check"></i>Privacy Act 1988</div><div class="strip-sep"></div>
        <div class="strip-item"><i class="ti ti-building"></i>SA Owned &amp; Operated</div><div class="strip-sep"></div>
      </div>
    </div>

    <section class="sec sec-white" aria-labelledby="certs-heading">
      <div class="sec-in">
        <p class="stag">Standards &amp; Alignment</p>
        <h2 class="sh2" id="certs-heading">Compliance isn't a checkbox.<br>It's our baseline.</h2>

        <div class="cert-layout">
          <div class="cert-body fade-up">
            <p>
              <strong>enterprise IT operates to the highest available standards</strong> across every service pillar. Our commitment to compliance is not performative — it reflects a genuine belief that our clients' data, assets, and operations deserve nothing less than the most rigorous frameworks available.
            </p>
            <p>
              Our practices are aligned to <strong>ISO 27001</strong> for information security management, <strong>NIST 800-88</strong> for media sanitisation, and the <strong>NIST Cybersecurity Framework</strong> for our SOC and cyber defence operations. Our data handling practices align with the <strong>Australian Privacy Act 1988</strong>.
            </p>
            <p>
              In addition, our SOC leverages the <strong>MITRE ATT&amp;CK framework</strong> for threat hunting and detection engineering, and our identity and access governance services are built on <strong>Zero Trust principles</strong> aligned to the <strong>ASD Information Security Manual (ISM)</strong>.
            </p>
            <p>
              Every client engagement — from a single device retirement to a multi-site SOC deployment — is delivered against these standards. Our clients receive documented evidence of compliance as a matter of course, not on request.
            </p>
          </div>

          <div class="cert-grid fade-up" style="transition-delay:0.1s;">
            <div class="cert-card">
              <div class="cert-card-top">
                <div class="cert-badge-box"><i class="ti ti-certificate" aria-hidden="true"></i></div>
                <div>
                  <div class="cert-name">ISO 27001</div>
                  <div class="cert-full">Information Security Management</div>
                </div>
              </div>
              <p class="cert-desc">International standard for managing information security risks across the organisation.</p>
            </div>
            <div class="cert-card">
              <div class="cert-card-top">
                <div class="cert-badge-box"><i class="ti ti-database-off" aria-hidden="true"></i></div>
                <div>
                  <div class="cert-name">NIST 800-88</div>
                  <div class="cert-full">Media Sanitisation Guidelines</div>
                </div>
              </div>
              <p class="cert-desc">US federal standard for secure media sanitisation — applied to every device we retire.</p>
            </div>
            <div class="cert-card">
              <div class="cert-card-top">
                <div class="cert-badge-box green"><i class="ti ti-leaf" aria-hidden="true"></i></div>
                <div>
                  <div class="cert-name">ESG reporting</div>
                  <div class="cert-full">Environmental &amp; Social Governance</div>
                </div>
              </div>
              <p class="cert-desc">ESG reporting aligned to Australian environmental frameworks.</p>
            </div>
            <div class="cert-card">
              <div class="cert-card-top">
                <div class="cert-badge-box"><i class="ti ti-radar" aria-hidden="true"></i></div>
                <div>
                  <div class="cert-name">MITRE ATT&amp;CK</div>
                  <div class="cert-full">Adversarial Tactics &amp; Techniques</div>
                </div>
              </div>
              <p class="cert-desc">SOC detection engineering and threat hunting aligned to the global MITRE framework.</p>
            </div>
            <div class="cert-card">
              <div class="cert-card-top">
                <div class="cert-badge-box amber"><i class="ti ti-shield-check" aria-hidden="true"></i></div>
                <div>
                  <div class="cert-name">ASD ISM</div>
                  <div class="cert-full">Australian Signals Directorate ISM</div>
                </div>
              </div>
              <p class="cert-desc">Cyber security guidance aligned to the Australian government's Information Security Manual.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SUSTAINABILITY — FEATURED SECTION
    ============================================================ -->
    <section class="sustain-hero" aria-labelledby="sustain-heading">
      <div class="sustain-in">
        <p class="sustain-tag">Sustainability &amp; ESG</p>
        <h2 class="sustain-h2" id="sustain-heading">Australia's green IT partner.<br>Responsible by design.</h2>

        <div class="sustain-layout">
          <div>
            <p class="sustain-desc">
              At enterprise IT, sustainability is not a marketing position — it is a structural commitment embedded across everything we do. We believe that technology lifecycle management carries a profound environmental responsibility. We take that responsibility seriously.
            </p>

            <div class="sustain-points">
              <div class="sustain-point fade-up">
                <div class="sp-icon"><i class="ti ti-recycle" aria-hidden="true"></i></div>
                <div>
                  <div class="sp-title">Responsible Sustainable Disposal</div>
                  <p class="sp-desc">Every device we retire is processed through our documented ITAD workflow — maximising reuse, responsible recycling, and landfill diversion at every stage.</p>
                </div>
              </div>
              <div class="sustain-point fade-up" style="transition-delay:0.08s;">
                <div class="sp-icon"><i class="ti ti-file-analytics" aria-hidden="true"></i></div>
                <div>
                  <div class="sp-title">ESG Reporting &amp; Carbon Tracking</div>
                  <p class="sp-desc">We provide comprehensive ESG documentation for every retirement cycle — including CO₂ saved, landfill weight diverted, and device rehome outcomes for board-level reporting.</p>
                </div>
              </div>
              <div class="sustain-point fade-up" style="transition-delay:0.16s;">
                <div class="sp-icon"><i class="ti ti-heart" aria-hidden="true"></i></div>
                <div>
                  <div class="sp-title">Technology Donation Programs</div>
                  <p class="sp-desc">Sanitised, graded devices are donated to vetted community organisations and educational institutions — giving retired enterprise hardware a second life with those who need it most.</p>
                </div>
              </div>
              <div class="sustain-point fade-up" style="transition-delay:0.24s;">
                <div class="sp-icon"><i class="ti ti-users" aria-hidden="true"></i></div>
                <div>
                  <div class="sp-title">Employee Purchase Programs (EPP)</div>
                  <p class="sp-desc">Our EPP enables staff within client organisations to purchase securely data-wiped devices at accessible prices — reducing e-waste while delivering real employee value.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Sustainability metrics -->
          <div class="sustain-metrics fade-up" style="transition-delay:0.1s;">
            <div class="sm-card">
              <div class="sm-icon"><i class="ti ti-leaf" aria-hidden="true"></i></div>
              <div><span class="sm-num">100</span><span class="sm-unit">%</span></div>
              <div class="sm-label">Of retired assets processed through documented sustainable disposal pathways</div>
            </div>
            <div class="sm-card">
              <div class="sm-icon"><i class="ti ti-recycle" aria-hidden="true"></i></div>
              <div><span class="sm-num">Zero</span></div>
              <div class="sm-label">Landfill disposal — every asset is reused, donated, recycled, or responsibly recovered</div>
            </div>
            <div class="sm-card">
              <div class="sm-icon"><i class="ti ti-file-analytics" aria-hidden="true"></i></div>
              <div><span class="sm-num">ESG</span></div>
              <div class="sm-label">Board-ready ESG reports issued for every client retirement cycle</div>
            </div>
            <div class="sm-card">
              <div class="sm-icon"><i class="ti ti-heart" aria-hidden="true"></i></div>
              <div><span class="sm-num">CoD</span></div>
              <div class="sm-label">Certificate of Destruction issued for every data-bearing device — no exceptions</div>
            </div>
          </div>
        </div>

        <!-- ESG commitment cards -->
        <div class="esg-grid" style="margin-top:52px;">
          <div class="esg-card fade-up">
            <div class="esg-icon"><i class="ti ti-world" aria-hidden="true"></i></div>
            <div class="esg-title">Environmental</div>
            <p class="esg-desc">Responsible sustainable disposal, zero landfill commitment, carbon offset tracking, and e-waste reduction embedded in every retirement workflow.</p>
            <div class="esg-badge"><i class="ti ti-check" aria-hidden="true"></i>ISO 27001 &amp; ESG aligned</div>
          </div>
          <div class="esg-card fade-up" style="transition-delay:0.08s;">
            <div class="esg-icon"><i class="ti ti-users" aria-hidden="true"></i></div>
            <div class="esg-title">Social</div>
            <p class="esg-desc">Technology donation to community organisations, Employee Purchase Programs, and digital inclusion initiatives that put enterprise hardware where it's needed most.</p>
            <div class="esg-badge"><i class="ti ti-check" aria-hidden="true"></i>EPP &amp; Donation Programs</div>
          </div>
          <div class="esg-card fade-up" style="transition-delay:0.16s;">
            <div class="esg-icon"><i class="ti ti-clipboard-check" aria-hidden="true"></i></div>
            <div class="esg-title">Governance</div>
            <p class="esg-desc">Comprehensive ESG reporting frameworks, audit-ready documentation, board-level sustainability evidence packs, and alignment with Australian regulatory requirements.</p>
            <div class="esg-badge"><i class="ti ti-check" aria-hidden="true"></i>Board-ready Reporting</div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         OUR TEAM
    ============================================================ -->
    <section class="sec sec-alt" aria-labelledby="team-heading">
      <div class="sec-in">
        <p class="stag">Our Team</p>
        <h2 class="sh2" id="team-heading">Expert professionals.<br>Real accountability.</h2>
        <p class="sdesc">Our team combines deep technical expertise across ICT lifecycle management, cybersecurity, data governance, and sustainability — all based here in South Australia.</p>

        <div class="team-grid">
          <article class="team-card fade-up">
            <div class="team-card-head">
              <div class="team-avatar" aria-hidden="true">IT</div>
              <div class="team-name">ICT Lifecycle Team</div>
              <div class="team-role">Deployment · Logistics · ITAD</div>
            </div>
            <div class="team-card-body">
              <p class="team-desc">Specialists in device provisioning, GPS-tracked logistics, and NIST 800-88 data sanitisation. Every technician is trained to military-grade eradication standards.</p>
              <div class="team-skills">
                <span class="team-skill">NIST 800-88 Trained</span>
                <span class="team-skill">NIST 800-88</span>
                <span class="team-skill">MDM/Autopilot</span>
                <span class="team-skill">Chain of Custody</span>
              </div>
            </div>
          </article>

          <article class="team-card fade-up" style="transition-delay:0.1s;">
            <div class="team-card-head alt">
              <div class="team-avatar" aria-hidden="true">CS</div>
              <div class="team-name">Cyber &amp; Security Team</div>
              <div class="team-role">SOC · IAM · Incident Response</div>
            </div>
            <div class="team-card-body">
              <p class="team-desc">24/7 threat analysts, identity architects, and forensic specialists protecting enterprise environments using Microsoft Sentinel, SIEM, and zero-trust frameworks.</p>
              <div class="team-skills">
                <span class="team-skill">Microsoft Sentinel</span>
                <span class="team-skill">MITRE ATT&CK</span>
                <span class="team-skill">Zero Trust</span>
                <span class="team-skill">DFIR</span>
              </div>
            </div>
          </article>

          <article class="team-card fade-up" style="transition-delay:0.2s;">
            <div class="team-card-head slate">
              <div class="team-avatar" aria-hidden="true">DA</div>
              <div class="team-name">Data &amp; Analytics Team</div>
              <div class="team-role">Governance · Compliance · BI</div>
            </div>
            <div class="team-card-body">
              <p class="team-desc">Data governance architects and Power BI/Tableau developers delivering classification frameworks, compliance audit support, and board-ready analytics for enterprise clients.</p>
              <div class="team-skills">
                <span class="team-skill">Power BI</span>
                <span class="team-skill">Tableau</span>
                <span class="team-skill">ISO 27001</span>
                <span class="team-skill">MDM</span>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ============================================================
         ADELAIDE HQ & CONNECT
    ============================================================ -->
    <section class="sec sec-white" aria-labelledby="hq-heading">
      <div class="sec-in">
        <p class="stag">Adelaide HQ &amp; Connectivity</p>
        <h2 class="sh2" id="hq-heading">Find us in the heart<br>of Adelaide CBD.</h2>

        <div class="hq-layout">
          <div>
            <div class="hq-body fade-up">
              <p>
                <strong>enterprise IT is headquartered in Adelaide CBD, South Australia.</strong> Our central location gives us direct access to SA government, enterprise, and commercial clients — while our national logistics and remote service delivery capabilities extend our reach to every state and territory across Australia.
              </p>
              <p>
                We are proudly SA Owned and Operated. Our leadership team, technical specialists, and operational staff are all based here — meaning the people making decisions about your technology environment are the same people you'll speak to, every time.
              </p>
            </div>

            <div class="hq-contact-block fade-up" style="transition-delay:0.1s;" aria-label="Contact details">
              <div class="hq-contact-row">
                <div class="hq-ci"><i class="ti ti-map-pin" aria-hidden="true"></i></div>
                <div>
                  <div class="hq-clabel">Headquarters</div>
                  <div class="hq-cval">Adelaide CBD, South Australia</div>
                </div>
              </div>
              <div class="hq-contact-row">
                <div class="hq-ci"><i class="ti ti-phone" aria-hidden="true"></i></div>
                <div>
                  <div class="hq-clabel">Phone</div>
                  <div class="hq-cval">+61 494 614 221</div>
                </div>
              </div>
              <div class="hq-contact-row">
                <div class="hq-ci"><i class="ti ti-mail" aria-hidden="true"></i></div>
                <div>
                  <div class="hq-clabel">Email</div>
                  <div class="hq-cval">support@enterpriseit.com.au</div>
                </div>
              </div>
              <div class="hq-contact-row">
                <div class="hq-ci"><i class="ti ti-world" aria-hidden="true"></i></div>
                <div>
                  <div class="hq-clabel">Website</div>
                  <div class="hq-cval">enterpriseit.com.au</div>
                </div>
              </div>
            </div>

            <a href="https://www.linkedin.com/company/enterpriseitau/" class="linkedin-card" target="_blank" rel="noopener" aria-label="Follow enterprise IT on LinkedIn">
              <div class="li-icon"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></div>
              <div>
                <div class="li-title">Follow enterprise IT on LinkedIn</div>
                <div class="li-sub">News, insights, and company updates</div>
              </div>
              <i class="ti ti-arrow-right li-arrow" aria-hidden="true"></i>
            </a>
          </div>

          <!-- Map placeholder -->
          <div class="fade-up" style="transition-delay:0.12s;">
            <div class="hq-map" role="img" aria-label="Map showing enterprise IT Adelaide CBD headquarters">
              <div class="hq-map-grid" aria-hidden="true"></div>
              <div class="hq-map-overlay">
                <div class="hq-map-pin"><i class="ti ti-map-pin" aria-hidden="true"></i></div>
                <div class="hq-map-label">enterprise IT HQ</div>
                <div class="hq-map-sub">Adelaide CBD, South Australia</div>
                <a href="https://maps.google.com" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:5px;margin-top:14px;background:#002366;color:#fff;font-size:12px;font-weight:600;padding:8px 16px;border-radius:5px;text-decoration:none;">
                  <i class="ti ti-map" aria-hidden="true"></i>Open in Google Maps
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         CTA BAND
    ============================================================ -->
    <div class="ctaband">
      <div class="ctaband-in">
        <div class="ctaband-left">
          <h3>Ready to work with us?</h3>
          <p>Get a response from an enterprise IT specialist within 24 hours — guaranteed.</p>
        </div>
        <div class="ctaband-btns">
          <router-link to="/contact" class="cta-white">Request a Quote →</router-link>
          <router-link to="/contact" class="cta-outline">Contact Us</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';

const marqueeRef = ref(null);

const pauseMarquee = () => {
  if (marqueeRef.value) {
    marqueeRef.value.style.animationPlayState = 'paused';
  }
};

const resumeMarquee = () => {
  if (marqueeRef.value) {
    marqueeRef.value.style.animationPlayState = 'running';
  }
};

onMounted(() => {
  /* Scroll fade-up animations using IntersectionObserver */
  const fadeEls = document.querySelectorAll('.fade-up');
  const fadeObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        fadeObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  fadeEls.forEach(el => fadeObs.observe(el));
});
</script>

<style scoped>
.about-page {
  width: 100%;
}

/* ============================================================
   PAGE HERO
============================================================ */
.page-hero {
  background: #002366;
  padding: 52px 32px 56px;
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
.hero-layout {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 40px;
  align-items: start;
}
.page-h1 {
  color: #fff;
  font-size: 38px;
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -0.9px;
  margin-bottom: 16px;
}
.page-h1 .accent {
  color: #708090;
}
.page-sub {
  color: rgba(255, 255, 255, 0.58);
  font-size: 15px;
  line-height: 1.7;
  max-width: 520px;
  margin-bottom: 28px;
}
.hero-actions {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  margin-bottom: 40px;
}
.btn-white {
  background: #fff;
  color: #002366;
  font-size: 13px;
  font-weight: 700;
  padding: 11px 20px;
  border-radius: 5px;
  border: none;
  display: flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  transition: opacity 0.15s;
}
.btn-white:hover {
  opacity: 0.92;
}
.btn-slate {
  background: rgba(112, 128, 144, 0.25);
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  padding: 11px 20px;
  border-radius: 5px;
  border: 0.5px solid rgba(255, 255, 255, 0.2);
  display: flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  transition: background 0.15s;
}
.btn-slate:hover {
  background: rgba(112, 128, 144, 0.38);
}
.btn-white i, .btn-slate i {
  font-size: 14px;
}

/* Hero stat strip */
.hero-stats {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  border-top: 0.5px solid rgba(255, 255, 255, 0.1);
  padding-top: 24px;
}
.hstat {
  padding: 0 16px 0 0;
}
.hstat+.hstat {
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
  color: rgba(255, 255, 255, 0.42);
  font-size: 10px;
  margin-top: 3px;
  letter-spacing: 0.3px;
  line-height: 1.4;
}

/* Hero right info card */
.info-card {
  background: rgba(255, 255, 255, 0.055);
  border: 0.5px solid rgba(255, 255, 255, 0.12);
  border-radius: 12px;
  padding: 22px;
  display: flex;
  flex-direction: column;
  gap: 0;
}
.ic-title {
  font-size: 10px;
  letter-spacing: 1.3px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.38);
  margin-bottom: 16px;
  font-weight: 700;
  text-align: left;
}
.ic-row {
  display: flex;
  align-items: flex-start;
  gap: 11px;
  padding: 11px 0;
  border-bottom: 0.5px solid rgba(255, 255, 255, 0.07);
  text-align: left;
}
.ic-row:last-child {
  border-bottom: none;
  padding-bottom: 0;
}
.ic-icon {
  width: 34px;
  height: 34px;
  border-radius: 7px;
  background: rgba(255, 255, 255, 0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.ic-icon i {
  font-size: 16px;
  color: rgba(255, 255, 255, 0.65);
}
.ic-label {
  font-size: 12px;
  font-weight: 600;
  color: #fff;
  margin-bottom: 2px;
}
.ic-val {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.45);
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
   SHARED SECTION STYLES
============================================================ */
.sec {
  padding: 68px 32px;
}
.sec-white {
  background: #fff;
}
.sec-alt {
  background: #f2f4f8;
}
.sec-navy {
  background: #002366;
}
.sec-dark {
  background: #001a4d;
}
.sec-green {
  background: #0a2e1a;
}
.sec-in {
  max-width: 1080px;
  margin: 0 auto;
  text-align: left;
}
.stag {
  font-size: 10px;
  letter-spacing: 1.6px;
  text-transform: uppercase;
  color: #708090;
  font-weight: 700;
  margin-bottom: 6px;
}
.stag-light {
  color: rgba(255, 255, 255, 0.38);
}
.stag-green {
  color: #4ade80;
}
.sh2 {
  font-size: 30px;
  font-weight: 800;
  color: #002366;
  margin-bottom: 10px;
  letter-spacing: -0.6px;
  line-height: 1.1;
}
.sh2-light {
  color: #fff;
}
.sh2-green {
  color: #fff;
}
.sdesc {
  font-size: 14.5px;
  color: #6b7280;
  line-height: 1.68;
  max-width: 600px;
}
.sdesc-light {
  color: rgba(255, 255, 255, 0.55);
}
.sdesc-green {
  color: rgba(255, 255, 255, 0.6);
}

/* ============================================================
   OUR STORY — split layout
============================================================ */
.story-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 56px;
  align-items: center;
  margin-top: 40px;
}
.story-body p {
  font-size: 14.5px;
  color: #555;
  line-height: 1.75;
  margin-bottom: 16px;
}
.story-body p:last-child {
  margin-bottom: 0;
}
.story-body strong {
  color: #002366;
  font-weight: 700;
}
.story-pull {
  font-size: 19px;
  font-weight: 700;
  color: #002366;
  line-height: 1.4;
  letter-spacing: -0.3px;
  border-left: 3px solid #002366;
  padding-left: 18px;
  margin: 28px 0;
}
.story-right {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.story-stat-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  padding: 22px 24px;
  transition: transform 0.2s;
  text-align: left;
}
.story-stat-card:hover {
  transform: translateY(-2px);
}
.story-stat-num {
  font-size: 32px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -1px;
  line-height: 1;
}
.story-stat-unit {
  font-size: 16px;
  color: #708090;
  font-weight: 600;
}
.story-stat-label {
  font-size: 12.5px;
  color: #6b7280;
  margin-top: 6px;
  line-height: 1.4;
}
.story-stat-card.navy {
  background: #002366;
}
.story-stat-card.navy .story-stat-num {
  color: #fff;
}
.story-stat-card.navy .story-stat-unit {
  color: rgba(255, 255, 255, 0.5);
}
.story-stat-card.navy .story-stat-label {
  color: rgba(255, 255, 255, 0.45);
}
.story-stat-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}

/* ============================================================
   VALUES GRID
============================================================ */
.values-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  margin-top: 36px;
}
.val-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  padding: 24px 22px;
  transition: transform 0.2s, border-color 0.2s;
  text-align: left;
}
.val-card:hover {
  transform: translateY(-3px);
  border-color: #b0bad0;
}
.val-icon {
  width: 46px;
  height: 46px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 16px;
}
.val-icon i {
  font-size: 22px;
}
.val-icon.navy {
  background: #e8eef8;
}
.val-icon.navy i {
  color: #002366;
}
.val-icon.green {
  background: #dcfce7;
}
.val-icon.green i {
  color: #16a34a;
}
.val-icon.amber {
  background: #fef3c7;
}
.val-icon.amber i {
  color: #d97706;
}
.val-icon.slate {
  background: #f0f3f7;
}
.val-icon.slate i {
  color: #708090;
}
.val-title {
  font-size: 14px;
  font-weight: 800;
  color: #002366;
  margin-bottom: 8px;
}
.val-desc {
  font-size: 12.5px;
  color: #6b7280;
  line-height: 1.6;
}

/* ============================================================
   STANDARDS & CERTIFICATIONS
============================================================ */
.cert-layout {
  display: grid;
  grid-template-columns: 1.1fr 1fr;
  gap: 48px;
  align-items: start;
  margin-top: 36px;
}
.cert-body p {
  font-size: 14px;
  color: #555;
  line-height: 1.72;
  margin-bottom: 14px;
}
.cert-body strong {
  color: #002366;
}
.cert-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}
.cert-card {
  background: #f5f7fb;
  border: 0.5px solid #dde1e9;
  border-radius: 10px;
  padding: 18px 16px;
  transition: border-color 0.15s;
  text-align: left;
}
.cert-card:hover {
  border-color: #b0bad0;
}
.cert-card-top {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}
.cert-badge-box {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  background: #002366;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.cert-badge-box i {
  font-size: 18px;
  color: #fff;
}
.cert-badge-box.green {
  background: #16a34a;
}
.cert-badge-box.slate {
  background: #708090;
}
.cert-badge-box.amber {
  background: #d97706;
}
.cert-name {
  font-size: 13px;
  font-weight: 800;
  color: #002366;
}
.cert-full {
  font-size: 10px;
  color: #708090;
  margin-top: 1px;
}
.cert-desc {
  font-size: 12px;
  color: #6b7280;
  line-height: 1.5;
}

/* Standards marquee strip */
.standards-strip {
  background: #002366;
  padding: 16px 32px;
  overflow: hidden;
}
.strip-inner {
  display: flex;
  align-items: center;
  gap: 32px;
  animation: marquee 24s linear infinite;
  white-space: nowrap;
}
@keyframes marquee {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.strip-item {
  display: flex;
  align-items: center;
  gap: 8px;
  color: rgba(255, 255, 255, 0.55);
  font-size: 12px;
  font-weight: 600;
  flex-shrink: 0;
}
.strip-item i {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.35);
}
.strip-sep {
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.2);
  flex-shrink: 0;
}

/* ============================================================
   SUSTAINABILITY — HERO TREATMENT
============================================================ */
.sustain-hero {
  background: linear-gradient(135deg, #0a2e1a 0%, #063318 40%, #0a2e1a 100%);
  padding: 72px 32px;
  position: relative;
  overflow: hidden;
}
.sustain-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(74, 222, 128, 0.03) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(74, 222, 128, 0.03) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}
.sustain-hero::after {
  content: '';
  position: absolute;
  right: -120px;
  top: -120px;
  width: 480px;
  height: 480px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(74, 222, 128, 0.06) 0%, transparent 70%);
  pointer-events: none;
}
.sustain-in {
  max-width: 1080px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
  text-align: left;
}
.sustain-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 52px;
  align-items: center;
}
.sustain-tag {
  font-size: 10px;
  letter-spacing: 1.6px;
  text-transform: uppercase;
  color: #4ade80;
  font-weight: 700;
  margin-bottom: 6px;
}
.sustain-h2 {
  font-size: 30px;
  font-weight: 800;
  color: #fff;
  letter-spacing: -0.6px;
  line-height: 1.1;
  margin-bottom: 14px;
}
.sustain-desc {
  font-size: 14.5px;
  color: rgba(255, 255, 255, 0.58);
  line-height: 1.7;
  margin-bottom: 28px;
}
.sustain-points {
  display: flex;
  flex-direction: column;
  gap: 14px;
}
.sustain-point {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  text-align: left;
}
.sp-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: rgba(74, 222, 128, 0.12);
  border: 0.5px solid rgba(74, 222, 128, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.sp-icon i {
  font-size: 17px;
  color: #4ade80;
}
.sp-title {
  font-size: 13px;
  font-weight: 700;
  color: #fff;
  margin-bottom: 3px;
}
.sp-desc {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.48);
  line-height: 1.5;
}

/* Sustainability metrics */
.sustain-metrics {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 14px;
}
.sm-card {
  background: rgba(255, 255, 255, 0.05);
  border: 0.5px solid rgba(74, 222, 128, 0.15);
  border-radius: 12px;
  padding: 22px 20px;
  transition: background 0.15s;
  text-align: left;
}
.sm-card:hover {
  background: rgba(255, 255, 255, 0.08);
}
.sm-num {
  font-size: 28px;
  font-weight: 800;
  color: #fff;
  letter-spacing: -1px;
  line-height: 1;
}
.sm-unit {
  font-size: 14px;
  color: #4ade80;
  font-weight: 600;
}
.sm-label {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.45);
  margin-top: 6px;
  line-height: 1.4;
}
.sm-icon {
  width: 32px;
  height: 32px;
  border-radius: 7px;
  background: rgba(74, 222, 128, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
}
.sm-icon i {
  font-size: 16px;
  color: #4ade80;
}

/* ESG commitment cards */
.esg-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  margin-top: 36px;
}
.esg-card {
  background: rgba(255, 255, 255, 0.05);
  border: 0.5px solid rgba(74, 222, 128, 0.12);
  border-radius: 12px;
  padding: 24px 20px;
  transition: background 0.2s, border-color 0.2s;
  text-align: left;
}
.esg-card:hover {
  background: rgba(255, 255, 255, 0.08);
  border-color: rgba(74, 222, 128, 0.25);
}
.esg-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: rgba(74, 222, 128, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 16px;
}
.esg-icon i {
  font-size: 22px;
  color: #4ade80;
}
.esg-title {
  font-size: 14px;
  font-weight: 800;
  color: #fff;
  margin-bottom: 8px;
}
.esg-desc {
  font-size: 12.5px;
  color: rgba(255, 255, 255, 0.5);
  line-height: 1.6;
}
.esg-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: rgba(74, 222, 128, 0.1);
  border: 0.5px solid rgba(74, 222, 128, 0.2);
  color: #86efac;
  font-size: 10px;
  font-weight: 600;
  padding: 3px 9px;
  border-radius: 10px;
  margin-top: 12px;
}

/* ============================================================
   OUR TEAM
============================================================ */
.team-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  margin-top: 36px;
}
.team-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  transition: transform 0.2s, box-shadow 0.2s;
  text-align: left;
}
.team-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 28px rgba(0, 35, 102, 0.09);
}
.team-card-head {
  background: #002366;
  padding: 28px 24px 20px;
  position: relative;
}
.team-card-head.alt {
  background: #1a3a6e;
}
.team-card-head.slate {
  background: #708090;
}
.team-avatar {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.15);
  border: 2px solid rgba(255, 255, 255, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  font-weight: 800;
  color: #fff;
  margin-bottom: 14px;
}
.team-name {
  font-size: 15px;
  font-weight: 800;
  color: #fff;
  margin-bottom: 3px;
}
.team-role {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.55);
  letter-spacing: 0.3px;
}
.team-card-body {
  padding: 18px 22px;
}
.team-desc {
  font-size: 12.5px;
  color: #6b7280;
  line-height: 1.6;
  margin-bottom: 14px;
}
.team-skills {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
}
.team-skill {
  background: #f0f4fa;
  border: 0.5px solid #dde8f5;
  border-radius: 20px;
  padding: 3px 10px;
  font-size: 11px;
  font-weight: 600;
  color: #002366;
}

/* ============================================================
   ADELAIDE HQ
============================================================ */
.hq-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  align-items: start;
  margin-top: 36px;
}
.hq-body p {
  font-size: 14px;
  color: #555;
  line-height: 1.72;
  margin-bottom: 14px;
}
.hq-body strong {
  color: #002366;
  font-weight: 700;
}
.hq-contact-block {
  display: flex;
  flex-direction: column;
  gap: 12px;
  margin-top: 24px;
}
.hq-contact-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 14px 16px;
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 8px;
  transition: border-color 0.15s;
  text-align: left;
}
.hq-contact-row:hover {
  border-color: #b0bad0;
}
.hq-ci {
  width: 36px;
  height: 36px;
  border-radius: 7px;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.hq-ci i {
  font-size: 17px;
  color: #002366;
}
.hq-clabel {
  font-size: 11px;
  color: #708090;
  margin-bottom: 1px;
}
.hq-cval {
  font-size: 13px;
  font-weight: 600;
  color: #002366;
}
/* Map placeholder */
.hq-map {
  background: #e8eef8;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  height: 320px;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}
.hq-map-overlay {
  text-align: center;
  z-index: 2;
}
.hq-map-pin {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: #002366;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 12px;
}
.hq-map-pin i {
  font-size: 24px;
  color: #fff;
}
.hq-map-label {
  font-size: 14px;
  font-weight: 700;
  color: #002366;
}
.hq-map-sub {
  font-size: 12px;
  color: #708090;
  margin-top: 4px;
}
.hq-map-grid {
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(0, 35, 102, 0.05) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(0, 35, 102, 0.05) 1px, transparent 1px);
  background-size: 32px 32px;
}

/* LinkedIn card */
.linkedin-card {
  background: #0a66c2;
  border-radius: 12px;
  padding: 24px;
  display: flex;
  align-items: center;
  gap: 16px;
  margin-top: 16px;
  transition: opacity 0.15s;
  text-decoration: none;
  text-align: left;
}
.linkedin-card:hover {
  opacity: 0.92;
}
.li-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.li-icon i {
  font-size: 22px;
  color: #fff;
}
.li-title {
  font-size: 13.5px;
  font-weight: 700;
  color: #fff;
  margin-bottom: 2px;
}
.li-sub {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.65);
}
.li-arrow {
  margin-left: auto;
  color: rgba(255, 255, 255, 0.5);
  font-size: 18px;
  flex-shrink: 0;
}

/* ============================================================
   TESTIMONIALS
============================================================ */
.testi-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-top: 28px;
}
.tcard {
  background: rgba(255, 255, 255, 0.05);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  padding: 24px;
  transition: background 0.2s;
  text-align: left;
}
.tcard:hover {
  background: rgba(255, 255, 255, 0.08);
}
.tcard-stars {
  display: flex;
  gap: 3px;
  margin-bottom: 12px;
}
.tcard-stars i {
  font-size: 14px;
  color: #f59e0b;
}
.tcard-quote {
  font-size: 13.5px;
  color: rgba(255, 255, 255, 0.78);
  line-height: 1.65;
  margin-bottom: 18px;
  font-style: italic;
}
.tcard-author {
  display: flex;
  align-items: center;
  gap: 12px;
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
  transform: translateY(18px);
  transition: opacity 0.5s ease, transform 0.5s ease;
}
.fade-up.visible {
  opacity: 1;
  transform: translateY(0);
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width: 960px) {
  .hero-layout {
    grid-template-columns: 1fr;
  }
  .info-card {
    display: none;
  }
  .story-grid, .cert-layout, .sustain-layout, .hq-layout {
    grid-template-columns: 1fr;
  }
  .values-grid, .esg-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .team-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .testi-grid {
    grid-template-columns: 1fr;
  }
  .ctaband-in {
    flex-direction: column;
    align-items: flex-start;
  }
  .sustain-metrics {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media(max-width: 600px) {
  .sec {
    padding: 48px 20px;
  }
  .page-hero {
    padding: 36px 20px 48px;
  }
  .page-h1 {
    font-size: 28px;
  }
  .hero-actions {
    flex-direction: column;
  }
  .hero-stats {
    grid-template-columns: repeat(2, 1fr);
  }
  .hstat+.hstat {
    border-left: none;
    padding-left: 0;
  }
  .hstat:nth-child(even) {
    border-left: 0.5px solid rgba(255, 255, 255, 0.1);
    padding-left: 16px;
  }
  .values-grid, .esg-grid, .team-grid {
    grid-template-columns: 1fr;
  }
  .cert-grid {
    grid-template-columns: 1fr;
  }
  .story-stat-row {
    grid-template-columns: 1fr;
  }
  .tbar-in {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
  .standards-strip {
    padding: 14px 20px;
  }
}
</style>
