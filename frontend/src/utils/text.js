// Helpers for showing CMS article bodies (which are stored as HTML) as plain text.

export function plainText(html) {
  if (!html) return '';
  const div = document.createElement('div');
  div.innerHTML = String(html).replace(/<(br|\/p|\/li|\/h[1-6])\s*\/?>/gi, ' $&');
  return (div.textContent || '').replace(/\s+/g, ' ').trim();
}

export function excerpt(html, length) {
  const text = plainText(html);
  if (text.length <= length) return text;
  return text.slice(0, length).replace(/\s+\S*$/, '') + '…';
}

// Read time from the real word count (about 220 words a minute).
export function readTime(post, suffix = ' min read') {
  const words = plainText(post && post.body).split(' ').filter(Boolean).length;
  return Math.max(1, Math.round(words / 220)) + suffix;
}
