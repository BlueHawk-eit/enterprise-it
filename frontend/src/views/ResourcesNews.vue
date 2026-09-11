<template>
  <div class="news-view">
    <!-- Resources Sub-Nav -->
    <nav class="resources-nav" aria-label="Resources sections">
      <div class="rn-inner">
        <span class="rn-label">Resources</span>
        <router-link to="/resources/sustainability" class="rn-link"><i class="ti ti-leaf" aria-hidden="true"></i>Sustainability</router-link>
        <router-link to="/resources/blog" class="rn-link"><i class="ti ti-article" aria-hidden="true"></i>Blog</router-link>
        <router-link to="/resources/news" class="rn-link active" aria-current="page"><i class="ti ti-news" aria-hidden="true"></i>News</router-link>
      </div>
    </nav>

    <!-- CAPABILITY TICKER -->
    <div class="ticker" aria-label="What enterprise IT does">
      <div class="ticker-in">
        <span class="ticker-badge">enterprise IT</span>
        <span class="ticker-text">ICT lifecycle management, secure IT asset disposition and 24/7 cyber defence &nbsp;·&nbsp; South Australian owned and operated, servicing enterprise clients Australia-wide &nbsp;·&nbsp; Data sanitisation performed to NIST SP 800-88 standards &nbsp;·&nbsp; Every enquiry answered by a specialist within 24 business hours</span>
      </div>
    </div>

    <!-- PAGE HERO -->
    <section class="page-hero" aria-labelledby="page-h1">
      <div class="hero-in">
        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <router-link to="/" class="bc-link">Home</router-link>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-link">Resources</span>
          <span class="bc-sep" aria-hidden="true">/</span>
          <span class="bc-cur" aria-current="page">News</span>
        </nav>

        <div class="hero-layout">
          <div>
            <div class="eyebrow">
              <span class="eyebrow-dot" aria-hidden="true"></span>
              Resources · Company &amp; Industry News
            </div>
            <h1 class="page-h1" id="page-h1">
              enterprise IT News.<br>
              <span class="accent">Stay informed.</span>
            </h1>
            <p class="page-sub">
              Company announcements, industry developments, cybersecurity alerts, and enterprise technology news — direct from the enterprise IT team in Adelaide.
            </p>

            <div class="hero-stats" aria-label="News statistics">
              <div class="hstat">
                <div class="hstat-num">{{ totalArticlesCount }}+</div>
                <div class="hstat-label">News articles<br>published</div>
              </div>
              <div class="hstat">
                <div class="hstat-num">4</div>
                <div class="hstat-label">Categories<br>covered</div>
              </div>
              <div class="hstat">
                <div class="hstat-num">Weekly</div>
                <div class="hstat-label">Updates when<br>news breaks</div>
              </div>
            </div>
          </div>

          <!-- Hero aside — latest news links -->
          <aside class="hero-aside" aria-label="Latest updates">
            <div class="aside-card">
              <div class="aside-title">Most Recent</div>
              <div class="aside-item" v-for="(post, index) in popularArticles" :key="post.slug">
                <div class="aside-item-num">{{ index + 1 }}</div>
                <div>
                  <div class="aside-item-title">
                    <router-link :to="'/resources/news/' + post.slug" style="color:inherit;">{{ post.title }}</router-link>
                  </div>
                  <div class="aside-item-meta">{{ formatTopicName(getTopic(post)) }} · {{ formatDateShort(post.published_at) }}</div>
                </div>
              </div>
            </div>
            <div class="aside-card">
              <div class="aside-title">Follow Our Coverage</div>
              <a href="https://www.linkedin.com/company/enterpriseitau/" target="_blank" rel="noopener" style="display:flex;align-items:center;gap:10px;padding:5px 0;color:rgba(255,255,255,0.7);text-decoration:none;">
                <div style="width:32px;height:32px;border-radius:7px;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;"><i class="ti ti-brand-linkedin" style="font-size:17px;"></i></div>
                <div><div style="font-size:12px;font-weight:600;color:#fff;">Follow on LinkedIn</div><div style="font-size:10.5px;color:rgba(255,255,255,0.45);">enterprise IT updates</div></div>
              </a>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- FILTER BAR -->
    <div class="filter-bar" role="navigation" aria-label="Filter news by topic">
      <div class="filter-in">
        <span class="filter-label">Filter</span>
        <button 
          v-for="cat in topicCategories" 
          :key="cat.id" 
          class="fbtn" 
          :class="{ active: selectedTopic === cat.id }" 
          @click="selectedTopic = cat.id"
          :aria-pressed="selectedTopic === cat.id ? 'true' : 'false'"
        >
          <i :class="cat.icon" aria-hidden="true"></i>{{ cat.name }}
          <span style="opacity:.65;font-size:10px;margin-left:2px">{{ getTopicCount(cat.id) }}</span>
        </button>
      </div>
    </div>

    <!-- MAIN NEWS SECTION -->
    <div class="news-sec">
      <div class="news-in">
        <!-- Loading State -->
        <div v-if="loading" class="loading-state">
          <i class="ti ti-spinner spin-icon" aria-hidden="true"></i>
          <p>Loading news...</p>
        </div>

        <div v-else class="news-layout">
          <!-- ===== MAIN COLUMN ===== -->
          <div>
            <!-- Empty State -->
            <div v-if="filteredArticles.length === 0" class="empty-state">
              <p>No news articles found matching your criteria.</p>
            </div>

            <div v-else>
              <!-- FEATURED NEWS (Shown only on page 1 of All News) -->
              <article v-if="featuredPost" class="feat-card fade-up visible" itemscope itemtype="https://schema.org/NewsArticle">
                <meta itemprop="datePublished" :content="featuredPost.published_at"/>
                <meta itemprop="dateModified" :content="featuredPost.published_at"/>
                <meta itemprop="author" content="enterprise IT"/>
                <div class="fc-img" :class="getTopicBg(getTopic(featuredPost))" aria-hidden="true">
                  <div class="fc-img-grid"></div>
                  <i :class="getTopicIcon(getTopic(featuredPost))" class="fp-img-icon" style="font-size:64px;color:rgba(255,255,255,0.08);position:relative;z-index:1;"></i>
                  <div class="fc-breaking"><span style="width:6px;height:6px;border-radius:50%;background:#fff;animation:pulse-light 1.5s infinite;"></span>Latest</div>
                  <div class="fc-cat-b"><i :class="getTopicIcon(getTopic(featuredPost))" style="font-size:11px;"></i>{{ formatTopicName(getTopic(featuredPost)) }}</div>
                </div>
                <div class="fc-body">
                  <div class="fc-meta">
                    <span class="fc-cat">{{ formatTopicName(getTopic(featuredPost)) }}</span>
                    <span class="fc-dot" aria-hidden="true"></span>
                    <time class="fc-date" :datetime="featuredPost.published_at">{{ formatDate(featuredPost.published_at) }}</time>
                    <span class="fc-dot" aria-hidden="true"></span>
                    <span class="fc-read"><i class="ti ti-clock" aria-hidden="true"></i>{{ featuredPost.readTime || '3 min read' }}</span>
                  </div>
                  <h2 class="fc-h2" itemprop="headline">
                    <router-link :to="'/resources/news/' + featuredPost.slug">{{ featuredPost.title }}</router-link>
                  </h2>
                  <p class="fc-excerpt" itemprop="description">{{ truncateText(featuredPost.body, 250) }}</p>
                  <div class="fc-footer">
                    <address class="fc-author" rel="author" itemprop="author" itemscope itemtype="https://schema.org/Organization">
                      <div class="fc-avatar" aria-hidden="true">EI</div>
                      <div><div class="fc-author-name" itemprop="name">enterprise IT</div><div class="fc-author-role">Adelaide CBD</div></div>
                    </address>
                    <router-link :to="'/resources/news/' + featuredPost.slug" class="fc-read-more" aria-label="Read full article">Read article <i class="ti ti-arrow-right" aria-hidden="true"></i></router-link>
                  </div>
                </div>
              </article>

              <!-- SECTION LABEL -->
              <div class="sec-label-row fade-up visible">
                <p class="stag">Latest News</p>
                <span class="total-label">Showing {{ paginationStart }}–{{ paginationEnd }} of {{ filteredArticles.length }} articles</span>
              </div>

              <!-- NEWS GRID -->
              <div class="news-grid" role="list" aria-label="News articles">
                <article v-for="post in paginatedArticles" :key="post.slug" class="nc fade-up visible" role="listitem" itemscope itemtype="https://schema.org/NewsArticle">
                  <meta itemprop="datePublished" :content="post.published_at"/>
                  <div class="nc-img" :class="getTopicBg(getTopic(post))" aria-hidden="true">
                    <i :class="getTopicIcon(getTopic(post))"></i>
                    <span class="nc-cat-b" :class="getBadgeClass(getTopic(post))">{{ formatTopicName(getTopic(post)) }}</span>
                  </div>
                  <div class="nc-body">
                    <div class="nc-meta">
                      <span class="nc-cat-l">{{ formatTopicName(getTopic(post)) }}</span><span class="nc-dot" aria-hidden="true"></span>
                      <time class="nc-date" :datetime="post.published_at">{{ formatDate(post.published_at) }}</time><span class="nc-dot" aria-hidden="true"></span>
                      <span class="nc-read"><i class="ti ti-clock" aria-hidden="true"></i>{{ post.readTime || '3 min' }}</span>
                    </div>
                    <h2 class="nc-h2" itemprop="headline">
                      <router-link :to="'/resources/news/' + post.slug">{{ post.title }}</router-link>
                    </h2>
                    <p class="nc-excerpt" itemprop="description">{{ truncateText(post.body, 140) }}</p>
                    <div class="nc-footer">
                      <div class="nc-author"><div class="nc-av" aria-hidden="true">EI</div><span class="nc-author-name">enterprise IT</span></div>
                      <router-link :to="'/resources/news/' + post.slug" class="nc-link" aria-label="Read full article">Read <i class="ti ti-arrow-right" aria-hidden="true"></i></router-link>
                    </div>
                  </div>
                </article>
              </div>

              <!-- PAGINATION -->
              <nav v-if="totalPages > 1" class="pagination" aria-label="News page navigation">
                <button class="pgbtn nav-btn" :disabled="currentPage === 1" @click="currentPage--" aria-label="Previous page">
                  <i class="ti ti-chevron-left" aria-hidden="true"></i>Prev
                </button>
                <button 
                  v-for="page in totalPages" 
                  :key="page" 
                  class="pgbtn" 
                  :class="{ active: currentPage === page }" 
                  @click="currentPage = page"
                  :aria-current="currentPage === page ? 'page' : undefined"
                  :aria-label="'Page ' + page"
                >
                  {{ page }}
                </button>
                <button class="pgbtn nav-btn" :disabled="currentPage === totalPages" @click="currentPage++" aria-label="Next page">
                  Next<i class="ti ti-chevron-right" aria-hidden="true"></i>
                </button>
              </nav>
            </div>
          </div>

          <!-- ===== SIDEBAR ===== -->
          <aside class="sidebar" aria-label="News sidebar">
            <!-- Topics List -->
            <div class="sb-card">
              <div class="sb-head"><div class="sb-head-title">Browse by Category</div></div>
              <div class="sb-body" style="padding:10px 14px;">
                <nav class="cat-list" aria-label="News categories">
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

            <!-- Tags -->
            <div class="sb-card">
              <div class="sb-head"><div class="sb-head-title">Topics</div></div>
              <div class="sb-body">
                <div class="sb-tags" aria-label="News topics">
                  <a href="#" @click.prevent="selectedTopic = 'company'" class="sb-tag">Company Updates</a>
                  <a href="#" @click.prevent="selectedTopic = 'cybersecurity'" class="sb-tag">Cyber Threat Alerts</a>
                  <a href="#" @click.prevent="selectedTopic = 'industry'" class="sb-tag">Compliance Updates</a>
                  <a href="#" @click.prevent="selectedTopic = 'award'" class="sb-tag">Company Awards</a>
                </div>
              </div>
            </div>

            <!-- CTA card -->
            <div class="sb-cta">
              <div class="sb-cta-title">Need custom threat intelligence?</div>
              <p class="sb-cta-desc">Talk to our security operations coordinators for South Australia specific threat matrices.</p>
              <router-link to="/contact" class="sb-cta-btn" aria-label="Contact specialist">
                <i class="ti ti-mail" aria-hidden="true"></i>Contact a Specialist
              </router-link>
            </div>

            <!-- Newsletter -->
            <div class="sb-nl">
              <div class="sb-nl-icon"><i class="ti ti-mail" aria-hidden="true"></i></div>
              <div class="sb-nl-title">Subscribe to updates</div>
              <p class="sb-nl-desc">Get announcements and alerts direct to your inbox.</p>
              <form @submit.prevent="handleNewsletter" class="sb-nl-form" aria-label="Newsletter form">
                <input class="sb-nl-input" type="email" v-model="newsletterEmail" placeholder="your@company.com.au" required aria-label="Email address" />
                <button class="sb-nl-btn" type="submit" :style="newsletterStatus.style">{{ newsletterStatus.text }}</button>
              </form>
            </div>
          </aside>
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
const selectedTopic = ref('all');
const currentPage = ref(1);
const itemsPerPage = 6;

// Newsletter States
const newsletterEmail = ref('');
const newsletterStatus = ref({
  text: 'Subscribe →',
  style: {}
});

// News topic categories
const topicCategories = [
  { id: 'all', name: 'All News', icon: 'ti ti-layout-grid', class: '' },
  { id: 'company', name: 'Company News', icon: 'ti ti-building', class: 'navy' },
  { id: 'industry', name: 'Industry News', icon: 'ti ti-world', class: 'slate' },
  { id: 'cybersecurity', name: 'Cybersecurity Alerts', icon: 'ti ti-shield-lock', class: 'green' },
  { id: 'award', name: 'Awards & Milestones', icon: 'ti ti-star-filled', class: 'amber' }
];

const getTopic = (post) => {
  const title = post.title.toLowerCase();
  const body = post.body.toLowerCase();
  if (title.includes('partnership') || title.includes('award') || title.includes('finalist') || title.includes('milestone')) return 'award';
  if (title.includes('cyber') || title.includes('alert') || title.includes('ransomware') || title.includes('sentinel') || title.includes('soc')) return 'cybersecurity';
  if (title.includes('privacy act') || title.includes('threat') || title.includes('compliance') || title.includes('regulation') || title.includes('audit')) return 'industry';
  return 'company';
};

const getTopicIcon = (topic) => {
  const cat = topicCategories.find(c => c.id === topic);
  return cat ? cat.icon : 'ti ti-building';
};

const getTopicBg = (topic) => {
  if (topic === 'company') return 'bg-co-news';
  if (topic === 'industry') return 'bg-co-industry';
  if (topic === 'cybersecurity') return 'bg-co-cyber';
  if (topic === 'award') return 'bg-co-award';
  return 'bg-co-news';
};

const getBadgeClass = (topic) => {
  if (topic === 'company') return 'cat-b-navy';
  if (topic === 'industry') return 'cat-b-slate';
  if (topic === 'cybersecurity') return 'cat-b-red';
  if (topic === 'award') return 'cat-b-amber';
  return 'cat-b-navy';
};

const formatTopicName = (topic) => {
  const cat = topicCategories.find(c => c.id === topic);
  return cat ? cat.name : 'Company News';
};

const fetchNews = async () => {
  loading.value = true;
  try {
    const response = await fetch(`${API_BASE_URL}/api/resources?category=news`);
    const data = await response.json();
    if (data.success) {
      articles.value = data.data;
    }
  } catch (error) {
    console.error('Error fetching news:', error);
  } finally {
    loading.value = false;
  }
};

const totalArticlesCount = computed(() => articles.value.length || 18);

const getTopicCount = (topicId) => {
  if (topicId === 'all') return articles.value.length;
  return articles.value.filter(a => getTopic(a) === topicId).length;
};

const filteredArticles = computed(() => {
  return articles.value.filter(post => {
    const topic = getTopic(post);
    return selectedTopic.value === 'all' || topic === selectedTopic.value;
  });
});

const popularArticles = computed(() => {
  return articles.value.slice(0, 3);
});

const featuredPost = computed(() => {
  if (filteredArticles.value.length > 0) {
    return filteredArticles.value[0];
  }
  return null;
});

const paginatedArticles = computed(() => {
  let list = [...filteredArticles.value];
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
    listSize--;
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

const formatDateShort = (dateString) => {
  if (!dateString) return '';
  const date = new Date(dateString);
  return date.toLocaleDateString('en-AU', { day: 'numeric', month: 'short', year: 'numeric' });
};

const truncateText = (text, length) => {
  if (!text) return '';
  if (text.length <= length) return text;
  return text.substring(0, length) + '...';
};

const handleNewsletter = () => {
  if (!newsletterEmail.value) return;
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
  fetchNews();
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
   BREAKING NEWS TICKER
============================================================ */
.ticker { background: #ef4444; padding: 8px 32px; overflow: hidden; text-align: left; }
.ticker-in { max-width: 1080px; margin: 0 auto; display: flex; align-items: center; gap: 12px; }
.ticker-badge { background: rgba(255,255,255,0.2); color: #fff; font-size: 10px; font-weight: 800; letter-spacing: 1px; padding: 2px 8px; border-radius: 3px; white-space: nowrap; text-transform: uppercase; }
.ticker-text { font-size: 12.5px; color: #fff; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

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
@keyframes pulse { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.6; transform: scale(0.85); } }
@keyframes pulse-light { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.4; transform: scale(0.8); } }
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
.aside-item { display: flex; align-items: flex-start; gap: 9px; padding: 8px 0; border-bottom: 0.5px solid rgba(255, 255, 255, 0.07); }
.aside-item:last-child { border-bottom: none; padding-bottom: 0; }
.aside-item-num { font-size: 13px; font-weight: 800; color: rgba(255, 255, 255, 0.2); flex-shrink: 0; width: 18px; }
.aside-item-title { font-size: 12px; font-weight: 600; color: rgba(255, 255, 255, 0.75); line-height: 1.35; text-align: left; }
.aside-item-title a { text-decoration: none; }
.aside-item-title a:hover { color: #fff; }
.aside-item-meta { font-size: 10px; color: rgba(255, 255, 255, 0.38); margin-top: 2px; }

/* ============================================================
   FILTER BAR
============================================================ */
.filter-bar { background: #fff; border-bottom: 0.5px solid #e2e5ec; padding: 0 32px; }
.filter-in { max-width: 1080px; margin: 0 auto; display: flex; align-items: center; gap: 6px; overflow-x: auto; padding: 12px 0; }
.filter-in::-webkit-scrollbar { display: none; }
.filter-label { font-size: 10px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; color: #708090; white-space: nowrap; margin-right: 4px; }
.fbtn { display: flex; align-items: center; gap: 5px; background: #f5f7fa; border: 0.5px solid #dde1e9; border-radius: 20px; padding: 5px 13px; font-size: 12px; font-weight: 500; color: #6b7280; white-space: nowrap; cursor: pointer; transition: all .15s; }
.fbtn:hover { background: #eef2fb; border-color: #b0bad0; color: #002366; }
.fbtn.active { background: #002366; border-color: #002366; color: #fff; font-weight: 600; }
.fbtn i { font-size: 13px; }

/* ============================================================
   MAIN LAYOUT
============================================================ */
.news-sec { padding: 48px 32px 72px; background: #f2f4f8; text-align: left; }
.news-in { max-width: 1080px; margin: 0 auto; }
.news-layout { display: grid; grid-template-columns: 1fr 300px; gap: 28px; align-items: start; }

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

/* ============================================================
   FEATURED NEWS CARD
============================================================ */
.feat-card { background: #fff; border: 0.5px solid #dde1e9; border-radius: 14px; overflow: hidden; margin-bottom: 24px; transition: transform .2s, box-shadow .2s; }
.feat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 32px rgba(0, 35, 102, 0.09); }
.fc-img { height: 200px; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; }
.fc-img i { font-size: 64px; color: rgba(255, 255, 255, 0.08); position: relative; z-index: 1; }
.fc-img-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px); background-size: 32px 32px; }
.fc-breaking { position: absolute; top: 16px; left: 16px; display: flex; align-items: center; gap: 5px; background: #ef4444; color: #fff; font-size: 10px; font-weight: 700; letter-spacing: 0.8px; text-transform: uppercase; padding: 4px 10px; border-radius: 4px; }
.fc-cat-b { position: absolute; top: 16px; right: 16px; background: rgba(0, 35, 102, 0.7); backdrop-filter: blur(4px); color: #fff; font-size: 10px; font-weight: 700; padding: 4px 10px; border-radius: 4px; display: flex; align-items: center; gap: 5px; }
.fc-body { padding: 24px 28px; text-align: left; }
.fc-meta { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
.fc-cat { font-size: 11px; font-weight: 700; color: #002366; letter-spacing: 0.5px; text-transform: uppercase; }
.fc-dot { width: 3px; height: 3px; border-radius: 50%; background: #b0b8c8; }
.fc-date { font-size: 11px; color: #708090; }
.fc-read { font-size: 11px; color: #708090; display: flex; align-items: center; gap: 4px; }
.fc-read i { font-size: 12px; }
.fc-h2 { font-size: 20px; font-weight: 800; color: #002366; line-height: 1.25; letter-spacing: -0.3px; margin-bottom: 10px; }
.fc-h2 a { color: inherit; transition: color .15s; text-decoration: none; }
.fc-h2 a:hover { color: #1a3a6e; }
.fc-excerpt { font-size: 13.5px; color: #6b7280; line-height: 1.65; margin-bottom: 18px; }
.fc-footer { display: flex; align-items: center; justify-content: space-between; }
.fc-author { display: flex; align-items: center; gap: 8px; }
.fc-avatar { width: 28px; height: 28px; border-radius: 50%; background: #e8eef8; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 700; color: #002366; flex-shrink: 0; }
.fc-author-name { font-size: 12px; font-weight: 600; color: #444c5c; text-align: left;}
.fc-author-role { font-size: 10.5px; color: #708090; text-align: left;}
.fc-read-more { display: inline-flex; align-items: center; gap: 5px; font-size: 12.5px; font-weight: 700; color: #002366; background: #eef2fb; border-radius: 6px; padding: 7px 14px; text-decoration: none; transition: background .15s, gap .15s; }
.fc-read-more:hover { background: #dde8f5; gap: 8px; }
.fc-read-more i { font-size: 13px; }

/* ============================================================
   NEWS GRID
============================================================ */
.news-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 30px; }
.nc { background: #fff; border: 0.5px solid #dde1e9; border-radius: 12px; overflow: hidden; transition: transform .2s, box-shadow .2s; display: flex; flex-direction: column; }
.nc:hover { transform: translateY(-3px); box-shadow: 0 8px 26px rgba(0, 35, 102, 0.09); }
.nc-img { height: 120px; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; }
.nc-img i { font-size: 40px; color: rgba(255, 255, 255, 0.15); z-index: 1; position: relative; }
.nc-cat-b { position: absolute; bottom: 10px; left: 12px; font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; padding: 3px 9px; border-radius: 3px; }
.nc-body { padding: 16px 18px; flex: 1; display: flex; flex-direction: column; text-align: left; }
.nc-meta { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
.nc-cat-l { font-size: 10px; font-weight: 700; color: #002366; letter-spacing: 0.4px; text-transform: uppercase; }
.nc-dot { width: 3px; height: 3px; border-radius: 50%; background: #dde1e9; }
.nc-date { font-size: 10.5px; color: #708090; }
.nc-read { font-size: 10.5px; color: #708090; display: flex; align-items: center; gap: 3px; }
.nc-read i { font-size: 11px; }
.nc-h2 { font-size: 14px; font-weight: 800; color: #002366; line-height: 1.3; letter-spacing: -0.2px; margin-bottom: 8px; flex: 1; }
.nc-h2 a { color: inherit; transition: color .15s; text-decoration: none; }
.nc-h2 a:hover { color: #1a3a6e; }
.nc-excerpt { font-size: 12.5px; color: #6b7280; line-height: 1.58; margin-bottom: 14px; }
.nc-footer { display: flex; align-items: center; justify-content: space-between; margin-top: auto; }
.nc-author { display: flex; align-items: center; gap: 6px; }
.nc-av { width: 22px; height: 22px; border-radius: 50%; background: #e8eef8; display: flex; align-items: center; justify-content: center; font-size: 8px; font-weight: 700; color: #002366; flex-shrink: 0; }
.nc-author-name { font-size: 11px; color: #708090; }
.nc-link { display: inline-flex; align-items: center; gap: 3px; font-size: 11.5px; font-weight: 700; color: #002366; text-decoration: none; transition: gap .15s; }
.nc-link:hover { gap: 6px; }
.nc-link i { font-size: 13px; }

/* Category gradients */
.bg-co-news { background: linear-gradient(135deg, #002366, #1a3a6e); }
.bg-co-industry { background: linear-gradient(135deg, #374151, #1f2937); }
.bg-co-cyber { background: linear-gradient(135deg, #ef4444, #991b1b); }
.bg-co-esg { background: linear-gradient(135deg, #052e16, #065f46); }
.bg-co-award { background: linear-gradient(135deg, #d97706, #78350f); }

.cat-b-navy { background: rgba(0, 35, 102, 0.8); color: #fff; }
.cat-b-slate { background: rgba(55, 65, 81, 0.8); color: #fff; }
.cat-b-red { background: rgba(239, 68, 68, 0.85); color: #fff; }
.cat-b-amber { background: rgba(217, 119, 6, 0.85); color: #fff; }

/* SECTION LABEL */
.sec-label-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.stag { font-size: 10px; letter-spacing: 1.5px; text-transform: uppercase; color: #708090; font-weight: 700; }
.total-label { font-size: 12px; color: #708090; }

/* PAGINATION */
.pagination { display: flex; align-items: center; justify-content: center; gap: 6px; margin-top: 32px; }
.pgbtn { width: 36px; height: 36px; border-radius: 7px; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 600; color: #6b7280; background: #fff; border: 0.5px solid #dde1e9; cursor: pointer; transition: all .15s; text-decoration: none; }
.pgbtn:hover:not(:disabled) { background: #eef2fb; color: #002366; border-color: #b0bad0; }
.pgbtn.active { background: #002366; color: #fff; border-color: #002366; }
.pgbtn.nav-btn { width: auto; padding: 0 14px; gap: 5px; font-size: 12.5px; }
.pgbtn.nav-btn i { font-size: 14px; }
.pgbtn:disabled { opacity: 0.5; cursor: not-allowed; }

/* ============================================================
   SIDEBAR
============================================================ */
.sidebar { display: flex; flex-direction: column; gap: 18px; position: sticky; top: 130px; }
.sb-card { background: #fff; border: 0.5px solid #dde1e9; border-radius: 12px; overflow: hidden; text-align: left; }
.sb-head { padding: 14px 18px; border-bottom: 0.5px solid #f0f3f7; }
.sb-head-title { font-size: 13px; font-weight: 800; color: #002366; }
.sb-body { padding: 14px 18px; }

/* Categories */
.cat-list { display: flex; flex-direction: column; gap: 2px; }
.cat-item { display: flex; align-items: center; justify-content: space-between; padding: 8px 10px; border-radius: 7px; text-decoration: none; transition: background .12s; }
.cat-item:hover { background: #f7f8fb; }
.cat-item-left { display: flex; align-items: center; gap: 9px; }
.cat-item-icon { width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.cat-item-icon i { font-size: 14px; }
.cat-item-icon.navy { background: #e8eef8; } .cat-item-icon.navy i { color: #002366; }
.cat-item-icon.slate { background: #f0f3f7; } .cat-item-icon.slate i { color: #708090; }
.cat-item-icon.green { background: #f0fdf4; } .cat-item-icon.green i { color: #16a34a; }
.cat-item-icon.purple { background: #faf5ff; } .cat-item-icon.purple i { color: #7c3aed; }
.cat-item-icon.amber { background: #fef3c7; } .cat-item-icon.amber i { color: #d97706; }
.cat-item-name { font-size: 12.5px; font-weight: 600; color: #444c5c; }
.cat-item-count { background: #f0f4fa; color: #708090; font-size: 10px; font-weight: 700; padding: 2px 7px; border-radius: 8px; }

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
  transition: all .12s;
  cursor: pointer;
}
.sb-tag:hover { background: #eef2fb; color: #002366; border-color: #b0bad0; }

/* CTA card */
.sb-cta { background: linear-gradient(135deg, #002366, #1a3a6e); border-radius: 12px; padding: 22px 20px; text-align: left; }
.sb-cta-title { font-size: 14px; font-weight: 800; color: #fff; margin-bottom: 6px; }
.sb-cta-desc { font-size: 12px; color: rgba(255,255,255,0.55); line-height: 1.55; margin-bottom: 14px; }
.sb-cta-btn { display: inline-flex; align-items: center; justify-content: center; gap: 6px; background: #fff; color: #002366; font-size: 12.5px; font-weight: 700; padding: 10px 16px; border-radius: 6px; text-decoration: none; transition: opacity .15s; width: 100%; }
.sb-cta-btn:hover { opacity: 0.92; }
.sb-cta-btn i { font-size: 14px; }

/* Newsletter card */
.sb-nl { background: #f7f8fb; border: 0.5px solid #dde1e9; border-radius: 12px; padding: 20px 18px; text-align: left; }
.sb-nl-icon { width: 40px; height: 40px; border-radius: 9px; background: #e8eef8; display: flex; align-items: center; justify-content: center; margin-bottom: 12px; }
.sb-nl-icon i { font-size: 20px; color: #002366; }
.sb-nl-title { font-size: 13.5px; font-weight: 800; color: #002366; margin-bottom: 5px; }
.sb-nl-desc { font-size: 12px; color: #6b7280; line-height: 1.55; margin-bottom: 14px; }
.sb-nl-form { display: flex; flex-direction: column; gap: 8px; }
.sb-nl-input { width: 100%; background: #fff; border: 0.5px solid #d4d8e2; border-radius: 7px; padding: 10px 12px; font-size: 13px; color: #1a2233; font-family: inherit; outline: none; transition: border-color .15s; }
.sb-nl-input:focus { border-color: #002366; }
.sb-nl-input::placeholder { color: #b0b8c8; }
.sb-nl-btn { width: 100%; background: #002366; color: #fff; font-size: 13px; font-weight: 700; padding: 11px; border-radius: 7px; border: none; transition: opacity .15s, background-color .15s; cursor: pointer; }
.sb-nl-btn:hover { opacity: 0.9; }

/* ============================================================
   TOPICS SECTION
============================================================ */
.topics-sec { background: #fff; padding: 40px 32px; border-top: 0.5px solid #e2e5ec; text-align: left; }
.topics-in { max-width: 1080px; margin: 0 auto; }
.topics-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 12px; margin-top: 20px; }
.topic-card { background: #f7f8fb; border: 0.5px solid #dde1e9; border-radius: 10px; padding: 16px 14px; text-decoration: none; transition: all .15s; display: flex; align-items: flex-start; gap: 10px; }
.topic-card:hover { background: #eef2fb; border-color: #b0bad0; transform: translateY(-2px); }
.topic-icon { width: 34px; height: 34px; border-radius: 7px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.topic-icon i { font-size: 17px; }
.topic-icon.navy { background: #e8eef8; } .topic-icon.navy i { color: #002366; }
.topic-icon.slate { background: #f0f3f7; } .topic-icon.slate i { color: #708090; }
.topic-icon.green { background: #f0fdf4; } .topic-icon.green i { color: #16a34a; }
.topic-icon.purple { background: #faf5ff; } .topic-icon.purple i { color: #7c3aed; }
.topic-icon.amber { background: #fef3c7; } .topic-icon.amber i { color: #d97706; }
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
.nl-band-form { display: flex; gap: 8px; margin-top: 16px; }
.nl-band-input { flex: 1; background: rgba(255,255,255,0.08); border: 0.5px solid rgba(255,255,255,0.2); border-radius: 7px; padding: 12px 16px; font-size: 13.5px; color: #fff; font-family: inherit; outline: none; transition: all .15s; }
.nl-band-input::placeholder { color: rgba(255,255,255,0.28); }
.nl-band-input:focus { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.4); }
.nl-band-btn { background: #fff; color: #002366; font-size: 13px; font-weight: 700; padding: 12px 20px; border-radius: 7px; border: none; white-space: nowrap; transition: opacity .15s, background-color .15s; cursor: pointer; }
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
.cta-outline { background: transparent; color: rgba(255, 255, 255, 0.8); font-size: 13px; font-weight: 600; padding: 12px 22px; border-radius: 5px; border: 0.5px solid rgba(255, 255, 255, 0.25); white-space: nowrap; text-decoration: none; transition: color .15s, border-color .15s; }
.cta-outline:hover { color: #fff; border-color: rgba(255, 255, 255, 0.45); }

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width: 960px) {
  .hero-layout, .news-layout, .nl-band-in { grid-template-columns: 1fr; }
  .hero-aside { display: none; }
  .sidebar { position: static; }
  .news-grid { grid-template-columns: 1fr; }
  .topics-grid { grid-template-columns: repeat(2, 1fr); }
  .ctaband-in { flex-direction: column; align-items: flex-start; }
}
@media(max-width: 600px) {
  .page-hero { padding: 36px 20px 44px; }
  .page-h1 { font-size: 26px; }
  .news-sec { padding: 36px 20px 56px; }
  .filter-bar { padding: 0 20px; }
  .topics-sec { padding: 32px 20px; }
  .topics-grid { grid-template-columns: 1fr 1fr; }
  .newsletter-band { padding: 40px 20px; }
  .ctaband { padding: 36px 20px; }
  .rn-inner { padding: 0 20px; }
  .ticker { padding: 8px 20px; }
}
</style>
