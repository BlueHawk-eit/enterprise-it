<template>
  <div class="cmsprev">
    <div class="cmsprev-bar" role="note">
      <i class="ti ti-eye" aria-hidden="true"></i>
      Preview — this is a draft. It is only visible to you and has not been published.
    </div>

    <article v-if="draft" class="cmsprev-article">
      <div class="cmsprev-cat">{{ (draft.category || '').toUpperCase() }}</div>
      <h1 class="cmsprev-title">{{ draft.title || 'Untitled draft' }}</h1>
      <div class="cmsprev-meta">
        <span>enterprise IT</span>
        <span class="dot" aria-hidden="true"></span>
        <span>{{ readTime }} min read</span>
        <span class="dot" aria-hidden="true"></span>
        <span>Draft preview</span>
      </div>
      <div v-if="draft.image_url" class="cmsprev-hero">
        <img :src="draft.image_url" alt="" />
      </div>
      <div class="cmsprev-body" v-html="safeBody"></div>
    </article>

    <div v-else class="cmsprev-empty">
      <i class="ti ti-file-off" aria-hidden="true"></i>
      <p>No draft to preview. Open this from the CMS editor's “Open full preview” button.</p>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import DOMPurify from 'dompurify';

const draft = ref(null);

onMounted(() => {
  try {
    const raw = localStorage.getItem('cms_preview_draft');
    if (raw) draft.value = JSON.parse(raw);
  } catch (e) {
    draft.value = null;
  }
  document.title = draft.value?.title
    ? `Preview — ${draft.value.title}`
    : 'Draft preview — enterprise IT';
});

// Sanitise again on render (defence in depth — never trust stored content).
const safeBody = computed(() =>
  DOMPurify.sanitize((draft.value && draft.value.body) || '', { ADD_ATTR: ['target', 'rel'] })
);

const readTime = computed(() => {
  const text = ((draft.value && draft.value.body) || '').replace(/<[^>]*>/g, ' ');
  const words = text.trim().split(/\s+/).filter(Boolean).length;
  return Math.max(1, Math.ceil(words / 200));
});
</script>

<style scoped>
.cmsprev {
  min-height: 100vh;
  background: #f7f8fb;
  color: #1a2233;
  font-family: 'Outfit', system-ui, sans-serif;
}
.cmsprev-bar {
  position: sticky;
  top: 0;
  z-index: 10;
  display: flex;
  align-items: center;
  gap: 8px;
  background: #d97706;
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  padding: 10px 20px;
}
.cmsprev-article {
  max-width: 760px;
  margin: 0 auto;
  padding: 40px 24px 80px;
}
.cmsprev-cat {
  font-size: 12px;
  font-weight: 800;
  letter-spacing: 1px;
  color: #708090;
  margin-bottom: 12px;
}
.cmsprev-title {
  font-family: 'Satoshi', 'Outfit', sans-serif;
  font-size: 38px;
  line-height: 1.15;
  font-weight: 900;
  color: #002366;
  margin: 0 0 16px;
}
.cmsprev-meta {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 13.5px;
  color: #6b7280;
  margin-bottom: 28px;
}
.cmsprev-meta .dot {
  width: 3px;
  height: 3px;
  border-radius: 50%;
  background: #b0b8c8;
}
.cmsprev-hero {
  width: 100%;
  border-radius: 12px;
  overflow: hidden;
  margin-bottom: 28px;
}
.cmsprev-hero img {
  width: 100%;
  display: block;
}
.cmsprev-body {
  font-size: 17px;
  line-height: 1.75;
  color: #1a2233;
}
.cmsprev-body :deep(p) { margin: 0 0 18px; }
.cmsprev-body :deep(h2) {
  font-family: 'Satoshi', 'Outfit', sans-serif;
  font-size: 26px;
  font-weight: 800;
  color: #002366;
  margin: 32px 0 12px;
}
.cmsprev-body :deep(h3) {
  font-size: 20px;
  font-weight: 700;
  color: #002366;
  margin: 26px 0 10px;
}
.cmsprev-body :deep(ul),
.cmsprev-body :deep(ol) { padding-left: 26px; margin: 0 0 18px; }
.cmsprev-body :deep(li) { margin: 6px 0; }
.cmsprev-body :deep(blockquote) {
  border-left: 3px solid #708090;
  margin: 0 0 18px;
  padding-left: 18px;
  color: #4a5568;
  font-style: italic;
}
.cmsprev-body :deep(a) { color: #002366; text-decoration: underline; }
.cmsprev-empty {
  max-width: 520px;
  margin: 80px auto;
  text-align: center;
  color: #6b7280;
}
.cmsprev-empty i { font-size: 40px; color: #b0b8c8; }
.cmsprev-empty p { margin-top: 14px; font-size: 15px; }
</style>
