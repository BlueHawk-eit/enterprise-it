<template>
  <div class="blog-post-view">
    <!-- Resources Sub-Nav -->
    <nav class="resources-nav" aria-label="Resources sections">
      <div class="rn-inner">
        <span class="rn-label">Resources</span>
        <router-link to="/resources/sustainability" class="rn-link"><i class="ti ti-leaf" aria-hidden="true"></i>Sustainability</router-link>
        <router-link to="/resources/blog" class="rn-link" :class="{ active: isBlog }"><i class="ti ti-article" aria-hidden="true"></i>Blog</router-link>
        <router-link to="/resources/news" class="rn-link" :class="{ active: !isBlog }"><i class="ti ti-news" aria-hidden="true"></i>News</router-link>
      </div>
    </nav>

    <!-- READING PROGRESS BAR -->
    <div class="progress-bar" aria-hidden="true"><div class="progress-fill" :style="{ width: readProgress + '%' }"></div></div>

    <!-- Loading State -->
    <div v-if="loading" class="loading-state">
      <i class="ti ti-spinner spin-icon" aria-hidden="true"></i>
      <p>Loading article...</p>
    </div>

    <!-- Error/NotFound State -->
    <div v-else-if="!post" class="empty-state">
      <h2>Article Not Found</h2>
      <p class="mb-4">The requested article could not be found or has been moved.</p>
      <router-link :to="isBlog ? '/resources/blog' : '/resources/news'" class="fp-read-more">
        Back to List <i class="ti ti-arrow-right" aria-hidden="true"></i>
      </router-link>
    </div>

    <div v-else>
      <!-- POST HERO -->
      <header class="post-hero" aria-label="Article header">
        <div class="hero-in">
          <nav class="breadcrumb" aria-label="Breadcrumb">
            <router-link to="/" class="bc-link">Home</router-link><span class="bc-sep" aria-hidden="true">/</span>
            <span class="bc-link">Resources</span><span class="bc-sep" aria-hidden="true">/</span>
            <router-link :to="isBlog ? '/resources/blog' : '/resources/news'" class="bc-link">{{ isBlog ? 'Blog' : 'News' }}</router-link><span class="bc-sep" aria-hidden="true">/</span>
            <span class="bc-cur" aria-current="page">{{ truncateText(post.title, 30) }}</span>
          </nav>
          <div class="post-cat-badge"><i :class="getTopicIcon(getTopic(post))" aria-hidden="true"></i>{{ formatTopicName(getTopic(post)) }}</div>
          <h1 class="post-h1">{{ post.title }}</h1>
          <div class="post-meta" aria-label="Article metadata">
            <div class="pm-item"><i class="ti ti-calendar" aria-hidden="true"></i><time :datetime="post.published_at">{{ formatDate(post.published_at) }}</time></div>
            <div class="pm-sep" aria-hidden="true"></div>
            <div class="pm-item"><i class="ti ti-clock" aria-hidden="true"></i>{{ post.readTime || '6 min read' }}</div>
            <div class="pm-sep" aria-hidden="true"></div>
            <div class="pm-item"><i class="ti ti-eye" aria-hidden="true"></i>{{ mockViews }} views</div>
          </div>
          <div class="post-author-row" itemscope itemtype="https://schema.org/Person">
            <div class="pa-avatar" aria-hidden="true">EI</div>
            <div>
              <div class="pa-name" itemprop="name">enterprise IT Team</div>
              <div class="pa-role">{{ formatTopicName(getTopic(post)) }} specialists · Adelaide CBD</div>
            </div>
            <div class="pa-right">
              <a href="https://www.linkedin.com/company/enterpriseitau/" target="_blank" rel="noopener" class="share-btn" aria-label="Share on LinkedIn"><i class="ti ti-brand-linkedin" aria-hidden="true"></i>Share</a>
              <button class="share-btn" @click="copyLink" aria-label="Copy article link"><i class="ti ti-link" aria-hidden="true"></i>{{ copyBtnText }}</button>
            </div>
          </div>
        </div>
      </header>

      <!-- POST BODY -->
      <div class="post-wrap">
        <div class="post-layout">
          <!-- ARTICLE CONTENT -->
          <article itemprop="articleBody">
            <!-- COVER IMAGE -->
            <div class="cover-img" :class="getTopicBg(getTopic(post))" role="img" aria-label="Article cover">
              <div class="cover-img-grid" aria-hidden="true"></div>
              <i :class="getTopicIcon(getTopic(post))" aria-hidden="true"></i>
            </div>

            <!-- ARTICLE TEXT -->
            <div class="post-content">
              <!-- Render paragraphs dynamically -->
              <p v-for="(p, i) in paragraphs" :key="i">{{ p }}</p>
            </div>

            <!-- TAGS -->
            <div class="post-tags" aria-label="Article tags">
              <span class="post-tag"><i class="ti ti-tag" aria-hidden="true"></i>{{ formatTopicName(getTopic(post)) }}</span>
              <span class="post-tag"><i class="ti ti-tag" aria-hidden="true"></i>ITAD</span>
              <span class="post-tag"><i class="ti ti-tag" aria-hidden="true"></i>Compliance</span>
              <span class="post-tag"><i class="ti ti-tag" aria-hidden="true"></i>enterprise IT</span>
            </div>

            <!-- SHARE ROW BOTTOM -->
            <div class="share-row" aria-label="Share this article">
              <span class="share-label">Share this article</span>
              <div class="share-btns">
                <a href="https://www.linkedin.com/company/enterpriseitau/" target="_blank" rel="noopener" class="sh-btn linkedin" aria-label="Share on LinkedIn"><i class="ti ti-brand-linkedin" aria-hidden="true"></i>LinkedIn</a>
                <button class="sh-btn" @click="copyLink" aria-label="Copy link"><i class="ti ti-link" aria-hidden="true"></i>{{ copyBtnText }}</button>
                <a :href="'mailto:?subject=' + encodeURIComponent(post.title) + '&body=' + encodeURIComponent('Check out this article: ' + shareUrl)" class="sh-btn" aria-label="Share by email"><i class="ti ti-mail" aria-hidden="true"></i>Email</a>
              </div>
            </div>

            <!-- AUTHOR BIO -->
            <div class="author-bio" itemscope itemtype="https://schema.org/Person">
              <div class="ab-header">
                <div class="ab-avatar" aria-hidden="true">EI</div>
                <div>
                  <div class="ab-name" itemprop="name">enterprise IT Security &amp; ESG Team</div>
                  <div class="ab-role">{{ formatTopicName(getTopic(post)) }} Practice · Adelaide CBD, South Australia</div>
                </div>
              </div>
              <p class="ab-bio" itemprop="description">
                The enterprise IT team comprises certified specialists in asset management, cybersecurity, and ESG reporting. Operating from our Adelaide CBD facility, we deliver sovereign ITAD, secure shipping, certified lifecycle tracking, and 24/7 security monitoring services to corporate and government enterprises across Australia.
              </p>
            </div>
          </article>

          <!-- TOC SIDEBAR -->
          <aside aria-label="Table of contents">
            <div class="toc-card">
              <div class="toc-head">
                <div class="toc-title">Article Navigation</div>
                <span style="font-size:11px;color:#708090;">{{ post.readTime || '6 min read' }}</span>
              </div>
              <nav class="toc-list" aria-label="Article sections">
                <a href="#overview" class="toc-item active">Overview</a>
                <a href="#details" class="toc-item">Key Details</a>
                <a href="#conclusions" class="toc-item">Summary</a>
              </nav>
              <div style="padding:14px 18px;border-top:0.5px solid #f0f3f7;">
                <router-link to="/contact#quote" class="quote-btn" aria-label="Get a quote for ITAD services"><i class="ti ti-file-invoice" aria-hidden="true"></i>Get a Quote</router-link>
              </div>
            </div>
          </aside>
        </div>
      </div>

      <!-- RELATED POSTS -->
      <section class="related-sec" aria-labelledby="related-heading">
        <div class="related-in">
          <p style="font-size:10px;letter-spacing:1.5px;text-transform:uppercase;color:#708090;font-weight:700;margin-bottom:6px;">Related Articles</p>
          <h2 style="font-size:22px;font-weight:800;color:#002366;letter-spacing:-0.3px;margin-bottom:4px;" id="related-heading">Keep reading</h2>
          <div class="related-grid">
            <article class="rel-card" v-for="rel in relatedPosts" :key="rel.slug" itemscope itemtype="https://schema.org/BlogPosting">
              <div class="rel-img" :class="getTopicBg(getTopic(rel))" aria-hidden="true">
                <i :class="getTopicIcon(getTopic(rel))"></i><span class="rel-cat">{{ formatTopicName(getTopic(rel)) }}</span>
              </div>
              <div class="rel-body">
                <div class="rel-date">{{ formatDate(rel.published_at) }}</div>
                <div class="rel-title" itemprop="headline">
                  <router-link :to="'/resources/' + (isBlog ? 'blog/' : 'news/') + rel.slug">{{ rel.title }}</router-link>
                </div>
                <router-link :to="'/resources/' + (isBlog ? 'blog/' : 'news/') + rel.slug" class="rel-link" aria-label="Read article">
                  Read <i class="ti ti-arrow-right" aria-hidden="true"></i>
                </router-link>
              </div>
            </article>
          </div>
        </div>
      </section>
    </div>

    <!-- CTA BAND -->
    <div class="ctaband" aria-label="Call to action">
      <div class="ctaband-in">
        <div class="ctaband-left">
          <h3>Need certified enterprise ICT services?</h3>
          <p>enterprise IT provides fully compliant data sanitisation, secure logistics, and 24/7 cybersecurity operations.</p>
        </div>
        <div class="ctaband-btns">
          <router-link to="/contact#quote" class="cta-white">Request a 24-Hour Quote →</router-link>
          <router-link to="/services" class="cta-outline">Explore Services</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted } from 'vue';
import { useRoute } from 'vue-router';
import { API_BASE_URL } from '../config';

const route = useRoute();
const post = ref(null);
const loading = ref(true);
const relatedPosts = ref([]);
const copyBtnText = ref('Copy link');
const mockViews = ref(Math.floor(Math.random() * 300) + 120);

// Reading progress
const readProgress = ref(0);

const isBlog = computed(() => {
  return route.path.startsWith('/resources/blog');
});

const shareUrl = computed(() => {
  return window.location.href;
});

// Topic configurations
const topicCategories = [
  { id: 'cybersecurity', name: 'Cybersecurity', icon: 'ti ti-shield-lock' },
  { id: 'itad', name: 'ITAD & Lifecycle', icon: 'ti ti-recycle' },
  { id: 'sustainability', name: 'Sustainability & ESG', icon: 'ti ti-leaf' },
  { id: 'iam', name: 'Identity & Access', icon: 'ti ti-users' },
  { id: 'data', name: 'Data Governance', icon: 'ti ti-database' },
  { id: 'company', name: 'Company News', icon: 'ti ti-building' },
  { id: 'industry', name: 'Industry News', icon: 'ti ti-world' },
  { id: 'award', name: 'Awards & Milestones', icon: 'ti ti-star-filled' }
];

const getTopic = (p) => {
  if (!p) return 'cybersecurity';
  const title = p.title.toLowerCase();
  
  if (p.category === 'news') {
    if (title.includes('partnership') || title.includes('award') || title.includes('finalist') || title.includes('milestone')) return 'award';
    if (title.includes('cyber') || title.includes('alert') || title.includes('ransomware') || title.includes('sentinel') || title.includes('soc')) return 'cybersecurity';
    if (title.includes('privacy act') || title.includes('threat') || title.includes('compliance') || title.includes('regulation')) return 'industry';
    return 'company';
  } else {
    if (title.includes('identity') || title.includes('mfa') || title.includes('access') || title.includes('iam')) return 'iam';
    if (title.includes('nist') || title.includes('itad') || title.includes('disposal') || title.includes('lifecycle')) return 'itad';
    if (title.includes('sustainability') || title.includes('circular') || title.includes('esg') || title.includes('green') || title.includes('carbon')) return 'sustainability';
    if (title.includes('governance') || title.includes('classification') || title.includes('purview') || title.includes('data')) return 'data';
    return 'cybersecurity';
  }
};

const getTopicIcon = (topic) => {
  const cat = topicCategories.find(c => c.id === topic);
  return cat ? cat.icon : 'ti ti-shield-lock';
};

const getTopicBg = (topic) => {
  if (topic === 'cybersecurity') return 'bg-co-cyber';
  if (topic === 'itad') return 'bg-itad';
  if (topic === 'sustainability') return 'bg-esg';
  if (topic === 'iam') return 'bg-iam';
  if (topic === 'data') return 'bg-data';
  if (topic === 'company') return 'bg-co-news';
  if (topic === 'industry') return 'bg-co-industry';
  if (topic === 'award') return 'bg-co-award';
  return 'bg-cyber';
};

const formatTopicName = (topic) => {
  const cat = topicCategories.find(c => c.id === topic);
  return cat ? cat.name : 'Cybersecurity';
};

const paragraphs = computed(() => {
  if (!post.value || !post.value.body) return [];
  // Split the body by double or single newlines
  const rawParagraphs = post.value.body.split(/\n\n+/);
  return rawParagraphs.map(p => {
    // Basic rich formatting simulation: replace **text** with <strong>text</strong>
    return p.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
  });
});

const copyLink = () => {
  navigator.clipboard.writeText(shareUrl.value).then(() => {
    copyBtnText.value = 'Copied!';
    setTimeout(() => {
      copyBtnText.value = 'Copy link';
    }, 2000);
  });
};

const fetchPostDetails = async (slug) => {
  loading.value = true;
  try {
    const response = await fetch(`${API_BASE_URL}/api/resources/${slug}`);
    const data = await response.json();
    if (data.success) {
      post.value = data.data;
      fetchRelated(data.data);
    } else {
      post.value = null;
    }
  } catch (error) {
    console.error('Error fetching resource details:', error);
    post.value = null;
  } finally {
    loading.value = false;
  }
};

const fetchRelated = async (currentPost) => {
  try {
    const cat = isBlog.value ? 'blog' : 'news';
    const response = await fetch(`${API_BASE_URL}/api/resources?category=${cat}`);
    const data = await response.json();
    if (data.success) {
      // Exclude current post, limit to 3
      relatedPosts.value = data.data
        .filter(p => p.slug !== currentPost.slug)
        .slice(0, 3);
    }
  } catch (error) {
    console.error('Error fetching related posts:', error);
  }
};

const handleScroll = () => {
  const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
  if (scrollHeight > 0) {
    readProgress.value = (window.scrollY / scrollHeight) * 100;
  }
};

watch(() => route.params.slug, (newSlug) => {
  if (newSlug) {
    fetchPostDetails(newSlug);
  }
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

onMounted(() => {
  fetchPostDetails(route.params.slug);
  window.addEventListener('scroll', handleScroll, { passive: true });
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
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
   POST HERO
============================================================ */
.post-hero {
  background: #002366;
  padding: 44px 32px 48px;
  position: relative;
  overflow: hidden;
  text-align: left;
}
.post-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(112, 128, 144, 0.04) 1px, transparent 1px),
                   linear-gradient(90deg, rgba(112, 128, 144, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}
.post-hero::after {
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
.breadcrumb { display: flex; align-items: center; gap: 6px; margin-bottom: 20px; flex-wrap: wrap; }
.bc-link { color: rgba(255, 255, 255, 0.45); font-size: 12px; transition: color .15s; text-decoration: none;}
.bc-link:hover { color: rgba(255, 255, 255, 0.75); }
.bc-sep { color: rgba(255, 255, 255, 0.22); font-size: 12px; }
.bc-cur { color: rgba(255, 255, 255, 0.6); font-size: 12px; }
.post-cat-badge {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  background: rgba(0, 35, 102, 0.5);
  border: 0.5px solid rgba(255, 255, 255, 0.15);
  color: rgba(255, 255, 255, 0.8);
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.6px;
  text-transform: uppercase;
  padding: 4px 11px;
  border-radius: 4px;
  margin-bottom: 16px;
}
.post-h1 {
  color: #fff;
  font-size: 34px;
  font-weight: 800;
  line-height: 1.12;
  letter-spacing: -0.8px;
  margin-bottom: 16px;
  max-width: 780px;
}
.post-meta { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; margin-bottom: 24px; }
.pm-item { display: flex; align-items: center; gap: 6px; font-size: 12.5px; color: rgba(255, 255, 255, 0.55); }
.pm-item i { font-size: 14px; color: rgba(255, 255, 255, 0.35); }
.pm-sep { width: 1px; height: 14px; background: rgba(255, 255, 255, 0.15); }
.post-author-row { display: flex; align-items: center; gap: 12px; padding-top: 20px; border-top: 0.5px solid rgba(255, 255, 255, 0.1); }
.pa-avatar { width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 255, 255, 0.12); border: 1.5px solid rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: #fff; flex-shrink: 0; }
.pa-name { font-size: 13px; font-weight: 600; color: #fff; }
.pa-role { font-size: 11px; color: rgba(255, 255, 255, 0.45); margin-top: 2px; }
.pa-right { margin-left: auto; display: flex; gap: 8px; }
.share-btn {
  display: flex;
  align-items: center;
  gap: 5px;
  background: rgba(255, 255, 255, 0.08);
  border: 0.5px solid rgba(255, 255, 255, 0.15);
  color: rgba(255, 255, 255, 0.65);
  font-size: 11.5px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 5px;
  cursor: pointer;
  transition: all .15s;
  text-decoration: none;
}
.share-btn:hover { background: rgba(255, 255, 255, 0.14); color: #fff; }
.share-btn i { font-size: 14px; }

/* READING PROGRESS BAR */
.progress-bar { position: fixed; top: 58px; left: 0; right: 0; height: 3px; background: rgba(0, 35, 102, 0.15); z-index: 199; }
.progress-fill { height: 100%; background: linear-gradient(90deg, #002366, #4ade80); width: 0%; transition: width .1s linear; }

/* MAIN LAYOUT */
.post-wrap { max-width: 1080px; margin: 0 auto; padding: 40px 32px 72px; }
.post-layout { display: grid; grid-template-columns: 1fr 280px; gap: 40px; align-items: start; }

.loading-state, .empty-state {
  text-align: center;
  padding: 60px;
  background: #fff;
  border-radius: 12px;
  border: 0.5px solid #dde1e9;
  margin: 40px auto;
  max-width: 600px;
}
.spin-icon {
  font-size: 28px;
  display: inline-block;
  animation: spin 1s linear infinite;
  color: #002366;
  margin-bottom: 10px;
}
@keyframes spin { 100% { transform: rotate(360deg); } }

/* COVER IMAGE */
.cover-img {
  width: 100%;
  height: 300px;
  border-radius: 12px;
  overflow: hidden;
  margin-bottom: 36px;
  background: linear-gradient(135deg, #002366, #1a3a6e);
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.cover-img i { font-size: 80px; color: rgba(255, 255, 255, 0.07); }
.cover-img-grid {
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                   linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
  background-size: 32px 32px;
}

/* Category backgrounds */
.bg-co-news { background: linear-gradient(135deg, #002366, #1a3a6e); }
.bg-co-industry { background: linear-gradient(135deg, #374151, #1f2937); }
.bg-co-cyber { background: linear-gradient(135deg, #ef4444, #991b1b); }
.bg-co-esg { background: linear-gradient(135deg, #052e16, #065f46); }
.bg-co-award { background: linear-gradient(135deg, #d97706, #78350f); }
.bg-itad { background: linear-gradient(135deg, #374151, #1f2937); }
.bg-esg { background: linear-gradient(135deg, #052e16, #065f46); }
.bg-data { background: linear-gradient(135deg, #1e3a5f, #0f2847); }
.bg-iam { background: linear-gradient(135deg, #4a1d96, #2e1065); }

/* POST CONTENT */
.post-content { font-size: 15.5px; line-height: 1.78; color: #3d4455; text-align: left; }
.post-content :deep(p) { margin-bottom: 18px; }
.post-content :deep(strong) { font-weight: 700; color: #1a2233; }

/* POST TAGS */
.post-tags { display: flex; flex-wrap: wrap; gap: 7px; margin: 36px 0 0; padding-top: 28px; border-top: 0.5px solid #e2e5ec; text-align: left; }
.post-tag { display: inline-flex; align-items: center; gap: 4px; background: #f0f4fa; border: 0.5px solid #dde8f5; border-radius: 20px; padding: 5px 12px; font-size: 12px; font-weight: 500; color: #002366; }

/* SHARE ROW (bottom) */
.share-row { display: flex; align-items: center; gap: 10px; margin: 28px 0; padding: 18px 20px; background: #f7f8fb; border: 0.5px solid #dde1e9; border-radius: 10px; text-align: left; }
.share-label { font-size: 12.5px; font-weight: 700; color: #002366; flex-shrink: 0; }
.share-btns { display: flex; gap: 7px; }
.sh-btn { display: flex; align-items: center; gap: 5px; padding: 7px 13px; border-radius: 6px; font-size: 12px; font-weight: 600; border: 0.5px solid #dde1e9; background: #fff; color: #444c5c; cursor: pointer; text-decoration: none; transition: all .15s; }
.sh-btn:hover { border-color: #b0bad0; background: #eef2fb; color: #002366; }
.sh-btn.linkedin { border-color: #0a66c2; background: #f0f7ff; color: #0a66c2; }
.sh-btn.linkedin:hover { background: #0a66c2; color: #fff; }

/* AUTHOR BIO CARD */
.author-bio { background: #fff; border: 0.5px solid #dde1e9; border-radius: 12px; padding: 24px; margin: 36px 0; text-align: left; }
.ab-header { display: flex; align-items: center; gap: 14px; margin-bottom: 14px; }
.ab-avatar { width: 52px; height: 52px; border-radius: 50%; background: #e8eef8; display: flex; align-items: center; justify-content: center; font-size: 17px; font-weight: 800; color: #002366; flex-shrink: 0; }
.ab-name { font-size: 15px; font-weight: 800; color: #002366; }
.ab-role { font-size: 12px; color: #708090; margin-top: 2px; }
.ab-bio { font-size: 13.5px; color: #6b7280; line-height: 1.65; }

/* TOC SIDEBAR */
.toc-card { background: #fff; border: 0.5px solid #dde1e9; border-radius: 12px; overflow: hidden; position: sticky; top: 130px; text-align: left; }
.toc-head { padding: 14px 18px; border-bottom: 0.5px solid #f0f3f7; display: flex; align-items: center; justify-content: space-between; }
.toc-title { font-size: 13px; font-weight: 800; color: #002366; }
.toc-list { padding: 8px 0; }
.toc-item { display: block; padding: 7px 18px; font-size: 12.5px; color: #6b7280; text-decoration: none; border-left: 2px solid transparent; transition: all .12s; line-height: 1.35; }
.toc-item:hover { color: #002366; background: #f7f8fb; }
.toc-item.active { color: #002366; font-weight: 600; border-left-color: #002366; background: #eef2fb; }
.quote-btn { display: flex; align-items: center; justify-content: center; gap: 6px; background: #002366; color: #fff; font-size: 12.5px; font-weight: 700; padding: 10px 14px; border-radius: 6px; text-decoration: none; transition: opacity .15s; }

/* RELATED POSTS */
.related-sec { background: #f2f4f8; padding: 36px 32px; border-top: 0.5px solid #e2e5ec; text-align: left; }
.related-in { max-width: 1080px; margin: 0 auto; }
.related-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 20px; }
.rel-card { background: #fff; border: 0.5px solid #dde1e9; border-radius: 12px; overflow: hidden; transition: transform .2s, box-shadow .2s; }
.rel-card:hover { transform: translateY(-3px); box-shadow: 0 8px 26px rgba(0, 35, 102, 0.09); }
.rel-img { height: 90px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; }
.rel-img i { font-size: 32px; color: rgba(255, 255, 255, 0.15); position: relative; z-index: 1; }
.rel-cat { position: absolute; bottom: 8px; left: 10px; font-size: 9.5px; font-weight: 700; text-transform: uppercase; padding: 2px 8px; border-radius: 3px; background: rgba(0, 0, 0, 0.4); color: #fff; }
.rel-body { padding: 14px 16px; }
.rel-date { font-size: 10.5px; color: #708090; margin-bottom: 5px; }
.rel-title { font-size: 13px; font-weight: 700; color: #002366; line-height: 1.3; margin-bottom: 8px; }
.rel-title a { color: inherit; transition: color .15s; text-decoration: none; }
.rel-title a:hover { color: #1a3a6e; }
.rel-link { font-size: 11.5px; font-weight: 700; color: #002366; display: inline-flex; align-items: center; gap: 3px; text-decoration: none; transition: gap .15s; }
.rel-link:hover { gap: 6px; }

/* ============================================================
   CTA BAND
============================================================ */
.ctaband { background: #002366; padding: 52px 32px; border-top: 0.5px solid rgba(255, 255, 255, 0.07); text-align: left; }
.ctaband-in { display: flex; align-items: center; justify-content: space-between; gap: 20px; max-width: 1080px; margin: 0 auto; }
.ctaband-left h3 { color: #fff; font-size: 22px; font-weight: 800; margin-bottom: 5px; letter-spacing: -0.3px; }
.ctaband-left p { color: rgba(255, 255, 255, 0.55); font-size: 13px; }
.ctaband-btns { display: flex; gap: 10px; flex-shrink: 0; }
.cta-white { background: #fff; color: #002366; font-size: 13px; font-weight: 700; padding: 12px 22px; border-radius: 5px; border: none; white-space: nowrap; text-decoration: none; transition: opacity .15s; }
.cta-white:hover { opacity: .92; }
.cta-outline { background: transparent; color: rgba(255, 255, 255, 0.8); font-size: 13px; font-weight: 600; padding: 12px 22px; border-radius: 5px; border: 0.5px solid rgba(255, 255, 255, 0.25); white-space: nowrap; text-decoration: none; transition: color .15s, border-color .15s; }
.cta-outline:hover { color: #fff; border-color: rgba(255, 255, 255, 0.45); }

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width: 960px) {
  .post-layout { grid-template-columns: 1fr; }
  .toc-card { position: static; margin-bottom: 24px; }
  .related-grid { grid-template-columns: 1fr 1fr; }
  .ctaband-in { flex-direction: column; align-items: flex-start; }
}
@media(max-width: 600px) {
  .post-hero { padding: 36px 20px 44px; }
  .post-h1 { font-size: 26px; }
  .post-wrap { padding: 28px 20px 56px; }
  .share-row { flex-direction: column; align-items: flex-start; }
  .share-btns { flex-wrap: wrap; }
  .related-sec { padding: 32px 20px; }
  .related-grid { grid-template-columns: 1fr; }
  .ctaband { padding: 36px 20px; }
  .rn-inner { padding: 0 20px; }
}
</style>
