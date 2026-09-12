<template>
  <div class="services-v2-view">
    <!-- PAGE HERO -->
    <section class="page-hero" aria-labelledby="page-heading">
      <div class="hero-inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <router-link to="/" class="bc-link">Home</router-link>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-current">Services</span>
        </nav>

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
          Full-spectrum enterprise IT · Adelaide CBD
        </div>

        <h1 class="page-h1" id="page-heading">
          Everything your enterprise needs.<br />
          <span class="accent">Under one roof.</span>
        </h1>
        <p class="page-sub">
          Two integrated service pillars — ICT Lifecycle &amp; Asset Sovereignty, and Digital
          Intelligence &amp; Cyber Defence — designed to cover the full technology lifecycle for
          Australian enterprise.
        </p>

        <div class="hero-ctas">
          <router-link to="/contact#quote" class="btn-white"
            ><i class="ti ti-file-invoice" aria-hidden="true"></i>Get a 24-Hour
            Quote</router-link
          >
          <router-link to="/contact#urgent" class="btn-amber"
            ><i class="ti ti-alert-triangle" aria-hidden="true"></i>Urgent Data
            Recovery</router-link
          >
        </div>

        <div class="pillar-tabs" role="list" aria-label="Jump to service pillar">
          <a href="#pillar1" class="ptab" role="listitem" @click.prevent="scrollToAnchor('pillar1')">
            <div class="ptab-icon"><i class="ti ti-device-desktop" aria-hidden="true"></i></div>
            <div>
              <div class="ptab-label">Pillar 01</div>
              <div class="ptab-name">ICT Lifecycle &amp; Asset Sovereignty</div>
            </div>
            <i class="ti ti-arrow-down ptab-arrow" aria-hidden="true"></i>
          </a>
          <a href="#pillar2" class="ptab" role="listitem" @click.prevent="scrollToAnchor('pillar2')">
            <div class="ptab-icon"><i class="ti ti-shield-lock" aria-hidden="true"></i></div>
            <div>
              <div class="ptab-label">Pillar 02</div>
              <div class="ptab-name">Digital Intelligence &amp; Cyber Defence</div>
            </div>
            <i class="ti ti-arrow-down ptab-arrow" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </section>

    <!-- STICKY SERVICE NAV -->
    <nav class="svc-nav" aria-label="Service sections">
      <div class="svc-nav-inner">
        <span class="svc-pillar-label">Jump to</span>
        <a
          v-for="link in navLinks"
          :key="link.anchor"
          :href="'#' + link.anchor"
          class="svc-nav-link"
          :class="{ active: activeSection === link.anchor }"
          @click.prevent="scrollToAnchor(link.anchor)"
        >
          <i :class="link.icon" aria-hidden="true"></i>{{ link.label }}
        </a>
      </div>
    </nav>

    <!-- PILLAR 1 HEADER BAND -->
    <div class="pillar-band" id="pillar1">
      <div class="pillar-band-in">
        <div class="pb-left">
          <div class="pb-num" aria-hidden="true">01</div>
          <div>
            <div class="pb-label">Service Pillar One</div>
            <div class="pb-title">ICT Lifecycle &amp; Asset Sovereignty</div>
          </div>
        </div>
        <p class="pb-desc">
          From device provisioning and GPS-tracked logistics to secure data destruction and ESG
          reporting — complete control over your hardware lifecycle.
        </p>
        <div class="pb-badge">
          <i class="ti ti-map-pin" aria-hidden="true"></i>Australia-wide delivery
        </div>
      </div>
    </div>

    <!-- PILLAR 1 — DEPLOYMENT & MOBILITY -->
    <section class="sec sec-alt" id="deployment" aria-labelledby="deploy-heading">
      <div class="sec-in">
        <p class="stag">Deployment &amp; Mobility</p>
        <h2 class="sh2" id="deploy-heading">Device provisioning &amp; workspace deployment</h2>
        <p class="sdesc">
          Remote-ready end-user computing from first unbox to full productivity — anywhere in
          Australia.
        </p>

        <div class="highlight-row fade-up" aria-label="Deployment key metrics">
          <div class="hl-item">
            <div><span class="hl-num">AUS</span><span class="hl-unit">-wide</span></div>
            <div class="hl-label">Shipping &amp;<br />deployment coverage</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">Zero</span><span class="hl-unit">-touch</span></div>
            <div class="hl-label">Device imaging<br />&amp; provisioning</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">Next</span><span class="hl-unit">-gen</span></div>
            <div class="hl-label">Workspace<br />deployment</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">24</span><span class="hl-unit"> hr</span></div>
            <div class="hl-label">Quote response<br />guaranteed</div>
          </div>
        </div>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-device-laptop" aria-hidden="true"></i></div>
              <div class="svc-card-title">Remote-Ready Provisioning</div>
              <p class="svc-card-desc">
                Zero-touch device configuration and imaging so your workforce is productive from
                day one — regardless of location.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Device imaging</strong> — OS build, software stack, and policy deployment</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Zero-touch enrolment</strong> — Autopilot, Apple DEP, and ABM integration</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Secure configuration</strong> — CIS benchmarks and endpoint hardening</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Asset tagging</strong> — RFID and barcode labelling for inventory control</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Windows</span>
                <span class="svc-tag">macOS</span>
                <span class="svc-tag">Autopilot</span>
                <span class="svc-tag">Apple DEP</span>
                <span class="svc-tag">MDM</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-building" aria-hidden="true"></i></div>
              <div class="svc-card-title">Next-Gen Workspace Deployment</div>
              <p class="svc-card-desc">
                End-to-end workspace rollouts for hybrid and remote teams — from hardware kitting
                through to on-site technical setup.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Bulk device kitting</strong> — staged preparation and multi-site rollout</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>On-site IT technical services</strong> — cabling, docking, peripheral setup</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Hybrid work enablement</strong> — VPN, VDI, and cloud workspace configuration</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>User handover documentation</strong> — guides and asset register delivery</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Hybrid Work</span>
                <span class="svc-tag">VDI</span>
                <span class="svc-tag">M365</span>
                <span class="svc-tag">On-site</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- PILLAR 1 — LOGISTICS & INFRASTRUCTURE -->
    <section class="sec sec-white" id="logistics" aria-labelledby="logistics-heading">
      <div class="sec-in">
        <p class="stag">Logistics &amp; Infrastructure</p>
        <h2 class="sh2" id="logistics-heading">Precision relocations &amp; GPS-tracked transit</h2>
        <p class="sdesc">
          Enterprise-grade physical IT logistics with real-time asset visibility, insured transit,
          and specialist handling from our Adelaide CBD hub.
        </p>

        <div class="highlight-row fade-up" aria-label="Logistics key metrics">
          <div class="hl-item">
            <div><span class="hl-num">GPS</span></div>
            <div class="hl-label">Real-time tracked<br />transit every shipment</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">100</span><span class="hl-unit">%</span></div>
            <div class="hl-label">Insured<br />freight handling</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">AUS</span><span class="hl-unit">-wide</span></div>
            <div class="hl-label">Metro &amp; regional<br />delivery coverage</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">SA</span></div>
            <div class="hl-label">Adelaide CBD<br />secure storage hub</div>
          </div>
        </div>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-truck" aria-hidden="true"></i></div>
              <div class="svc-card-title">GPS-Tracked Transit</div>
              <p class="svc-card-desc">
                Every shipment tracked in real time — from our facility to any enterprise site in
                Australia. Full chain-of-custody documentation on every job.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Real-time GPS tracking</strong> — live visibility via client-facing dashboard</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Chain-of-custody documentation</strong> — signed manifests at every handover</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Specialist IT freight handling</strong> — vibration-controlled, anti-static packaging</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Australia-wide coverage</strong> — metro, regional, and remote sites</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">GPS Tracked</span>
                <span class="svc-tag">Insured Freight</span>
                <span class="svc-tag">Chain of Custody</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-building" aria-hidden="true"></i></div>
              <div class="svc-card-title">Enterprise Storage &amp; Relocations</div>
              <p class="svc-card-desc">
                Precision office and data centre relocations, plus secure enterprise IT storage at
                our Adelaide CBD facility.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Office IT relocation</strong> — structured cabling, server, and AV equipment moves</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Data centre migration</strong> — rack-level planning, physical move, reconnection</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Secure bonded storage</strong> — temperature-controlled, access-logged IT asset storage</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Asset collection services</strong> — scheduled pickup with verified custody transfer</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Office Relocation</span>
                <span class="svc-tag">DC Migration</span>
                <span class="svc-tag">Secure Storage</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- PILLAR 1 — CERTIFIED ITAD -->
    <section class="sec sec-alt" id="itad" aria-labelledby="itad-heading">
      <div class="sec-in">
        <p class="stag">Secure ITAD &amp; Asset Retirement</p>
        <h2 class="sh2" id="itad-heading">Military-grade data eradication &amp; asset disposition</h2>
        <p class="sdesc">
          Data sanitisation to NIST 800-88 standards, on-site destruction, and secure IT asset
          disposition — protecting your data through to end-of-life.
        </p>

        <div class="highlight-row fade-up" aria-label="ITAD key metrics">
          <div class="hl-item">
            <div><span class="hl-num">NIST</span></div>
            <div class="hl-label">NIST 800-88<br />sanitisation standard</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">On</span><span class="hl-unit">-site</span></div>
            <div class="hl-label">Data destruction<br />available</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">CoD</span></div>
            <div class="hl-label">Certificate of Destruction<br />issued every job</div>
          </div>
          <div class="hl-item">
            <div><span class="hl-num">Zero</span></div>
            <div class="hl-label">Breach record on<br />all retired assets</div>
          </div>
        </div>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-database-off" aria-hidden="true"></i></div>
              <div class="svc-card-title">Military-grade Data Eradication</div>
              <p class="svc-card-desc">
                NIST 800-88 data sanitisation across all media types — HDD, SSD, NVMe,
                mobile, and tape — with full audit trails.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>NIST 800-88 wiping</strong> — DoD-grade multi-pass overwrite and cryptographic erase</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Physical destruction</strong> — degaussing and shredding for non-sanitisable media</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>On-site capability</strong> — mobile destruction unit for client-premises jobs</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Certificates of Destruction</strong> — serialised, auditable CoD per device or per batch</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">NIST 800-88</span>
                <span class="svc-tag">DoD Grade</span>
                <span class="svc-tag">SSD / NVMe</span>
                <span class="svc-tag">On-site</span>
                <span class="svc-tag">CoD Issued</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-clipboard-list" aria-hidden="true"></i></div>
              <div class="svc-card-title">ICT Asset Auditing &amp; Lifecycle Management</div>
              <p class="svc-card-desc">
                End-to-end asset register management — from procurement through to secure
                retirement — with detailed lifecycle reporting.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Asset discovery &amp; audit</strong> — full hardware and software inventory capture</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Lifecycle tracking</strong> — age, warranty, and refresh cycle reporting</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Retirement planning</strong> — schedule-driven decommission workflows</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Client portal reporting</strong> — audit reports delivered to your secure portal</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Asset Register</span>
                <span class="svc-tag">Lifecycle Reports</span>
                <span class="svc-tag">Decommission</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- PILLAR 1 — SUSTAINABILITY & ESG -->
    <section class="sec sec-white" id="esg" aria-labelledby="esg-heading">
      <div class="sec-in">
        <p class="stag">Sustainability &amp; ESG</p>
        <h2 class="sh2" id="esg-heading">Green practices &amp; ESG reporting</h2>
        <p class="sdesc">
          Australia's green IT partner — responsible sustainable disposal, ESG reporting, technology
          donations, and Employee Purchase Programs that reduce e-waste and support your
          environmental commitments.
        </p>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-file-analytics" aria-hidden="true"></i></div>
              <div class="svc-card-title">ESG Reporting</div>
              <p class="svc-card-desc">
                Detailed environmental, social, and governance reports documenting your technology
                lifecycle outcomes — ready for board, audit, or regulatory submission.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Carbon offset calculations</strong> — CO₂ saved through responsible disposal</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Landfill diversion reporting</strong> — kg diverted per retirement cycle</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Board-ready ESG documentation</strong> — branded, structured reports</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Regulatory compliance support</strong> — aligned to Australian ESG frameworks</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">ESG Reports</span>
                <span class="svc-tag">Carbon Offset</span>
                <span class="svc-tag">Landfill Diversion</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon" style="background: #e8f5e9">
                <i class="ti ti-leaf" aria-hidden="true" style="color: #2e7d32"></i>
              </div>
              <div class="svc-card-title">Employee Purchase Programs &amp; Donations</div>
              <p class="svc-card-desc">
                Give retired technology a second life — through staff purchase programs or
                documented donation to community and educational organisations.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Employee Purchase Programs (EPP)</strong> — graded, sanitised devices offered to staff</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Technology donation coordination</strong> — securely data-wiped donations to nonprofits</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Grading &amp; refurbishment</strong> — cosmetic and functional assessment pre-rehome</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Donation certificates</strong> — documentation for tax and ESG record purposes</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">EPP</span>
                <span class="svc-tag">Tech Donation</span>
                <span class="svc-tag">Refurbishment</span>
                <span class="svc-tag">E-Waste Reduction</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- COMPLIANCE BAND -->
    <div class="compliance-band" role="complementary" aria-label="Compliance standards">
      <div class="compliance-in">
        <div class="compliance-left">
          <div class="compliance-icon"><i class="ti ti-shield-check" aria-hidden="true"></i></div>
          <div class="compliance-text">
            <strong>Documented and auditable at every step</strong>
            <span>Our operations comply with the highest international security standards.</span>
          </div>
        </div>
        <div class="compliance-badges">
          <span class="comp-badge"><i class="ti ti-certificate" aria-hidden="true"></i>ISO 27001</span>
          <span class="comp-badge"><i class="ti ti-certificate" aria-hidden="true"></i>ISO 9001</span>
          <span class="comp-badge"><i class="ti ti-certificate" aria-hidden="true"></i>ISO 14001</span>
          <span class="comp-badge"><i class="ti ti-certificate" aria-hidden="true"></i>AS/NZS 5377</span>
        </div>
      </div>
    </div>

    <!-- PILLAR 2 HEADER BAND -->
    <div class="pillar-band alt" id="pillar2">
      <div class="pillar-band-in">
        <div class="pb-left">
          <div class="pb-num" aria-hidden="true">02</div>
          <div>
            <div class="pb-label">Service Pillar Two</div>
            <div class="pb-title">Digital Intelligence &amp; Cyber Defence</div>
          </div>
        </div>
        <p class="pb-desc">
          24/7 SOC detection, Microsoft Sentinel orchestration, phishing-resistant MFA, and
          digital forensics — sovereign cyber defence operated from Adelaide.
        </p>
        <div class="pb-badge">
          <i class="ti ti-shield-lock" aria-hidden="true"></i>Sovereign security monitoring
        </div>
      </div>
    </div>

    <!-- PILLAR 2 — SOC OPERATIONS -->
    <section class="sec sec-alt" id="soc" aria-labelledby="soc-heading">
      <div class="sec-in">
        <p class="stag">SOC Operations</p>
        <h2 class="sh2" id="soc-heading">24/7 Managed Detection &amp; Response (MDR)</h2>
        <p class="sdesc">
          Continuous threat hunting and rapid incident containment orchestrated from our secure
          operations hub.
        </p>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-radar" aria-hidden="true"></i></div>
              <div class="svc-card-title">24/7 Security Operations Centre</div>
              <p class="svc-card-desc">
                Continuous threat monitoring, correlation, and response utilizing Microsoft Sentinel
                and market-leading XDR platforms.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>24/7/365 monitoring</strong> — vigilant analysts hunting threats around the clock</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>SIEM management</strong> — Sentinel tuning, rule creation, and custom connectors</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Telemetry ingestion</strong> — endpoints, cloud, network, and identity log auditing</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Sovereign operations</strong> — Australian citizens, locally based data residency</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">24/7 SOC</span>
                <span class="svc-tag">MDR</span>
                <span class="svc-tag">Sentinel</span>
                <span class="svc-tag">Sovereign</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-shield-alert" aria-hidden="true"></i></div>
              <div class="svc-card-title">Managed Detection &amp; Threat Hunting</div>
              <p class="svc-card-desc">
                Proactive investigation of anomalies to detect persistent threats before they impact
                your organisation.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Proactive hunting</strong> — scanning endpoints and directories for IOCs</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>XDR tuning</strong> — Defender for Endpoint and Defender for Cloud optimisation</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Intel-driven audits</strong> — incorporating threat feeds specific to APAC</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Vulnerability scanning</strong> — identification of external attack surface exposures</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Threat Hunting</span>
                <span class="svc-tag">XDR</span>
                <span class="svc-tag">Vulnerability Scan</span>
                <span class="svc-tag">Defender</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- PILLAR 2 — IDENTITY & ACCESS (IAM) -->
    <section class="sec sec-white" id="iam" aria-labelledby="iam-heading">
      <div class="sec-in">
        <p class="stag">Identity &amp; Access Management</p>
        <h2 class="sh2" id="iam-heading">Identity lifecycle governance &amp; passwordless security</h2>
        <p class="sdesc">
          Enforcing Zero Trust through automated identity lifecycle provisioning, conditional
          access rules, and phishing-resistant MFA keys.
        </p>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-users" aria-hidden="true"></i></div>
              <div class="svc-card-title">Identity Lifecycle Management</div>
              <p class="svc-card-desc">
                Automated joiner-mover-leaver workflows, privileged access management, and identity
                governance across your entire user base.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Joiner-mover-leaver automation</strong> — Entra ID and Active Directory provisioning</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Privileged Access Management (PAM)</strong> — just-in-time access and PIM integration</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Access reviews &amp; recertification</strong> — scheduled reviews and attestation</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Role-based access control (RBAC)</strong> — least-privilege policy enforcement</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Entra ID</span>
                <span class="svc-tag">Active Directory</span>
                <span class="svc-tag">PAM</span>
                <span class="svc-tag">RBAC</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-lock-access" aria-hidden="true"></i></div>
              <div class="svc-card-title">Phishing-resistant MFA &amp; Conditional Access</div>
              <p class="svc-card-desc">
                FIDO2 and certificate-based authentication paired with risk-adaptive conditional
                access — eliminating credential-based attack vectors.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Phishing-resistant MFA</strong> — FIDO2, Windows Hello for Business, CBA</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Conditional access policies</strong> — compliance, location, and risk-signal gating</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Zero Trust posture</strong> — never trust, always verify across all access requests</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>ABAC enforcement</strong> — attribute-based access control for sensitive data</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">FIDO2</span>
                <span class="svc-tag">Zero Trust</span>
                <span class="svc-tag">Conditional Access</span>
                <span class="svc-tag">ABAC</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- PILLAR 2 — INCIDENT RESPONSE & FORENSICS -->
    <section class="sec sec-alt" id="forensics" aria-labelledby="forensics-heading">
      <div class="sec-in">
        <p class="stag">Incident Response &amp; Forensics</p>
        <h2 class="sh2" id="forensics-heading">Rapid response, data recovery &amp; digital forensics</h2>
        <p class="sdesc">
          When the worst happens, we act fast. Malware containment, evidence-grade forensics, and
          full data recovery — delivered by experienced specialists.
        </p>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon amber">
                <i class="ti ti-alert-triangle" aria-hidden="true"></i>
              </div>
              <div class="svc-card-title">Incident Response &amp; Malware Containment</div>
              <p class="svc-card-desc">
                Rapid containment, eradication, and recovery from cyber incidents — minimising
                dwell time, business disruption, and reputational damage.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Rapid containment</strong> — isolation of affected systems within hours</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Malware analysis &amp; eradication</strong> — root cause identification &amp; clean rebuild</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Ransomware response</strong> — decryption assistance and recovery</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Post-incident reporting</strong> — detailed timeline and recommendations</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Urgent 24H</span>
                <span class="svc-tag">Ransomware</span>
                <span class="svc-tag">Containment</span>
                <span class="svc-tag">IR Retainer</span>
              </div>
              <router-link to="/contact#urgent" class="svc-card-cta" style="color: #d97706"
                >Urgent response <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-database-import" aria-hidden="true"></i></div>
              <div class="svc-card-title">Data Recovery &amp; Digital Forensics</div>
              <p class="svc-card-desc">
                Court-admissible digital forensics and professional data recovery from failed,
                corrupted, or compromised storage media.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Digital forensics</strong> — acquisition, custody chain, expert reporting</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Data recovery</strong> — HDD, SSD, RAID, and cloud storage recovery</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>eDiscovery support</strong> — data collection for legal proceedings</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Breach investigation</strong> — timeline reconstruction and attribution</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Digital Forensics</span>
                <span class="svc-tag">Data Recovery</span>
                <span class="svc-tag">eDiscovery</span>
                <span class="svc-tag">RAID Recovery</span>
              </div>
              <router-link to="/contact#urgent" class="svc-card-cta" style="color: #d97706"
                >Urgent response <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- PILLAR 2 — DATA SECURITY & PRIVACY -->
    <section class="sec sec-white" id="data-security" aria-labelledby="datasec-heading">
      <div class="sec-in">
        <p class="stag">Data Security &amp; Privacy</p>
        <h2 class="sh2" id="datasec-heading">Encryption, DLP &amp; access control</h2>
        <p class="sdesc">
          End-to-end data protection — encryption at rest and in transit, data loss prevention,
          and fine-grained access control to keep your sensitive data secured and compliant.
        </p>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-lock" aria-hidden="true"></i></div>
              <div class="svc-card-title">Encryption &amp; Data Loss Prevention</div>
              <p class="svc-card-desc">
                Military-grade encryption combined with policy-driven DLP to prevent sensitive data
                from leaving your environment.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Encryption</strong> — AES-256, BitLocker, and TLS enforcement</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Microsoft Purview DLP</strong> — data loss prevention across M365</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Egress blocking</strong> — blocking sensitive data transfer across endpoints</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Sensitivity labels</strong> — automated labeling applied to corporate data</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">AES-256</span>
                <span class="svc-tag">BitLocker</span>
                <span class="svc-tag">Purview DLP</span>
                <span class="svc-tag">MIP Labels</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-key" aria-hidden="true"></i></div>
              <div class="svc-card-title">Access Controls (RBAC / ABAC)</div>
              <p class="svc-card-desc">
                Granular role-based and attribute-based access controls ensuring least-privilege
                access to systems across your enterprise.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>RBAC design</strong> — role taxonomy, group policy, and inheritance</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>ABAC policies</strong> — attribute-based rules for sensitive data</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Admin isolation</strong> — privileged access workstation configurations</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Duties segregation</strong> — avoiding conflicting system permissions</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">RBAC</span>
                <span class="svc-tag">ABAC</span>
                <span class="svc-tag">Least Privilege</span>
                <span class="svc-tag">PAW</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- PILLAR 2 — DATA GOVERNANCE & COMPLIANCE -->
    <section class="sec sec-alt" id="governance" aria-labelledby="gov-heading">
      <div class="sec-in">
        <p class="stag">Data Governance &amp; Compliance</p>
        <h2 class="sh2" id="gov-heading">Classification, MDM &amp; compliance auditing</h2>
        <p class="sdesc">
          A complete data governance framework — from classification and labelling through to Master
          Data Management and compliance auditing.
        </p>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-tags" aria-hidden="true"></i></div>
              <div class="svc-card-title">Data Classification &amp; Labelling</div>
              <p class="svc-card-desc">
                Automated and policy-driven data classification — ensuring your data is correctly
                identified and handled.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Purview classification</strong> — automated data discovery and labeling</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Classification schemas</strong> — customized schemas for compliance frameworks</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Data quality profile</strong> — profiling, cleansing, and standardization</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Data lineage</strong> — end-to-end audit tracking of corporate data flows</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Purview</span>
                <span class="svc-tag">Classification</span>
                <span class="svc-tag">Data Lineage</span>
                <span class="svc-tag">DQM</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-clipboard-check" aria-hidden="true"></i></div>
              <div class="svc-card-title">Master Data Management &amp; Compliance Auditing</div>
              <p class="svc-card-desc">
                A single source of truth for enterprise data, paired with compliance auditing aligned
                to ISO, NIST, and ASD Essential Eight frameworks.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>MDM frameworks</strong> — golden record catalog design</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Compliance audits</strong> — audits against ISO 27001, NIST, and Essential Eight</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Privacy alignment</strong> — compliance audits for GDPR and Australian Privacy Act</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Audit-ready packs</strong> — evidence packets structured for certification audits</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">MDM</span>
                <span class="svc-tag">ISO 27001</span>
                <span class="svc-tag">NIST CSF</span>
                <span class="svc-tag">Essential 8</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- PILLAR 2 — DATA INSIGHTS & ANALYTICS -->
    <section class="sec sec-white" id="analytics" aria-labelledby="analytics-heading">
      <div class="sec-in">
        <p class="stag">Data Insights &amp; Analytics</p>
        <h2 class="sh2" id="analytics-heading">Power BI, Tableau &amp; predictive analytics</h2>
        <p class="sdesc">
          Turn your data into decisions — interactive KPI dashboards, predictive analytics models,
          and structured reporting built by our data specialists.
        </p>

        <div class="svc-grid">
          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-chart-bar" aria-hidden="true"></i></div>
              <div class="svc-card-title">Power BI &amp; Tableau Dashboards</div>
              <p class="svc-card-desc">
                Custom-built interactive dashboards delivering real-time KPI visibility across your
                business — from board-level reporting to operational metrics.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Power BI development</strong> — semantic models, DAX, and embedded reports</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Tableau dashboards</strong> — visual analytics, calculated fields, and connections</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>KPI frameworks</strong> — metric tracking and balanced scorecard visualisations</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>BI enablement</strong> — training and documentation for internal enterprise teams</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Power BI</span>
                <span class="svc-tag">Tableau</span>
                <span class="svc-tag">DAX</span>
                <span class="svc-tag">KPI Dashboards</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>

          <article class="svc-card fade-up">
            <div class="svc-card-head">
              <div class="svc-card-icon"><i class="ti ti-trending-up" aria-hidden="true"></i></div>
              <div class="svc-card-title">Predictive Analytics &amp; Data Modelling</div>
              <p class="svc-card-desc">
                Advanced analytics models that surface patterns, forecast outcomes, and support
                evidence-based decisions across your operations.
              </p>
            </div>
            <div class="svc-card-divider"></div>
            <div class="svc-card-body">
              <ul class="svc-feat-list">
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Predictive models</strong> — forecasting, anomaly detection, and trends</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Data pipelines</strong> — ETL/ELT pipeline design using Azure Data Factory</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Warehouse design</strong> — star schema and lakehouse architecture design</span>
                </li>
                <li class="svc-feat">
                  <i class="ti ti-check" aria-hidden="true"></i
                  ><span><strong>Executive reporting</strong> — structured insights and analytics presentations</span>
                </li>
              </ul>
              <div class="svc-card-tags">
                <span class="svc-tag">Predictive Analytics</span>
                <span class="svc-tag">Azure ADF</span>
                <span class="svc-tag">Lakehouse</span>
                <span class="svc-tag">ETL/ELT</span>
              </div>
              <router-link to="/contact#quote" class="svc-card-cta"
                >Request a quote <i class="ti ti-arrow-right" aria-hidden="true"></i
              ></router-link>
            </div>
          </article>
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
import { ref, onMounted, onUnmounted, watch, nextTick } from 'vue';

const activeSection = ref('deployment');

const navLinks = [
  { anchor: 'deployment', label: 'Deployment', icon: 'ti ti-device-laptop' },
  { anchor: 'logistics', label: 'Logistics', icon: 'ti ti-truck' },
  { anchor: 'itad', label: 'ITAD', icon: 'ti ti-recycle' },
  { anchor: 'esg', label: 'ESG', icon: 'ti ti-leaf' },
  { anchor: 'soc', label: 'SOC', icon: 'ti ti-radar' },
  { anchor: 'iam', label: 'IAM', icon: 'ti ti-users' },
  { anchor: 'forensics', label: 'Forensics', icon: 'ti ti-bug' },
  { anchor: 'data-security', label: 'Data Security', icon: 'ti ti-lock' },
  { anchor: 'governance', label: 'Governance', icon: 'ti ti-clipboard-check' },
  { anchor: 'analytics', label: 'Analytics', icon: 'ti ti-chart-bar' },
];

watch(activeSection, async (newVal) => {
  await nextTick();
  const container = document.querySelector('.svc-nav-inner');
  const activeEl = document.querySelector('.svc-nav-link.active');
  if (container && activeEl) {
    const containerRect = container.getBoundingClientRect();
    const activeRect = activeEl.getBoundingClientRect();
    const relativeLeft = activeRect.left - containerRect.left + container.scrollLeft;
    const targetScrollLeft = relativeLeft - (containerRect.width / 2) + (activeRect.width / 2);
    container.scrollTo({
      left: targetScrollLeft,
      behavior: 'smooth',
    });
  }
});

let fadeObserver = null;
let sectionObserver = null;

const scrollToAnchor = (id) => {
  const target = document.getElementById(id);
  if (target) {
    const offset = 58 + 44; // main nav + svc nav height
    const top = target.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top, behavior: 'smooth' });
    activeSection.value = id;
  }
};

onMounted(() => {
  // Fade-up observer
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

  // Section observer to update sticky nav active states
  const sections = navLinks.map((l) => document.getElementById(l.anchor)).filter(Boolean);
  sectionObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          activeSection.value = entry.target.id;
        }
      });
    },
    { rootMargin: '-20% 0px -75% 0px' }
  );
  sections.forEach((sec) => sectionObserver.observe(sec));
});

onUnmounted(() => {
  if (fadeObserver) fadeObserver.disconnect();
  if (sectionObserver) sectionObserver.disconnect();
});
</script>

<style scoped>
.services-v2-view {
  font-family: 'Inter', system-ui, sans-serif;
  background: #f2f4f8;
  color: #444c5c;
  text-align: left;
}

/* PAGE HERO */
.page-hero {
  background: #002366;
  padding: 48px 32px 52px;
  position: relative;
  overflow: hidden;
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
.hero-inner {
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
  text-decoration: none;
  transition: color 0.15s;
}
.bc-link:hover {
  color: rgba(255, 255, 255, 0.75);
}
.bc-sep {
  color: rgba(255, 255, 255, 0.25);
  font-size: 12px;
}
.bc-current {
  color: rgba(255, 255, 255, 0.75);
  font-size: 12px;
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
  line-height: 1.65;
  max-width: 560px;
  margin-bottom: 32px;
}
.hero-ctas {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
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
  transition: opacity 0.15s;
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
  transition: opacity 0.15s;
}
.btn-amber:hover {
  opacity: 0.9;
}
.btn-white i,
.btn-amber i {
  font-size: 14px;
}

/* Pillar switcher tabs in hero */
.pillar-tabs {
  display: flex;
  gap: 12px;
  margin-top: 36px;
  padding-top: 28px;
  border-top: 0.5px solid rgba(255, 255, 255, 0.1);
}
.ptab {
  display: flex;
  align-items: center;
  gap: 10px;
  background: rgba(255, 255, 255, 0.06);
  border: 0.5px solid rgba(255, 255, 255, 0.13);
  border-radius: 8px;
  padding: 12px 18px;
  cursor: pointer;
  text-decoration: none;
  transition: background 0.15s, border-color 0.15s;
  flex: 1;
  max-width: 280px;
}
.ptab:hover {
  background: rgba(255, 255, 255, 0.1);
  border-color: rgba(255, 255, 255, 0.22);
}
.ptab-icon {
  width: 36px;
  height: 36px;
  border-radius: 7px;
  background: rgba(255, 255, 255, 0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.ptab-icon i {
  font-size: 18px;
  color: rgba(255, 255, 255, 0.75);
}
.ptab-label {
  font-size: 10px;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.45);
  margin-bottom: 2px;
}
.ptab-name {
  font-size: 13px;
  font-weight: 700;
  color: #fff;
  line-height: 1.2;
}
.ptab-arrow {
  margin-left: auto;
  color: rgba(255, 255, 255, 0.3);
  font-size: 14px;
  flex-shrink: 0;
}

/* STICKY SERVICE NAV */
.svc-nav {
  background: #fff;
  border-bottom: 0.5px solid #e2e5ec;
  position: sticky;
  top: 58px;
  z-index: 100;
}
.svc-nav-inner {
  max-width: 1080px;
  margin: 0 auto;
  padding: 0 32px;
  display: flex;
  align-items: center;
  gap: 0;
  overflow-x: auto;
}
.svc-nav-inner::-webkit-scrollbar {
  display: none;
}
.svc-pillar-label {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: #708090;
  padding: 14px 16px 14px 0;
  white-space: nowrap;
  border-right: 0.5px solid #e2e5ec;
  margin-right: 8px;
}
.svc-nav-link {
  font-size: 12.5px;
  font-weight: 500;
  color: #6b7280;
  padding: 14px 14px;
  white-space: nowrap;
  border-bottom: 2px solid transparent;
  cursor: pointer;
  text-decoration: none;
  transition: color 0.15s, border-color 0.15s;
  display: flex;
  align-items: center;
  gap: 5px;
}
.svc-nav-link i {
  font-size: 13px;
}
.svc-nav-link:hover {
  color: #002366;
}
.svc-nav-link.active {
  color: #002366;
  font-weight: 700;
  border-bottom-color: #002366;
}
.svc-nav-divider {
  width: 0.5px;
  height: 16px;
  background: #e2e5ec;
  margin: 0 4px;
  flex-shrink: 0;
}

/* SHARED SECTION STYLES */
.sec {
  padding: 64px 32px;
}
.sec-white {
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
  margin-bottom: 36px;
  max-width: 580px;
}

/* Pillar header band */
.pillar-band {
  background: #002366;
  padding: 28px 32px;
  text-align: left;
}
.pillar-band.alt {
  background: #1a3a6e;
}
.pillar-band-in {
  max-width: 1080px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}
.pb-left {
  display: flex;
  align-items: center;
  gap: 16px;
}
.pb-num {
  width: 48px;
  height: 48px;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  font-weight: 800;
  color: rgba(255, 255, 255, 0.7);
  flex-shrink: 0;
}
.pb-label {
  font-size: 10px;
  letter-spacing: 1.3px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.45);
  margin-bottom: 4px;
}
.pb-title {
  font-size: 20px;
  font-weight: 800;
  color: #fff;
  letter-spacing: -0.3px;
}
.pb-desc {
  font-size: 13px;
  color: rgba(255, 255, 255, 0.55);
  max-width: 400px;
  line-height: 1.5;
}
.pb-badge {
  display: flex;
  align-items: center;
  gap: 6px;
  background: rgba(255, 255, 255, 0.08);
  border: 0.5px solid rgba(255, 255, 255, 0.14);
  border-radius: 20px;
  padding: 6px 14px;
  font-size: 11px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.75);
  white-space: nowrap;
  flex-shrink: 0;
}
.pb-badge i {
  font-size: 14px;
  color: #4ade80;
}

/* SERVICE CARD GRID */
.svc-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 18px;
}
.svc-card {
  background: #fff;
  border-radius: 12px;
  border: 0.5px solid #dde1e9;
  overflow: hidden;
  transition: transform 0.2s, box-shadow 0.2s;
  display: flex;
  flex-direction: column;
}
.svc-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 28px rgba(0, 35, 102, 0.09);
}
.svc-card-head {
  padding: 22px 24px 0;
  flex: 1;
}
.svc-card-icon {
  width: 46px;
  height: 46px;
  border-radius: 10px;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
}
.svc-card-icon i {
  font-size: 22px;
  color: #002366;
}
.svc-card-icon.amber {
  background: #fef3c7;
}
.svc-card-icon.amber i {
  color: #d97706;
}
.svc-card-title {
  font-size: 16px;
  font-weight: 800;
  color: #002366;
  margin-bottom: 6px;
  letter-spacing: -0.2px;
}
.svc-card-desc {
  font-size: 13px;
  color: #6b7280;
  line-height: 1.6;
  margin-bottom: 18px;
}
.svc-card-divider {
  height: 0.5px;
  background: #f0f3f7;
  margin: 0 24px;
}
.svc-card-body {
  padding: 18px 24px 22px;
}
.svc-feat-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 9px;
  margin-bottom: 20px;
}
.svc-feat {
  display: flex;
  align-items: flex-start;
  gap: 9px;
  font-size: 12.5px;
  color: #444;
  line-height: 1.45;
}
.svc-feat i {
  font-size: 15px;
  color: #708090;
  flex-shrink: 0;
  margin-top: 1px;
}
.svc-feat strong {
  color: #002366;
  font-weight: 600;
}
.svc-card-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin-bottom: 20px;
}
.svc-tag {
  background: #f0f4fa;
  border: 0.5px solid #dde8f5;
  border-radius: 20px;
  padding: 4px 10px;
  font-size: 11px;
  font-weight: 600;
  color: #002366;
}
.svc-card-cta {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 12.5px;
  font-weight: 700;
  color: #002366;
  text-decoration: none;
  transition: gap 0.15s;
}
.svc-card-cta:hover {
  gap: 9px;
}
.svc-card-cta i {
  font-size: 14px;
}

/* COMPLIANCE INTERSTITIAL BAND */
.compliance-band {
  background: #f0f4fa;
  border-top: 0.5px solid #dde8f5;
  border-bottom: 0.5px solid #dde8f5;
  padding: 24px 32px;
  text-align: left;
}
.compliance-in {
  max-width: 1080px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}
.compliance-left {
  display: flex;
  align-items: center;
  gap: 12px;
}
.compliance-icon {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  background: #002366;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.compliance-icon i {
  font-size: 20px;
  color: #fff;
}
.compliance-text strong {
  font-size: 14px;
  font-weight: 700;
  color: #002366;
  display: block;
  margin-bottom: 2px;
}
.compliance-text span {
  font-size: 12px;
  color: #6b7280;
}
.compliance-badges {
  display: flex;
  gap: 7px;
  flex-wrap: wrap;
}
.comp-badge {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 20px;
  padding: 5px 12px;
  font-size: 11px;
  font-weight: 600;
  color: #002366;
  display: flex;
  align-items: center;
  gap: 5px;
}
.comp-badge i {
  font-size: 12px;
  color: #708090;
}

/* HIGHLIGHT ROW (icon stat row) */
.highlight-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  background: #fff;
  border-radius: 12px;
  border: 0.5px solid #dde1e9;
  overflow: hidden;
  margin-bottom: 36px;
}
.hl-item {
  padding: 22px 20px;
  text-align: center;
}
.hl-item + .hl-item {
  border-left: 0.5px solid #f0f3f7;
}
.hl-num {
  font-size: 24px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -0.5px;
}
.hl-unit {
  font-size: 13px;
  color: #708090;
  font-weight: 600;
}
.hl-label {
  font-size: 11px;
  color: #6b7280;
  margin-top: 4px;
  line-height: 1.4;
}

/* CTA BAND */
.ctaband {
  background: #002366;
  padding: 48px 32px;
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
  font-family: inherit;
  transition: color 0.15s, border-color 0.15s;
}
.cta-outline:hover {
  color: #fff;
  border-color: rgba(255, 255, 255, 0.45);
}

/* FADE UP ANIMATION */
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
@media (max-width: 960px) {
  .svc-grid {
    grid-template-columns: 1fr;
  }
  .pillar-band-in {
    flex-direction: column;
    align-items: flex-start;
  }
  .highlight-row {
    grid-template-columns: repeat(2, 1fr);
  }
  .hl-item:nth-child(2n + 1) + .hl-item:nth-child(2n) {
    border-left: 0.5px solid #f0f3f7;
  }
  .hl-item:nth-child(3),
  .hl-item:nth-child(4) {
    border-top: 0.5px solid #f0f3f7;
  }
  .pillar-tabs {
    flex-direction: column;
  }
  .ptab {
    max-width: 100%;
  }
  .ctaband-in {
    flex-direction: column;
    align-items: flex-start;
  }
  .compliance-in {
    flex-direction: column;
    align-items: flex-start;
  }
}
@media (max-width: 600px) {
  .sec {
    padding: 44px 20px;
  }
  .pillar-band {
    padding: 22px 20px;
  }
  .compliance-band {
    padding: 20px;
  }
  .page-hero {
    padding: 36px 20px 44px;
  }
  .page-h1 {
    font-size: 28px;
  }
  .hero-ctas {
    flex-direction: column;
  }
}
</style>
