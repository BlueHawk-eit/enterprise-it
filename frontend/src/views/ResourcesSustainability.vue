<template>
  <div class="sustainability-view">
    <!-- Resources Sub-Nav Strip -->
    <nav class="resources-nav" aria-label="Resources sections">
      <div class="rn-inner">
        <span class="rn-label">Resources</span>
        <router-link to="/resources/sustainability" class="rn-link active" aria-current="page">
          <i class="ti ti-leaf" aria-hidden="true"></i>Sustainability
        </router-link>
        <router-link to="/resources/blog" class="rn-link">
          <i class="ti ti-article" aria-hidden="true"></i>Blog
        </router-link>
        <router-link to="/resources/news" class="rn-link">
          <i class="ti ti-news" aria-hidden="true"></i>News
        </router-link>
      </div>
    </nav>

    <!-- PAGE HERO -->
    <section class="page-hero" aria-labelledby="page-h1">
      <div class="hero-in">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <router-link to="/" class="bc-link">Home</router-link>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-link">Resources</span>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-cur">Sustainability</span>
        </nav>

        <div class="hero-layout">
          <div>
            <div class="eyebrow">
              <span class="eyebrow-dot" aria-hidden="true"></span>
              Resources · Sustainability &amp; ESG
            </div>
            <h1 class="page-h1" id="page-h1">
              Responsible technology.<br>
              <span class="accent">A greener future<br>for Australian enterprise.</span>
            </h1>
            <p class="page-sub">
              We build sustainability into every stage of the technology lifecycle: reuse-first disposal, NIST 800-88 data sanitisation, ESG reporting, technology donation and Employee Purchase Programs.
            </p>
            <div class="hero-ctas">
              <router-link to="/contact#quote" class="btn-green">
                <i class="ti ti-file-analytics" aria-hidden="true"></i>Request an ESG Report
              </router-link>
              <a href="#esg-framework" class="btn-outline-green">
                <i class="ti ti-arrow-down" aria-hidden="true"></i>Explore our ESG framework
              </a>
            </div>
            <div class="hero-stats" aria-label="Sustainability highlights">
              <div class="hstat">
                <div class="hstat-num">Reuse</div>
                <div class="hstat-label">First choice for<br>every device</div>
              </div>
              <div class="hstat">
                <div class="hstat-num">Tracked</div>
                <div class="hstat-label">Every asset to its<br>final destination</div>
              </div>
              <div class="hstat">
                <div class="hstat-num">ESG</div>
                <div class="hstat-label">Board-ready<br>reporting</div>
              </div>
              <div class="hstat">
                <div class="hstat-num">CoD</div>
                <div class="hstat-label">Certificate per<br>data-bearing device</div>
              </div>
            </div>
          </div>

          <!-- ESG snapshot card -->
          <aside class="esg-card" aria-label="ESG commitment snapshot">
            <div class="esg-card-title">ESG Commitment Snapshot</div>
            <div class="esg-row">
              <div class="esg-row-icon"><i class="ti ti-world" aria-hidden="true"></i></div>
              <div>
                <div class="esg-row-label">Reuse First</div>
                <div class="esg-row-val">Devices are reused or donated where possible, then recycled responsibly</div>
                <div class="green-pill"><span style="width:5px;height:5px;border-radius:50%;background:#4ade80;" aria-hidden="true"></span>Our approach</div>
              </div>
            </div>
            <div class="esg-row">
              <div class="esg-row-icon"><i class="ti ti-file-analytics" aria-hidden="true"></i></div>
              <div>
                <div class="esg-row-label">ESG Reporting</div>
                <div class="esg-row-val">Board-ready ESG documentation available for each retirement cycle</div>
                <div class="green-pill"><span style="width:5px;height:5px;border-radius:50%;background:#4ade80;" aria-hidden="true"></span>ESG reporting</div>
              </div>
            </div>
            <div class="esg-row">
              <div class="esg-row-icon"><i class="ti ti-heart" aria-hidden="true"></i></div>
              <div>
                <div class="esg-row-label">Technology Donation</div>
                <div class="esg-row-val">Securely wiped devices donated to Australian nonprofits and schools</div>
              </div>
            </div>
            <div class="esg-row">
              <div class="esg-row-icon"><i class="ti ti-users" aria-hidden="true"></i></div>
              <div>
                <div class="esg-row-label">Employee Purchase Programs</div>
                <div class="esg-row-val">Sanitised, graded hardware made accessible to client staff</div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- TRUST BAR -->
    <div class="tbar" aria-label="Sustainability standards">
      <div class="tbar-in">
        <span class="tbar-label">Our Approach</span>
        <div class="tbar-badges">
          <div class="tbadge green"><i class="ti ti-leaf" aria-hidden="true"></i>ESG reporting</div>
          <div class="tbadge green"><i class="ti ti-recycle" aria-hidden="true"></i>Reuse First</div>
          <div class="tbadge"><i class="ti ti-certificate" aria-hidden="true"></i>ISO 27001-aligned</div>
          <div class="tbadge"><i class="ti ti-file-certificate" aria-hidden="true"></i>NIST 800-88</div>
          <div class="tbadge green"><i class="ti ti-heart" aria-hidden="true"></i>Tech Donation</div>
          <div class="tbadge"><i class="ti ti-map-pin" aria-hidden="true"></i>SA Owned &amp; Operated</div>
        </div>
      </div>
    </div>

    <!-- OUR COMMITMENT + IMPACT COUNTERS -->
    <section class="sec sec-white" aria-labelledby="commitment-heading">
      <div class="sec-in">
        <p class="stag stag-green">Our Commitment</p>
        <h2 class="sh2" id="commitment-heading">Technology lifecycle management<br>with environmental purpose.</h2>

        <div class="impact-layout">
          <div class="impact-body fade-up" ref="fadeEl1">
            <p>
              <strong>We believe good technology management and environmental responsibility go hand in hand.</strong> Every device you retire represents a choice about whether it is reused, repurposed or recycled, and that choice is worth getting right.
            </p>
            <div class="impact-pull">
              "We believe the way a company retires its technology says as much about its values as the technology it deploys."
            </div>
            <p>
              Our framework covers the whole journey, from the moment a device is collected from your premises to the point where it is documented and either rehomed, donated or responsibly recycled. <strong>Landfill is the last resort, not the default.</strong>
            </p>
            <p>
              Each engagement can include an ESG report documenting the outcomes: estimated CO₂ saved, weight diverted from landfill, devices rehomed and certificates issued. They are written for boards, auditors and stakeholders.
            </p>
          </div>

          <!-- Animated impact counters -->
          <div class="impact-counters fade-up" ref="counterSection" style="transition-delay:.1s;" aria-label="What our ESG reports measure">
            <div class="counter-card">
              <div class="counter-icon"><i class="ti ti-cloud" aria-hidden="true"></i></div>
              <div><span class="counter-num">CO₂e</span></div>
              <div class="counter-label">Estimated emissions avoided through reuse, calculated for each retirement cycle</div>
            </div>
            <div class="counter-card">
              <div class="counter-icon"><i class="ti ti-trash-off" aria-hidden="true"></i></div>
              <div><span class="counter-num">kg</span></div>
              <div class="counter-label">Weight of e-waste diverted from landfill, reported per cycle</div>
            </div>
            <div class="counter-card featured">
              <div class="counter-icon"><i class="ti ti-devices" aria-hidden="true"></i></div>
              <div>
                <div><span class="counter-num">Rehomed</span></div>
                <div class="counter-label">Devices given a second life through donation and Employee Purchase Programs</div>
              </div>
            </div>
            <div class="counter-card">
              <div class="counter-icon"><i class="ti ti-file-analytics" aria-hidden="true"></i></div>
              <div><span class="counter-num">CoD</span></div>
              <div class="counter-label">Certificates for every data-bearing device, indexed by serial number</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ESG THREE PILLARS -->
    <section class="sec sec-alt" id="esg-framework" aria-labelledby="esg-heading">
      <div class="sec-in">
        <p class="stag stag-green">ESG Framework</p>
        <h2 class="sh2" id="esg-heading">Environmental. Social. Governance.<br>Three pillars, one framework.</h2>
        <p class="sdesc">Our approach covers all three dimensions, with documented outcomes and recognised standards at every stage.</p>

        <div class="pillars-grid">
          <!-- Environmental -->
          <article class="pillar-card fade-up" ref="fadeEl2">
            <div class="pillar-card-head env">
              <div class="pillar-hicon"><i class="ti ti-world" aria-hidden="true"></i></div>
              <div class="pillar-htitle">Environmental</div>
              <div class="pillar-hbadge">E · ESG reporting</div>
            </div>
            <div class="pillar-card-body">
              <p class="pillar-desc">Our environmental approach covers the whole IT asset lifecycle: maximise reuse, minimise landfill, and measure the impact at every stage.</p>
              <ul class="pillar-points">
                <li class="pillar-point"><i class="ti ti-check" aria-hidden="true"></i>Landfill avoided wherever possible, every asset accounted for</li>
                <li class="pillar-point"><i class="ti ti-check" aria-hidden="true"></i>NIST 800-88 sanitisation before reuse or recycling</li>
                <li class="pillar-point"><i class="ti ti-check" aria-hidden="true"></i>CO₂ offset tracking per retirement cycle</li>
                <li class="pillar-point"><i class="ti ti-check" aria-hidden="true"></i>Responsible material recovery for batteries, boards and metals</li>
                <li class="pillar-point"><i class="ti ti-check" aria-hidden="true"></i>E-waste diversion metrics reported per engagement</li>
              </ul>
            </div>
          </article>

          <!-- Social -->
          <article class="pillar-card fade-up" ref="fadeEl3" style="transition-delay:.1s;">
            <div class="pillar-card-head soc">
              <div class="pillar-hicon"><i class="ti ti-heart" aria-hidden="true"></i></div>
              <div class="pillar-htitle">Social</div>
              <div class="pillar-hbadge">S · Community Impact</div>
            </div>
            <div class="pillar-card-body">
              <p class="pillar-desc">Technology should benefit communities, not just organisations. Our social programs ensure that enterprise devices reach the people who need them most.</p>
              <ul class="pillar-points">
                <li class="pillar-point navy"><i class="ti ti-check" aria-hidden="true"></i>Technology donation to Australian nonprofits</li>
                <li class="pillar-point navy"><i class="ti ti-check" aria-hidden="true"></i>Educational institution device programs</li>
                <li class="pillar-point navy"><i class="ti ti-check" aria-hidden="true"></i>Employee Purchase Programs enabling affordable access for staff</li>
                <li class="pillar-point navy"><i class="ti ti-check" aria-hidden="true"></i>Donation records for your ESG reporting</li>
                <li class="pillar-point navy"><i class="ti ti-check" aria-hidden="true"></i>Digital inclusion support through hardware accessibility</li>
              </ul>
            </div>
          </article>

          <!-- Governance -->
          <article class="pillar-card fade-up" ref="fadeEl4" style="transition-delay:.2s;">
            <div class="pillar-card-head gov">
              <div class="pillar-hicon"><i class="ti ti-clipboard-check" aria-hidden="true"></i></div>
              <div class="pillar-htitle">Governance</div>
              <div class="pillar-hbadge">G · Audit-ready</div>
            </div>
            <div class="pillar-card-body">
              <p class="pillar-desc">Good governance means every sustainability claim is documented and defensible to your board, your auditors and your stakeholders.</p>
              <ul class="pillar-points">
                <li class="pillar-point slate"><i class="ti ti-check" aria-hidden="true"></i>Board-ready ESG reports per retirement cycle</li>
                <li class="pillar-point slate"><i class="ti ti-check" aria-hidden="true"></i>Certificate of Destruction for every data-bearing device</li>
                <li class="pillar-point slate"><i class="ti ti-check" aria-hidden="true"></i>Full audit trail from asset collection to final disposition</li>
                <li class="pillar-point slate"><i class="ti ti-check" aria-hidden="true"></i>Alignment to Australian ESG regulatory frameworks</li>
                <li class="pillar-point slate"><i class="ti ti-check" aria-hidden="true"></i>Secure portal delivery of all compliance documentation</li>
              </ul>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- SUSTAINABLE IT LIFECYCLE PROCESS -->
    <section class="sec sec-green-dark" aria-labelledby="lifecycle-heading" style="padding-bottom:72px;">
      <div class="sec-in">
        <p class="stag stag-light" style="color:#4ade80;">How It Works</p>
        <h2 class="sh2 sh2-light" id="lifecycle-heading">The sustainable IT lifecycle.</h2>
        <p class="sdesc sdesc-light">Five steps from collection to completion, each one documented and auditable.</p>

        <div class="lifecycle-track fade-up" ref="fadeEl5" aria-label="Sustainable lifecycle process steps">
          <div class="lc-step">
            <div class="lc-num">
              <i class="ti ti-truck" aria-hidden="true"></i>
              <span class="lc-step-num" aria-hidden="true">1</span>
            </div>
            <div class="lc-title">Collect &amp; Audit</div>
            <p class="lc-desc">Tracked collection from your premises, with a full asset audit and manifest created on pickup.</p>
          </div>
          <div class="lc-step">
            <div class="lc-num">
              <i class="ti ti-database-off" aria-hidden="true"></i>
              <span class="lc-step-num" aria-hidden="true">2</span>
            </div>
            <div class="lc-title">Sanitise</div>
            <p class="lc-desc">NIST 800-88 data eradication on every data-bearing device. Certificate of Destruction issued per device.</p>
          </div>
          <div class="lc-step">
            <div class="lc-num">
              <i class="ti ti-clipboard-check" aria-hidden="true"></i>
              <span class="lc-step-num" aria-hidden="true">3</span>
            </div>
            <div class="lc-title">Grade &amp; Assess</div>
            <p class="lc-desc">Cosmetic and functional grading determines the optimal sustainable pathway for each device.</p>
          </div>
          <div class="lc-step">
            <div class="lc-num">
              <i class="ti ti-heart" aria-hidden="true"></i>
              <span class="lc-step-num" aria-hidden="true">4</span>
            </div>
            <div class="lc-title">Rehome or Recycle</div>
            <p class="lc-desc">Reusable devices go to EPP, donation, or resale. Non-reusable devices go to responsible recycling partners.</p>
          </div>
          <div class="lc-step">
            <div class="lc-num">
              <i class="ti ti-file-analytics" aria-hidden="true"></i>
              <span class="lc-step-num" aria-hidden="true">5</span>
            </div>
            <div class="lc-title">Report &amp; Certify</div>
            <p class="lc-desc">Full ESG report, Certificates of Destruction, and disposition records delivered to your secure portal.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CERTIFIED DISPOSAL & ZERO LANDFILL -->
    <section class="sec sec-white" id="itad" aria-labelledby="itad-heading">
      <div class="sec-in">
        <p class="stag stag-green">Responsible Disposal</p>
        <h2 class="sh2" id="itad-heading">Reuse first.<br>No compromise on data.</h2>
        <p class="sdesc">Every device that reaches end of life with us goes through a documented ITAD workflow, with a recorded outcome for each one.</p>

        <div class="itad-layout">
          <div class="impact-body fade-up" ref="fadeEl6">
            <p>
              <strong>We aim to keep every retired device out of landfill.</strong> Reuse comes first, then donation or resale, then responsible recycling through e-waste recyclers. Each outcome is recorded.
            </p>
            <p>
              All data-bearing devices are sanitised to <strong>NIST 800-88</strong>, the most widely used guideline for media sanitisation. For devices where software sanitisation is not viable (failed drives, physically damaged media), we apply <strong>physical destruction</strong> through degaussing or secure shredding.
            </p>
            <p>
              Each device ends up with one documented outcome: <strong>rehomed via EPP</strong>, <strong>donated to a community organisation</strong>, <strong>sold to a refurbisher</strong>, or <strong>dismantled for responsible material recovery</strong>.
            </p>
            <p>
              You receive a <strong>Certificate of Destruction</strong> for every data-bearing device we process, serialised and delivered to your secure portal. ESG reports document the aggregate environmental outcome of each retirement cycle.
            </p>
          </div>

          <div class="pledge-wrap fade-up" ref="fadeEl7" style="transition-delay:.1s;">
            <div class="itad-pledge">
              <div>
                <div class="pledge-title">What every ITAD job includes</div>
                <p class="pledge-sub">Documented on every job, every time.</p>
              </div>
              <div class="pledge-item">
                <div class="pledge-icon"><i class="ti ti-database-off" aria-hidden="true"></i></div>
                <div>
                  <div class="pledge-item-title">NIST 800-88 Data Eradication</div>
                  <p class="pledge-item-desc">Verified sanitisation for HDD, SSD, NVMe, mobile and tape, including cryptographic erase where supported.</p>
                </div>
              </div>
              <div class="pledge-item">
                <div class="pledge-icon"><i class="ti ti-certificate" aria-hidden="true"></i></div>
                <div>
                  <div class="pledge-item-title">Certificate for Every Device</div>
                  <p class="pledge-item-desc">Serialised certificates per device or per batch, audit-ready and delivered to your secure portal.</p>
                </div>
              </div>
              <div class="pledge-item">
                <div class="pledge-icon"><i class="ti ti-recycle" aria-hidden="true"></i></div>
                <div>
                  <div class="pledge-item-title">Responsible Disposition</div>
                  <p class="pledge-item-desc">Every asset leaves through a documented pathway: reuse, donation, resale or responsible material recovery.</p>
                </div>
              </div>
              <div class="pledge-item">
                <div class="pledge-icon"><i class="ti ti-file-analytics" aria-hidden="true"></i></div>
                <div>
                  <div class="pledge-item-title">Full Audit Trail</div>
                  <p class="pledge-item-desc">Chain-of-custody records from collection to final disposition, for every device.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- EPP & TECHNOLOGY DONATION -->
    <section class="sec sec-alt" id="programs" aria-labelledby="programs-heading">
      <div class="sec-in">
        <p class="stag stag-green">Social Programs</p>
        <h2 class="sh2" id="programs-heading">Giving technology a second life.</h2>
        <p class="sdesc">Two programs that put securely wiped devices into the hands of employees and communities who can use them.</p>

        <div class="program-grid">
          <!-- EPP -->
          <article class="program-card fade-up" ref="fadeEl8">
            <div class="program-head epp">
              <div class="prog-icon"><i class="ti ti-users" aria-hidden="true"></i></div>
              <div class="prog-title">Employee Purchase Programs (EPP)</div>
              <div class="prog-sub">Making enterprise hardware accessible to your team</div>
            </div>
            <div class="program-body">
              <p class="prog-desc">
                An EPP lets your employees buy securely wiped, graded devices at reduced prices. It cuts e-waste and gives your people a genuine benefit.
              </p>
              <div class="prog-steps">
                <div class="prog-step">
                  <div class="prog-step-num">1</div>
                  <div><strong>Devices are collected</strong> and processed through our documented ITAD workflow</div>
                </div>
                <div class="prog-step">
                  <div class="prog-step-num">2</div>
                  <div><strong>Each device is graded</strong>, cosmetically and functionally</div>
                </div>
                <div class="prog-step">
                  <div class="prog-step-num">3</div>
                  <div><strong>A catalogue is prepared</strong> with pricing based on grade and market value</div>
                </div>
                <div class="prog-step">
                  <div class="prog-step-num">4</div>
                  <div><strong>Employees purchase</strong> and devices are shipped to them directly</div>
                </div>
                <div class="prog-step">
                  <div class="prog-step-num">5</div>
                  <div><strong>ESG report updated</strong> with EPP outcomes, CO₂ saved, and units rehomed</div>
                </div>
              </div>
              <router-link to="/contact#quote" class="prog-cta">
                <i class="ti ti-arrow-right" aria-hidden="true"></i>Set up an EPP for your organisation
              </router-link>
            </div>
          </article>

          <!-- Donation -->
          <article class="program-card fade-up" ref="fadeEl9" style="transition-delay:.1s;">
            <div class="program-head donate">
              <div class="prog-icon"><i class="ti ti-heart" aria-hidden="true"></i></div>
              <div class="prog-title">Technology Donation Program</div>
              <div class="prog-sub">Connecting enterprise hardware with communities that need it</div>
            </div>
            <div class="program-body">
              <p class="prog-desc">
                Devices that meet our donation criteria are matched with Australian nonprofits, schools and community organisations, helping close the digital divide with securely wiped hardware.
              </p>
              <div class="prog-steps">
                <div class="prog-step">
                  <div class="prog-step-num green">1</div>
                  <div><strong>Devices are sanitised</strong> to NIST 800-88 standard and graded for donation viability</div>
                </div>
                <div class="prog-step">
                  <div class="prog-step-num green">2</div>
                  <div><strong>Recipients are identified</strong> and checked before any device is handed over</div>
                </div>
                <div class="prog-step">
                  <div class="prog-step-num green">3</div>
                  <div><strong>Devices are prepared</strong> with a clean OS and basic productivity software where applicable</div>
                </div>
                <div class="prog-step">
                  <div class="prog-step-num green">4</div>
                  <div><strong>Donation records</strong> provided for your ESG reporting</div>
                </div>
                <div class="prog-step">
                  <div class="prog-step-num green">5</div>
                  <div><strong>Impact documented</strong>: recipients, device count and estimated community value</div>
                </div>
              </div>
              <router-link to="/contact#quote" class="prog-cta green">
                <i class="ti ti-arrow-right" aria-hidden="true"></i>Donate your next device retirement cycle
              </router-link>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ESG REPORTING -->
    <section class="sec sec-white" id="esg-reporting" aria-labelledby="esg-report-heading">
      <div class="sec-in">
        <p class="stag stag-green">ESG Reporting</p>
        <h2 class="sh2" id="esg-report-heading">Board-ready sustainability<br>documentation, every cycle.</h2>
        <p class="sdesc">Every retirement engagement can include an ESG report, structured and ready for your board or auditors.</p>

        <div class="esg-report-layout">
          <div>
            <p class="impact-body" style="font-size:14px;color:#555;line-height:1.72;margin-bottom:14px;">
              <strong style="color:#002366;">Our ESG reports are not an afterthought.</strong> They are prepared at the end of each retirement cycle, whether that's a handful of devices or a full fleet refresh.
            </p>
            <p style="font-size:14px;color:#555;line-height:1.72;margin-bottom:24px;">
              Each report sets out the environmental and social outcomes in plain language, with the method behind each figure, so CFOs, sustainability officers and auditors can rely on it. Delivered securely to your client portal.
            </p>

            <div class="report-contents fade-up" ref="fadeEl10" aria-label="What's included in the ESG report">
              <div class="report-item">
                <div class="report-item-icon green"><i class="ti ti-cloud" aria-hidden="true"></i></div>
                <div>
                  <div class="report-item-text">CO₂ Equivalent Saved</div>
                  <div class="report-item-sub">Carbon offset calculation per retirement cycle vs landfill baseline</div>
                </div>
              </div>
              <div class="report-item">
                <div class="report-item-icon green"><i class="ti ti-trash-off" aria-hidden="true"></i></div>
                <div>
                  <div class="report-item-text">Landfill Diversion Weight</div>
                  <div class="report-item-sub">Total kg of electronic waste diverted from landfill</div>
                </div>
              </div>
              <div class="report-item">
                <div class="report-item-icon"><i class="ti ti-devices" aria-hidden="true"></i></div>
                <div>
                  <div class="report-item-text">Device Disposition Summary</div>
                  <div class="report-item-sub">Breakdown by pathway: reused, donated, recycled, destroyed</div>
                </div>
              </div>
              <div class="report-item">
                <div class="report-item-icon"><i class="ti ti-certificate" aria-hidden="true"></i></div>
                <div>
                  <div class="report-item-text">Certificates of Destruction Register</div>
                  <div class="report-item-sub">Full CoD index with serial numbers and destruction method per device</div>
                </div>
              </div>
              <div class="report-item">
                <div class="report-item-icon green"><i class="ti ti-heart" aria-hidden="true"></i></div>
                <div>
                  <div class="report-item-text">Social Impact Summary</div>
                  <div class="report-item-sub">EPP outcomes, donation recipients, and community value documented</div>
                </div>
              </div>
              <div class="report-item">
                <div class="report-item-icon"><i class="ti ti-file-analytics" aria-hidden="true"></i></div>
                <div>
                  <div class="report-item-text">Regulatory Compliance Statement</div>
                  <div class="report-item-sub">Alignment to Australian ESG frameworks and applicable standards</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Sample report visual -->
          <div class="sample-report fade-up" ref="fadeEl11" style="transition-delay:.1s;" aria-label="Sample ESG report metrics">
            <div class="sr-inner">
              <div class="sr-tag">Sample ESG Report (Illustrative)</div>
              <div class="sr-title">Acme Corporation · Q2 2025<br>Technology Retirement Cycle</div>
              <div class="sr-metrics">
                <div class="sr-metric">
                  <div><span class="sr-metric-num">4.2</span><span class="sr-metric-unit"> t CO₂e</span></div>
                  <div class="sr-metric-label">Carbon offset achieved vs landfill disposal</div>
                </div>
                <div class="sr-metric">
                  <div><span class="sr-metric-num">1,840</span><span class="sr-metric-unit"> kg</span></div>
                  <div class="sr-metric-label">E-waste diverted from landfill</div>
                </div>
                <div class="sr-metric">
                  <div><span class="sr-metric-num">247</span><span class="sr-metric-unit"> devices</span></div>
                  <div class="sr-metric-label">Total devices processed this cycle</div>
                </div>
                <div class="sr-metric">
                  <div><span class="sr-metric-num">247</span><span class="sr-metric-unit"> CoDs</span></div>
                  <div class="sr-metric-label">Certificates of Destruction issued</div>
                </div>
              </div>
              <div class="sr-bar-label">Disposition breakdown</div>
              <div class="sr-bar-row">
                <div class="sr-bar-name">EPP / Reuse</div>
                <div class="sr-bar-track"><div class="sr-bar-fill" style="width:48%;"></div></div>
                <div class="sr-bar-val">48%</div>
              </div>
              <div class="sr-bar-row">
                <div class="sr-bar-name">Donation</div>
                <div class="sr-bar-track"><div class="sr-bar-fill" style="width:29%;background:#86efac;"></div></div>
                <div class="sr-bar-val">29%</div>
              </div>
              <div class="sr-bar-row">
                <div class="sr-bar-name">Recycled</div>
                <div class="sr-bar-track"><div class="sr-bar-fill" style="width:23%;background:#6ee7b7;"></div></div>
                <div class="sr-bar-val">23%</div>
              </div>
              <div class="sr-bar-row">
                <div class="sr-bar-name">Landfill</div>
                <div class="sr-bar-track"><div class="sr-bar-fill" style="width:0%;"></div></div>
                <div class="sr-bar-val" style="color:#4ade80;font-weight:800;">0%</div>
              </div>
              <router-link to="/contact#quote" class="sr-get">
                <i class="ti ti-file-analytics" aria-hidden="true"></i>
                Request your ESG Report
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CERTIFICATIONS -->
    <section class="sec sec-alt" aria-labelledby="certs-heading">
      <div class="sec-in">
        <p class="stag stag-green">Standards &amp; Alignment</p>
        <h2 class="sh2" id="certs-heading">Standards we hold ourselves to.</h2>
        <p class="sdesc">Our sustainability practices follow recognised international and Australian standards.</p>

        <div class="cert-grid">
          <div class="cert-card fade-up" ref="fadeEl12">
            <div class="cert-top">
              <div class="cert-badge"><i class="ti ti-leaf" aria-hidden="true"></i></div>
              <div>
                <div class="cert-name">ESG reporting</div>
                <div class="cert-full">Environmental, Social &amp; Governance</div>
              </div>
            </div>
            <p class="cert-desc">ESG reporting aligned to Australian environmental frameworks, structured and board-ready.</p>
            <div class="cert-proof"><i class="ti ti-check" aria-hidden="true"></i>Board-ready documentation</div>
          </div>
          <div class="cert-card fade-up" ref="fadeEl13" style="transition-delay:.07s;">
            <div class="cert-top">
              <div class="cert-badge navy"><i class="ti ti-database-off" aria-hidden="true"></i></div>
              <div>
                <div class="cert-name">NIST 800-88</div>
                <div class="cert-full">Media Sanitisation Guidelines</div>
              </div>
            </div>
            <p class="cert-desc">US federal guidelines for secure media sanitisation, applied to every device we retire, including cryptographic erase for modern storage.</p>
            <div class="cert-proof"><i class="ti ti-check" aria-hidden="true"></i>Applied to every device</div>
          </div>
          <div class="cert-card fade-up" ref="fadeEl14" style="transition-delay:.14s;">
            <div class="cert-top">
              <div class="cert-badge navy"><i class="ti ti-certificate" aria-hidden="true"></i></div>
              <div>
                <div class="cert-name">ISO 27001</div>
                <div class="cert-full">Information Security Management</div>
              </div>
            </div>
            <p class="cert-desc">International information security standard governing how we manage and protect information through the full IT asset lifecycle, including data disposal.</p>
            <div class="cert-proof"><i class="ti ti-check" aria-hidden="true"></i>ISO 27001-aligned</div>
          </div>
          <div class="cert-card fade-up" ref="fadeEl15" style="transition-delay:.04s;">
            <div class="cert-top">
              <div class="cert-badge"><i class="ti ti-recycle" aria-hidden="true"></i></div>
              <div>
                <div class="cert-name">Full Asset Tracking</div>
                <div class="cert-full">Chain of Custody</div>
              </div>
            </div>
            <p class="cert-desc">Every asset is tracked to its final disposition, and no device leaves our care without a documented pathway.</p>
            <div class="cert-proof"><i class="ti ti-check" aria-hidden="true"></i>Every asset accounted for</div>
          </div>
          <div class="cert-card fade-up" ref="fadeEl16" style="transition-delay:.11s;">
            <div class="cert-top">
              <div class="cert-badge slate"><i class="ti ti-shield-check" aria-hidden="true"></i></div>
              <div>
                <div class="cert-name">Australian Privacy Act</div>
                <div class="cert-full">Privacy Act 1988 (Cth)</div>
              </div>
            </div>
            <p class="cert-desc">Our data handling and disposal practices align with the Australian Privacy Act 1988, so personal information is handled and destroyed lawfully.</p>
            <div class="cert-proof"><i class="ti ti-check" aria-hidden="true"></i>Privacy Act aligned</div>
          </div>
          <div class="cert-card fade-up" ref="fadeEl17" style="transition-delay:.18s;">
            <div class="cert-top">
              <div class="cert-badge"><i class="ti ti-heart" aria-hidden="true"></i></div>
              <div>
                <div class="cert-name">Technology Donation</div>
                <div class="cert-full">Community &amp; Education Programs</div>
              </div>
            </div>
            <p class="cert-desc">Donations to Australian nonprofits and schools, with every donation documented in your ESG report.</p>
            <div class="cert-proof"><i class="ti ti-check" aria-hidden="true"></i>Documented donations</div>
          </div>
        </div>
      </div>
    </section>


    <!-- CTA BAND -->
    <div class="ctaband" aria-label="Call to action">
      <div class="ctaband-in">
        <div class="ctaband-left">
          <h3>Ready to make your next IT retirement cycle sustainable?</h3>
          <p>Request an ESG report, set up an EPP or start a technology donation program. We reply within 24 hours.</p>
        </div>
        <div class="ctaband-btns">
          <router-link to="/contact#quote" class="cta-green">Request an ESG Report →</router-link>
          <router-link to="/services#itad" class="cta-outline">View ITAD Services</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

// Fade-up elements tracking
const fadeEl1 = ref(null);
const fadeEl2 = ref(null);
const fadeEl3 = ref(null);
const fadeEl4 = ref(null);
const fadeEl5 = ref(null);
const fadeEl6 = ref(null);
const fadeEl7 = ref(null);
const fadeEl8 = ref(null);
const fadeEl9 = ref(null);
const fadeEl10 = ref(null);
const fadeEl11 = ref(null);
const fadeEl12 = ref(null);
const fadeEl13 = ref(null);
const fadeEl14 = ref(null);
const fadeEl15 = ref(null);
const fadeEl16 = ref(null);
const fadeEl17 = ref(null);
const fadeEl18 = ref(null);

// Counter Refs
const counterSection = ref(null);
const c1Val = ref(0);
const c2Val = ref(0);
const c3Val = ref(0);
const c4Val = ref(0);

const animateCount = (valRef, target, duration) => {
  const start = performance.now();
  const tick = (now) => {
    const p = Math.min((now - start) / duration, 1);
    const ease = 1 - Math.pow(1 - p, 3);
    valRef.value = Math.round(ease * target);
    if (p < 1) {
      requestAnimationFrame(tick);
    } else {
      valRef.value = target;
    }
  };
  requestAnimationFrame(tick);
};

onMounted(() => {
  // Intersection Observer for scroll animations
  const fadeElements = [
    fadeEl1, fadeEl2, fadeEl3, fadeEl4, fadeEl5, fadeEl6, fadeEl7, fadeEl8,
    fadeEl9, fadeEl10, fadeEl11, fadeEl12, fadeEl13, fadeEl14, fadeEl15, fadeEl16,
    fadeEl17, fadeEl18
  ];

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  fadeElements.forEach((el) => {
    if (el.value) observer.observe(el.value);
  });

  // Intersection Observer for counters
  if (counterSection.value) {
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          counterObserver.disconnect();
        }
      });
    }, { threshold: 0.3 });
    counterObserver.observe(counterSection.value);
  }
});
</script>

<style scoped>
/* ============================================================
   RESOURCES SUB-NAV STRIP
============================================================ */
.resources-nav {
  background: #fff;
  border-bottom: 0.5px solid #e2e5ec;
  position: sticky;
  top: 58px;
  z-index: 100;
}
.rn-inner {
  max-width: 1080px;
  margin: 0 auto;
  padding: 0 32px;
  display: flex;
  align-items: center;
  gap: 0;
}
.rn-label {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.3px;
  text-transform: uppercase;
  color: #708090;
  padding: 13px 16px 13px 0;
  border-right: 0.5px solid #e2e5ec;
  margin-right: 8px;
  white-space: nowrap;
}
.rn-link {
  font-size: 13px;
  font-weight: 500;
  color: #6b7280;
  padding: 13px 16px;
  white-space: nowrap;
  border-bottom: 2px solid transparent;
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: color .15s, border-color .15s;
}
.rn-link i { font-size: 14px; }
.rn-link:hover { color: #002366; }
.rn-link.active {
  color: #16a34a;
  font-weight: 700;
  border-bottom-color: #16a34a;
}

/* ============================================================
   PAGE HERO — deep green
============================================================ */
.page-hero {
  background: linear-gradient(135deg, #052e16 0%, #063318 50%, #052e16 100%);
  padding: 56px 32px 60px;
  position: relative;
  overflow: hidden;
  text-align: left;
}
.page-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(74, 222, 128, 0.035) 1px, transparent 1px),
                   linear-gradient(90deg, rgba(74, 222, 128, 0.035) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}
.page-hero::after {
  content: '';
  position: absolute;
  right: -160px;
  top: -160px;
  width: 560px;
  height: 560px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(74, 222, 128, 0.07) 0%, transparent 70%);
  pointer-events: none;
}
.hero-in { max-width: 1080px; margin: 0 auto; position: relative; z-index: 1; }
.breadcrumb { display: flex; align-items: center; gap: 6px; margin-bottom: 20px; }
.bc-link { color: rgba(255, 255, 255, 0.4); font-size: 12px; transition: color .15s; text-decoration: none;}
.bc-link:hover { color: rgba(255, 255, 255, 0.7); }
.bc-sep { color: rgba(255, 255, 255, 0.2); font-size: 12px; }
.bc-cur { color: rgba(255, 255, 255, 0.65); font-size: 12px; }
.hero-layout { display: grid; grid-template-columns: 1fr 300px; gap: 44px; align-items: start; }
.eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: rgba(74, 222, 128, 0.1);
  border: 0.5px solid rgba(74, 222, 128, 0.22);
  color: #86efac;
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
@keyframes pulse { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.6; transform: scale(0.85); } }
.page-h1 {
  color: #fff;
  font-size: 38px;
  font-weight: 800;
  line-height: 1.08;
  letter-spacing: -0.9px;
  margin-bottom: 16px;
}
.page-h1 .accent { color: #4ade80; }
.page-sub { color: rgba(255, 255, 255, 0.55); font-size: 15px; line-height: 1.7; max-width: 520px; margin-bottom: 32px; }
.hero-ctas { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 44px; }
.btn-green {
  background: #16a34a;
  color: #fff;
  font-size: 13px;
  font-weight: 700;
  padding: 11px 20px;
  border-radius: 5px;
  border: none;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  transition: opacity .15s, transform .15s;
}
.btn-green:hover { opacity: 0.9; transform: translateY(-1px); }
.btn-outline-green {
  background: rgba(74, 222, 128, 0.08);
  color: rgba(255, 255, 255, 0.75);
  font-size: 13px;
  font-weight: 600;
  padding: 11px 20px;
  border-radius: 5px;
  border: 0.5px solid rgba(74, 222, 128, 0.25);
  display: inline-flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  transition: background .15s, border-color .15s;
}
.btn-outline-green:hover { background: rgba(74, 222, 128, 0.14); border-color: rgba(74, 222, 128, 0.4); }
.btn-green i, .btn-outline-green i { font-size: 14px; }

/* Hero stats strip */
.hero-stats {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  border-top: 0.5px solid rgba(74, 222, 128, 0.15);
  padding-top: 24px;
}
.hstat { padding: 0 16px 0 0; text-align: left; }
.hstat + .hstat { padding-left: 16px; border-left: 0.5px solid rgba(74, 222, 128, 0.12); }
.hstat-num { color: #fff; font-size: 20px; font-weight: 800; letter-spacing: -0.5px; }
.hstat-label { color: rgba(255, 255, 255, 0.4); font-size: 10px; margin-top: 3px; letter-spacing: 0.3px; line-height: 1.4; }

/* Hero right ESG snapshot card */
.esg-card {
  background: rgba(255, 255, 255, 0.05);
  border: 0.5px solid rgba(74, 222, 128, 0.15);
  border-radius: 12px;
  padding: 22px;
  text-align: left;
}
.esg-card-title {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.3px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.38);
  margin-bottom: 16px;
}
.esg-row {
  display: flex;
  align-items: flex-start;
  gap: 11px;
  padding: 10px 0;
  border-bottom: 0.5px solid rgba(255, 255, 255, 0.06);
}
.esg-row:last-child { border-bottom: none; padding-bottom: 0; }
.esg-row-icon {
  width: 34px;
  height: 34px;
  border-radius: 7px;
  background: rgba(74, 222, 128, 0.1);
  border: 0.5px solid rgba(74, 222, 128, 0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.esg-row-icon i { font-size: 16px; color: #4ade80; }
.esg-row-label { font-size: 12px; font-weight: 600; color: #fff; margin-bottom: 2px; }
.esg-row-val { font-size: 11px; color: rgba(255, 255, 255, 0.42); line-height: 1.4; }
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
.tbar { background: #fff; border-bottom: 0.5px solid #e2e5ec; padding: 12px 32px; }
.tbar-in { display: flex; align-items: center; justify-content: space-between; max-width: 1080px; margin: 0 auto; }
.tbar-label { color: #708090; font-size: 10px; letter-spacing: 1.2px; text-transform: uppercase; font-weight: 700; }
.tbar-badges { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.tbadge { display: flex; align-items: center; gap: 6px; background: #f5f7fa; border: 0.5px solid #dde1e9; border-radius: 20px; padding: 5px 12px; font-size: 11px; font-weight: 600; color: #002366; }
.tbadge.green { background: #f0fdf4; border-color: #bbf7d0; color: #16a34a; }
.tbadge i { font-size: 13px; color: #708090; }
.tbadge.green i { color: #16a34a; }

/* ============================================================
   SHARED SECTION STYLES
============================================================ */
.sec { padding: 68px 32px; text-align: left; }
.sec-white { background: #fff; }
.sec-alt { background: #f2f4f8; }
.sec-dark { background: #001a4d; }
.sec-green-dark { background: linear-gradient(135deg, #052e16, #063318); }
.sec-in { max-width: 1080px; margin: 0 auto; }
.stag { font-size: 10px; letter-spacing: 1.6px; text-transform: uppercase; color: #708090; font-weight: 700; margin-bottom: 6px; }
.stag-green { color: #16a34a; }
.stag-light { color: rgba(255, 255, 255, 0.38); }
.sh2 { font-size: 30px; font-weight: 800; color: #002366; margin-bottom: 10px; letter-spacing: -0.6px; line-height: 1.1; }
.sh2-light { color: #fff; }
.sdesc { font-size: 14.5px; color: #6b7280; line-height: 1.68; max-width: 600px; margin-bottom: 36px; }
.sdesc-light { color: rgba(255, 255, 255, 0.55); }

/* ============================================================
   IMPACT COUNTERS SECTION
============================================================ */
.impact-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center; }
.impact-body p { font-size: 14.5px; color: #555; line-height: 1.75; margin-bottom: 16px; }
.impact-body p strong { color: #002366; font-weight: 700; }
.impact-pull {
  font-size: 18px;
  font-weight: 700;
  color: #052e16;
  line-height: 1.4;
  letter-spacing: -0.3px;
  border-left: 3px solid #16a34a;
  padding-left: 18px;
  margin: 28px 0;
}
.impact-counters { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.counter-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  padding: 22px 20px;
  transition: transform .2s, border-color .2s;
  text-align: center;
}
.counter-card:hover { transform: translateY(-3px); border-color: #bbf7d0; }
.counter-card.featured {
  background: linear-gradient(135deg, #052e16, #063318);
  border-color: rgba(74, 222, 128, 0.2);
  grid-column: span 2;
  display: flex;
  align-items: center;
  gap: 20px;
  text-align: left;
  padding: 24px 28px;
}
.counter-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: #f0fdf4;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 12px;
}
.counter-icon i { font-size: 22px; color: #16a34a; }
.counter-card.featured .counter-icon {
  background: rgba(74, 222, 128, 0.1);
  width: 54px;
  height: 54px;
  border-radius: 12px;
  flex-shrink: 0;
  margin: 0;
}
.counter-card.featured .counter-icon i { color: #4ade80; font-size: 26px; }
.counter-num {
  font-size: 30px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -1px;
  line-height: 1;
}
.counter-card.featured .counter-num { color: #fff; font-size: 36px; }
.counter-unit { font-size: 15px; color: #708090; font-weight: 600; }
.counter-card.featured .counter-unit { color: rgba(255, 255, 255, 0.5); }
.counter-label { font-size: 12px; color: #6b7280; margin-top: 6px; line-height: 1.4; text-align: center; }
.counter-card.featured .counter-label { color: rgba(255, 255, 255, 0.45); font-size: 13px; margin-top: 4px; text-align: left; }

/* ============================================================
   ESG THREE PILLARS
============================================================ */
.pillars-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
.pillar-card {
  border-radius: 14px;
  overflow: hidden;
  border: 0.5px solid transparent;
  transition: transform .2s, box-shadow .2s;
}
.pillar-card:hover { transform: translateY(-4px); box-shadow: 0 10px 32px rgba(0,0,0,0.12); }
.pillar-card-head { padding: 26px 24px 20px; }
.pillar-card-head.env { background: linear-gradient(135deg, #052e16, #065f46); }
.pillar-card-head.soc { background: linear-gradient(135deg, #002366, #1a3a6e); }
.pillar-card-head.gov { background: linear-gradient(135deg, #374151, #1f2937); }
.pillar-hicon {
  width: 48px;
  height: 48px;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
}
.pillar-hicon i { font-size: 24px; color: #fff; }
.pillar-htitle { font-size: 16px; font-weight: 800; color: #fff; margin-bottom: 5px; }
.pillar-hbadge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: rgba(255, 255, 255, 0.12);
  color: rgba(255, 255, 255, 0.7);
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 0.5px;
  padding: 3px 9px;
  border-radius: 10px;
}
.pillar-card-body { background: #fff; padding: 22px 24px; }
.pillar-desc { font-size: 13px; color: #6b7280; line-height: 1.62; margin-bottom: 16px; }
.pillar-points { display: flex; flex-direction: column; gap: 8px; }
.pillar-point {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  font-size: 12.5px;
  color: #444;
  line-height: 1.45;
}
.pillar-point i { font-size: 14px; color: #16a34a; flex-shrink: 0; margin-top: 1px; }
.pillar-point.navy i { color: #002366; }
.pillar-point.slate i { color: #708090; }

/* ============================================================
   SUSTAINABLE LIFECYCLE PROCESS
============================================================ */
.lifecycle-track {
  position: relative;
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 0;
  margin-top: 40px;
}
.lifecycle-track::before {
  content: '';
  position: absolute;
  top: 28px;
  left: 10%;
  width: 80%;
  height: 1.5px;
  background: linear-gradient(90deg, #bbf7d0, #16a34a, #bbf7d0);
  z-index: 0;
}
.lc-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 0 12px;
  position: relative;
  z-index: 1;
  text-align: center;
}
.lc-num {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: #052e16;
  border: 2px solid #16a34a;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
  transition: transform .2s;
  position: relative;
}
.lc-step:hover .lc-num { transform: scale(1.08); }
.lc-num i { font-size: 24px; color: #4ade80; }
.lc-step-num {
  position: absolute;
  top: -6px;
  right: -6px;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: #16a34a;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 9px;
  font-weight: 800;
  color: #fff;
}
.lc-title { font-size: 13px; font-weight: 700; color: #fff; margin-bottom: 6px; }
.lc-desc { font-size: 11.5px; color: rgba(255, 255, 255, 0.5); line-height: 1.5; }

/* ============================================================
   ITAD & ZERO LANDFILL SECTION
============================================================ */
.itad-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start; }
.itad-body p { font-size: 14px; color: #555; line-height: 1.72; margin-bottom: 14px; }
.itad-body p strong { color: #002366; }
.itad-pledge {
  background: linear-gradient(135deg, #052e16, #065f46);
  border-radius: 12px;
  padding: 28px 26px;
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.pledge-title { font-size: 16px; font-weight: 800; color: #fff; margin-bottom: 4px; }
.pledge-sub { font-size: 13px; color: rgba(255, 255, 255, 0.55); line-height: 1.5; margin-bottom: 8px; }
.pledge-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  padding: 12px 0;
  border-bottom: 0.5px solid rgba(74, 222, 128, 0.12);
}
.pledge-item:last-child { border-bottom: none; padding-bottom: 0; }
.pledge-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: rgba(74, 222, 128, 0.1);
  border: 0.5px solid rgba(74, 222, 128, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.pledge-icon i { font-size: 17px; color: #4ade80; }
.pledge-item-title { font-size: 13px; font-weight: 700; color: #fff; margin-bottom: 3px; }
.pledge-item-desc { font-size: 12px; color: rgba(255, 255, 255, 0.48); line-height: 1.5; }

/* ============================================================
   EPP & DONATION — two-column cards
============================================================ */
.program-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
.program-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 14px;
  overflow: hidden;
  transition: transform .2s, box-shadow .2s;
}
.program-card:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(0,0,0,0.07); }
.program-head { padding: 24px 26px 20px; }
.program-head.epp { background: linear-gradient(135deg, #002366, #1a3a6e); }
.program-head.donate { background: linear-gradient(135deg, #052e16, #065f46); }
.prog-icon {
  width: 46px;
  height: 46px;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
}
.prog-icon i { font-size: 22px; color: #fff; }
.prog-title { font-size: 16px; font-weight: 800; color: #fff; margin-bottom: 5px; }
.prog-sub { font-size: 12px; color: rgba(255, 255, 255, 0.55); }
.program-body { padding: 22px 26px; }
.prog-desc { font-size: 13.5px; color: #555; line-height: 1.65; margin-bottom: 18px; }
.prog-steps { display: flex; flex-direction: column; gap: 10px; margin-bottom: 18px; }
.prog-step {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  font-size: 12.5px;
  color: #444;
  line-height: 1.45;
}
.prog-step-num {
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: #002366;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 10px;
  font-weight: 800;
  color: #fff;
  flex-shrink: 0;
  margin-top: 1px;
}
.prog-step-num.green { background: #16a34a; }
.prog-step strong { color: #002366; font-weight: 600; }
.prog-cta {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 12.5px;
  font-weight: 700;
  color: #002366;
  background: #eef2fb;
  border-radius: 6px;
  padding: 8px 14px;
  text-decoration: none;
  transition: background .15s;
  border: none;
}
.prog-cta:hover { background: #dde8f5; }
.prog-cta.green { color: #16a34a; background: #f0fdf4; }
.prog-cta.green:hover { background: #dcfce7; }
.prog-cta i { font-size: 14px; }

/* ============================================================
   ESG REPORTING SECTION
============================================================ */
.esg-report-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start; }
.esg-report-body p { font-size: 14px; color: #555; line-height: 1.72; margin-bottom: 14px; }
.esg-report-body p strong { color: #002366; }
.report-contents { display: flex; flex-direction: column; gap: 8px; margin-top: 6px; }
.report-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 11px 14px;
  background: #f7f8fb;
  border: 0.5px solid #dde1e9;
  border-radius: 8px;
  transition: border-color .15s;
}
.report-item:hover { border-color: #b0bad0; }
.report-item-icon {
  width: 32px;
  height: 32px;
  border-radius: 7px;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.report-item-icon i { font-size: 15px; color: #002366; }
.report-item-icon.green { background: #f0fdf4; }
.report-item-icon.green i { color: #16a34a; }
.report-item-text { font-size: 13px; font-weight: 600; color: #002366; }
.report-item-sub { font-size: 11px; color: #708090; margin-top: 1px; }
/* Sample report card */
.sample-report {
  background: linear-gradient(135deg, #052e16, #063318);
  border: 0.5px solid rgba(74, 222, 128, 0.15);
  border-radius: 14px;
  padding: 28px 26px;
  position: relative;
  overflow: hidden;
}
.sample-report::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(74, 222, 128, 0.03) 1px, transparent 1px),
                   linear-gradient(90deg, rgba(74, 222, 128, 0.03) 1px, transparent 1px);
  background-size: 32px 32px;
  pointer-events: none;
}
.sr-inner { position: relative; z-index: 1; }
.sr-tag { font-size: 10px; font-weight: 700; letter-spacing: 1.3px; text-transform: uppercase; color: #4ade80; margin-bottom: 8px; }
.sr-title { font-size: 16px; font-weight: 800; color: #fff; margin-bottom: 14px; }
.sr-metrics { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px; }
.sr-metric {
  background: rgba(255, 255, 255, 0.06);
  border: 0.5px solid rgba(74, 222, 128, 0.12);
  border-radius: 8px;
  padding: 14px 16px;
}
.sr-metric-num { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.5px; }
.sr-metric-unit { font-size: 12px; color: #4ade80; font-weight: 600; }
.sr-metric-label { font-size: 11px; color: rgba(255, 255, 255, 0.42); margin-top: 4px; line-height: 1.4; }
.sr-bar-label { font-size: 11px; color: rgba(255, 255, 255, 0.45); margin-bottom: 6px; }
.sr-bar-row { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
.sr-bar-name { font-size: 11px; color: rgba(255, 255, 255, 0.55); width: 72px; flex-shrink: 0; }
.sr-bar-track { flex: 1; height: 6px; background: rgba(255, 255, 255, 0.08); border-radius: 3px; overflow: hidden; }
.sr-bar-fill { height: 100%; border-radius: 3px; background: #4ade80; }
.sr-bar-val { font-size: 11px; color: rgba(255, 255, 255, 0.55); width: 28px; text-align: right; flex-shrink: 0; }
.sr-get {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  background: rgba(74, 222, 128, 0.12);
  border: 0.5px solid rgba(74, 222, 128, 0.25);
  color: #86efac;
  font-size: 13px;
  font-weight: 700;
  padding: 12px 18px;
  border-radius: 8px;
  text-decoration: none;
  margin-top: 4px;
  transition: background .15s;
}
.sr-get:hover { background: rgba(74, 222, 128, 0.2); }
.sr-get i { font-size: 15px; }

/* ============================================================
   CERTIFICATIONS
============================================================ */
.cert-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
.cert-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  padding: 22px 20px;
  transition: transform .2s, border-color .2s;
}
.cert-card:hover { transform: translateY(-3px); border-color: #bbf7d0; }
.cert-top { display: flex; align-items: center; gap: 11px; margin-bottom: 12px; }
.cert-badge {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: #052e16;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.cert-badge i { font-size: 20px; color: #4ade80; }
.cert-badge.navy { background: #002366; }
.cert-badge.navy i { color: #fff; }
.cert-badge.slate { background: #708090; }
.cert-badge.slate i { color: #fff; }
.cert-name { font-size: 14px; font-weight: 800; color: #002366; }
.cert-full { font-size: 11px; color: #708090; margin-top: 1px; }
.cert-desc { font-size: 12.5px; color: #6b7280; line-height: 1.55; }
.cert-proof {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  margin-top: 12px;
  font-size: 11px;
  font-weight: 600;
  color: #16a34a;
  background: #f0fdf4;
  border-radius: 5px;
  padding: 4px 9px;
}
.cert-proof i { font-size: 12px; }

/* ============================================================
   TESTIMONIAL
============================================================ */
.testi-card {
  background: rgba(255, 255, 255, 0.05);
  border: 0.5px solid rgba(74, 222, 128, 0.15);
  border-radius: 14px;
  padding: 32px 36px;
  max-width: 680px;
  margin: 28px auto 0;
  text-align: center;
}
.testi-stars { display: flex; justify-content: center; gap: 4px; margin-bottom: 18px; }
.testi-stars i { font-size: 16px; color: #f59e0b; }
.testi-quote {
  font-size: 16px;
  color: rgba(255, 255, 255, 0.82);
  line-height: 1.68;
  font-style: italic;
  margin-bottom: 22px;
  letter-spacing: -0.1px;
}
.testi-author { display: flex; align-items: center; justify-content: center; gap: 12px; }
.testi-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: rgba(112, 128, 144, 0.3);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 13px;
  font-weight: 700;
  color: rgba(255, 255, 255, 0.7);
  flex-shrink: 0;
}
.testi-name { font-size: 13px; font-weight: 700; color: #fff; text-align: left;}
.testi-role { font-size: 11.5px; color: rgba(255, 255, 255, 0.38); margin-top: 2px; text-align: left;}

/* ============================================================
   CTA BAND
============================================================ */
.ctaband { background: #002366; padding: 52px 32px; border-top: 0.5px solid rgba(255, 255, 255, 0.07); }
.ctaband-in { display: flex; align-items: center; justify-content: space-between; gap: 20px; max-width: 1080px; margin: 0 auto; }
.ctaband-left h3 { color: #fff; font-size: 22px; font-weight: 800; margin-bottom: 5px; letter-spacing: -0.3px; }
.ctaband-left p { color: rgba(255, 255, 255, 0.55); font-size: 13px; }
.ctaband-btns { display: flex; gap: 10px; flex-shrink: 0; }
.cta-green { background: #16a34a; color: #fff; font-size: 13px; font-weight: 700; padding: 12px 22px; border-radius: 5px; border: none; white-space: nowrap; text-decoration: none; transition: opacity .15s; }
.cta-green:hover { opacity: 0.9; }
.cta-outline { background: transparent; color: rgba(255, 255, 255, 0.8); font-size: 13px; font-weight: 600; padding: 12px 22px; border-radius: 5px; border: 0.5px solid rgba(255, 255, 255, 0.25); white-space: nowrap; text-decoration: none; transition: color .15s, border-color .15s; }
.cta-outline:hover { color: #fff; border-color: rgba(255, 255, 255, 0.45); }

/* ============================================================
   FADE UP
============================================================ */
.fade-up { opacity: 0; transform: translateY(18px); transition: opacity .5s ease, transform .5s ease; }
.fade-up.visible { opacity: 1; transform: translateY(0); }

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width: 960px) {
  .hero-layout, .impact-layout, .itad-layout, .esg-report-layout { grid-template-columns: 1fr; }
  .esg-card { display: none; }
  .pillars-grid { grid-template-columns: 1fr; }
  .lifecycle-track { grid-template-columns: repeat(3, 1fr); }
  .lifecycle-track::before { display: none; }
  .program-grid { grid-template-columns: 1fr; }
  .cert-grid { grid-template-columns: repeat(2, 1fr); }
  .ctaband-in { flex-direction: column; align-items: flex-start; }
  .hero-stats { grid-template-columns: repeat(2, 1fr); }
  .hstat + .hstat { border-left: none; padding-left: 0; }
  .hstat:nth-child(even) { border-left: 0.5px solid rgba(74, 222, 128, 0.12); padding-left: 16px; }
}
@media(max-width: 600px) {
  .page-hero { padding: 36px 20px 48px; }
  .page-h1 { font-size: 28px; }
  .hero-ctas { flex-direction: column; }
  .sec { padding: 48px 20px; }
  .pillars-grid, .cert-grid, .impact-counters { grid-template-columns: 1fr; }
  .counter-card.featured { flex-direction: column; text-align: center; }
  .counter-card.featured .counter-label { text-align: center; }
  .lifecycle-track { grid-template-columns: 1fr 1fr; }
  .sr-metrics { grid-template-columns: 1fr; }
  .tbar-in { flex-direction: column; align-items: flex-start; gap: 10px; }
  .rn-inner { padding: 0 20px; }
}
</style>
