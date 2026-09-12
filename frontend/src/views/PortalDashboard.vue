<template>
  <div class="dashboard-view">
    <!-- ============================================================
         PORTAL TOP NAV
    ============================================================ -->
    <nav class="portal-nav" aria-label="Portal navigation">
      <div class="pnav-left">
        <router-link to="/" class="pnav-logo" aria-label="enterprise IT home">
          <div class="logo-dot" aria-hidden="true"></div>
          <div class="logo-text"><em>enterprise</em> <strong>IT</strong></div>
        </router-link>
        <span class="portal-badge" aria-label="Portal Badge">{{ user?.account_type === 'partner' ? 'Partner Portal' : 'Client Portal' }}</span>
      </div>
      <div class="pnav-right">
        <!-- Notifications -->
        <button class="pnav-icon-btn" aria-label="Notifications (3 unread)" title="Notifications">
          <i class="ti ti-bell" aria-hidden="true"></i>
          <span class="notif-dot" aria-hidden="true"></span>
        </button>
        <!-- Help -->
        <button class="pnav-icon-btn" aria-label="Help" title="Help & Support" @click="activeTab = 'support'">
          <i class="ti ti-help-circle" aria-hidden="true"></i>
        </button>
        <div class="pnav-divider" aria-hidden="true"></div>
        <!-- User -->
        <div class="user-btn" role="button" aria-label="User account menu" tabindex="0">
          <div class="user-avatar" aria-hidden="true">{{ userInitials }}</div>
          <div>
            <div class="user-name">{{ user ? user.name || 'Client User' : 'James Mitchell' }}</div>
            <div class="user-org">{{ user ? user.organisation || 'Acme Corporation' : 'Acme Corporation' }}</div>
          </div>
        </div>
        <!-- Sign out -->
        <button class="logout-btn" @click="logout" aria-label="Sign out of the portal" :disabled="loggingOut">
          <i class="ti ti-logout" aria-hidden="true"></i>{{ loggingOut ? 'Signing Out...' : 'Sign Out' }}
        </button>
      </div>
    </nav>

    <div class="app-layout">
      <!-- ============================================================
           SIDEBAR
      ============================================================ -->
      <aside class="sidebar" aria-label="Portal navigation">
        <div class="sb-section">
          <div class="sb-section-label">Overview</div>
          <a href="#" class="sb-link" :class="{ active: activeTab === 'dashboard' }" @click.prevent="activeTab = 'dashboard'">
            <i class="ti ti-layout-dashboard" aria-hidden="true"></i>Dashboard
          </a>
        </div>

        <div class="sb-section">
          <div class="sb-section-label">Operations</div>
          <a v-if="user?.account_type !== 'partner'" href="#" class="sb-link" :class="{ active: activeTab === 'assets' }" @click.prevent="activeTab = 'assets'">
            <i class="ti ti-box" aria-hidden="true"></i>
            My Assets
            <span class="sb-count">1,248</span>
          </a>
          <a href="#" class="sb-link" :class="{ active: activeTab === 'compliance' }" @click.prevent="activeTab = 'compliance'">
            <i class="ti ti-shield-check" aria-hidden="true"></i>
            Compliance
            <span class="sb-count" style="background: #dcfce7; color: #16a34a;">100%</span>
          </a>
          <a href="#" class="sb-link" :class="{ active: activeTab === 'support' }" @click.prevent="activeTab = 'support'">
            <i class="ti ti-headset" aria-hidden="true"></i>
            Support
            <span class="sb-count amber">{{ tickets.filter(t => t.status !== 'Resolved').length }}</span>
          </a>
        </div>

        <div class="sb-section">
          <div class="sb-section-label">Documents</div>
          <a v-if="user?.account_type !== 'partner'" href="#" class="sb-link" :class="{ active: activeTab === 'documents' && activeFolder === 'certificates' }" @click.prevent="selectDocumentFolder('certificates')">
            <i class="ti ti-certificate" aria-hidden="true"></i>
            Certificates of Destruction
            <span class="sb-count">{{ activeDocs.certificates.length }}</span>
          </a>
          <a href="#" class="sb-link" :class="{ active: activeTab === 'documents' && activeFolder === 'audits' }" @click.prevent="selectDocumentFolder('audits')">
            <i class="ti ti-clipboard-check" aria-hidden="true"></i>
            Audit Reports
            <span class="sb-count">{{ activeDocs.audits.length }}</span>
          </a>
          <a v-if="user?.account_type !== 'partner'" href="#" class="sb-link" :class="{ active: activeTab === 'documents' && activeFolder === 'invoices' }" @click.prevent="selectDocumentFolder('invoices')">
            <i class="ti ti-file-invoice" aria-hidden="true"></i>
            Invoices
            <span class="sb-count amber">{{ activeDocs.invoices.length }}</span>
          </a>
          <a v-if="user?.account_type !== 'client'" href="#" class="sb-link" :class="{ active: activeTab === 'documents' && activeFolder === 'projects' }" @click.prevent="selectDocumentFolder('projects')">
            <i class="ti ti-folder" aria-hidden="true"></i>
            Project Documentation
            <span class="sb-count">{{ activeDocs.projects.length }}</span>
          </a>
        </div>

        <div class="sb-spacer"></div>

        <!-- Session security notice -->
        <div class="sb-bottom">
          <div class="sb-session-info" role="note" aria-label="Session security status">
            <i class="ti ti-shield-lock" aria-hidden="true"></i>
            <div class="sb-session-text">
              <strong>Secure session active</strong><br>
              HttpOnly cookie · OIDC authenticated
            </div>
          </div>
        </div>
      </aside>

      <!-- ============================================================
           MAIN CONTENT
      ============================================================ -->
      <main class="main" id="main-content">
        <!-- Session security notice banner -->
        <div class="session-notice fade-up" id="session-notice" role="status" aria-live="polite">
          <i class="ti ti-shield-check" aria-hidden="true"></i>
          <span><strong>Secure session established.</strong> You are authenticated via Microsoft Entra ID. Your session is protected by an HttpOnly, Secure cookie.</span>
          <button class="session-notice-close" onclick="document.getElementById('session-notice').style.display='none'" aria-label="Dismiss security notice">
            <i class="ti ti-x" aria-hidden="true"></i>
          </button>
        </div>

        <!-- ════════ TABS ════════ -->

        <!-- 1. DASHBOARD OVERVIEW -->
        <div v-if="activeTab === 'dashboard'" class="animate-fade-in">
          <!-- Welcome bar -->
          <div class="welcome-bar fade-up" style="transition-delay:.05s;">
            <div class="wb-left">
              <div class="wb-greeting">{{ timeGreeting }}</div>
              <div class="wb-name">Welcome back, {{ user ? user.name || 'Client' : 'James' }}.</div>
              <div class="wb-org">{{ user ? user.organisation || 'Acme Corporation' : 'Acme Corporation' }} · {{ user?.account_type === 'partner' ? 'Partner' : 'Client' }} since 2024</div>
            </div>
            <div class="wb-right">
              <div class="wb-stat">
                <div class="wb-stat-num">{{ totalDocsCount }}</div>
                <div class="wb-stat-label">Total documents</div>
              </div>
              <div class="wb-stat">
                <div class="wb-stat-num">3</div>
                <div class="wb-stat-label">New this month</div>
              </div>
              <div class="wb-stat">
                <div class="wb-stat-num">2</div>
                <div class="wb-stat-label">Pending invoices</div>
              </div>
            </div>
          </div>

          <!-- Summary stats -->
          <div class="stat-row fade-up" style="transition-delay:.1s;" aria-label="Document summary">
            <div v-if="user?.account_type !== 'partner'" class="stat-card" @click="selectDocumentFolder('certificates')" style="cursor:pointer;">
              <div class="stat-card-icon navy"><i class="ti ti-certificate" aria-hidden="true"></i></div>
              <div class="stat-num">{{ activeDocs.certificates.length }}</div>
              <div class="stat-label">Certificates of Destruction</div>
            </div>
            <div class="stat-card" @click="selectDocumentFolder('audits')" style="cursor:pointer;">
              <div class="stat-card-icon green"><i class="ti ti-clipboard-check" aria-hidden="true"></i></div>
              <div class="stat-num">{{ activeDocs.audits.length }}</div>
              <div class="stat-label">Audit Reports</div>
            </div>
            <div v-if="user?.account_type !== 'partner'" class="stat-card" @click="selectDocumentFolder('invoices')" style="cursor:pointer;">
              <div class="stat-card-icon amber"><i class="ti ti-file-invoice" aria-hidden="true"></i></div>
              <div class="stat-num">{{ activeDocs.invoices.length }}</div>
              <div class="stat-label">Invoices Outstanding</div>
            </div>
            <div v-if="user?.account_type !== 'client'" class="stat-card" @click="selectDocumentFolder('projects')" style="cursor:pointer;">
              <div class="stat-card-icon slate"><i class="ti ti-folder" aria-hidden="true"></i></div>
              <div class="stat-num">{{ activeDocs.projects.length }}</div>
              <div class="stat-label">Project Documents</div>
            </div>
          </div>

          <!-- Document Repository -->
          <div class="sec-head fade-up" style="transition-delay:.14s;">
            <div class="sec-h">Document Repository</div>
          </div>

          <div class="folder-grid fade-up" style="transition-delay:.18s;" aria-label="Document folders">
            <!-- Folder 1: Certificates of Destruction -->
            <div v-if="user?.account_type !== 'partner'" class="folder-card" id="sec-cod">
              <div class="folder-head cod" role="heading" aria-level="3">
                <div class="folder-icon"><i class="ti ti-certificate" aria-hidden="true"></i></div>
                <div>
                  <div class="folder-title">Certificates of Destruction</div>
                  <div class="folder-count">{{ activeDocs.certificates.length }} documents · to NIST 800-88 standards</div>
                </div>
              </div>
              <div class="folder-body" role="list" aria-label="Certificates of destruction">
                <div v-for="doc in activeDocs.certificates.slice(0, 3)" :key="doc.id" class="file-row" role="listitem" @click="downloadDocument(doc)">
                  <div class="file-icon pdf"><i class="ti ti-file-type-pdf" aria-hidden="true"></i></div>
                  <div class="file-name" :title="doc.name">{{ doc.name }}</div>
                  <span class="file-badge ready">Ready</span>
                  <div class="file-meta">{{ doc.date }}</div>
                  <button class="file-dl" :aria-label="'Download ' + doc.name" :disabled="downloadingId === doc.id">
                    <i v-if="downloadingId === doc.id" class="ti ti-loader-2 spin-animation" aria-hidden="true"></i>
                    <i v-else class="ti ti-download" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
              <button class="folder-viewall" aria-label="View all certificates of destruction" @click="selectDocumentFolder('certificates')">
                View all {{ activeDocs.certificates.length }} certificates <i class="ti ti-arrow-right" aria-hidden="true"></i>
              </button>
            </div>

            <!-- Folder 2: Audit Reports -->
            <div class="folder-card" id="sec-audit">
              <div class="folder-head audit" role="heading" aria-level="3">
                <div class="folder-icon"><i class="ti ti-clipboard-check" aria-hidden="true"></i></div>
                <div>
                  <div class="folder-title">Audit Reports</div>
                  <div class="folder-count">{{ activeDocs.audits.length }} documents · ISO 27001 &amp; ESG aligned</div>
                </div>
              </div>
              <div class="folder-body" role="list" aria-label="Audit reports">
                <div v-for="doc in activeDocs.audits.slice(0, 3)" :key="doc.id" class="file-row" role="listitem" @click="downloadDocument(doc)">
                  <div class="file-icon" :class="getFileIconClass(doc.name)"><i class="ti" :class="getFileIcon(doc.name)" aria-hidden="true"></i></div>
                  <div class="file-name" :title="doc.name">{{ doc.name }}</div>
                  <span class="file-badge new">New</span>
                  <div class="file-meta">{{ doc.date }}</div>
                  <button class="file-dl" :aria-label="'Download ' + doc.name" :disabled="downloadingId === doc.id">
                    <i v-if="downloadingId === doc.id" class="ti ti-loader-2 spin-animation" aria-hidden="true"></i>
                    <i v-else class="ti ti-download" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
              <button class="folder-viewall" aria-label="View all audit reports" @click="selectDocumentFolder('audits')">
                View all {{ activeDocs.audits.length }} reports <i class="ti ti-arrow-right" aria-hidden="true"></i>
              </button>
            </div>

            <!-- Folder 3: Invoices -->
            <div v-if="user?.account_type !== 'partner'" class="folder-card" id="sec-invoice">
              <div class="folder-head invoice" role="heading" aria-level="3">
                <div class="folder-icon"><i class="ti ti-file-invoice" aria-hidden="true"></i></div>
                <div>
                  <div class="folder-title">Invoices</div>
                  <div class="folder-count">{{ activeDocs.invoices.length }} outstanding · 6 total</div>
                </div>
              </div>
              <div class="folder-body" role="list" aria-label="Invoices">
                <div v-for="doc in activeDocs.invoices.slice(0, 3)" :key="doc.id" class="file-row" role="listitem" @click="downloadDocument(doc)">
                  <div class="file-icon pdf"><i class="ti ti-file-type-pdf" aria-hidden="true"></i></div>
                  <div class="file-name" :title="doc.name">{{ doc.name }}</div>
                  <span class="file-badge overdue" :style="{ background: doc.status === 'Paid' ? '#dcfce7' : '', color: doc.status === 'Paid' ? '#16a34a' : '' }">
                    {{ doc.status === 'Paid' ? 'Paid' : 'Due 30 Jun' }}
                  </span>
                  <div class="file-meta">{{ doc.date }}</div>
                  <button class="file-dl" :aria-label="'Download ' + doc.name" :disabled="downloadingId === doc.id">
                    <i v-if="downloadingId === doc.id" class="ti ti-loader-2 spin-animation" aria-hidden="true"></i>
                    <i v-else class="ti ti-download" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
              <button class="folder-viewall" aria-label="View all invoices" @click="selectDocumentFolder('invoices')">
                View all {{ activeDocs.invoices.length }} invoices <i class="ti ti-arrow-right" aria-hidden="true"></i>
              </button>
            </div>

            <!-- Folder 4: Project Documentation -->
            <div v-if="user?.account_type !== 'client'" class="folder-card" id="sec-project">
              <div class="folder-head project" role="heading" aria-level="3">
                <div class="folder-icon"><i class="ti ti-folder-open" aria-hidden="true"></i></div>
                <div>
                  <div class="folder-title">Project Documentation</div>
                  <div class="folder-count">{{ activeDocs.projects.length }} documents across 3 projects</div>
                </div>
              </div>
              <div class="folder-body" role="list" aria-label="Project documentation">
                <div v-for="doc in activeDocs.projects.slice(0, 3)" :key="doc.id" class="file-row" role="listitem" @click="downloadDocument(doc)">
                  <div class="file-icon" :class="getFileIconClass(doc.name)"><i class="ti" :class="getFileIcon(doc.name)" aria-hidden="true"></i></div>
                  <div class="file-name" :title="doc.name">{{ doc.name }}</div>
                  <span class="file-badge ready">Ready</span>
                  <div class="file-meta">{{ doc.date }}</div>
                  <button class="file-dl" :aria-label="'Download ' + doc.name" :disabled="downloadingId === doc.id">
                    <i v-if="downloadingId === doc.id" class="ti ti-loader-2 spin-animation" aria-hidden="true"></i>
                    <i v-else class="ti ti-download" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
              <!-- Upload zone -->
              <div class="upload-zone" role="button" tabindex="0" aria-label="Upload new document to project documentation" title="Upload document" @click="triggerUpload">
                <i class="ti ti-cloud-upload" aria-hidden="true"></i>
                <div class="upload-zone-text"><strong>Upload document</strong><br>Drag &amp; drop or click to browse</div>
              </div>
              <button class="folder-viewall" aria-label="View all project documentation" @click="selectDocumentFolder('projects')">
                View all {{ activeDocs.projects.length }} documents <i class="ti ti-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </div><!-- /folder-grid -->

          <!-- BOTTOM SECTION: Activity + Quick Actions -->
          <div class="bottom-grid fade-up" style="transition-delay:.22s;">
            <!-- Activity feed -->
            <div class="activity-card" aria-labelledby="activity-heading">
              <div class="activity-head">
                <div class="activity-title" id="activity-heading">Recent Activity</div>
              </div>
              <div class="activity-body" role="log" aria-label="Recent portal activity">
                <div class="activity-row">
                  <div class="act-dot green" aria-hidden="true"></div>
                  <div class="act-text"><strong>New document added:</strong> Certificate_of_Destruction_ENT-2026-A1.txt uploaded by enterprise IT</div>
                  <div class="act-time">2h ago</div>
                </div>
                <div class="activity-row">
                  <div class="act-dot green" aria-hidden="true"></div>
                  <div class="act-text"><strong>ESG Report ready:</strong> ESG_Report_AcmeCorp_Q2-2025.pdf is available for download</div>
                  <div class="act-time">4 days ago</div>
                </div>
                <div class="activity-row">
                  <div class="act-dot amber" aria-hidden="true"></div>
                  <div class="act-text"><strong>Invoice due:</strong> INV-2025-0148 is due on 30 June 2025</div>
                  <div class="act-time">5 days ago</div>
                </div>
                <div class="activity-row">
                  <div class="act-dot navy" aria-hidden="true"></div>
                  <div class="act-text"><strong>Document updated:</strong> SOC_Deployment_Scope_v3.docx — version 3 uploaded</div>
                  <div class="act-time">6 days ago</div>
                </div>
                <div class="activity-row">
                  <div class="act-dot green" aria-hidden="true"></div>
                  <div class="act-text"><strong>New project pack:</strong> ITAD_Batch47_Evidence_Pack.zip added to Project Documentation</div>
                  <div class="act-time">1 week ago</div>
                </div>
                <div class="activity-row">
                  <div class="act-dot slate" aria-hidden="true"></div>
                  <div class="act-text"><strong>Session opened:</strong> Portal accessed from Adelaide, SA (Microsoft Entra ID)</div>
                  <div class="act-time">Just now</div>
                </div>
              </div>
            </div>

            <!-- Quick actions -->
            <div class="qa-card" aria-labelledby="qa-heading">
              <div class="qa-head">
                <div class="qa-title" id="qa-heading">Quick Actions</div>
              </div>
              <div class="qa-body">
                <router-link to="/contact#quote" class="qa-btn" aria-label="Submit a new quote request">
                  <div class="qa-btn-icon navy"><i class="ti ti-file-invoice" aria-hidden="true"></i></div>
                  <div>
                    <div class="qa-btn-text">New Quote Request</div>
                    <div class="qa-btn-sub">24-hour response</div>
                  </div>
                  <i class="ti ti-arrow-right qa-arrow" aria-hidden="true"></i>
                </router-link>
                <router-link to="/contact#urgent" class="qa-btn" aria-label="Raise an urgent data recovery request">
                  <div class="qa-btn-icon amber"><i class="ti ti-alert-triangle" aria-hidden="true"></i></div>
                  <div>
                    <div class="qa-btn-text">Urgent Data Recovery</div>
                    <div class="qa-btn-sub">Priority escalation</div>
                  </div>
                  <i class="ti ti-arrow-right qa-arrow" aria-hidden="true"></i>
                </router-link>
                <button class="qa-btn" @click="activeTab = 'support'" aria-label="Contact the enterprise IT support team">
                  <div class="qa-btn-icon slate"><i class="ti ti-headset" aria-hidden="true"></i></div>
                  <div>
                    <div class="qa-btn-text">Open Support Ticket</div>
                    <div class="qa-btn-sub">Adelaide CBD team</div>
                  </div>
                  <i class="ti ti-arrow-right qa-arrow" aria-hidden="true"></i>
                </button>
                <button class="qa-btn" @click="downloadAllDocuments" aria-label="Download all documents as a ZIP archive">
                  <div class="qa-btn-icon green"><i class="ti ti-download" aria-hidden="true"></i></div>
                  <div>
                    <div class="qa-btn-text">Download All</div>
                    <div class="qa-btn-sub">Export as ZIP archive</div>
                  </div>
                  <i class="ti ti-arrow-right qa-arrow" aria-hidden="true"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. DOCUMENTS REPOSITORY DETAIL -->
        <div v-else-if="activeTab === 'documents'" class="animate-fade-in">
          <div class="sec-head mb-4" style="border-bottom: 1px solid #e2e8f0; padding-bottom:14px; margin-bottom: 24px;">
            <div>
              <button class="sec-action" @click="activeTab = 'dashboard'" style="margin-bottom:10px;">
                <i class="ti ti-arrow-left" aria-hidden="true"></i> Back to Dashboard
              </button>
              <h1 class="wb-name" style="color: #002366; font-size: 24px; font-weight: 800;">{{ currentFolderTitle }}</h1>
            </div>
            <div class="d-flex gap-2">
              <div class="search-input-wrap">
                <input type="text" v-model="documentSearch" placeholder="Search files..." class="ob-input text-xs" style="width: 200px; color:#1a2233; border-color:#cbd5e1; background:#fff;" />
              </div>
              <button v-if="activeFolder === 'projects'" class="ob-btn text-xs" style="padding: 6px 12px; height: 38px;" @click="triggerUpload">
                <i class="ti ti-upload" aria-hidden="true"></i> Upload
              </button>
            </div>
          </div>

          <div v-if="loading" class="text-center py-5">
            <div class="spinner mx-auto mb-3"></div>
            <p class="text-xs text-slate-dark">Streaming repository metadata...</p>
          </div>

          <div v-else class="document-list-table bg-white border-light p-4">
            <div class="table-responsive">
              <table class="w-100 text-left">
                <thead>
                  <tr class="border-bottom">
                    <th class="pb-2 text-xs font-bold text-slate-dark uppercase-heading">File Name</th>
                    <th class="pb-2 text-xs font-bold text-slate-dark uppercase-heading">Upload Date</th>
                    <th class="pb-2 text-xs font-bold text-slate-dark uppercase-heading">File Size</th>
                    <th class="pb-2 text-xs font-bold text-slate-dark text-right uppercase-heading">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="doc in filteredFolderDocs" :key="doc.id" class="border-bottom-row">
                    <td class="py-3 text-sm font-bold text-navy d-flex align-center gap-2">
                      <div class="file-icon" :class="getFileIconClass(doc.name)"><i class="ti" :class="getFileIcon(doc.name)" aria-hidden="true"></i></div>
                      <span class="file-link-name">{{ doc.name }}</span>
                    </td>
                    <td class="py-3 text-sm text-slate-dark">{{ doc.date }}</td>
                    <td class="py-3 text-sm text-slate-dark">{{ doc.size }}</td>
                    <td class="py-3 text-right">
                      <button @click="downloadDocument(doc)" class="btn btn-outline-slate text-xs" :disabled="downloadingId === doc.id">
                        <i v-if="downloadingId === doc.id" class="ti ti-loader-2 spin-animation mr-1" aria-hidden="true"></i>
                        {{ downloadingId === doc.id ? 'Downloading...' : 'Download' }}
                      </button>
                    </td>
                  </tr>
                  <tr v-if="filteredFolderDocs.length === 0">
                    <td colspan="4" class="py-5 text-center text-sm text-slate-dark">No documents match the search criteria.</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- 3. MY ASSETS TAB -->
        <div v-else-if="activeTab === 'assets'" class="animate-fade-in">
          <div class="sec-head mb-4">
            <div>
              <h1 class="wb-name" style="color: #002366; font-size: 24px; font-weight: 800;">Hardware Assets Inventory</h1>
              <p class="wb-org" style="color:#708090;">Real-time status tracking and lifecycle management of your IT assets.</p>
            </div>
            <button class="btn btn-outline-slate text-xs d-flex align-center gap-2" @click="exportAssetsCSV">
              <i class="ti ti-download" aria-hidden="true"></i> Export CSV
            </button>
          </div>

          <!-- Assets Summary Cards -->
          <div class="summary-grid mb-5">
            <div class="summary-card text-center">
              <h4 class="mb-2 text-xs uppercase-heading text-slate-dark">Total Assets</h4>
              <div class="font-title font-bold text-2xl text-navy">1,248</div>
            </div>
            <div class="summary-card text-center">
              <h4 class="mb-2 text-xs uppercase-heading text-slate-dark">Active &amp; In Use</h4>
              <div class="font-title font-bold text-2xl text-green">982</div>
            </div>
            <div class="summary-card text-center">
              <h4 class="mb-2 text-xs uppercase-heading text-slate-dark">In Transit (Logistics)</h4>
              <div class="font-title font-bold text-2xl" style="color: #3b82f6;">45</div>
            </div>
            <div class="summary-card text-center">
              <h4 class="mb-2 text-xs uppercase-heading text-slate-dark">Decommissioned (ITAD)</h4>
              <div class="font-title font-bold text-2xl text-slate-dark">221</div>
            </div>
          </div>

          <!-- Inventory List -->
          <div class="document-list-table bg-white border-light p-4">
            <div class="d-flex justify-between align-center mb-4 flex-wrap gap-3">
              <h3 class="m-0 font-bold" style="font-size:15px; color:#002366;">Assets Registry</h3>
              <div class="d-flex gap-2">
                <div style="position: relative; width: 250px;">
                  <i class="ti ti-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); width: 14px; height: 14px; color:#708090;" aria-hidden="true"></i>
                  <input type="text" v-model="assetSearch" class="ob-input text-xs" placeholder="Search by name, ID or serial..." style="padding-left: 32px; color:#1a2233; border-color:#cbd5e1; background:#fff;" />
                </div>
                <select v-model="assetFilter" class="ob-input text-xs" style="width: 140px; color:#1a2233; border-color:#cbd5e1; background:#fff; padding:6px 12px;">
                  <option value="All">All Statuses</option>
                  <option value="Active">Active</option>
                  <option value="In Transit">In Transit</option>
                  <option value="Eradicating">Eradicating</option>
                  <option value="Retired">Retired</option>
                </select>
              </div>
            </div>

            <div class="table-responsive">
              <table class="w-100 text-left">
                <thead>
                  <tr class="border-bottom">
                    <th class="pb-2 text-xs font-bold text-slate-dark uppercase-heading">Asset ID</th>
                    <th class="pb-2 text-xs font-bold text-slate-dark uppercase-heading">Device Details</th>
                    <th class="pb-2 text-xs font-bold text-slate-dark uppercase-heading">Location</th>
                    <th class="pb-2 text-xs font-bold text-slate-dark uppercase-heading">Status</th>
                    <th class="pb-2 text-xs font-bold text-slate-dark text-right uppercase-heading">Lifecycle Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="asset in filteredAssets" :key="asset.id" class="border-bottom-row">
                    <td class="py-3 text-sm font-bold text-navy">{{ asset.id }}</td>
                    <td class="py-3 text-sm">
                      <div class="font-bold text-navy">{{ asset.name }}</div>
                      <div class="text-xs text-slate-dark">{{ asset.type }} &bull; {{ asset.serial }}</div>
                    </td>
                    <td class="py-3 text-sm text-slate-dark">{{ asset.location }}</td>
                    <td class="py-3 text-sm">
                      <span class="badge" :class="{
                        'badge-active': asset.status === 'Active',
                        'badge-transit': asset.status === 'In Transit',
                        'badge-eradicating': asset.status === 'Eradicating',
                        'badge-retired': asset.status === 'Retired'
                      }">{{ asset.status }}</span>
                    </td>
                    <td class="py-3 text-right">
                      <button 
                        v-if="asset.status === 'Active'" 
                        @click="requestAssetAction(asset, 'Decommission & Sanitise')"
                        class="btn btn-outline-slate text-xs"
                      >
                        Request ITAD
                      </button>
                      <button 
                        v-else-if="asset.status === 'In Transit'" 
                        @click="requestAssetAction(asset, 'Track GPS')"
                        class="btn btn-outline-slate text-xs"
                      >
                        Track GPS
                      </button>
                      <span v-else class="text-xs text-slate-dark font-bold">Processed</span>
                    </td>
                  </tr>
                  <tr v-if="filteredAssets.length === 0">
                    <td colspan="5" class="py-4 text-center text-sm text-slate-dark">No assets match the search criteria.</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- 4. COMPLIANCE TAB -->
        <div v-else-if="activeTab === 'compliance'" class="animate-fade-in">
          <div class="sec-head mb-4">
            <div>
              <h1 class="wb-name" style="color: #002366; font-size: 24px; font-weight: 800;">Compliance &amp; Data Sovereignty Center</h1>
              <p class="wb-org" style="color:#708090;">Verification metrics and compliance standards alignment logs.</p>
            </div>
          </div>

          <!-- Compliance Summary Cards -->
          <div class="summary-grid mb-5">
            <div class="summary-card text-center">
              <h4 class="mb-2 text-xs uppercase-heading text-slate-dark">Data Erasure Standard</h4>
              <div class="font-title font-bold text-2xl text-navy">NIST SP 800-88</div>
            </div>
            <div class="summary-card text-center">
              <h4 class="mb-2 text-xs uppercase-heading text-slate-dark">Erasure Compliance</h4>
              <div class="font-title font-bold text-2xl text-green">100% Verified</div>
            </div>
            <div class="summary-card text-center">
              <h4 class="mb-2 text-xs uppercase-heading text-slate-dark">ESG Recycling Rate</h4>
              <div class="font-title font-bold text-2xl text-green">98.4%</div>
            </div>
            <div class="summary-card text-center">
              <h4 class="mb-2 text-xs uppercase-heading text-slate-dark">Next Audit Scheduled</h4>
              <div class="font-title font-bold text-sm text-navy mt-2" style="font-size: 13px;">15-Jul-2026</div>
            </div>
          </div>

          <!-- Security Alert Box -->
          <div class="alert-box-premium p-4 border-light d-flex align-center gap-3">
            <i class="ti ti-shield-lock" style="font-size: 32px; color: #002366;" aria-hidden="true"></i>
            <div>
              <h4 class="m-0 font-bold text-navy mb-1" style="font-size: 14px;">Data Sovereignty Enforced</h4>
              <p class="text-xs text-slate-dark m-0" style="font-size: 12px; line-height: 1.5;">All logistics and sanitisation logs are digitally sealed and hosted locally within Adelaide, Australia in compliance with ASD DSM and ISM standards.</p>
            </div>
          </div>
        </div>

        <!-- 5. SUPPORT TAB -->
        <div v-else-if="activeTab === 'support'" class="animate-fade-in">
          <div class="sec-head mb-4">
            <div>
              <h1 class="wb-name" style="color: #002366; font-size: 24px; font-weight: 800;">Operations &amp; Support Centre</h1>
              <p class="wb-org" style="color:#708090;">Submit service provisioning requests, asset collections, or contact support.</p>
            </div>
          </div>

          <div class="support-grid">
            <!-- Submit Ticket Card -->
            <div class="document-list bg-white border-light p-4">
              <h3 class="mb-4 font-bold" style="font-size:15px; color:#002366;">Open Support Ticket / Operations Request</h3>
              
              <form @submit.prevent="submitTicket" novalidate>
                <div class="form-group mb-3">
                  <label class="text-xs font-bold text-slate-dark mb-1 d-block">Request Subject <span class="req">*</span></label>
                  <input 
                    type="text" 
                    v-model="ticketForm.subject" 
                    class="ob-input text-xs" 
                    placeholder="e.g., Request collection for 15 server drives from Adelaide HQ" 
                    required 
                    style="color:#1a2233; border-color:#cbd5e1; background:#fff;"
                  />
                </div>

                <div class="d-flex gap-2 mb-3">
                  <div class="flex-1">
                    <label class="text-xs font-bold text-slate-dark mb-1 d-block">Category</label>
                    <select v-model="ticketForm.category" class="ob-input text-xs" style="color:#1a2233; border-color:#cbd5e1; background:#fff; padding:8px 12px; height: 38px;">
                      <option value="Logistics">Logistics &amp; Decommissioning</option>
                      <option value="ITAD">ITAD Sanitisation &amp; Eradication</option>
                      <option value="Portal">Portal Access &amp; Account Management</option>
                      <option value="Other">General Support Query</option>
                    </select>
                  </div>

                  <div class="flex-1">
                    <label class="text-xs font-bold text-slate-dark mb-1 d-block">Urgency Level</label>
                    <select v-model="ticketForm.priority" class="ob-input text-xs" style="color:#1a2233; border-color:#cbd5e1; background:#fff; padding:8px 12px; height: 38px;">
                      <option value="Low">Low - Informational</option>
                      <option value="Medium">Medium - Standard Request</option>
                      <option value="High">High - Urgent SLA Action</option>
                    </select>
                  </div>
                </div>

                <div class="form-group mb-4">
                  <label class="text-xs font-bold text-slate-dark mb-1 d-block">Detailed Description <span class="req">*</span></label>
                  <textarea 
                    v-model="ticketForm.description" 
                    class="ob-input text-xs" 
                    rows="4" 
                    placeholder="Please specify asset IDs, locations, contact person details, and security requirements..." 
                    required
                    style="color:#1a2233; border-color:#cbd5e1; background:#fff; resize:vertical; min-height: 100px; padding:12px;"
                  ></textarea>
                </div>

                <button type="submit" class="ob-btn w-100 font-bold d-flex justify-center align-center gap-2" :disabled="submittingTicket" style="height: 42px;">
                  <i v-if="submittingTicket" class="ti ti-loader-2 spin-animation" aria-hidden="true"></i>
                  <i v-else class="ti ti-send" aria-hidden="true"></i>
                  {{ submittingTicket ? 'Submitting Request...' : 'Submit Ticket' }}
                </button>
              </form>

              <div v-if="ticketSubmitted" class="mt-3 text-xs text-green font-bold text-center d-flex align-center justify-center gap-2" style="margin-top:14px;">
                <i class="ti ti-circle-check" style="color: #10b981; font-size:16px;" aria-hidden="true"></i> Operations request submitted successfully!
              </div>
            </div>

            <!-- Active Tickets List -->
            <div class="document-list bg-white border-light p-4">
              <h3 class="mb-4 font-bold" style="font-size:15px; color:#002366;">Active Support Tickets</h3>
              
              <div class="ticket-list-container d-flex flex-direction-column gap-3">
                <div v-for="t in tickets" :key="t.id" class="p-3 border-light border-radius-sm" style="border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 12px; padding:16px;">
                  <div class="d-flex justify-between align-center mb-2">
                    <span class="text-xs font-bold text-navy">{{ t.id }}</span>
                    <span class="badge" :style="{
                      backgroundColor: t.status === 'Resolved' ? '#dcfce7' : '#e0f2fe',
                      color: t.status === 'Resolved' ? '#16a34a' : '#0369a1'
                    }">{{ t.status }}</span>
                  </div>
                  <h5 class="m-0 text-sm font-bold text-navy mb-1" style="font-size: 13px; line-height: 1.4; text-align: left;">{{ t.subject }}</h5>
                  <div class="text-xs text-slate-dark d-flex justify-between mt-2" style="font-size: 11px; margin-top:8px;">
                    <span>Category: {{ t.category }}</span>
                    <span>{{ t.date }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div><!-- /app-layout -->
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted, nextTick } from 'vue';
import { useRouter } from 'vue-router';
import { API_BASE_URL } from '../config';

const router = useRouter();

const user = ref(null);
const loading = ref(true);
const loggingOut = ref(false);
const downloadingId = ref(null);

// Navigation & Tabs State
const activeTab = ref('dashboard');
const activeFolder = ref('certificates');

// Document Lists State
const documents = ref({});
const documentSearch = ref('');

// Support Ticket Form State
const ticketForm = reactive({
  subject: '',
  category: 'Logistics',
  priority: 'Medium',
  description: ''
});
const submittingTicket = ref(false);
const ticketSubmitted = ref(false);
const tickets = ref([
  { id: 'TKT-9902', subject: 'GPS-tracked transit request for Adelaide server racks', category: 'Logistics', priority: 'High', status: 'Pending Support', date: '2026-06-05' },
  { id: 'TKT-9811', subject: 'NIST drive erasure audit certificate request', category: 'ITAD', priority: 'Medium', status: 'Resolved', date: '2026-05-20' }
]);

// Assets Registry State
const assetSearch = ref('');
const assetFilter = ref('All');
const assets = ref([
  { id: 'AST-5021', name: 'Precision Workstation 5820', type: 'Workstation', serial: 'S/N: 9F2G7H1', location: 'Adelaide HQ', status: 'Active' },
  { id: 'AST-4012', name: 'PowerEdge R750 Server', type: 'Server', serial: 'S/N: 3K4L5M6', location: 'Melbourne Datacentre', status: 'Active' },
  { id: 'AST-2911', name: 'Cisco Catalyst 9300 Switch', type: 'Network', serial: 'S/N: 7P8Q9R0', location: 'Adelaide HQ', status: 'In Transit' },
  { id: 'AST-1034', name: 'Latitude 7420 Laptop', type: 'Laptop', serial: 'S/N: 1A2B3C4', location: 'Remote Work', status: 'Eradicating' },
  { id: 'AST-0992', name: 'OptiPlex 7080 Desktop', type: 'Desktop', serial: 'S/N: 5D6E7F8', location: 'Adelaide HQ', status: 'Retired' }
]);

// Fallback Documents List
const mockDocuments = {
  certificates: [
    { id: 'cert-101', name: 'CoD_AcmeCorp_Batch47_2025-06.pdf', size: '124.5 KB', date: '2026-06-14', content: 'CERTIFICATE OF DESTRUCTION\n\nClient: Acme Corp\nBatch: 47\nStandard applied: NIST 800-88 Rev 1' },
    { id: 'cert-102', name: 'CoD_AcmeCorp_Batch46_2025-04.pdf', size: '141.2 KB', date: '2026-04-03', content: 'CERTIFICATE OF DESTRUCTION\n\nClient: Acme Corp\nBatch: 46\nStandard applied: NIST 800-88 Rev 1' },
    { id: 'cert-103', name: 'CoD_AcmeCorp_Batch45_2025-01.pdf', size: '118.9 KB', date: '2026-01-18', content: 'CERTIFICATE OF DESTRUCTION\n\nClient: Acme Corp\nBatch: 45\nStandard applied: NIST 800-88 Rev 1' }
  ],
  audits: [
    { id: 'audit-201', name: 'ESG_Report_AcmeCorp_Q2-2025.pdf', size: '348.4 KB', date: '2026-06-10', content: 'ENVIRONMENTAL, SOCIAL, AND GOVERNANCE (ESG) DISPOSAL REPORT\n\nAcme Corp Q2 2025' },
    { id: 'audit-202', name: 'AssetAudit_AcmeCorp_2025-Q1.xlsx', size: '1.2 MB', date: '2026-04-02', content: 'ACME CORP HARDWARE INVENTORY AUDIT SPREADSHEET' },
    { id: 'audit-203', name: 'ISO27001_Controls_Alignment_2026.pdf', size: '2.4 MB', date: '2025-12-15', content: 'ISO/IEC 27001:2022 INFORMATION SECURITY — CONTROLS ALIGNMENT SUMMARY' }
  ],
  invoices: [
    { id: 'inv-301', name: 'INV-2025-0148_AcmeCorp.pdf', size: '18.9 KB', date: '2026-06-01', status: 'Pending', content: 'enterprise IT INVOICE\n\nInvoice: INV-2025-0148\nAmount: $4,582.00\nDue Date: 30 June 2026' },
    { id: 'inv-302', name: 'INV-2025-0131_AcmeCorp.pdf', size: '22.4 KB', date: '2026-05-15', status: 'Pending', content: 'enterprise IT INVOICE\n\nInvoice: INV-2025-0131\nAmount: $12,940.00\nDue Date: 15 June 2026' },
    { id: 'inv-303', name: 'INV-2025-0112_AcmeCorp.pdf', size: '16.7 KB', date: '2026-04-01', status: 'Paid', content: 'enterprise IT INVOICE\n\nInvoice: INV-2025-0112\nAmount: $8,700.00\nStatus: PAID' }
  ],
  projects: [
    { id: 'proj-401', name: 'SOC_Deployment_Scope_v3.docx', size: '48.2 KB', date: '2026-06-12', content: 'STATEMENT OF WORK: 24/7 Managed Detection (Sentinel SOC) Deployment Scope v3' },
    { id: 'proj-402', name: 'ITAD_Batch47_Evidence_Pack.zip', size: '8.4 MB', date: '2026-06-14', content: 'ITAD DECOMMISSIONING SERIAL AUDIT PHOTO LOGS AND ERASURE CERTIFICATE PACK' },
    { id: 'proj-403', name: 'DeviceRegister_AcmeCorp_Jun2025.xlsx', size: '245.8 KB', date: '2026-06-08', content: 'ACME CORP ACTIVE HARDWARE DEVICE REGISTER SPREADSHEET' }
  ]
};

// Computed Properties
const userInitials = computed(() => {
  if (user.value && user.value.name) {
    return user.value.name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);
  }
  return 'JM';
});

const timeGreeting = computed(() => {
  const hour = new Date().getHours();
  return hour < 12 ? 'Good morning' : hour < 17 ? 'Good afternoon' : 'Good evening';
});

const activeDocs = computed(() => {
  const role = user.value?.account_type || 'client';
  
  const certs = role === 'partner' ? [] : (documents.value.certificates || mockDocuments.certificates);
  const audits = documents.value.audits || mockDocuments.audits;
  const invoices = role === 'partner' ? [] : (documents.value.invoices || mockDocuments.invoices);
  const projects = role === 'client' ? [] : (documents.value.projects || mockDocuments.projects);

  return {
    certificates: certs,
    audits: audits,
    invoices: invoices,
    projects: projects
  };
});

const totalDocsCount = computed(() => {
  return activeDocs.value.certificates.length +
         activeDocs.value.audits.length +
         activeDocs.value.invoices.length +
         activeDocs.value.projects.length;
});

const currentFolderTitle = computed(() => {
  switch (activeFolder.value) {
    case 'certificates': return 'Certificates of Destruction';
    case 'audits': return 'Audit Reports';
    case 'invoices': return 'Invoices Repository';
    case 'projects': return 'Project Documentation';
    default: return 'Documents List';
  }
});

const filteredFolderDocs = computed(() => {
  const list = activeDocs.value[activeFolder.value] || [];
  if (!documentSearch.value.trim()) return list;
  return list.filter(d => d.name.toLowerCase().includes(documentSearch.value.toLowerCase()));
});

const filteredAssets = computed(() => {
  return assets.value.filter(a => {
    const matchesSearch = a.name.toLowerCase().includes(assetSearch.value.toLowerCase()) || 
                          a.id.toLowerCase().includes(assetSearch.value.toLowerCase()) ||
                          a.serial.toLowerCase().includes(assetSearch.value.toLowerCase());
    const matchesFilter = assetFilter.value === 'All' || a.status === assetFilter.value;
    return matchesSearch && matchesFilter;
  });
});

// Operations / Methods
const selectDocumentFolder = (folderName) => {
  activeFolder.value = folderName;
  activeTab.value = 'documents';
  documentSearch.value = '';
};

const getFileIconClass = (filename) => {
  const ext = filename.split('.').pop().toLowerCase();
  if (ext === 'pdf') return 'pdf';
  if (ext === 'xlsx' || ext === 'xls') return 'xlsx';
  if (ext === 'docx' || ext === 'doc') return 'doc';
  if (ext === 'zip' || ext === 'rar') return 'zip';
  return 'doc';
};

const getFileIcon = (filename) => {
  const ext = filename.split('.').pop().toLowerCase();
  if (ext === 'pdf') return 'ti-file-type-pdf';
  if (ext === 'xlsx' || ext === 'xls') return 'ti-file-spreadsheet';
  if (ext === 'docx' || ext === 'doc') return 'ti-file-text';
  if (ext === 'zip' || ext === 'rar') return 'ti-file-zip';
  return 'ti-file';
};

const triggerUpload = () => {
  alert('Integrator action trigger: Opening document upload dialog. Uploads post to /api/portal/documents/upload, validated against Entra ID scope permissions.');
};

const downloadAllDocuments = () => {
  alert('Exporting zip package containing all current client certificates and audit packs.');
};

const exportAssetsCSV = () => {
  alert('Generating comma-separated values export of your active hardware inventory registry.');
};

const requestAssetAction = (asset, action) => {
  alert(`Operations request logged: Decommission payload AST-${asset.id}. Support ticket opened in reference.`);
};

// Check Cookie Session status
const checkSession = async () => {
  try {
    const response = await fetch(`${API_BASE_URL}/api/auth/user`, {
      credentials: 'include'
    });
    
    if (response.status === 401) {
      localStorage.removeItem('auth_user');
      router.push('/login');
      return;
    }
    
    const resData = await response.json();
    if (resData.authenticated) {
      user.value = resData.user;
    } else {
      localStorage.removeItem('auth_user');
      router.push('/login');
    }
  } catch (error) {
    console.warn("Backend auth verification check failed, reading localStorage:", error);
    const savedUser = localStorage.getItem('auth_user');
    if (savedUser) {
      user.value = JSON.parse(savedUser);
    } else {
      router.push('/login');
    }
  }
};

// Fetch client documents
const fetchDocuments = async () => {
  loading.value = true;
  try {
    const response = await fetch(`${API_BASE_URL}/api/documents`, {
      credentials: 'include'
    });
    
    if (response.status === 401) {
      localStorage.removeItem('auth_user');
      router.push('/login');
      return;
    }
    
    const resData = await response.json();
    if (resData.success && resData.data) {
      documents.value = resData.data;
    }
  } catch (error) {
    console.warn("Failed fetching backend documents, utilizing local mock repository:", error);
  } finally {
    loading.value = false;
  }
};

// Download secure file
const downloadDocument = async (doc) => {
  downloadingId.value = doc.id;
  try {
    const response = await fetch(`${API_BASE_URL}/api/documents/${doc.id}/download`, {
      credentials: 'include'
    });
    
    if (response.status === 401) {
      localStorage.removeItem('auth_user');
      router.push('/login');
      return;
    }
    
    if (response.ok) {
      const blob = await response.blob();
      const url = window.URL.createObjectURL(blob);
      const link = document.createElement('a');
      link.href = url;
      link.setAttribute('download', doc.name);
      document.body.appendChild(link);
      link.click();
      link.remove();
      window.URL.revokeObjectURL(url);
    } else {
      throw new Error("Backend file stream failed.");
    }
  } catch (error) {
    console.warn("Using client-side dynamic backup download generation:", error);
    // Generate mock text file payload so demo always functions
    const content = doc.content || `enterprise IT Pty Ltd\nSecure Client Document\nFilename: ${doc.name}\nGenerated: ${doc.date}`;
    const blob = new Blob([content], { type: 'text/plain' });
    const url = window.URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', doc.name);
    document.body.appendChild(link);
    link.click();
    link.remove();
    window.URL.revokeObjectURL(url);
  } finally {
    setTimeout(() => { downloadingId.value = null; }, 500);
  }
};

// Submit Support Ticket
const submitTicket = async () => {
  if (!ticketForm.subject.trim() || !ticketForm.description.trim()) {
    return;
  }
  submittingTicket.value = true;
  setTimeout(() => {
    tickets.value.unshift({
      id: `TKT-${Math.floor(10000 + Math.random() * 90000)}`,
      subject: ticketForm.subject,
      category: ticketForm.category,
      priority: ticketForm.priority,
      status: 'Pending Support',
      date: new Date().toISOString().split('T')[0]
    });
    ticketForm.subject = '';
    ticketForm.description = '';
    submittingTicket.value = false;
    ticketSubmitted.value = true;
    setTimeout(() => { ticketSubmitted.value = false; }, 3000);
  }, 1000);
};

// Logout
const logout = async () => {
  loggingOut.value = true;
  try {
    await fetch(`${API_BASE_URL}/api/auth/logout`, { 
      method: 'POST',
      headers: {
        'Accept': 'application/json'
      },
      credentials: 'include'
    });
  } catch (e) {
    console.warn("Log out request error:", e);
  } finally {
    localStorage.removeItem('auth_user');
    loggingOut.value = false;
    router.push('/login');
  }
};

onMounted(async () => {
  await checkSession();
  fetchDocuments();

  if (user.value?.account_type === 'partner') {
    activeFolder.value = 'projects';
  } else {
    activeFolder.value = 'certificates';
  }

  // Scroll Fade-up trigger
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
.dashboard-view {
  background: #f2f4f8;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  color: #444c5c;
  width: 100%;
}

/* ============================================================
   PORTAL TOP NAV
============================================================ */
.portal-nav {
  background: #002366;
  height: 58px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 24px;
  position: sticky;
  top: 0;
  z-index: 200;
  border-bottom: 1px solid rgba(255, 255, 255, 0.07);
}
.pnav-left {
  display: flex;
  align-items: center;
  gap: 10px;
}
.pnav-logo {
  display: flex;
  align-items: center;
  gap: 9px;
  text-decoration: none;
}
.logo-dot {
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
.logo-text {
  font-size: 17px;
  color: #fff;
  letter-spacing: -0.3px;
  text-align: left;
}
.logo-text em {
  font-style: normal;
  font-weight: 300;
}
.logo-text strong {
  font-weight: 800;
  text-transform: uppercase;
}
.portal-badge {
  background: rgba(112, 128, 144, 0.25);
  border: 0.5px solid rgba(112, 128, 144, 0.35);
  color: rgba(255, 255, 255, 0.55);
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  padding: 3px 9px;
  border-radius: 4px;
}
.pnav-right {
  display: flex;
  align-items: center;
  gap: 10px;
}
.pnav-icon-btn {
  width: 34px;
  height: 34px;
  border-radius: 7px;
  background: rgba(255, 255, 255, 0.07);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgba(255, 255, 255, 0.65);
  cursor: pointer;
  transition: background .15s;
  position: relative;
  outline: none;
}
.pnav-icon-btn:hover {
  background: rgba(255, 255, 255, 0.12);
}
.pnav-icon-btn i {
  font-size: 16px;
}
.notif-dot {
  position: absolute;
  top: 6px;
  right: 6px;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #d97706;
  border: 1.5px solid #002366;
}
.pnav-divider {
  width: 1px;
  height: 20px;
  background: rgba(255, 255, 255, 0.12);
  margin: 0 4px;
}
.user-btn {
  display: flex;
  align-items: center;
  gap: 9px;
  background: rgba(255, 255, 255, 0.07);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  padding: 5px 12px 5px 7px;
  cursor: pointer;
  transition: background .15s;
  text-align: left;
}
.user-btn:hover {
  background: rgba(255, 255, 255, 0.12);
}
.user-avatar {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 700;
  color: #fff;
  flex-shrink: 0;
}
.user-name {
  font-size: 12.5px;
  font-weight: 600;
  color: #fff;
}
.user-org {
  font-size: 10px;
  color: rgba(255, 255, 255, 0.45);
}
.logout-btn {
  display: flex;
  align-items: center;
  gap: 5px;
  background: none;
  border: 0.5px solid rgba(255, 255, 255, 0.2);
  color: rgba(255, 255, 255, 0.6);
  font-size: 11.5px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 6px;
  transition: color .15s, border-color .15s;
  cursor: pointer;
}
.logout-btn:hover {
  color: #fff;
  border-color: rgba(255, 255, 255, 0.4);
}
.logout-btn i {
  font-size: 13px;
}

/* ============================================================
   LAYOUT — sidebar + main
============================================================ */
.app-layout {
  display: grid;
  grid-template-columns: 220px 1fr;
  min-height: calc(100vh - 58px);
}

/* ============================================================
   SIDEBAR
============================================================ */
.sidebar {
  background: #fff;
  border-right: 0.5px solid #e2e5ec;
  padding: 20px 0;
  position: sticky;
  top: 58px;
  height: calc(100vh - 58px);
  overflow-y: auto;
  display: flex;
  flex-direction: column;
}
.sidebar::-webkit-scrollbar {
  width: 3px;
}
.sidebar::-webkit-scrollbar-thumb {
  background: #dde1e9;
  border-radius: 2px;
}
.sb-section {
  margin-bottom: 6px;
  text-align: left;
}
.sb-section-label {
  font-size: 9px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: #b0b8c8;
  padding: 8px 18px 4px;
}
.sb-link {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 9px 18px;
  cursor: pointer;
  font-size: 13px;
  font-weight: 500;
  color: #6b7280;
  border-left: 2px solid transparent;
  transition: color .15s, background .15s, border-color .15s;
  text-decoration: none;
  text-align: left;
}
.sb-link:hover {
  color: #002366;
  background: #f7f8fb;
}
.sb-link.active {
  color: #002366;
  background: #eef2fb;
  border-left-color: #002366;
  font-weight: 600;
}
.sb-link i {
  font-size: 17px;
  flex-shrink: 0;
}
.sb-count {
  margin-left: auto;
  background: #e8eef8;
  color: #002366;
  font-size: 10px;
  font-weight: 700;
  padding: 2px 7px;
  border-radius: 10px;
}
.sb-count.amber {
  background: #fef3c7;
  color: #d97706;
}
.sb-spacer {
  flex: 1;
}
.sb-bottom {
  padding: 14px 18px;
  border-top: 0.5px solid #f0f3f7;
}
.sb-session-info {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  background: #f0f4fa;
  border-radius: 7px;
  padding: 10px 12px;
  text-align: left;
}
.sb-session-info i {
  font-size: 14px;
  color: #4ade80;
  flex-shrink: 0;
  margin-top: 1px;
}
.sb-session-text {
  font-size: 10.5px;
  color: #708090;
  line-height: 1.4;
}
.sb-session-text strong {
  color: #002366;
}

/* ============================================================
   MAIN CONTENT
============================================================ */
.main {
  padding: 28px 28px 48px;
  text-align: left;
  box-sizing: border-box;
}

/* Welcome bar */
.welcome-bar {
  background: #002366;
  border-radius: 12px;
  padding: 22px 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 24px;
  position: relative;
  overflow: hidden;
  text-align: left;
}
.welcome-bar::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(112,128,144,0.04) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(112,128,144,0.04) 1px, transparent 1px);
  background-size: 32px 32px;
  pointer-events: none;
}
.wb-left {
  position: relative;
  z-index: 1;
}
.wb-greeting {
  font-size: 11px;
  color: rgba(255,255,255,0.45);
  letter-spacing: 0.5px;
  margin-bottom: 4px;
}
.wb-name {
  font-size: 18px;
  font-weight: 800;
  color: #fff;
  letter-spacing: -0.3px;
}
.wb-org {
  font-size: 12px;
  color: rgba(255,255,255,0.5);
  margin-top: 2px;
}
.wb-right {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
  position: relative;
  z-index: 1;
}
.wb-stat {
  text-align: center;
  padding: 0 14px;
}
.wb-stat+.wb-stat {
  border-left: 0.5px solid rgba(255,255,255,0.1);
}
.wb-stat-num {
  font-size: 20px;
  font-weight: 800;
  color: #fff;
  letter-spacing: -0.5px;
}
.wb-stat-label {
  font-size: 10px;
  color: rgba(255,255,255,0.42);
  margin-top: 2px;
}

/* Summary stat cards row */
.stat-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 12px;
  margin-bottom: 24px;
}
.stat-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 10px;
  padding: 16px 18px;
  transition: transform .2s;
  text-align: left;
}
.stat-card:hover {
  transform: translateY(-2px);
}
.stat-card-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 12px;
}
.stat-card-icon.navy {
  background: #e8eef8;
}
.stat-card-icon.navy i {
  font-size: 18px;
  color: #002366;
}
.stat-card-icon.green {
  background: #dcfce7;
}
.stat-card-icon.green i {
  font-size: 18px;
  color: #16a34a;
}
.stat-card-icon.amber {
  background: #fef3c7;
}
.stat-card-icon.amber i {
  font-size: 18px;
  color: #d97706;
}
.stat-card-icon.slate {
  background: #f0f3f7;
}
.stat-card-icon.slate i {
  font-size: 18px;
  color: #708090;
}
.stat-num {
  font-size: 22px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -0.5px;
}
.stat-label {
  font-size: 11.5px;
  color: #708090;
  margin-top: 3px;
}

/* Section heading */
.sec-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 14px;
}
.sec-h {
  font-size: 15px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -0.2px;
}
.sec-action {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 12px;
  font-weight: 600;
  color: #708090;
  background: none;
  border: none;
  transition: color .15s;
  cursor: pointer;
  padding: 0;
}
.sec-action:hover {
  color: #002366;
}
.sec-action i {
  font-size: 13px;
}

/* ============================================================
   FOLDER CARDS (document repository)
============================================================ */
.folder-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 14px;
  margin-bottom: 28px;
}
.folder-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  transition: transform .2s, box-shadow .2s;
  text-align: left;
}
.folder-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 24px rgba(0,35,102,0.08);
}
.folder-head {
  padding: 16px 18px;
  display: flex;
  align-items: center;
  gap: 12px;
  text-align: left;
}
.folder-head.cod {
  background: linear-gradient(135deg, #002366, #1a3a6e);
}
.folder-head.audit {
  background: linear-gradient(135deg, #16a34a, #15803d);
}
.folder-head.invoice {
  background: linear-gradient(135deg, #d97706, #b45309);
}
.folder-head.project {
  background: linear-gradient(135deg, #708090, #5a6878);
}
.folder-icon {
  width: 38px;
  height: 38px;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.folder-icon i {
  font-size: 20px;
  color: #fff;
}
.folder-title {
  font-size: 13px;
  font-weight: 700;
  color: #fff;
}
.folder-count {
  font-size: 11px;
  color: rgba(255,255,255,0.6);
  margin-top: 2px;
}

/* File list inside folder */
.folder-body {
  padding: 4px 0;
}
.file-row {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 18px;
  border-bottom: 0.5px solid #f5f7fa;
  transition: background .12s;
  cursor: pointer;
  text-align: left;
}
.file-row:last-child {
  border-bottom: none;
}
.file-row:hover {
  background: #fafbfd;
}
.file-icon {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-size: 15px;
}
.file-icon.pdf {
  background: #fef2f2;
}
.file-icon.pdf i {
  color: #ef4444;
}
.file-icon.xlsx {
  background: #f0fdf4;
}
.file-icon.xlsx i {
  color: #16a34a;
}
.file-icon.doc {
  background: #eff6ff;
}
.file-icon.doc i {
  color: #3b82f6;
}
.file-icon.zip {
  background: #fefce8;
}
.file-icon.zip i {
  color: #d97706;
}
.file-name {
  font-size: 12.5px;
  font-weight: 600;
  color: #1a2233;
  flex: 1;
  min-width: 0;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  text-align: left;
}
.file-meta {
  font-size: 11px;
  color: #b0b8c8;
  white-space: nowrap;
}
.file-badge {
  font-size: 10px;
  font-weight: 700;
  padding: 2px 7px;
  border-radius: 10px;
  white-space: nowrap;
}
.file-badge.new {
  background: #dcfce7;
  color: #16a34a;
}
.file-badge.ready {
  background: #e8eef8;
  color: #002366;
}
.file-badge.overdue {
  background: #fef3c7;
  color: #d97706;
}
.file-dl {
  width: 28px;
  height: 28px;
  border-radius: 5px;
  background: #f0f3f7;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  cursor: pointer;
  transition: background .12s;
  color: #708090;
}
.file-dl:hover {
  background: #e8eef8;
  color: #002366;
}
.file-dl i {
  font-size: 14px;
}

/* Folder view all button */
.folder-viewall {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
  padding: 11px;
  border-top: 0.5px solid #f5f7fa;
  font-size: 12px;
  font-weight: 600;
  color: #708090;
  cursor: pointer;
  background: none;
  border-bottom: none;
  border-left: none;
  border-right: none;
  width: 100%;
  transition: color .15s, background .15s;
  border-radius: 0 0 12px 12px;
}
.folder-viewall:hover {
  color: #002366;
  background: #fafbfd;
}
.folder-viewall i {
  font-size: 13px;
}

/* ============================================================
   ACTIVITY FEED + QUICK ACTIONS
============================================================ */
.bottom-grid {
  display: grid;
  grid-template-columns: 1fr 260px;
  gap: 16px;
}

/* Activity */
.activity-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  text-align: left;
}
.activity-head {
  padding: 14px 18px;
  border-bottom: 0.5px solid #f0f3f7;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.activity-title {
  font-size: 13.5px;
  font-weight: 700;
  color: #002366;
}
.activity-body {
  padding: 4px 0;
}
.activity-row {
  display: flex;
  align-items: flex-start;
  gap: 11px;
  padding: 11px 18px;
  border-bottom: 0.5px solid #f8f9fb;
}
.activity-row:last-child {
  border-bottom: none;
}
.act-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  flex-shrink: 0;
  margin-top: 5px;
}
.act-dot.green {
  background: #4ade80;
}
.act-dot.navy {
  background: #002366;
}
.act-dot.amber {
  background: #d97706;
}
.act-dot.slate {
  background: #708090;
}
.act-text {
  font-size: 12.5px;
  color: #444c5c;
  line-height: 1.45;
  flex: 1;
  text-align: left;
}
.act-text strong {
  color: #002366;
  font-weight: 600;
}
.act-time {
  font-size: 11px;
  color: #b0b8c8;
  white-space: nowrap;
  flex-shrink: 0;
  margin-top: 2px;
}

/* Quick actions */
.qa-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
}
.qa-head {
  padding: 14px 18px;
  border-bottom: 0.5px solid #f0f3f7;
  text-align: left;
}
.qa-title {
  font-size: 13.5px;
  font-weight: 700;
  color: #002366;
}
.qa-body {
  padding: 10px 12px;
  display: flex;
  flex-direction: column;
  gap: 8px;
}
.qa-btn {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 12px;
  border-radius: 8px;
  border: 0.5px solid #dde1e9;
  background: #f7f8fb;
  cursor: pointer;
  transition: background .15s, border-color .15s;
  text-align: left;
  width: 100%;
  box-sizing: border-box;
}
.qa-btn:hover {
  background: #eef2fb;
  border-color: #b0bad0;
}
.qa-btn-icon {
  width: 30px;
  height: 30px;
  border-radius: 7px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.qa-btn-icon i {
  font-size: 16px;
}
.qa-btn-icon.navy {
  background: #e8eef8;
}
.qa-btn-icon.navy i {
  color: #002366;
}
.qa-btn-icon.amber {
  background: #fef3c7;
}
.qa-btn-icon.amber i {
  color: #d97706;
}
.qa-btn-icon.green {
  background: #dcfce7;
}
.qa-btn-icon.green i {
  color: #16a34a;
}
.qa-btn-icon.slate {
  background: #f0f3f7;
}
.qa-btn-icon.slate i {
  color: #708090;
}
.qa-btn-text {
  font-size: 12.5px;
  font-weight: 600;
  color: #002366;
}
.qa-btn-sub {
  font-size: 10.5px;
  color: #708090;
  margin-top: 1px;
}
.qa-btn i.qa-arrow {
  font-size: 14px;
  color: #b0b8c8;
  margin-left: auto;
  flex-shrink: 0;
}

/* ============================================================
   UPLOAD DROP ZONE (inside folder)
============================================================ */
.upload-zone {
  margin: 10px 16px 12px;
  border: 1.5px dashed #dde1e9;
  border-radius: 8px;
  padding: 14px 12px;
  text-align: center;
  cursor: pointer;
  transition: border-color .15s, background .15s;
}
.upload-zone:hover {
  border-color: #002366;
  background: #f7f9fe;
}
.upload-zone i {
  font-size: 20px;
  color: #b0b8c8;
  margin-bottom: 5px;
}
.upload-zone-text {
  font-size: 11.5px;
  color: #708090;
  line-height: 1.4;
}
.upload-zone-text strong {
  color: #002366;
}

/* ============================================================
   SESSION COOKIE NOTICE (top of main)
============================================================ */
.session-notice {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #eef9f0;
  border: 0.5px solid #bbf7d0;
  border-radius: 8px;
  padding: 10px 14px;
  margin-bottom: 20px;
  font-size: 12px;
  color: #16a34a;
  text-align: left;
}
.session-notice i {
  font-size: 16px;
  flex-shrink: 0;
}
.session-notice span {
  line-height: 1.4;
}
.session-notice strong {
  font-weight: 700;
}
.session-notice-close {
  margin-left: auto;
  font-size: 16px;
  color: #86efac;
  background: none;
  border: none;
  cursor: pointer;
  flex-shrink: 0;
  transition: color .15s;
}
.session-notice-close:hover {
  color: #16a34a;
}

/* ============================================================
   FADE UP
============================================================ */
.fade-up {
  opacity: 0;
  transform: translateY(14px);
  transition: opacity .45s ease, transform .45s ease;
}
.fade-up.visible {
  opacity: 1;
  transform: translateY(0);
}

/* ============================================================
   V1 ADAPTED TABS (Assets, Compliance, Support)
============================================================ */
.animate-fade-in {
  animation: fadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

.text-2xl {
  font-size: 24px;
}
.text-green {
  color: #16a34a;
}
.text-blue {
  color: #3b82f6;
}

/* Summary Grid */
.summary-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
  margin-bottom: 24px;
}
.summary-card {
  background-color: #ffffff;
  padding: 24px 20px;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
  text-align: center;
}

/* Document / Asset Tables */
.document-list-table {
  background: #ffffff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
}
.table-responsive {
  width: 100%;
  overflow-x: auto;
}
table {
  width: 100%;
  border-collapse: collapse;
}
th {
  border-bottom: 1.5px solid #e2e8f0;
  padding: 12px 16px;
  font-weight: 700;
  font-size: 11px;
  color: #708090;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}
td {
  padding: 14px 16px;
  font-size: 13px;
  color: #444c5c;
}
.border-bottom-row {
  border-bottom: 0.5px solid #f0f3f7;
  transition: background .12s;
}
.border-bottom-row:last-child {
  border-bottom: none;
}
.border-bottom-row:hover {
  background: #fafbfd;
}
.file-link-name {
  color: #002366;
  font-weight: 600;
}

/* Status Badges */
.badge {
  display: inline-block;
  padding: 3px 9px;
  border-radius: 9999px;
  font-size: 10.5px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.badge-active {
  background-color: #dcfce7;
  color: #16a34a;
}
.badge-transit {
  background-color: #fef3c7;
  color: #d97706;
}
.badge-eradicating {
  background-color: #fee2e2;
  color: #dc2626;
  border: 1px dashed #ef4444;
}
.badge-retired {
  background-color: #f3f4f6;
  color: #4b5563;
}

/* Compliance Alert Box */
.alert-box-premium {
  background: #ffffff;
  border: 0.5px solid #dde1e9;
  border-left: 4px solid #002366;
  padding: 20px;
  border-radius: 8px;
  text-align: left;
}

/* Support Tab Grid */
.support-grid {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: 16px;
}

/* Form controls in Support tab */
.form-group label {
  font-weight: 600;
  color: #002366;
}
.form-control {
  width: 100%;
  box-sizing: border-box;
}

.ticket-list-container {
  max-height: 480px;
  overflow-y: auto;
}

.spin-animation {
  animation: spin 0.8s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width: 1024px){
  .app-layout {
    grid-template-columns: 200px 1fr;
  }
  .stat-row, .summary-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .bottom-grid, .support-grid {
    grid-template-columns: 1fr;
  }
}
@media(max-width: 768px){
  .app-layout {
    grid-template-columns: 1fr;
  }
  .sidebar {
    display: none;
  }
  .main {
    padding: 20px 16px 40px;
  }
  .folder-grid {
    grid-template-columns: 1fr;
  }
  .welcome-bar {
    flex-direction: column;
    align-items: flex-start;
  }
  .wb-right {
    flex-wrap: wrap;
    margin-top: 14px;
  }
}
@media(max-width: 480px){
  .stat-row, .summary-grid {
    grid-template-columns: 1fr;
  }
  .portal-nav {
    padding: 0 16px;
  }
  .user-name, .user-org {
    display: none;
  }
}
</style>
