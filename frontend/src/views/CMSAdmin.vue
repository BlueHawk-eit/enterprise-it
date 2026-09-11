<template>
  <div class="cms-admin-view">
    <!-- TOPBAR -->
    <div class="topbar">
      <div class="tb-logo">
        <em>enterprise</em> <strong>IT</strong><span class="tb-badge">CMS Admin</span>
      </div>
      <div class="tb-right">
        <div class="tb-env"><div class="tb-dot"></div><span>Live</span></div>
        <div class="tb-user">
          <div class="tb-avatar">{{ adminInitials }}</div>
          <div class="tb-uname">{{ adminUser ? adminUser.name : 'Admin' }}</div>
        </div>
      </div>
    </div>

    <div class="app">
      <!-- SIDEBAR -->
      <nav class="sidebar" id="sidebar">
        <div class="sb-sec">
          <div class="sb-sec-label">Main</div>
          <div
            class="sb-item"
            :class="{ active: currentPage === 'dashboard' }"
            @click="nav('dashboard')"
          >
            <i class="ti ti-layout-dashboard"></i><span>Dashboard</span>
          </div>
        </div>
        <div class="sb-sec">
          <div class="sb-sec-label">Content</div>
          <div
            class="sb-item"
            :class="{ active: currentPage === 'blog' }"
            @click="nav('blog')"
          >
            <i class="ti ti-article"></i><span>Blog Posts</span
            ><span class="sb-badge">{{ blogCount }}</span>
          </div>
          <div
            class="sb-item"
            :class="{ active: currentPage === 'news' }"
            @click="nav('news')"
          >
            <i class="ti ti-news"></i><span>News Articles</span
            ><span class="sb-badge">{{ newsCount }}</span>
          </div>
        </div>
        <div class="sb-div"></div>
        <div class="sb-sec">
          <div class="sb-sec-label">Assets</div>
          <div
            class="sb-item"
            :class="{ active: currentPage === 'media' }"
            @click="nav('media')"
          >
            <i class="ti ti-photo"></i><span>Media Library</span>
          </div>
        </div>
        <div class="sb-sec">
          <div class="sb-sec-label">Operations</div>
          <div
            class="sb-item"
            :class="{ active: currentPage === 'onboarding' }"
            @click="nav('onboarding')"
          >
            <i class="ti ti-user-plus"></i><span>Onboarding</span>
            <span class="sb-badge" v-if="pendingOnboardCount > 0" style="background: var(--amber);">{{ pendingOnboardCount }}</span>
          </div>
        </div>
        <div class="sb-sec">
          <div class="sb-sec-label">Developer</div>
          <div
            class="sb-item"
            :class="{ active: currentPage === 'export' }"
            @click="nav('export')"
          >
            <i class="ti ti-code"></i><span>Export / API</span>
          </div>
          <div
            class="sb-item"
            :class="{ active: currentPage === 'settings' }"
            @click="nav('settings')"
          >
            <i class="ti ti-settings"></i><span>Settings</span>
          </div>
          <div
            class="sb-item sb-item-logout"
            style="color: #ef4444; border-top: 1px solid rgba(255,255,255,0.05); margin-top: 10px; padding-top: 10px;"
            @click="logoutAdmin"
          >
            <i class="ti ti-logout" style="color: #ef4444;"></i><span>Sign Out</span>
          </div>
        </div>
        <div class="sb-bottom">
          <div class="sb-info">
            <i class="ti ti-shield-check"></i>
            <div class="sb-info-t">
              <strong>Database Connected</strong><br />Changes persist on server
            </div>
          </div>
        </div>
      </nav>

      <!-- MAIN CONTENT -->
      <main class="main" id="main-content">
        <!-- ==================== DASHBOARD PAGE ==================== -->
        <div v-if="currentPage === 'dashboard'" class="fade-in">
          <div class="sec-hdr">
            <div>
              <div class="sec-tag">Overview</div>
              <h1 class="sec-title">Content Dashboard</h1>
            </div>
            <div class="sec-btns">
              <button class="btn btn-primary" @click="navToEditor('blog')">
                <i class="ti ti-plus"></i>New Blog Post
              </button>
              <button class="btn btn-ghost" @click="navToEditor('news')">
                <i class="ti ti-plus"></i>New News Article
              </button>
            </div>
          </div>

          <div class="stats-row">
            <div class="stat-card">
              <div class="sc-top">
                <div class="sc-ico navy"><i class="ti ti-article"></i></div>
                <span class="sc-trend"
                  ><i class="ti ti-trending-up" style="font-size: 11px"></i>All
                  types</span
                >
              </div>
              <div class="sc-num">{{ posts.length }}</div>
              <div class="sc-label">Total Posts</div>
            </div>
            <div class="stat-card">
              <div class="sc-top">
                <div class="sc-ico green"><i class="ti ti-eye"></i></div>
                <span class="sc-trend">Live</span>
              </div>
              <div class="sc-num">{{ publishedCount }}</div>
              <div class="sc-label">Published</div>
            </div>
            <div class="stat-card">
              <div class="sc-top">
                <div class="sc-ico amber"><i class="ti ti-clock"></i></div>
                <span class="sc-trend" style="color: var(--amber)">Pending</span>
              </div>
              <div class="sc-num">{{ draftCount }}</div>
              <div class="sc-label">Drafts</div>
            </div>
            <div class="stat-card">
              <div class="sc-top">
                <div class="sc-ico slate"><i class="ti ti-chart-bar"></i></div>
                <span class="sc-trend"
                  ><i class="ti ti-trending-up" style="font-size: 11px"></i
                ></span>
              </div>
              <div class="sc-num">{{ demoViews.toLocaleString() }}</div>
              <div class="sc-label">Views (demo)</div>
            </div>
          </div>

          <div class="dash-grid">
            <div class="card">
              <div class="card-head">
                <div class="card-title">
                  <i class="ti ti-clock-hour-4"></i>Recent Posts
                </div>
                <div style="display: flex; gap: 6px">
                  <button class="btn btn-ghost btn-sm" @click="nav('blog')">
                    <i class="ti ti-article"></i>Blog
                  </button>
                  <button class="btn btn-ghost btn-sm" @click="nav('news')">
                    <i class="ti ti-news"></i>News
                  </button>
                </div>
              </div>
              <div class="card-body" style="padding: 4px 18px 14px">
                <div class="act-list">
                  <div
                    v-for="p in recentPosts"
                    :key="p.id"
                    class="act-item"
                  >
                    <div
                      class="act-dot"
                      :class="p.category === 'news' ? 'a' : 'g'"
                    ></div>
                    <div class="act-text">
                      <strong>{{ truncateString(p.title, 55) }}</strong><br />
                      <span style="font-size: 10.5px; color: var(--muted)">
                        {{ p.category.toUpperCase() }} · Published · {{ calculateReadTime(p.body) }} min read
                      </span>
                    </div>
                    <div class="act-time">{{ formatDate(p.published_at) }}</div>
                  </div>
                  <div v-if="recentPosts.length === 0" style="padding: 24px; text-align: center; color: var(--muted);">
                    No posts available.
                  </div>
                </div>
              </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 12px">
              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="ti ti-bulb"></i>SEO Quick Tips</div>
                </div>
                <div class="card-body">
                  <div
                    v-for="(tip, idx) in seoTips"
                    :key="idx"
                    style="
                      display: flex;
                      align-items: flex-start;
                      gap: 7px;
                      margin-bottom: 8px;
                      font-size: 12px;
                      color: var(--muted);
                    "
                  >
                    <i
                      :class="tip.icon"
                      :style="{ color: tip.color }"
                      style="font-size: 13px; flex-shrink: 0; margin-top: 1px"
                    ></i>
                    {{ tip.text }}
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="ti ti-photo"></i>Media Summary</div>
                </div>
                <div class="card-body">
                  <div
                    style="
                      display: grid;
                      grid-template-columns: 1fr 1fr;
                      gap: 8px;
                      margin-bottom: 11px;
                    "
                  >
                    <div
                      style="
                        background: var(--surface);
                        border-radius: var(--r6);
                        padding: 10px;
                        text-align: center;
                      "
                    >
                      <div
                        style="
                          font-size: 20px;
                          font-weight: 800;
                          color: var(--navy);
                        "
                      >
                        {{ posts.filter(p => p.image_url).length }}
                      </div>
                      <div style="font-size: 10.5px; color: var(--muted)">
                        With Cover
                      </div>
                    </div>
                    <div
                      style="
                        background: var(--surface);
                        border-radius: var(--r6);
                        padding: 10px;
                        text-align: center;
                      "
                    >
                      <div
                        style="
                          font-size: 20px;
                          font-weight: 800;
                          color: var(--navy);
                        "
                      >
                        {{ posts.filter(p => !p.image_url).length }}
                      </div>
                      <div style="font-size: 10.5px; color: var(--muted)">
                        No Cover
                      </div>
                    </div>
                  </div>
                  <button
                    class="btn btn-ghost btn-sm"
                    style="width: 100%; justify-content: center"
                    @click="nav('media')"
                  >
                    <i class="ti ti-photo"></i>Open Media Library
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ==================== LIST VIEW (BLOG or NEWS) ==================== -->
        <div v-if="currentPage === 'blog' || currentPage === 'news'" class="fade-in">
          <div class="sec-hdr">
            <div>
              <div class="sec-tag">Content Management</div>
              <h1 class="sec-title">
                {{ currentPage === 'blog' ? 'Blog Posts' : 'News Articles' }}
              </h1>
            </div>
            <div class="sec-btns">
              <button class="btn btn-primary" @click="navToEditor(currentPage)">
                <i class="ti ti-plus"></i>New {{ currentPage === 'blog' ? 'Blog' : 'News' }} Post
              </button>
            </div>
          </div>

          <div class="table-wrap">
            <div class="tbar">
              <div class="tsearch">
                <input
                  v-model="searchQuery"
                  :placeholder="'Search ' + (currentPage === 'blog' ? 'blog' : 'news') + ' posts...'"
                />
                <i class="ti ti-search"></i>
              </div>
              <div class="tfilters">
                <button
                  class="tfil"
                  :class="{ active: filterState === 'all' }"
                  @click="filterState = 'all'"
                >
                  All <span class="tfil-count">{{ filteredListCount }}</span>
                </button>
              </div>
            </div>

            <div v-if="filteredPosts.length === 0" class="empty-state">
              <div class="empty-ico"><i class="ti ti-article"></i></div>
              <div class="empty-title">No articles found</div>
              <div class="empty-desc">Create your first post using the button above.</div>
            </div>

            <table v-else>
              <thead>
                <tr>
                  <th style="width: 52px">Cover</th>
                  <th>Title</th>
                  <th style="width: 140px">Category</th>
                  <th style="width: 90px">Status</th>
                  <th style="width: 95px">Date</th>
                  <th style="width: 55px">Read</th>
                  <th style="width: 115px">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="p in filteredPosts" :key="p.id">
                  <td>
                    <img
                      v-if="p.image_url"
                      :src="p.image_url"
                      alt=""
                      class="t-thumb"
                    />
                    <div v-else class="t-thumb-ph">
                      <i class="ti ti-photo"></i>
                    </div>
                  </td>
                  <td>
                    <div class="t-title-wrap">
                      <div>
                        <div class="t-title">{{ p.title }}</div>
                        <div class="t-meta">
                          /resources/{{ p.category }}/{{ p.slug }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span
                      style="
                        display: flex;
                        align-items: center;
                        gap: 5px;
                        font-size: 12px;
                        font-weight: 600;
                        color: var(--navy);
                      "
                    >
                      <i class="ti ti-tag" style="font-size: 14px"></i>
                      {{ p.category }}
                    </span>
                  </td>
                  <td>
                    <span class="badge b-pub">Published</span>
                  </td>
                  <td style="font-size: 12px; color: var(--muted)">
                    {{ formatDate(p.published_at) }}
                  </td>
                  <td style="font-size: 12px; color: var(--muted)">
                    {{ calculateReadTime(p.body) }} min
                  </td>
                  <td>
                    <div class="row-acts">
                      <button
                        class="ico-btn"
                        title="Edit"
                        @click="editPost(p)"
                      >
                        <i class="ti ti-pencil"></i>
                      </button>
                      <button
                        class="ico-btn danger"
                        title="Delete"
                        @click="deletePost(p.id)"
                      >
                        <i class="ti ti-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- ==================== EDITOR PAGE ==================== -->
        <div v-if="currentPage === 'editor'" class="fade-in">
          <div class="sec-hdr">
            <div>
              <div class="sec-tag">{{ editorEditId ? 'Edit' : 'New' }} Post</div>
              <h1 class="sec-title">{{ editorEditId ? 'Modify Article' : 'Compose Content' }}</h1>
            </div>
            <div class="sec-btns">
              <button class="btn btn-ghost" @click="nav(editorPostType)">
                <i class="ti ti-arrow-left"></i>Cancel
              </button>
              <button class="btn btn-success" @click="savePost">
                <i class="ti ti-device-floppy"></i>Save Post
              </button>
            </div>
          </div>

          <div class="ed-layout">
            <div class="ed-main">
              <!-- CONTENT CARD -->
              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="ti ti-pencil"></i>Post Content</div>
                  <span class="badge b-blog">{{ editorPostType.toUpperCase() }}</span>
                </div>
                <div class="card-body">
                  <div class="fg">
                    <div class="flabel">
                      Title
                      <span class="flabel-hint"
                        >{{ form.title.length }}/60</span
                      >
                    </div>
                    <input
                      v-model="form.title"
                      class="fi"
                      placeholder="Enter a compelling, keyword-rich title..."
                    />
                    <div class="cbar">
                      <div class="cbar-info">
                        <span
                          :style="{
                            color:
                              form.title.length >= 30 && form.title.length <= 60
                                ? 'var(--green)'
                                : 'var(--amber)',
                          }"
                        >
                          {{ form.title.length }} —
                          {{
                            form.title.length >= 30 && form.title.length <= 60
                              ? '✓ Good'
                              : 'Too short / long'
                          }}
                        </span>
                        <span style="font-size: 10px; color: var(--light)"
                          >Target: 30–60</span
                        >
                      </div>
                      <div class="cbar-track">
                        <div
                          class="cbar-fill"
                          :class="{
                            good:
                              form.title.length >= 30 && form.title.length <= 60,
                            warn:
                              form.title.length < 30 || form.title.length > 60,
                          }"
                          :style="{
                            width: Math.min((form.title.length / 60) * 100, 100) + '%',
                          }"
                        ></div>
                      </div>
                    </div>
                  </div>

                  <div class="fg">
                    <div class="flabel">URL Slug</div>
                    <div class="slug-row">
                      <span class="slug-pre">/resources/{{ form.category }}/</span>
                      <input
                        v-model="form.slug"
                        class="fi slug-input"
                        placeholder="post-url-slug"
                        style="font-family: monospace; font-size: 13px"
                        disabled
                      />
                    </div>
                    <div
                      style="
                        font-size: 10.5px;
                        color: var(--muted);
                        margin-top: 4px;
                        display: flex;
                        align-items: center;
                        gap: 4px;
                      "
                    >
                      <i class="ti ti-refresh" style="font-size: 11px"></i
                      >Auto-generated from title
                    </div>
                  </div>

                  <div class="fg">
                    <div class="flabel">
                      Body Content
                      <span class="flabel-hint"
                        >{{ calculateReadTime(bodyPlain) }} min read</span
                      >
                    </div>
                    <RichEditor v-model="form.body" />
                    <div class="word-count">
                      <span>{{ bodyPlain.trim().split(/\s+/).filter(Boolean).length }} words</span>
                      <span>{{ calculateReadTime(bodyPlain) }} min read estimation</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- COVER IMAGE -->
              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="ti ti-photo"></i>Cover Image</div>
                </div>
                <div class="card-body">
                  <div class="fg">
                    <div class="flabel">Image URL</div>
                    <input
                      v-model="form.image_url"
                      class="fi"
                      placeholder="https://images.unsplash.com/... or relative path"
                    />
                  </div>
                  <div
                    v-if="form.image_url"
                    class="img-preview"
                    style="margin-top: 12px"
                  >
                    <img :src="form.image_url" alt="Cover preview" />
                  </div>
                </div>
              </div>
            </div>

            <!-- SIDE PANEL -->
            <div class="ed-side">
              <!-- LIVE PREVIEW CARD -->
              <div class="pv-wrap">
                <div class="pv-lbl"><i class="ti ti-eye"></i>Card Preview</div>
                <div class="pv-card">
                  <div class="pv-img" style="background: linear-gradient(135deg, #002366, #1a3a6e)">
                    <img v-if="form.image_url" :src="form.image_url" alt="" />
                    <i v-else class="ti ti-article"></i>
                    <div class="pv-cat-b">{{ form.category.toUpperCase() }}</div>
                  </div>
                  <div class="pv-body">
                    <div class="pv-meta">
                      <span class="pv-cat-l">{{ form.category }}</span>
                      <span class="pv-dot"></span>
                      <span>Today</span>
                      <span class="pv-dot"></span>
                      <span>{{ calculateReadTime(bodyPlain) }} min</span>
                    </div>
                    <div class="pv-h">
                      {{ form.title || 'Your article title will appear here...' }}
                    </div>
                    <div class="pv-ex" v-if="form.body" v-html="safeBody"></div>
                    <div class="pv-ex" v-else>Your text will show in preview here...</div>
                    <div class="pv-foot">
                      <div class="pv-author">
                        <div class="pv-av">AD</div>
                        <span class="pv-aname">Admin</span>
                      </div>
                      <span class="pv-link"
                        >Read <i class="ti ti-arrow-right" style="font-size: 11px"></i
                      ></span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- PUBLISH CONTROLS -->
              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="ti ti-send"></i>Publish Settings</div>
                </div>
                <div class="card-body">
                  <div class="fg">
                    <div class="flabel">Category Type</div>
                    <select v-model="form.category" class="fs">
                      <option value="blog">Blog Insights</option>
                      <option value="news">News Articles</option>
                      <option value="sustainability">Sustainability / ESG</option>
                    </select>
                  </div>
                  <div style="display: flex; flex-direction: column; gap: 7px; margin-top: 13px">
                    <button class="btn btn-success" style="width: 100%; justify-content: center" @click="savePost">
                      <i class="ti ti-send"></i>Save and Publish
                    </button>
                    <button class="btn btn-ghost" style="width: 100%; justify-content: center" @click="nav(editorPostType)">
                      Cancel
                    </button>
                    <button class="btn btn-ghost" style="width: 100%; justify-content: center" @click="openFullPreview" :disabled="!form.title && !form.body">
                      <i class="ti ti-external-link"></i>Open full preview
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ==================== MEDIA LIBRARY ==================== -->
        <div v-if="currentPage === 'media'" class="fade-in">
          <div class="sec-hdr">
            <div>
              <div class="sec-tag">Assets</div>
              <h1 class="sec-title">Media Library</h1>
            </div>
          </div>
          <div class="media-grid">
            <div v-for="p in posts.filter(x => x.image_url)" :key="p.id" class="med-item">
              <img :src="p.image_url" alt="" class="med-thumb" />
              <div class="med-info">
                <div class="med-name" :title="p.image_url">
                  {{ getFilename(p.image_url) }}
                </div>
                <div class="med-meta" style="color: var(--navy); font-weight: 500; margin-top: 2px">
                  {{ truncateString(p.title, 25) }}
                </div>
                <div class="med-acts">
                  <button class="med-btn" @click="copyToClipboard(p.image_url)">
                    Copy URL
                  </button>
                </div>
              </div>
            </div>
            <div v-if="posts.filter(x => x.image_url).length === 0" style="grid-column: span 4; text-align: center; padding: 48px; color: var(--muted);">
              No uploaded images in media library. Add images to blog posts first.
            </div>
          </div>
        </div>

        <!-- ==================== DEVELOPER / EXPORT ==================== -->
        <div v-if="currentPage === 'export'" class="fade-in">
          <div class="sec-hdr">
            <div>
              <div class="sec-tag">Developer Tools</div>
              <h1 class="sec-title">Export Post Data</h1>
            </div>
            <button class="btn btn-primary" @click="downloadJson">
              <i class="ti ti-download"></i>Download JSON
            </button>
          </div>
          <div class="card" style="margin-bottom: 14px">
            <div class="card-head">
              <div class="card-title">
                <i class="ti ti-code"></i>posts.json — API Structure
              </div>
              <div style="font-size: 11px; color: var(--muted)">
                {{ posts.length }} posts
              </div>
            </div>
            <div class="json-wrap" style="border-radius: 0 0 var(--r12) var(--r12)">
              <pre class="json-code">{{ JSON.stringify(posts, null, 2) }}</pre>
            </div>
          </div>
        </div>

        <!-- ==================== SETTINGS PAGE ==================== -->
        <div v-if="currentPage === 'settings'" class="fade-in">
          <div class="sec-hdr">
            <div>
              <div class="sec-tag">Configuration</div>
              <h1 class="sec-title">Settings</h1>
            </div>
          </div>
          <div class="settings-grid">
            <div
              v-for="s in settingsGroups"
              :key="s.title"
              class="card"
            >
              <div class="card-head">
                <div class="card-title">{{ s.title }}</div>
              </div>
              <div class="card-body">
                <div
                  v-for="f in s.fields"
                  :key="f[0]"
                  class="fg"
                  style="margin-bottom: 11px"
                >
                  <div class="flabel">{{ f[0] }}</div>
                  <input class="fi" :value="f[1]" />
                </div>
                <button
                  class="btn btn-primary btn-sm"
                  @click="triggerToast(s.title + ' saved successfully.', 'ok')"
                >
                  <i class="ti ti-device-floppy"></i>Save {{ s.title }}
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ==================== ONBOARDING REQUESTS PAGE ==================== -->
        <div v-if="currentPage === 'onboarding'" class="fade-in">
          <div class="sec-hdr">
            <div>
              <div class="sec-tag">Operations</div>
              <h1 class="sec-title">Onboarding Requests</h1>
            </div>
            <button class="btn btn-ghost" @click="fetchOnboardingRequests">
              <i class="ti ti-refresh" :class="{ 'spin-animation': loadingOnboard }"></i> Refresh
            </button>
          </div>

          <div class="table-wrap">
            <div v-if="onboardingRequests.length === 0" class="empty-state">
              <div class="empty-ico"><i class="ti ti-user-plus"></i></div>
              <div class="empty-title">No onboarding requests</div>
              <div class="empty-desc">New requests from clients and partners will appear here.</div>
            </div>

            <table v-else>
              <thead>
                <tr>
                  <th>Email Address</th>
                  <th>Organisation</th>
                  <th>Account Type</th>
                  <th>Status</th>
                  <th>Submitted At</th>
                  <th style="width: 140px; text-align: right;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="req in onboardingRequests" :key="req.id">
                  <td style="font-weight: 600; color: var(--navy)">{{ req.email }}</td>
                  <td>{{ req.organisation || 'N/A' }}</td>
                  <td>
                    <span class="badge" :class="req.account_type === 'partner' ? 'b-blog' : 'b-pub'">
                      {{ req.account_type === 'partner' ? 'Partner' : 'Client' }}
                    </span>
                  </td>
                  <td>
                    <span class="badge" :class="req.status === 'approved' ? 'b-pub' : 'b-draft'">
                      {{ req.status }}
                    </span>
                  </td>
                  <td style="font-size: 12px; color: var(--muted)">
                    {{ formatDate(req.created_at) }}
                  </td>
                  <td style="text-align: right;">
                    <button
                      v-if="req.status !== 'approved'"
                      class="btn btn-success btn-sm"
                      @click="approveRequest(req.id)"
                      :disabled="approvingId === req.id"
                      style="padding: 5px 10px; font-size: 11px;"
                    >
                      <i v-if="approvingId === req.id" class="ti ti-loader-2 spin-animation mr-1"></i>
                      <i v-else class="ti ti-check mr-1"></i>
                      Approve
                    </button>
                    <span v-else style="font-size: 11px; color: var(--green); font-weight: 700;">
                      <i class="ti ti-circle-check"></i> Approved
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>

    <!-- TOAST CONTAINER -->
    <div class="toast-ctr">
      <div
        v-for="t in activeToasts"
        :key="t.id"
        class="toast"
        :class="t.type"
      >
        <i
          class="ti"
          :class="
            t.type === 'ok'
              ? 'ti-check'
              : t.type === 'err'
              ? 'ti-x'
              : 'ti-info-circle'
          "
        ></i>
        <span>{{ t.message }}</span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import { useRouter } from 'vue-router';
import { API_BASE_URL } from '../config';
import RichEditor from '../components/RichEditor.vue';
import DOMPurify from 'dompurify';

const router = useRouter();
const adminUser = ref(null);

const adminInitials = computed(() => {
  if (adminUser.value && adminUser.value.name) {
    return adminUser.value.name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);
  }
  return 'AD';
});

// form.body is now HTML (from the rich editor); strip tags for word/'min read' counts.
const bodyPlain = computed(() => (form.value.body || '').replace(/<[^>]*>/g, ' '));
// Sanitised HTML for the inline preview card.
const safeBody = computed(() => DOMPurify.sanitize(form.value.body || ''));

const currentPage = ref('dashboard');
const posts = ref([]);
const onboardingRequests = ref([]);
const loadingOnboard = ref(false);
const approvingId = ref(null);

const pendingOnboardCount = computed(() => {
  return onboardingRequests.value.filter(r => r.status === 'pending').length;
});

const fetchOnboardingRequests = async () => {
  loadingOnboard.value = true;
  try {
    const response = await fetch(`${API_BASE_URL}/api/admin/onboard`, { credentials: 'include' });
    if (response.ok) {
      const data = await response.json();
      onboardingRequests.value = data;
    }
  } catch (error) {
    console.error('Error fetching onboarding requests:', error);
  } finally {
    loadingOnboard.value = false;
  }
};

const approveRequest = async (id) => {
  approvingId.value = id;
  try {
    const response = await fetch(`${API_BASE_URL}/api/admin/onboard/${id}/approve`, {
      method: 'POST',
      credentials: 'include',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    });
    const resData = await response.json();
    if (response.ok) {
      triggerToast(resData.message || "Request approved successfully.", 'ok');
      await fetchOnboardingRequests();
    } else {
      triggerToast(resData.message || "Failed to approve request.", 'err');
    }
  } catch (error) {
    console.error('Error approving request:', error);
    triggerToast("Network error: Failed to approve request.", 'err');
  } finally {
    approvingId.value = null;
  }
};
const demoViews = ref(1284);
const searchQuery = ref('');
const filterState = ref('all');

// Editor state
const editorEditId = ref(null);
const editorPostType = ref('blog');
const form = ref({
  title: '',
  slug: '',
  body: '',
  image_url: '',
  category: 'blog',
});

// Toasts
const activeToasts = ref([]);
let toastId = 0;

const triggerToast = (msg, type = 'inf') => {
  const id = toastId++;
  activeToasts.value.push({ id, message: msg, type });
  setTimeout(() => {
    activeToasts.value = activeToasts.value.filter(t => t.id !== id);
  }, 3000);
};

// Fetch all resources on mount
const fetchPosts = async () => {
  try {
    const response = await fetch(`${API_BASE_URL}/api/resources`);
    const data = await response.json();
    if (data.success) {
      posts.value = data.data;
    }
  } catch (error) {
    console.error('Error fetching CMS posts:', error);
    triggerToast('Failed to load posts from server.', 'err');
  }
};

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
    if (resData.authenticated && resData.user.account_type === 'admin') {
      adminUser.value = resData.user;
    } else {
      localStorage.removeItem('auth_user');
      router.push('/login');
    }
  } catch (error) {
    console.warn("Backend auth verification check failed, reading localStorage:", error);
    const savedUser = localStorage.getItem('auth_user');
    if (savedUser) {
      const parsed = JSON.parse(savedUser);
      if (parsed.account_type === 'admin') {
        adminUser.value = parsed;
      } else {
        router.push('/login');
      }
    } else {
      router.push('/login');
    }
  }
};

const logoutAdmin = async () => {
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
    router.push('/login');
  }
};

onMounted(async () => {
  await checkSession();
  fetchPosts();
  fetchOnboardingRequests();
});

// Computed properties for counts
const blogCount = computed(() => posts.value.filter(p => p.category === 'blog').length);
const newsCount = computed(() => posts.value.filter(p => p.category === 'news').length);
const publishedCount = computed(() => posts.value.length); // All posts are published on Laravel DB
const draftCount = ref(0);

const recentPosts = computed(() => {
  return [...posts.value]
    .sort((a, b) => new Date(b.published_at) - new Date(a.published_at))
    .slice(0, 5);
});

// Watch title to update slug in form
watch(() => form.value.title, (newTitle) => {
  if (!editorEditId.value) {
    form.value.slug = newTitle
      .toLowerCase()
      .trim()
      .replace(/[^a-z0-9\s-]/g, '')
      .replace(/\s+/g, '-')
      .replace(/-+/g, '-')
      .slice(0, 80);
  }
});

// Filtering logic
const filteredPosts = computed(() => {
  return posts.value.filter(p => {
    // Current section filter
    if (currentPage.value === 'blog' && p.category !== 'blog') return false;
    if (currentPage.value === 'news' && p.category !== 'news') return false;

    // Search query filter
    if (searchQuery.value.trim()) {
      const q = searchQuery.value.toLowerCase();
      return p.title.toLowerCase().includes(q) || p.body.toLowerCase().includes(q);
    }
    return true;
  });
});

const filteredListCount = computed(() => filteredPosts.value.length);

// Actions
const nav = (page) => {
  currentPage.value = page;
  searchQuery.value = '';
  if (page === 'onboarding') {
    fetchOnboardingRequests();
  }
};

const navToEditor = (type) => {
  editorEditId.value = null;
  editorPostType.value = type;
  form.value = {
    title: '',
    slug: '',
    body: '',
    image_url: '',
    category: type,
  };
  currentPage.value = 'editor';
};

const editPost = (p) => {
  editorEditId.value = p.id;
  editorPostType.value = p.category;
  form.value = {
    title: p.title,
    slug: p.slug,
    body: p.body,
    image_url: p.image_url || '',
    category: p.category,
  };
  currentPage.value = 'editor';
};

const savePost = async () => {
  if (!form.value.title || !form.value.body) {
    triggerToast('Please fill in both title and body content.', 'err');
    return;
  }

  try {
    const payload = {
      category: form.value.category,
      title: form.value.title,
      body: form.value.body,
      image_url: form.value.image_url || null,
    };

    const method = editorEditId.value ? 'PUT' : 'POST';
    const url = editorEditId.value 
      ? `${API_BASE_URL}/api/resources/${editorEditId.value}`
      : `${API_BASE_URL}/api/resources`;

    const response = await fetch(url, {
      method,
      credentials: 'include',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      body: JSON.stringify(payload),
    });

    const data = await response.json();
    if (data.success) {
      triggerToast(editorEditId.value ? 'Post updated successfully.' : 'Post saved successfully.', 'ok');
      await fetchPosts();
      nav(form.value.category);
    } else {
      triggerToast(data.message || 'Error saving post.', 'err');
    }
  } catch (error) {
    console.error('Error saving CMS post:', error);
    triggerToast('Network error saving post.', 'err');
  }
};

const deletePost = async (id) => {
  if (!confirm('Are you sure you want to delete this post?')) return;
  
  try {
    const response = await fetch(`${API_BASE_URL}/api/resources/${id}`, {
      method: 'DELETE',
      credentials: 'include',
      headers: {
        'Accept': 'application/json',
      },
    });
    const data = await response.json();
    if (response.ok && data.success) {
      triggerToast('Post deleted successfully.', 'ok');
      await fetchPosts();
    } else {
      triggerToast(data.message || 'Failed to delete post.', 'err');
    }
  } catch (error) {
    console.error('Error deleting CMS post:', error);
    triggerToast('Network error deleting post.', 'err');
  }
};

// Text helpers
const truncateString = (str, len) => {
  if (!str) return '';
  return str.length > len ? str.slice(0, len) + '…' : str;
};

const getFilename = (url) => {
  if (!url) return '';
  return url.substring(url.lastIndexOf('/') + 1) || 'image.jpg';
};

const formatDate = (dateString) => {
  if (!dateString) return '';
  const d = new Date(dateString);
  return d.toLocaleDateString('en-AU', { day: 'numeric', month: 'short', year: 'numeric' });
};

const calculateReadTime = (txt) => {
  if (!txt) return 1;
  return Math.max(1, Math.round(txt.trim().split(/\s+/).filter(Boolean).length / 238));
};

const copyToClipboard = (txt) => {
  navigator.clipboard.writeText(txt).then(() => {
    triggerToast('URL copied to clipboard!', 'ok');
  });
};

const openFullPreview = () => {
  // Hand the current draft to a standalone preview page via localStorage
  // (a new tab does not share this component's state). Admin's own browser,
  // transient — an appropriate use of localStorage.
  try {
    localStorage.setItem('cms_preview_draft', JSON.stringify({
      title: form.value.title,
      category: form.value.category,
      body: DOMPurify.sanitize(form.value.body || ''),
      image_url: form.value.image_url || '',
      savedAt: Date.now(),
    }));
    window.open('/cms-preview', '_blank', 'noopener');
  } catch (e) {
    triggerToast('Could not open preview.', 'err');
  }
};

const downloadJson = () => {
  const blob = new Blob([JSON.stringify(posts.value, null, 2)], { type: 'application/json' });
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'enterpriseit-posts.json';
  a.click();
  URL.revokeObjectURL(url);
};

// Static tips & configuration templates
const seoTips = [
  { icon: 'ti ti-check', color: 'var(--green)', text: 'Titles: 30–60 chars with primary keyword' },
  { icon: 'ti ti-check', color: 'var(--green)', text: 'Excerpts: 100–155 chars for meta description' },
  { icon: 'ti ti-check', color: 'var(--green)', text: 'Always upload a cover image for social sharing' },
  { icon: 'ti ti-alert-triangle', color: 'var(--amber)', text: 'Publish minimum 2 posts per month' },
  { icon: 'ti ti-alert-triangle', color: 'var(--amber)', text: 'Cross-link related posts in body content' },
];

const settingsGroups = [
  {
    title: 'Site Details',
    fields: [
      ['Site Name', 'enterprise IT'],
      ['Base URL', 'https://enterpriseit.com.au'],
      ['Blog Path', '/resources/blog'],
      ['News Path', '/resources/news'],
    ],
  },
  {
    title: 'SEO Defaults',
    fields: [
      ['Default Author', 'enterprise IT'],
      ['Title Suffix', '| enterprise IT'],
      ['Twitter Handle', '@enterpriseIT_AU'],
      ['OG Image', '/assets/og-default.jpg'],
    ],
  },
  {
    title: 'Image Settings',
    fields: [
      ['Max Width (px)', '1200'],
      ['JPEG Quality', '85'],
      ['Max File Size (KB)', '500'],
      ['Storage Path', '/public/uploads/'],
    ],
  },
  {
    title: 'Newsletter',
    fields: [
      ['From Name', 'enterprise IT'],
      ['From Email', 'blog@enterpriseit.com.au'],
      ['Platform', 'Mailchimp / Klaviyo'],
    ],
  },
];
</script>

<style scoped>
/* Scoped styles reflecting raw template styles */
:root {
  --navy: #002366;
  --navy-l: #1a3a6e;
  --slate: #708090;
  --off: #f2f4f8;
  --surface: #f7f8fb;
  --white: #fff;
  --border: #dde1e9;
  --green: #16a34a;
  --green-l: #f0fdf4;
  --green-b: #bbf7d0;
  --amber: #d97706;
  --red: #ef4444;
  --purple: #7c3aed;
  --text: #1a2233;
  --muted: #6b7280;
  --light: #b0b8c8;
  --r6: 6px;
  --r8: 8px;
  --r10: 10px;
  --r12: 12px;
}

.cms-admin-view {
  font-family: 'Inter', system-ui, sans-serif;
  background: #f2f4f8;
  color: #1a2233;
  font-size: 13.5px;
  line-height: 1.5;
  min-height: 100vh;
}

.topbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 52px;
  background: #002366;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
  z-index: 100;
  border-bottom: 1px solid rgba(255, 255, 255, 0.07);
}

.tb-logo {
  display: flex;
  align-items: center;
  gap: 9px;
  color: #fff;
  font-size: 16px;
  font-weight: 700;
}
.tb-logo em {
  font-style: normal;
  font-weight: 300;
}
.tb-logo strong {
  font-weight: 800;
  text-transform: uppercase;
}

.tb-badge {
  background: rgba(112, 128, 144, 0.3);
  border: 0.5px solid rgba(112, 128, 144, 0.4);
  color: rgba(255, 255, 255, 0.55);
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 0.7px;
  text-transform: uppercase;
  padding: 2px 8px;
  border-radius: 3px;
  margin-left: 8px;
}

.tb-right {
  display: flex;
  align-items: center;
  gap: 10px;
}

.tb-env {
  display: flex;
  align-items: center;
  gap: 5px;
  background: rgba(22, 163, 74, 0.12);
  border: 0.5px solid rgba(74, 222, 128, 0.25);
  color: #86efac;
  font-size: 10px;
  font-weight: 600;
  padding: 3px 9px;
  border-radius: 10px;
}

.tb-dot {
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: #4ade80;
  animation: pulse 2s infinite;
}

.tb-user {
  display: flex;
  align-items: center;
  gap: 7px;
  background: rgba(255, 255, 255, 0.07);
  border: 0.5px solid rgba(255, 255, 255, 0.1);
  border-radius: 6px;
  padding: 5px 10px;
}

.tb-avatar {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 9px;
  font-weight: 700;
  color: #fff;
}

.tb-uname {
  font-size: 12px;
  font-weight: 600;
  color: #fff;
}

.app {
  display: flex;
  padding-top: 52px;
  min-height: 100vh;
}

.sidebar {
  width: 220px;
  background: #fff;
  border-right: 0.5px solid #dde1e9;
  min-height: calc(100vh - 52px);
  position: fixed;
  top: 52px;
  left: 0;
  bottom: 0;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  z-index: 90;
  text-align: left;
}

.sb-sec {
  padding: 14px 0 4px;
}

.sb-sec-label {
  font-size: 9px;
  font-weight: 700;
  letter-spacing: 1.4px;
  text-transform: uppercase;
  color: #b0b8c8;
  padding: 0 16px 5px;
}

.sb-item {
  display: flex;
  align-items: center;
  gap: 9px;
  padding: 8px 16px;
  cursor: pointer;
  font-size: 13px;
  font-weight: 500;
  color: #6b7280;
  border-left: 2px solid transparent;
  transition: all 0.12s;
}
.sb-item:hover {
  color: #002366;
  background: #f7f8fb;
}
.sb-item.active {
  color: #002366;
  background: #eef2fb;
  border-left-color: #002366;
  font-weight: 600;
}
.sb-item i {
  font-size: 16px;
  flex-shrink: 0;
}

.sb-badge {
  margin-left: auto;
  background: #eef2fb;
  color: #002366;
  font-size: 10px;
  font-weight: 700;
  padding: 1px 6px;
  border-radius: 8px;
}

.sb-div {
  height: 0.5px;
  background: #dde1e9;
  margin: 6px 16px;
}

.sb-bottom {
  margin-top: auto;
  padding: 12px 14px;
  border-top: 0.5px solid #dde1e9;
}

.sb-info {
  display: flex;
  align-items: flex-start;
  gap: 7px;
  background: #f7f8fb;
  border-radius: 8px;
  padding: 9px 11px;
}
.sb-info i {
  font-size: 13px;
  color: #16a34a;
  flex-shrink: 0;
  margin-top: 1px;
}
.sb-info-t {
  font-size: 10.5px;
  color: #6b7280;
  line-height: 1.4;
}
.sb-info-t strong {
  color: #002366;
}

.main {
  margin-left: 220px;
  padding: 24px;
  min-height: calc(100vh - 52px);
  width: calc(100% - 220px);
  text-align: left;
}

/* SECTION HEADER */
.sec-hdr {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 22px;
  gap: 16px;
  flex-wrap: wrap;
}

.sec-tag {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.4px;
  text-transform: uppercase;
  color: #708090;
  margin-bottom: 3px;
}

.sec-title {
  font-size: 22px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -0.4px;
}

.sec-btns {
  display: flex;
  gap: 8px;
  align-items: center;
  flex-wrap: wrap;
}

/* BUTTONS */
.btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 9px 16px;
  border-radius: 6px;
  font-size: 13px;
  font-weight: 600;
  border: none;
  transition: all 0.15s;
  white-space: nowrap;
  cursor: pointer;
}
.btn i {
  font-size: 15px;
}
.btn-primary {
  background: #002366;
  color: #fff;
}
.btn-primary:hover {
  opacity: 0.9;
}
.btn-success {
  background: #16a34a;
  color: #fff;
}
.btn-success:hover {
  opacity: 0.9;
}
.btn-ghost {
  background: transparent;
  color: #002366;
  border: 0.5px solid #dde1e9;
}
.btn-ghost:hover {
  background: #f2f4f8;
}
.btn-danger {
  background: #fef2f2;
  color: #ef4444;
  border: 0.5px solid #fecaca;
}
.btn-sm {
  padding: 6px 12px;
  font-size: 12px;
}
.btn-sm i {
  font-size: 13px;
}

/* CARDS */
.card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  margin-bottom: 18px;
}
.card-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 13px 18px;
  border-bottom: 0.5px solid #f0f3f7;
}
.card-title {
  font-size: 13px;
  font-weight: 700;
  color: #002366;
  display: flex;
  align-items: center;
  gap: 7px;
}
.card-title i {
  font-size: 15px;
  color: #708090;
}
.card-body {
  padding: 18px;
}

/* STATS ROW */
.stats-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 14px;
  margin-bottom: 22px;
}

.stat-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  padding: 18px 20px;
}

.sc-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 12px;
}

.sc-ico {
  width: 38px;
  height: 38px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.sc-ico i {
  font-size: 19px;
}
.sc-ico.navy {
  background: #e8eef8;
}
.sc-ico.navy i {
  color: #002366;
}
.sc-ico.green {
  background: #f0fdf4;
}
.sc-ico.green i {
  color: #16a34a;
}
.sc-ico.amber {
  background: #fef3c7;
}
.sc-ico.amber i {
  color: #d97706;
}
.sc-ico.slate {
  background: #f0f3f7;
}
.sc-ico.slate i {
  color: #708090;
}

.sc-trend {
  font-size: 11px;
  font-weight: 600;
  color: #16a34a;
  display: flex;
  align-items: center;
  gap: 3px;
}

.sc-num {
  font-size: 26px;
  font-weight: 800;
  color: #002366;
  letter-spacing: -1px;
}

.sc-label {
  font-size: 11.5px;
  color: #6b7280;
  margin-top: 2px;
}

/* TABLE */
.table-wrap {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
}

.tbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  border-bottom: 0.5px solid #dde1e9;
  gap: 10px;
  flex-wrap: wrap;
}

.tsearch {
  position: relative;
  flex: 1;
  max-width: 280px;
}
.tsearch input {
  width: 100%;
  background: #f7f8fb;
  border: 0.5px solid #dde1e9;
  border-radius: 6px;
  padding: 7px 32px 7px 11px;
  font-size: 13px;
  outline: none;
  transition: border-color 0.15s;
}
.tsearch input:focus {
  border-color: #002366;
}
.tsearch i {
  position: absolute;
  right: 9px;
  top: 50%;
  transform: translateY(-50%);
  color: #b0b8c8;
  font-size: 14px;
}

.tfilters {
  display: flex;
  gap: 5px;
  flex-wrap: wrap;
}

.tfil {
  background: #f7f8fb;
  border: 0.5px solid #dde1e9;
  border-radius: 20px;
  padding: 4px 11px;
  font-size: 11.5px;
  font-weight: 500;
  color: #6b7280;
  cursor: pointer;
  transition: all 0.12s;
}
.tfil:hover {
  color: #002366;
  background: #eef2fb;
}
.tfil.active {
  background: #002366;
  color: #fff;
  font-weight: 600;
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead tr {
  background: #f7f8fb;
}

th {
  padding: 9px 13px;
  text-align: left;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  color: #b0b8c8;
  border-bottom: 0.5px solid #dde1e9;
}

td {
  padding: 11px 13px;
  border-bottom: 0.5px solid #f5f7fa;
  vertical-align: middle;
}

tbody tr:last-child td {
  border-bottom: none;
}

tbody tr:hover {
  background: #f7f8fb;
}

.t-thumb {
  width: 44px;
  height: 32px;
  border-radius: 4px;
  object-fit: cover;
  flex-shrink: 0;
}

.t-thumb-ph {
  width: 44px;
  height: 32px;
  border-radius: 4px;
  background: #f2f4f8;
  border: 0.5px dashed #dde1e9;
  display: flex;
  align-items: center;
  justify-content: center;
}
.t-thumb-ph i {
  font-size: 13px;
  color: #b0b8c8;
}

.t-title-wrap {
  display: flex;
  align-items: center;
  gap: 9px;
}

.t-title {
  font-size: 13px;
  font-weight: 600;
  color: #002366;
  line-height: 1.3;
}

.t-meta {
  font-size: 10.5px;
  color: #6b7280;
  margin-top: 2px;
  font-family: monospace;
}

.badge {
  display: inline-flex;
  align-items: center;
  gap: 3px;
  padding: 2px 8px;
  border-radius: 10px;
  font-size: 10.5px;
  font-weight: 600;
}
.b-pub {
  background: #f0fdf4;
  color: #16a34a;
  border: 0.5px solid #bbf7d0;
}
.b-draft {
  background: #f1f5f9;
  color: #708090;
  border: 0.5px solid #dde1e9;
}
.b-blog {
  background: #eef2fb;
  color: #002366;
  border: 0.5px solid #dde8f5;
}

.row-acts {
  display: flex;
  gap: 5px;
}

.ico-btn {
  width: 29px;
  height: 29px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 0.5px solid #dde1e9;
  background: #f7f8fb;
  color: #6b7280;
  cursor: pointer;
  transition: all 0.12s;
  font-size: 14px;
}
.ico-btn:hover {
  border-color: #002366;
  color: #002366;
  background: #eef2fb;
}
.ico-btn.danger:hover {
  border-color: #ef4444;
  color: #ef4444;
  background: #fef2f2;
}

.empty-state {
  padding: 48px 24px;
  text-align: center;
}

.empty-ico {
  width: 52px;
  height: 52px;
  border-radius: 10px;
  background: #f2f4f8;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 12px;
}
.empty-ico i {
  font-size: 24px;
  color: #b0b8c8;
}

.empty-title {
  font-size: 15px;
  font-weight: 700;
  color: #002366;
  margin-bottom: 4px;
}

.empty-desc {
  font-size: 13px;
  color: #6b7280;
}

/* EDITOR */
.ed-layout {
  display: grid;
  grid-template-columns: 1fr 330px;
  gap: 18px;
  align-items: start;
}
.ed-main {
  display: flex;
  flex-direction: column;
  gap: 14px;
}
.ed-side {
  display: flex;
  flex-direction: column;
  gap: 12px;
  position: sticky;
  top: 76px;
}

/* FORM ELEMENTS */
.fg {
  margin-bottom: 14px;
}
.flabel {
  font-size: 11.5px;
  font-weight: 600;
  color: #002366;
  margin-bottom: 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.flabel-hint {
  font-size: 10.5px;
  color: #6b7280;
  font-weight: 400;
}
.fi,
.fs,
.fta {
  width: 100%;
  background: #f7f8fb;
  border: 0.5px solid #dde1e9;
  border-radius: 6px;
  padding: 10px 12px;
  font-size: 13.5px;
  color: #1a2233;
  outline: none;
  transition: border-color 0.15s, box-shadow 0.15s;
}
.fi:focus,
.fs:focus,
.fta:focus {
  border-color: #002366;
  box-shadow: 0 0 0 3px rgba(0, 35, 102, 0.07);
}

.slug-row {
  display: flex;
  align-items: center;
  gap: 7px;
}
.slug-pre {
  font-size: 11.5px;
  color: #6b7280;
  white-space: nowrap;
  font-family: monospace;
  flex-shrink: 0;
}

.cbar {
  margin-top: 4px;
}
.cbar-info {
  display: flex;
  justify-content: space-between;
  margin-bottom: 3px;
  font-size: 10.5px;
  color: #6b7280;
}
.cbar-track {
  height: 3px;
  background: #dde1e9;
  border-radius: 2px;
  overflow: hidden;
}
.cbar-fill {
  height: 100%;
  border-radius: 2px;
  transition: width 0.2s, background 0.2s;
}
.cbar-fill.good {
  background: #16a34a;
}
.cbar-fill.warn {
  background: #d97706;
}

.ctb {
  display: flex;
  align-items: center;
  gap: 2px;
  padding: 7px 10px;
  background: #f7f8fb;
  border: 0.5px solid #dde1e9;
  border-bottom: none;
  border-radius: 6px 6px 0 0;
  flex-wrap: wrap;
}
.tbtn {
  width: 27px;
  height: 27px;
  border-radius: 4px;
  border: none;
  background: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: #6b7280;
  font-size: 12px;
  transition: all 0.12s;
}
.tbtn:hover {
  background: #dde1e9;
  color: #002366;
}
.tsep {
  width: 0.5px;
  height: 17px;
  background: #dde1e9;
  margin: 0 2px;
}

.content-editor {
  width: 100%;
  min-height: 240px;
  border: 0.5px solid #dde1e9;
  border-top: none;
  border-radius: 0 0 6px 6px;
  padding: 12px 13px;
  font-size: 14px;
  line-height: 1.7;
  outline: none;
  font-family: inherit;
  color: #1a2233;
}

.word-count {
  display: flex;
  justify-content: space-between;
  font-size: 10.5px;
  color: #6b7280;
  margin-top: 4px;
}

/* IMAGE PREVIEW */
.img-preview {
  position: relative;
  border-radius: 8px;
  overflow: hidden;
  border: 0.5px solid #dde1e9;
}
.img-preview img {
  width: 100%;
  height: 150px;
  object-fit: cover;
  display: block;
}

/* LIVE PREVIEW */
.pv-wrap {
  background: #f2f4f8;
  border-radius: 10px;
  padding: 14px;
  margin-bottom: 12px;
}
.pv-lbl {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: #6b7280;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  gap: 5px;
}
.pv-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.07);
}
.pv-img {
  height: 96px;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}
.pv-img i {
  font-size: 30px;
  color: rgba(255, 255, 255, 0.15);
  z-index: 1;
}
.pv-img img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.pv-cat-b {
  position: absolute;
  bottom: 7px;
  left: 9px;
  font-size: 9px;
  font-weight: 700;
  text-transform: uppercase;
  padding: 2px 7px;
  border-radius: 3px;
  background: rgba(0, 0, 0, 0.45);
  color: #fff;
  z-index: 2;
}

.pv-body {
  padding: 11px 13px;
}
.pv-meta {
  display: flex;
  align-items: center;
  gap: 5px;
  margin-bottom: 5px;
  font-size: 9.5px;
  color: #6b7280;
}
.pv-cat-l {
  font-size: 9.5px;
  font-weight: 700;
  color: #002366;
  text-transform: uppercase;
  letter-spacing: 0.3px;
}
.pv-dot {
  width: 2px;
  height: 2px;
  border-radius: 50%;
  background: #dde1e9;
}
.pv-h {
  font-size: 12.5px;
  font-weight: 800;
  color: #002366;
  line-height: 1.3;
  margin-bottom: 5px;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
.pv-ex {
  font-size: 11px;
  color: #6b7280;
  line-height: 1.5;
  margin-bottom: 9px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.pv-foot {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.pv-author {
  display: flex;
  align-items: center;
  gap: 5px;
}
.pv-av {
  width: 17px;
  height: 17px;
  border-radius: 50%;
  background: #e8eef8;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 6px;
  font-weight: 800;
  color: #002366;
}
.pv-aname {
  font-size: 10px;
  color: #6b7280;
}
.pv-link {
  font-size: 10px;
  font-weight: 700;
  color: #002366;
  display: flex;
  align-items: center;
  gap: 2px;
}

/* MEDIA GRID */
.media-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 11px;
}
.med-item {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 8px;
  overflow: hidden;
  transition: all 0.15s;
}
.med-item:hover {
  border-color: #b0bad0;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}
.med-thumb {
  height: 75px;
  object-fit: cover;
  width: 100%;
  display: block;
  background: #f2f4f8;
}
.med-info {
  padding: 6px 8px;
}
.med-name {
  font-size: 11px;
  font-weight: 600;
  color: #002366;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.med-meta {
  font-size: 10px;
  color: #6b7280;
  margin-top: 1px;
}
.med-acts {
  display: flex;
  gap: 3px;
  margin-top: 5px;
}
.med-btn {
  flex: 1;
  background: #f7f8fb;
  border: 0.5px solid #dde1e9;
  border-radius: 4px;
  padding: 3px 0;
  font-size: 10px;
  font-weight: 600;
  color: #6b7280;
  cursor: pointer;
  transition: all 0.12s;
}
.med-btn:hover {
  background: #eef2fb;
  color: #002366;
}

/* ACTIVITIES */
.act-list {
  display: flex;
  flex-direction: column;
}
.act-item {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  padding: 10px 0;
  border-bottom: 0.5px solid #f5f7fa;
}
.act-item:last-child {
  border-bottom: none;
}
.act-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  flex-shrink: 0;
  margin-top: 5px;
}
.act-dot.g {
  background: #16a34a;
}
.act-dot.n {
  background: #002366;
}
.act-dot.a {
  background: #d97706;
}
.act-text {
  font-size: 12.5px;
  color: #1a2233;
  line-height: 1.4;
  flex: 1;
}
.act-text strong {
  font-weight: 600;
  color: #002366;
}
.act-time {
  font-size: 11px;
  color: #b0b8c8;
  white-space: nowrap;
}

/* JSON EXPORT */
.json-wrap {
  background: #1a2233;
  border-radius: 10px;
  padding: 14px;
  overflow: auto;
  max-height: 300px;
}
.json-code {
  font-family: monospace;
  font-size: 11.5px;
  color: #a5f3fc;
  line-height: 1.6;
  white-space: pre-wrap;
}

/* TOASTS */
.toast-ctr {
  position: fixed;
  bottom: 22px;
  right: 22px;
  display: flex;
  flex-direction: column;
  gap: 7px;
  z-index: 999;
}
.toast {
  display: flex;
  align-items: center;
  gap: 8px;
  background: #1a2233;
  color: #fff;
  padding: 10px 15px;
  border-radius: 8px;
  font-size: 13px;
  font-weight: 500;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
  max-width: 300px;
  animation: toastIn 0.25s ease;
}
.toast.ok {
  border-left: 3px solid #16a34a;
}
.toast.err {
  border-left: 3px solid #ef4444;
}
.toast.inf {
  border-left: 3px solid #60a5fa;
}

/* DASHBOARD & SETTINGS GRIDS */
.dash-grid {
  display: grid;
  grid-template-columns: 1fr 340px;
  gap: 16px;
}
.settings-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px;
}

/* Animations */
@keyframes pulse {
  0%,
  100% {
    opacity: 1;
    transform: scale(1);
  }
  50% {
    opacity: 0.5;
    transform: scale(0.85);
  }
}

@keyframes toastIn {
  from {
    transform: translateX(20px);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(8px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 900px) {
  .sidebar {
    display: none;
  }
  .main {
    margin-left: 0;
    width: 100%;
  }
  .ed-layout,
  .dash-grid,
  .settings-grid {
    grid-template-columns: 1fr;
  }
  .ed-side {
    position: static;
  }
  .stats-row {
    grid-template-columns: 1fr 1fr;
  }
  .media-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>
