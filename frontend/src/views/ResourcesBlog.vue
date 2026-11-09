<template>
  <div class="blog-view">
    <!-- Resources Sub-Nav -->
    <nav class="resources-nav" aria-label="Resources sections">
      <div class="rn-inner">
        <span class="rn-label">Resources</span>
        <router-link to="/resources/sustainability" class="rn-link"><i class="ti ti-leaf" aria-hidden="true"></i>Sustainability</router-link>
        <router-link to="/resources/blog" class="rn-link active" aria-current="page"><i class="ti ti-article" aria-hidden="true"></i>Blog</router-link>
        <router-link to="/resources/news" class="rn-link"><i class="ti ti-news" aria-hidden="true"></i>News</router-link>
      </div>
    </nav>

    <!-- PAGE HERO -->
    <section class="page-hero" aria-labelledby="page-h1">
      <div class="hero-in">
        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <router-link to="/" class="bc-link">Home</router-link>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-link">Resources</span>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-cur" aria-current="page">Blog</span>
        </nav>

        <div class="hero-layout">
          <div>
            <div class="eyebrow">
              <span class="eyebrow-dot" aria-hidden="true"></span>
              Resources · Insights &amp; Expert Thinking
            </div>
            <h1 class="page-h1" id="page-h1">
              Enterprise IT insights.<br>
              <span class="accent">Straight from the<br>specialists.</span>
            </h1>
            <p class="page-sub">
              Practical guidance on ICT lifecycle management, cyber security, data governance, ESG reporting and sustainable IT, written by enterprise IT for Australian organisations.
            </p>

            <!-- Search -->
            <div class="search-wrap" role="search" aria-label="Search blog posts">
              <input
                class="search-input"
                type="search"
                v-model="searchQuery"
                placeholder="Search articles, e.g. NIST 800-88, Microsoft Sentinel, ESG reporting…"
                aria-label="Search blog articles"
                autocomplete="off"
              />
              <i class="ti ti-search search-icon" aria-hidden="true"></i>
            </div>

            <div class="hero-stats" aria-label="Blog statistics">
              <div class="hstat">
                <div class="hstat-num">{{ totalArticlesCount }}+</div>
                <div class="hstat-label">Expert articles<br>published</div>
              </div>
              <div class="hstat">
                <div class="hstat-num">5</div>
                <div class="hstat-label">Topic categories<br>covered</div>
              </div>
              <div class="hstat">
                <div class="hstat-num">Monthly</div>
                <div class="hstat-label">New content<br>added</div>
              </div>
            </div>
          </div>

          <!-- Hero aside — top posts + newsletter -->
          <aside class="hero-aside" aria-label="Popular articles and newsletter">
            <div class="aside-card">
              <div class="aside-title">Most Read This Month</div>
              <div class="aside-post" v-for="(post, index) in popularArticles" :key="post.slug">
                <div class="aside-post-num">{{ index + 1 }}</div>
                <div>
                  <div class="aside-post-title">
                    <router-link :to="'/resources/blog/' + post.slug" style="color:inherit;">{{ post.title }}</router-link>
                  </div>
                  <div class="aside-post-cat">{{ formatTopicName(getTopic(post)) }} · {{ post.readTime || '6 min read' }}</div>
                </div>
              </div>
            </div>
            <div class="nl-mini">
              <div class="nl-mini-title">Follow our insights</div>
              <div class="nl-mini-sub">New articles and security alerts on LinkedIn.</div>
              <a class="nl-mini-btn" href="https://www.linkedin.com/company/enterpriseitau/" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;justify-content:center;gap:6px;text-decoration:none;width:100%;"><i class="ti ti-brand-linkedin" aria-hidden="true"></i>Follow on LinkedIn</a>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- CATEGORY FILTER BAR -->
    <div class="filter-bar" role="navigation" aria-label="Filter blog by topic">
      <div class="filter-in">
        <span class="filter-label">Filter</span>
        <button 
          v-for="cat in topicCategories" 
          :key="cat.id" 
          class="filter-btn" 
          :class="{ active: selectedTopic === cat.id }" 
          @click="selectedTopic = cat.id"
          :aria-pressed="selectedTopic === cat.id ? 'true' : 'false'"
        >
          <i :class="cat.icon" aria-hidden="true"></i>{{ cat.name }}
          <span class="filter-count">{{ getTopicCount(cat.id) }}</span>
        </button>
      </div>
    </div>

    <!-- MAIN BLOG LAYOUT -->
    <div class="blog-sec">
      <div class="blog-in">
        <!-- Loading State -->
        <div v-if="loading" class="loading-state">
          <i class="ti ti-spinner spin-icon" aria-hidden="true"></i>
          <p>Loading articles...</p>
        </div>

        <div v-else class="blog-layout">
          <!-- ===== MAIN COLUMN ===== -->
          <div>
            <!-- Empty State -->
            <div v-if="filteredArticles.length === 0" class="empty-state">
              <p>No articles found matching your criteria.</p>
            </div>

            <div v-else>
              <!-- FEATURED POST (Shown only on first page when not filtering, or as the first item of filtered list) -->
              <article v-if="featuredPost" class="featured-post fade-up visible" itemscope itemtype="https://schema.org/BlogPosting">
                <meta itemprop="datePublished" :content="featuredPost.published_at" />
                <meta itemprop="dateModified" :content="featuredPost.published_at" />
                <meta itemprop="author" content="enterprise IT Security Team" />

                <div class="fp-img" :class="getTopicBg(getTopic(featuredPost))" aria-hidden="true">
                  <div class="fp-img-grid"></div>
                  <i :class="getTopicIcon(getTopic(featuredPost))" class="fp-img-icon"></i>
                  <div class="fp-featured-badge"><i class="ti ti-star-filled" style="font-size:10px;"></i>Featured</div>
                  <div class="fp-cat-badge"><i :class="getTopicIcon(getTopic(featuredPost))" style="font-size:11px;"></i>{{ formatTopicName(getTopic(featuredPost)) }}</div>
                </div>

                <div class="fp-body">
                  <div class="fp-meta">
                    <span class="fp-cat" itemprop="articleSection">{{ formatTopicName(getTopic(featuredPost)) }}</span>
                    <span class="fp-dot" aria-hidden="true"></span>
                    <time class="fp-date" :datetime="featuredPost.published_at" itemprop="datePublished">{{ formatDate(featuredPost.published_at) }}</time>
                    <span class="fp-dot" aria-hidden="true"></span>
                    <span class="fp-read"><i class="ti ti-clock" aria-hidden="true"></i>{{ featuredPost.readTime || '8 min read' }}</span>
                  </div>

                  <h2 class="fp-h2" itemprop="headline">
                    <router-link :to="'/resources/blog/' + featuredPost.slug" itemprop="url">
                      {{ featuredPost.title }}
                    </router-link>
                  </h2>

                  <p class="fp-excerpt" itemprop="description">
                    {{ truncateText(featuredPost.body, 250) }}
                  </p>

                  <div class="fp-footer">
                    <address class="fp-author" rel="author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                      <div class="fp-avatar" aria-hidden="true">EI</div>
                      <div>
                        <div class="fp-author-name" itemprop="name">enterprise IT Team</div>
                        <div class="fp-author-role">{{ formatTopicName(getTopic(featuredPost)) }} Specialists</div>
                      </div>
                    </address>
                    <router-link :to="'/resources/blog/' + featuredPost.slug" class="fp-read-more" aria-label="Read full article">
                      Read article <i class="ti ti-arrow-right" aria-hidden="true"></i>
                    </router-link>
                  </div>
                </div>
              </article>

              <!-- SECTION LABEL -->
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                <div>
                  <p class="stag">Latest Articles</p>
                </div>
                <div style="font-size:12px;color:#708090;">Showing {{ paginationStart }}–{{ paginationEnd }} of {{ filteredArticles.length }} articles</div>
              </div>

              <!-- POST GRID -->
              <div class="post-grid" role="list" aria-label="Blog posts">
                <article v-for="post in paginatedArticles" :key="post.slug" class="post-card fade-up visible" role="listitem" itemscope itemtype="https://schema.org/BlogPosting">
                  <meta itemprop="datePublished" :content="post.published_at" />
                  <meta itemprop="author" content="enterprise IT Team" />
                  <div class="pc-img" :class="getTopicBg(getTopic(post))" aria-hidden="true">
                    <i :class="getTopicIcon(getTopic(post))"></i>
                    <span class="pc-cat-badge" :class="getBadgeClass(getTopic(post))">{{ formatTopicName(getTopic(post)) }}</span>
                  </div>
                  <div class="pc-body">
                    <div class="pc-meta">
                      <span class="pc-cat-label" itemprop="articleSection">{{ formatTopicName(getTopic(post)) }}</span>
                      <span class="pc-dot" aria-hidden="true"></span>
                      <time class="pc-date" :datetime="post.published_at">{{ formatDate(post.published_at) }}</time>
                      <span class="pc-dot" aria-hidden="true"></span>
                      <span class="pc-read"><i class="ti ti-clock" aria-hidden="true"></i>{{ post.readTime || '6 min' }}</span>
                    </div>
                    <h2 class="pc-h2" itemprop="headline">
                      <router-link :to="'/resources/blog/' + post.slug" itemprop="url">
                        {{ post.title }}
                      </router-link>
                    </h2>
                    <p class="pc-excerpt" itemprop="description">{{ truncateText(post.body, 140) }}</p>
                    <div class="pc-footer">
                      <div class="pc-author">
                        <div class="pc-avatar" aria-hidden="true">EI</div>
                        <span class="pc-author-name">enterprise IT</span>
                      </div>
                      <router-link :to="'/resources/blog/' + post.slug" class="pc-link" aria-label="Read full article">
                        Read <i class="ti ti-arrow-right" aria-hidden="true"></i>
                      </router-link>
                    </div>
                  </div>
                </article>
              </div>

              <!-- PAGINATION -->
              <nav v-if="totalPages > 1" class="pagination" aria-label="Blog page navigation">
                <button class="page-btn nav-btn" :disabled="currentPage === 1" @click="currentPage--" aria-label="Previous page">
                  <i class="ti ti-chevron-left" aria-hidden="true"></i>Prev
                </button>
                <button 
                  v-for="page in totalPages" 
                  :key="page" 
                  class="page-btn" 
                  :class="{ active: currentPage === page }" 
                  @click="currentPage = page"
                  :aria-current="currentPage === page ? 'page' : undefined"
                  :aria-label="'Page ' + page"
                >
                  {{ page }}
                </button>
                <button class="page-btn nav-btn" :disabled="currentPage === totalPages" @click="currentPage++" aria-label="Next page">
                  Next<i class="ti ti-chevron-right" aria-hidden="true"></i>
                </button>
              </nav>
            </div>
          </div>

          <!-- ===== SIDEBAR ===== -->
          <aside class="sidebar" aria-label="Blog sidebar">
            <!-- Categories -->
            <div class="sb-card">
              <div class="sb-head"><div class="sb-head-title">Browse by Category</div></div>
              <div class="sb-body" style="padding:10px 14px;">
                <nav class="cat-list" aria-label="Blog categories">
                  <a 
                    v-for="cat in topicCategories.slice(1)" 
                    :key="cat.id" 
                    href="#" 
                    class="cat-item" 
                    @click.prevent="selectedTopic = cat.id"
                    :aria-label="cat.name + ' articles'"
                  >
                    <div class="cat-item-left">
                      <div class="cat-item-icon" :class="cat.class"><i :class="cat.icon" aria-hidden="true"></i></div>
                      <span class="cat-item-name">{{ cat.name }}</span>
                    </div>
                    <span class="cat-item-count">{{ getTopicCount(cat.id) }}</span>
                  </a>
                </nav>
              </div>
            </div>

            <!-- Popular posts -->
            <div class="sb-card">
              <div class="sb-head"><div class="sb-head-title">Popular Articles</div></div>
              <div class="sb-body">
                <div class="pop-post" v-for="(post, index) in popularArticles" :key="post.slug">
                  <div class="pop-num">0{{ index + 1 }}</div>
                  <div>
                    <router-link :to="'/resources/blog/' + post.slug" class="pop-title">{{ post.title }}</router-link>
                    <div class="pop-meta"><i class="ti ti-clock" aria-hidden="true"></i>{{ post.readTime || '6 min' }} · {{ formatTopicName(getTopic(post)) }}</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Topics Cloud (SEO tags) -->
            <div class="sb-card">
              <div class="sb-head"><div class="sb-head-title">Topics</div></div>
              <div class="sb-body">
                <div class="sb-tags" aria-label="Blog topics">
                  <a href="#" @click.prevent="searchQuery = 'NIST 800-88'" class="sb-tag">NIST 800-88</a>
                  <a href="#" @click.prevent="searchQuery = 'Sentinel'" class="sb-tag">Microsoft Sentinel</a>
                  <a href="#" @click.prevent="searchQuery = 'ITAD'" class="sb-tag">ITAD</a>
                  <a href="#" @click.prevent="searchQuery = 'ESG'" class="sb-tag">ESG Reporting</a>
                  <a href="#" @click.prevent="searchQuery = 'Zero Trust'" class="sb-tag">Zero Trust</a>
                  <a href="#" @click.prevent="searchQuery = 'Data Governance'" class="sb-tag">Data Governance</a>
                  <a href="#" @click.prevent="searchQuery = 'Sentinel'" class="sb-tag">Threat Monitoring</a>
                  <a href="#" @click.prevent="searchQuery = 'Power BI'" class="sb-tag">Power BI</a>
                  <a href="#" @click.prevent="searchQuery = 'MFA'" class="sb-tag">Phishing-Resistant MFA</a>
                  <a href="#" @click.prevent="searchQuery = 'Compliance'" class="sb-tag">ISO 27001</a>
                </div>
              </div>
            </div>

            <!-- Quote CTA -->
            <div class="sb-cta">
              <div class="sb-cta-title">Ready to talk to a specialist?</div>
              <p class="sb-cta-desc">A specialist will reply within 24 hours. No bots and no ticket queue.</p>
              <router-link to="/contact#quote" class="sb-cta-btn" aria-label="Request a quote">
                <i class="ti ti-file-invoice" aria-hidden="true"></i>Request a 24-Hour Quote
              </router-link>
            </div>

            <!-- Newsletter -->
            <div class="sb-newsletter">
              <div class="sb-nl-icon"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></div>
              <div class="sb-nl-title">Follow enterprise IT on LinkedIn</div>
              <p class="sb-nl-desc">New articles, security alerts and practical guidance on ICT lifecycle and cyber security.</p>
              <a class="sb-nl-btn" href="https://www.linkedin.com/company/enterpriseitau/" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;justify-content:center;gap:6px;text-decoration:none;width:100%;"><i class="ti ti-brand-linkedin" aria-hidden="true"></i>Follow on LinkedIn</a>
            </div>
          </aside>
        </div>
      </div>
    </div>

    <!-- TOPICS BAND — SEO internal linking -->
    <section class="topics-sec" aria-labelledby="topics-heading">
      <div class="topics-in">
        <p class="stag">Explore by Topic</p>
        <h2 class="sh2" id="topics-heading">Every area of enterprise IT, covered.</h2>
        <p style="font-size:13.5px;color:#6b7280;line-height:1.6;margin-bottom:0;">Deep-dive into the topics that matter most to enterprise IT and security teams across Australia.</p>
        <div class="topics-grid">
          <a href="#" @click.prevent="selectedTopic = 'cybersecurity'" class="topic-card" aria-label="Cybersecurity operations">
            <div class="topic-icon navy"><i class="ti ti-shield-lock" aria-hidden="true"></i></div>
            <div><div class="topic-name">Cybersecurity Operations</div><div class="topic-count">{{ getTopicCount('cybersecurity') }} articles</div></div>
          </a>
          <a href="#" @click.prevent="selectedTopic = 'itad'" class="topic-card" aria-label="ITAD and lifecycle management">
            <div class="topic-icon slate"><i class="ti ti-recycle" aria-hidden="true"></i></div>
            <div><div class="topic-name">ITAD &amp; Lifecycle Management</div><div class="topic-count">{{ getTopicCount('itad') }} articles</div></div>
          </a>
          <a href="#" @click.prevent="selectedTopic = 'sustainability'" class="topic-card" aria-label="Sustainability and ESG">
            <div class="topic-icon green"><i class="ti ti-leaf" aria-hidden="true"></i></div>
            <div><div class="topic-name">Sustainability &amp; ESG</div><div class="topic-count">{{ getTopicCount('sustainability') }} articles</div></div>
          </a>
          <a href="#" @click.prevent="selectedTopic = 'iam'" class="topic-card" aria-label="Identity and access management">
            <div class="topic-icon purple"><i class="ti ti-lock-access" aria-hidden="true"></i></div>
            <div><div class="topic-name">Identity &amp; Access (IAM)</div><div class="topic-count">{{ getTopicCount('iam') }} articles</div></div>
          </a>
          <a href="#" @click.prevent="selectedTopic = 'data'" class="topic-card" aria-label="Data governance">
            <div class="topic-icon blue"><i class="ti ti-database" aria-hidden="true"></i></div>
            <div><div class="topic-name">Data Governance</div><div class="topic-count">{{ getTopicCount('data') }} articles</div></div>
          </a>
        </div>
      </div>
    </section>

    <!-- NEWSLETTER BAND -->
    <section class="newsletter-band" aria-labelledby="nl-heading">
      <div class="nl-band-in">
        <div class="nl-band-left">
          <div class="nl-band-tag">Stay Informed</div>
          <h2 class="nl-band-h" id="nl-heading">Follow enterprise IT on LinkedIn.</h2>
          <p class="nl-band-sub">New articles, security alerts and practical guidance on cyber security, ICT lifecycle management, data governance and ESG.</p>
          <div class="nl-benefits">
            <div class="nl-benefit"><i class="ti ti-check" aria-hidden="true"></i>Practical, not promotional</div>
            <div class="nl-benefit"><i class="ti ti-check" aria-hidden="true"></i>Written by practitioners</div>
            <div class="nl-benefit"><i class="ti ti-check" aria-hidden="true"></i>Security alerts that matter</div>
          </div>
        </div>
        <div class="nl-band-right">
          <a class="nl-band-btn" href="https://www.linkedin.com/company/enterpriseitau/" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;justify-content:center;gap:6px;text-decoration:none;padding:13px 22px;"><i class="ti ti-brand-linkedin" aria-hidden="true"></i>Follow on LinkedIn</a>
        </div>
      </div>
    </section>

    <!-- CTA BAND -->
    <div class="ctaband" aria-label="Call to action">
      <div class="ctaband-in">
        <div class="ctaband-left">
          <h3>Want expert advice for your specific environment?</h3>
          <p>Talk to a specialist about ICT lifecycle, cyber security, data governance or ESG. We reply within 24 hours.</p>
        </div>
        <div class="ctaband-btns">
          <router-link to="/contact#quote" class="cta-white">Get a 24-Hour Quote →</router-link>
          <router-link to="/services" class="cta-outline">Explore Services</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { API_BASE_URL } from '../config';

const articles = ref([]);
const loading = ref(true);
const searchQuery = ref('');
const selectedTopic = ref('all');
const currentPage = ref(1);
const itemsPerPage = 6;

// Newsletter States
const newsletterEmail = ref('');
const newsletterStatus = ref({
  text: 'Subscribe →',
  style: {}
});

// Topic configuration mapping to V2 Styles
const topicCategories = [
  { id: 'all', name: 'All Posts', icon: 'ti ti-layout-grid', class: '' },
  { id: 'cybersecurity', name: 'Cybersecurity', icon: 'ti ti-shield-lock', class: 'navy' },
  { id: 'itad', name: 'ITAD & Lifecycle', icon: 'ti ti-recycle', class: 'slate' },
  { id: 'sustainability', name: 'Sustainability', icon: 'ti ti-leaf', class: 'green' },
  { id: 'iam', name: 'Identity & Access', icon: 'ti ti-users', class: 'purple' },
  { id: 'data', name: 'Data Governance', icon: 'ti ti-database', class: 'blue' }
];

const getTopic = (post) => {
  const title = post.title.toLowerCase();
  const body = post.body.toLowerCase();
  if (title.includes('identity') || title.includes('mfa') || title.includes('access') || title.includes('iam')) return 'iam';
  if (title.includes('nist') || title.includes('itad') || title.includes('disposal') || title.includes('lifecycle')) return 'itad';
  if (title.includes('sustainability') || title.includes('circular') || title.includes('esg') || title.includes('green') || title.includes('carbon')) return 'sustainability';
  if (title.includes('governance') || title.includes('classification') || title.includes('purview') || title.includes('data')) return 'data';
  return 'cybersecurity';
};

const getTopicIcon = (topic) => {
  const cat = topicCategories.find(c => c.id === topic);
  return cat ? cat.icon : 'ti ti-shield-lock';
};

const getTopicBg = (topic) => {
  if (topic === 'cybersecurity') return 'bg-cyber';
  if (topic === 'itad') return 'bg-itad';
  if (topic === 'sustainability') return 'bg-esg';
  if (topic === 'iam') return 'bg-iam';
  if (topic === 'data') return 'bg-data';
  return 'bg-cyber';
};

const getBadgeClass = (topic) => {
  if (topic === 'cybersecurity') return 'cat-navy';
  if (topic === 'sustainability') return 'cat-green';
  if (topic === 'itad') return 'cat-slate';
  if (topic === 'iam') return 'cat-purple';
  if (topic === 'data') return 'cat-blue';
  return 'cat-dark';
};

const formatTopicName = (topic) => {
  const cat = topicCategories.find(c => c.id === topic);
  return cat ? cat.name : 'Cybersecurity';
};

const fetchArticles = async () => {
  loading.value = true;
  try {
    const response = await fetch(`${API_BASE_URL}/api/resources?category=blog`);
    const data = await response.json();
    if (data.success) {
      articles.value = data.data;
    }
  } catch (error) {
    console.error('Error fetching blog articles:', error);
  } finally {
    loading.value = false;
  }
};

// Computed statistics
const totalArticlesCount = computed(() => articles.value.length || 24);

const getTopicCount = (topicId) => {
  if (topicId === 'all') return articles.value.length;
  return articles.value.filter(a => getTopic(a) === topicId).length;
};

// Filtered articles matching search and category
const filteredArticles = computed(() => {
  return articles.value.filter(post => {
    const topic = getTopic(post);
    const matchesTopic = selectedTopic.value === 'all' || topic === selectedTopic.value;
    const matchesSearch = !searchQuery.value.trim() || 
      post.title.toLowerCase().includes(searchQuery.value.toLowerCase()) || 
      post.body.toLowerCase().includes(searchQuery.value.toLowerCase());
    return matchesTopic && matchesSearch;
  });
});

// Popular articles (just take first 4 as popular for mockup purposes)
const popularArticles = computed(() => {
  return articles.value.slice(0, 4);
});

// Featured post (first item of filtered list, or first post in articles)
const featuredPost = computed(() => {
  if (filteredArticles.value.length > 0) {
    return filteredArticles.value[0];
  }
  return null;
});

// Paginated articles (skipping featured post on page 1 to match grid style, or including if on page > 1)
const paginatedArticles = computed(() => {
  let list = [...filteredArticles.value];
  // If we have a featured post and are on page 1, skip the first item in the grid listing
  if (currentPage.value === 1 && featuredPost.value) {
    list.shift();
  }
  
  const start = (currentPage.value - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  return list.slice(start, end);
});

const totalPages = computed(() => {
  let listSize = filteredArticles.value.length;
  if (featuredPost.value) {
    listSize--; // featured post is displayed separately on page 1
  }
  if (listSize <= 0) return 1;
  return Math.ceil(listSize / itemsPerPage);
});

const paginationStart = computed(() => {
  let listSize = filteredArticles.value.length;
  if (listSize === 0) return 0;
  return 1;
});

const paginationEnd = computed(() => {
  return filteredArticles.value.length;
});

const formatDate = (dateString) => {
  if (!dateString) return '';
  const date = new Date(dateString);
  return date.toLocaleDateString('en-AU', { day: 'numeric', month: 'long', year: 'numeric' });
};

const truncateText = (text, length) => {
  if (!text) return '';
  if (text.length <= length) return text;
  return text.substring(0, length) + '...';
};

const handleNewsletter = () => {
  if (!newsletterEmail.value) return;
  
  // Set feedback state
  newsletterStatus.value = {
    text: '✓ Subscribed!',
    style: {
      backgroundColor: '#16a34a',
      color: '#fff'
    }
  };
  
  newsletterEmail.value = '';
  
  setTimeout(() => {
    newsletterStatus.value = {
      text: 'Subscribe →',
      style: {}
    };
  }, 3000);
};

onMounted(() => {
  fetchArticles();
});
</script>

<style scoped>
/* ============================================================
   RESOURCES SUB-NAV
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
  color: #002366;
  font-weight: 700;
  border-bottom-color: #002366;
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
.page-hero::after {
  content: '';
  position: absolute;
  right: -140px;
  top: -140px;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(112, 128, 144, 0.07) 0%, transparent 70%);
  pointer-events: none;
}
.hero-in { max-width: 1080px; margin: 0 auto; position: relative; z-index: 1; }
.breadcrumb { display: flex; align-items: center; gap: 6px; margin-bottom: 20px; }
.bc-link { color: rgba(255, 255, 255, 0.45); font-size: 12px; transition: color .15s; text-decoration: none;}
.bc-link:hover { color: rgba(255, 255, 255, 0.75); }
.bc-sep { color: rgba(255, 255, 255, 0.22); font-size: 12px; }
.bc-cur { color: rgba(255, 255, 255, 0.7); font-size: 12px; }
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
.hero-layout { display: grid; grid-template-columns: 1fr 320px; gap: 40px; align-items: start; }
.page-h1 {
  color: #fff;
  font-size: 36px;
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -0.8px;
  margin-bottom: 12px;
}
.page-h1 .accent { color: #708090; }
.page-sub { color: rgba(255, 255, 255, 0.55); font-size: 15px; line-height: 1.68; max-width: 500px; margin-bottom: 28px; }

/* Search bar */
.search-wrap { position: relative; margin-bottom: 20px; }
.search-input {
  width: 100%;
  background: rgba(255, 255, 255, 0.08);
  border: 0.5px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  padding: 12px 44px 12px 16px;
  font-size: 13.5px;
  color: #fff;
  font-family: inherit;
  outline: none;
  transition: background .15s, border-color .15s;
}
.search-input::placeholder { color: rgba(255, 255, 255, 0.3); }
.search-input:focus { background: rgba(255, 255, 255, 0.12); border-color: rgba(255, 255, 255, 0.4); }
.search-icon { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); color: rgba(255, 255, 255, 0.35); font-size: 17px; pointer-events: none; }

/* Hero stats */
.hero-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  border-top: 0.5px solid rgba(255, 255, 255, 0.1);
  padding-top: 22px;
}
.hstat { padding: 0 16px 0 0; text-align: left; }
.hstat + .hstat { padding-left: 16px; border-left: 0.5px solid rgba(255, 255, 255, 0.1); }
.hstat-num { color: #fff; font-size: 18px; font-weight: 800; letter-spacing: -0.5px; }
.hstat-label { color: rgba(255, 255, 255, 0.42); font-size: 10px; margin-top: 3px; line-height: 1.4; }

/* Hero aside */
.hero-aside { display: flex; flex-direction: column; gap: 12px; }
.aside-card { background: rgba(255, 255, 255, 0.06); border: 0.5px solid rgba(255, 255, 255, 0.12); border-radius: 10px; padding: 18px 20px; text-align: left; }
.aside-title { font-size: 10px; font-weight: 700; letter-spacing: 1.3px; text-transform: uppercase; color: rgba(255, 255, 255, 0.38); margin-bottom: 14px; }
.aside-post { display: flex; align-items: flex-start; gap: 10px; padding: 8px 0; border-bottom: 0.5px solid rgba(255, 255, 255, 0.07); }
.aside-post:last-child { border-bottom: none; padding-bottom: 0; }
.aside-post-num { font-size: 13px; font-weight: 800; color: rgba(255, 255, 255, 0.2); flex-shrink: 0; width: 18px; }
.aside-post-title { font-size: 12px; font-weight: 600; color: rgba(255, 255, 255, 0.75); line-height: 1.4; text-align: left; }
.aside-post-title a { text-decoration: none; }
.aside-post-title a:hover { color: #fff; }
.aside-post-cat { font-size: 10px; color: rgba(255, 255, 255, 0.38); margin-top: 2px; }

/* Newsletter mini */
.nl-mini { background: rgba(255, 255, 255, 0.06); border: 0.5px solid rgba(255, 255, 255, 0.12); border-radius: 10px; padding: 18px 20px; text-align: left; }
.nl-mini-title { font-size: 13px; font-weight: 700; color: #fff; margin-bottom: 4px; }
.nl-mini-sub { font-size: 11.5px; color: rgba(255, 255, 255, 0.45); margin-bottom: 12px; line-height: 1.4; }
.nl-mini-form { display: flex; gap: 6px; }
.nl-mini-input {
  flex: 1;
  background: rgba(255, 255, 255, 0.08);
  border: 0.5px solid rgba(255, 255, 255, 0.2);
  border-radius: 6px;
  padding: 9px 12px;
  font-size: 12px;
  color: #fff;
  font-family: inherit;
  outline: none;
}
.nl-mini-input::placeholder { color: rgba(255, 255, 255, 0.28); }
.nl-mini-btn {
  background: #002366;
  color: #fff;
  font-size: 12px;
  font-weight: 700;
  padding: 9px 14px;
  border-radius: 6px;
  border: none;
  white-space: nowrap;
  transition: opacity .15s, background-color .15s;
}
.nl-mini-btn:hover { opacity: 0.85; }

/* ============================================================
   CATEGORY FILTER BAR
============================================================ */
.filter-bar { background: #fff; border-bottom: 0.5px solid #e2e5ec; padding: 0 32px; }
.filter-in { max-width: 1080px; margin: 0 auto; display: flex; align-items: center; gap: 6px; overflow-x: auto; padding: 12px 0; }
.filter-in::-webkit-scrollbar { display: none; }
.filter-label { font-size: 10px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; color: #708090; white-space: nowrap; margin-right: 4px; }
.filter-btn {
  display: flex;
  align-items: center;
  gap: 5px;
  background: #f5f7fa;
  border: 0.5px solid #dde1e9;
  border-radius: 20px;
  padding: 5px 13px;
  font-size: 12px;
  font-weight: 500;
  color: #6b7280;
  white-space: nowrap;
  cursor: pointer;
  transition: background .15s, border-color .15s, color .15s;
}
.filter-btn:hover { background: #eef2fb; border-color: #b0bad0; color: #002366; }
.filter-btn.active { background: #002366; border-color: #002366; color: #fff; font-weight: 600; }
.filter-btn i { font-size: 13px; }
.filter-count {
  background: rgba(255, 255, 255, 0.2);
  color: inherit;
  font-size: 10px;
  font-weight: 700;
  padding: 1px 6px;
  border-radius: 8px;
}
.filter-btn:not(.active) .filter-count { background: #e8eef8; color: #708090; }

/* ============================================================
   MAIN BLOG LAYOUT
============================================================ */
.blog-sec { padding: 48px 32px 72px; background: #f2f4f8; text-align: left; }
.blog-in { max-width: 1080px; margin: 0 auto; }
.blog-layout { display: grid; grid-template-columns: 1fr 300px; gap: 28px; align-items: start; }

.loading-state, .empty-state {
  text-align: center;
  padding: 40px;
  background: #fff;
  border-radius: 12px;
  border: 0.5px solid #dde1e9;
}
.spin-icon {
  font-size: 28px;
  display: inline-block;
  animation: spin 1s linear infinite;
  color: #002366;
  margin-bottom: 10px;
}
@keyframes spin { 100% { transform: rotate(360deg); } }

/* ============================================================
   FEATURED POST
============================================================ */
.featured-post {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 14px;
  overflow: hidden;
  margin-bottom: 24px;
  transition: transform .2s, box-shadow .2s;
}
.featured-post:hover { transform: translateY(-3px); box-shadow: 0 10px 32px rgba(0, 35, 102, 0.09); }
.fp-img {
  background: linear-gradient(135deg, #002366 0%, #1a3a6e 60%, #002366 100%);
  height: 200px;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}
.fp-img-grid {
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                   linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
  background-size: 32px 32px;
}
.fp-img-icon { font-size: 64px; color: rgba(255, 255, 255, 0.08); }
.fp-featured-badge {
  position: absolute;
  top: 16px;
  left: 16px;
  display: flex;
  align-items: center;
  gap: 5px;
  background: #d97706;
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  padding: 4px 10px;
  border-radius: 4px;
}
.fp-cat-badge {
  position: absolute;
  top: 16px;
  right: 16px;
  background: rgba(0, 35, 102, 0.7);
  backdrop-filter: blur(4px);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.5px;
  padding: 4px 10px;
  border-radius: 4px;
  display: flex;
  align-items: center;
  gap: 5px;
}
.fp-body { padding: 24px 28px; text-align: left; }
.fp-meta { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
.fp-cat { font-size: 11px; font-weight: 700; color: #002366; letter-spacing: 0.5px; text-transform: uppercase; }
.fp-dot { width: 3px; height: 3px; border-radius: 50%; background: #b0b8c8; }
.fp-date { font-size: 11px; color: #708090; }
.fp-read { font-size: 11px; color: #708090; display: flex; align-items: center; gap: 4px; }
.fp-read i { font-size: 12px; }
.fp-h2 { font-size: 20px; font-weight: 800; color: #002366; line-height: 1.25; letter-spacing: -0.3px; margin-bottom: 10px; }
.fp-h2 a { color: inherit; transition: color .15s; text-decoration: none; }
.fp-h2 a:hover { color: #1a3a6e; }
.fp-excerpt { font-size: 13.5px; color: #6b7280; line-height: 1.65; margin-bottom: 18px; }
.fp-footer { display: flex; align-items: center; justify-content: space-between; }
.fp-author { display: flex; align-items: center; gap: 8px; }
.fp-avatar { width: 28px; height: 28px; border-radius: 50%; background: #e8eef8; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 700; color: #002366; flex-shrink: 0; }
.fp-author-name { font-size: 12px; font-weight: 600; color: #444c5c; text-align: left;}
.fp-author-role { font-size: 10.5px; color: #708090; text-align: left;}
.fp-read-more {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 12.5px;
  font-weight: 700;
  color: #002366;
  background: #eef2fb;
  border-radius: 6px;
  padding: 7px 14px;
  text-decoration: none;
  transition: background .15s, gap .15s;
}
.fp-read-more:hover { background: #dde8f5; gap: 8px; }
.fp-read-more i { font-size: 13px; }

/* ============================================================
   POST GRID
============================================================ */
.post-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 30px; }
.post-card {
  background: #fff;
  border: 0.5px solid #dde1e9;
  border-radius: 12px;
  overflow: hidden;
  transition: transform .2s, box-shadow .2s;
  display: flex;
  flex-direction: column;
}
.post-card:hover { transform: translateY(-3px); box-shadow: 0 8px 26px rgba(0, 35, 102, 0.09); }
.pc-img {
  height: 120px;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}
.pc-img i { font-size: 40px; color: rgba(255, 255, 255, 0.15); z-index: 1; position: relative; }
.pc-cat-badge {
  position: absolute;
  bottom: 10px;
  left: 12px;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  padding: 3px 9px;
  border-radius: 3px;
}

/* Category gradients */
.bg-cyber { background: linear-gradient(135deg, #002366, #1a3a6e); }
.bg-itad { background: linear-gradient(135deg, #374151, #1f2937); }
.bg-esg { background: linear-gradient(135deg, #052e16, #065f46); }
.bg-data { background: linear-gradient(135deg, #1e3a5f, #0f2847); }
.bg-iam { background: linear-gradient(135deg, #4a1d96, #2e1065); }

.cat-navy { background: rgba(0, 35, 102, 0.8); color: #fff; }
.cat-green { background: rgba(22, 163, 74, 0.85); color: #fff; }
.cat-slate { background: rgba(55, 65, 81, 0.8); color: #fff; }
.cat-purple { background: rgba(109, 40, 217, 0.8); color: #fff; }
.cat-blue { background: rgba(14, 116, 144, 0.8); color: #fff; }
.cat-dark { background: rgba(0, 0, 0, 0.45); color: #fff; }

.pc-body { padding: 16px 18px; flex: 1; display: flex; flex-direction: column; text-align: left; }
.pc-meta { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
.pc-cat-label { font-size: 10px; font-weight: 700; color: #002366; letter-spacing: 0.4px; text-transform: uppercase; }
.pc-dot { width: 3px; height: 3px; border-radius: 50%; background: #dde1e9; }
.pc-date { font-size: 10.5px; color: #708090; }
.pc-read { font-size: 10.5px; color: #708090; display: flex; align-items: center; gap: 3px; }
.pc-read i { font-size: 11px; }
.pc-h2 { font-size: 14px; font-weight: 800; color: #002366; line-height: 1.3; letter-spacing: -0.2px; margin-bottom: 8px; flex: 1; }
.pc-h2 a { color: inherit; transition: color .15s; text-decoration: none; }
.pc-h2 a:hover { color: #1a3a6e; }
.pc-excerpt { font-size: 12.5px; color: #6b7280; line-height: 1.58; margin-bottom: 14px; }
.pc-footer { display: flex; align-items: center; justify-content: space-between; margin-top: auto; }
.pc-author { display: flex; align-items: center; gap: 6px; }
.pc-avatar { width: 22px; height: 22px; border-radius: 50%; background: #e8eef8; display: flex; align-items: center; justify-content: center; font-size: 8px; font-weight: 700; color: #002366; flex-shrink: 0; }
.pc-author-name { font-size: 11px; color: #708090; }
.pc-link { display: inline-flex; align-items: center; gap: 3px; font-size: 11.5px; font-weight: 700; color: #002366; text-decoration: none; transition: gap .15s; }
.pc-link:hover { gap: 6px; }
.pc-link i { font-size: 13px; }

/* ============================================================
   SIDEBAR
============================================================ */
.sidebar { display: flex; flex-direction: column; gap: 18px; position: sticky; top: 130px; }
.sb-card { background: #fff; border: 0.5px solid #dde1e9; border-radius: 12px; overflow: hidden; text-align: left; }
.sb-head { padding: 14px 18px; border-bottom: 0.5px solid #f0f3f7; }
.sb-head-title { font-size: 13px; font-weight: 800; color: #002366; }
.sb-body { padding: 14px 18px; }

/* Categories list */
.cat-list { display: flex; flex-direction: column; gap: 2px; }
.cat-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 8px 10px;
  border-radius: 7px;
  cursor: pointer;
  text-decoration: none;
  transition: background .12s;
}
.cat-item:hover { background: #f7f8fb; }
.cat-item-left { display: flex; align-items: center; gap: 9px; }
.cat-item-icon { width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.cat-item-icon i { font-size: 14px; }
.cat-item-icon.navy { background: #e8eef8; } .cat-item-icon.navy i { color: #002366; }
.cat-item-icon.green { background: #f0fdf4; } .cat-item-icon.green i { color: #16a34a; }
.cat-item-icon.purple { background: #faf5ff; } .cat-item-icon.purple i { color: #7c3aed; }
.cat-item-icon.slate { background: #f0f3f7; } .cat-item-icon.slate i { color: #708090; }
.cat-item-icon.blue { background: #eff6ff; } .cat-item-icon.blue i { color: #2563eb; }
.cat-item-name { font-size: 12.5px; font-weight: 600; color: #444c5c; }
.cat-item-count {
  background: #f0f4fa;
  color: #708090;
  font-size: 10px;
  font-weight: 700;
  padding: 2px 7px;
  border-radius: 8px;
}

/* Popular posts */
.pop-post { display: flex; align-items: flex-start; gap: 10px; padding: 8px 0; border-bottom: 0.5px solid #f5f7fa; }
.pop-post:last-child { border-bottom: none; padding-bottom: 0; }
.pop-num { font-size: 14px; font-weight: 800; color: #dde1e9; flex-shrink: 0; width: 16px; }
.pop-title { font-size: 12px; font-weight: 600; color: #002366; line-height: 1.4; transition: color .15s; text-decoration: none; }
.pop-title:hover { color: #1a3a6e; }
.pop-meta { font-size: 10.5px; color: #708090; margin-top: 3px; display: flex; align-items: center; gap: 4px; }
.pop-meta i { font-size: 11px; }

/* Tags cloud */
.sb-tags { display: flex; flex-wrap: wrap; gap: 6px; }
.sb-tag {
  background: #f5f7fa;
  border: 0.5px solid #dde1e9;
  border-radius: 20px;
  padding: 4px 10px;
  font-size: 11px;
  font-weight: 500;
  color: #6b7280;
  text-decoration: none;
  transition: background .12s, color .12s;
  cursor: pointer;
}
.sb-tag:hover { background: #eef2fb; color: #002366; border-color: #b0bad0; }

/* CTA card */
.sb-cta {
  background: linear-gradient(135deg, #002366, #1a3a6e);
  border-radius: 12px;
  padding: 22px 20px;
  text-align: left;
}
.sb-cta-title { font-size: 14px; font-weight: 800; color: #fff; margin-bottom: 6px; }
.sb-cta-desc { font-size: 12px; color: rgba(255,255,255,0.55); line-height: 1.55; margin-bottom: 14px; }
.sb-cta-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  background: #fff;
  color: #002366;
  font-size: 12.5px;
  font-weight: 700;
  padding: 10px 16px;
  border-radius: 6px;
  text-decoration: none;
  transition: opacity .15s;
  width: 100%;
}
.sb-cta-btn:hover { opacity: 0.92; }
.sb-cta-btn i { font-size: 14px; }

/* Newsletter sidebar */
.sb-newsletter { background: #f7f8fb; border: 0.5px solid #dde1e9; border-radius: 12px; padding: 20px 18px; text-align: left; }
.sb-nl-icon { width: 40px; height: 40px; border-radius: 9px; background: #e8eef8; display: flex; align-items: center; justify-content: center; margin-bottom: 12px; }
.sb-nl-icon i { font-size: 20px; color: #002366; }
.sb-nl-title { font-size: 13.5px; font-weight: 800; color: #002366; margin-bottom: 5px; }
.sb-nl-desc { font-size: 12px; color: #6b7280; line-height: 1.55; margin-bottom: 14px; }
.sb-nl-form { display: flex; flex-direction: column; gap: 8px; }
.sb-nl-input {
  width: 100%;
  background: #fff;
  border: 0.5px solid #d4d8e2;
  border-radius: 7px;
  padding: 10px 12px;
  font-size: 13px;
  color: #1a2233;
  font-family: inherit;
  outline: none;
  transition: border-color .15s;
}
.sb-nl-input:focus { border-color: #002366; }
.sb-nl-input::placeholder { color: #b0b8c8; }
.sb-nl-btn {
  width: 100%;
  background: #002366;
  color: #fff;
  font-size: 13px;
  font-weight: 700;
  padding: 11px;
  border-radius: 7px;
  border: none;
  transition: opacity .15s, background-color .15s;
  cursor: pointer;
}
.sb-nl-btn:hover { opacity: 0.9; }
.sb-nl-note { font-size: 10.5px; color: #b0b8c8; text-align: center; margin-top: 4px; }

/* ============================================================
   PAGINATION
============================================================ */
.pagination { display: flex; align-items: center; justify-content: center; gap: 6px; margin-top: 32px; }
.page-btn {
  width: 36px;
  height: 36px;
  border-radius: 7px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 13px;
  font-weight: 600;
  color: #6b7280;
  background: #fff;
  border: 0.5px solid #dde1e9;
  cursor: pointer;
  transition: background .15s, color .15s, border-color .15s;
  text-decoration: none;
}
.page-btn:hover:not(:disabled) { background: #eef2fb; color: #002366; border-color: #b0bad0; }
.page-btn.active { background: #002366; color: #fff; border-color: #002366; }
.page-btn.nav-btn { width: auto; padding: 0 14px; gap: 5px; font-size: 12.5px; }
.page-btn.nav-btn i { font-size: 14px; }
.page-btn:disabled { opacity: 0.5; cursor: not-allowed; }

/* ============================================================
   TOPICS SECTION
============================================================ */
.topics-sec { background: #fff; padding: 40px 32px; border-top: 0.5px solid #e2e5ec; text-align: left; }
.topics-in { max-width: 1080px; margin: 0 auto; }
.sh2 { font-size: 24px; font-weight: 800; color: #002366; margin-bottom: 6px; letter-spacing: -0.4px; }
.topics-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 12px; margin-top: 20px; }
.topic-card {
  background: #f7f8fb;
  border: 0.5px solid #dde1e9;
  border-radius: 10px;
  padding: 16px 14px;
  text-decoration: none;
  transition: background .15s, border-color .15s, transform .15s;
  display: flex;
  align-items: flex-start;
  gap: 10px;
}
.topic-card:hover { background: #eef2fb; border-color: #b0bad0; transform: translateY(-2px); }
.topic-icon { width: 34px; height: 34px; border-radius: 7px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.topic-icon i { font-size: 17px; }
.topic-icon.navy { background: #e8eef8; } .topic-icon.navy i { color: #002366; }
.topic-icon.green { background: #f0fdf4; } .topic-icon.green i { color: #16a34a; }
.topic-icon.purple { background: #faf5ff; } .topic-icon.purple i { color: #7c3aed; }
.topic-icon.slate { background: #f0f3f7; } .topic-icon.slate i { color: #708090; }
.topic-icon.blue { background: #eff6ff; } .topic-icon.blue i { color: #2563eb; }
.topic-name { font-size: 12.5px; font-weight: 700; color: #002366; margin-bottom: 2px; }
.topic-count { font-size: 11px; color: #708090; }

/* ============================================================
   NEWSLETTER BAND
============================================================ */
.newsletter-band { background: #002366; padding: 52px 32px; text-align: left; }
.nl-band-in { max-width: 1080px; margin: 0 auto; display: grid; grid-template-columns: 1fr 400px; gap: 40px; align-items: center; }
.nl-band-tag { font-size: 10px; font-weight: 700; letter-spacing: 1.4px; text-transform: uppercase; color: rgba(255,255,255,0.4); margin-bottom: 6px; }
.nl-band-h { font-size: 22px; font-weight: 800; color: #fff; margin-bottom: 6px; letter-spacing: -0.3px; }
.nl-band-sub { font-size: 13px; color: rgba(255,255,255,0.52); line-height: 1.55; }
.nl-band-form { display: flex; gap: 8px; }
.nl-band-input {
  flex: 1;
  background: rgba(255,255,255,0.08);
  border: 0.5px solid rgba(255,255,255,0.2);
  border-radius: 7px;
  padding: 12px 16px;
  font-size: 13.5px;
  color: #fff;
  font-family: inherit;
  outline: none;
  transition: background .15s, border-color .15s;
}
.nl-band-input::placeholder { color: rgba(255,255,255,0.28); }
.nl-band-input:focus { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.4); }
.nl-band-btn {
  background: #fff;
  color: #002366;
  font-size: 13px;
  font-weight: 700;
  padding: 12px 20px;
  border-radius: 7px;
  border: none;
  white-space: nowrap;
  transition: opacity .15s, background-color .15s;
  cursor: pointer;
}
.nl-band-btn:hover { opacity: 0.92; }
.nl-band-note { font-size: 11px; color: rgba(255,255,255,0.3); margin-top: 8px; display: flex; align-items: center; gap: 5px; }
.nl-band-note i { font-size: 13px; }
.nl-benefits { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px; }
.nl-benefit { display: flex; align-items: center; gap: 5px; font-size: 11.5px; color: rgba(255,255,255,0.55); }
.nl-benefit i { font-size: 13px; color: rgba(255,255,255,0.3); }

/* ============================================================
   CTA BAND
============================================================ */
.ctaband { background: #001440; padding: 48px 32px; border-top: 0.5px solid rgba(255,255,255,0.06); text-align: left; }
.ctaband-in { display: flex; align-items: center; justify-content: space-between; gap: 20px; max-width: 1080px; margin: 0 auto; }
.ctaband-left h3 { color: #fff; font-size: 20px; font-weight: 800; margin-bottom: 5px; letter-spacing: -0.3px; }
.ctaband-left p { color: rgba(255,255,255,0.5); font-size: 13px; }
.ctaband-btns { display: flex; gap: 10px; flex-shrink: 0; }
.cta-white { background: #fff; color: #002366; font-size: 13px; font-weight: 700; padding: 12px 22px; border-radius: 5px; border: none; white-space: nowrap; text-decoration: none; transition: opacity .15s; }
.cta-white:hover { opacity: 0.92; }
.cta-outline { background: transparent; color: rgba(255,255,255,0.8); font-size: 13px; font-weight: 600; padding: 12px 22px; border-radius: 5px; border: 0.5px solid rgba(255,255,255,0.25); white-space: nowrap; text-decoration: none; transition: color .15s, border-color .15s; }
.cta-outline:hover { color: #fff; border-color: rgba(255,255,255,0.45); }

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width: 960px) {
  .hero-layout, .blog-layout, .nl-band-in { grid-template-columns: 1fr; }
  .hero-aside { display: none; }
  .sidebar { position: static; }
  .post-grid { grid-template-columns: 1fr; }
  .topics-grid { grid-template-columns: repeat(2, 1fr); }
  .ctaband-in { flex-direction: column; align-items: flex-start; }
}
@media(max-width: 600px) {
  .page-hero { padding: 36px 20px 44px; }
  .page-h1 { font-size: 26px; }
  .blog-sec { padding: 36px 20px 56px; }
  .filter-bar { padding: 0 20px; }
  .topics-sec { padding: 32px 20px; }
  .topics-grid { grid-template-columns: 1fr 1fr; }
  .newsletter-band { padding: 40px 20px; }
  .ctaband { padding: 36px 20px; }
  .rn-inner { padding: 0 20px; }
}
</style>
