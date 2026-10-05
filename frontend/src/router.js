import { createRouter, createWebHistory } from 'vue-router';
import Home from './views/Home.vue';
import Services from './views/Services.vue';
import About from './views/About.vue';
import Contact from './views/Contact.vue';
import PortalLogin from './views/PortalLogin.vue';
import PortalDashboard from './views/PortalDashboard.vue';
import ResourcesSustainability from './views/ResourcesSustainability.vue';
import ResourcesBlog from './views/ResourcesBlog.vue';
import ResourcesNews from './views/ResourcesNews.vue';
import ResourcesBlogPost from './views/ResourcesBlogPost.vue';
import Privacy from './views/Privacy.vue';
import Terms from './views/Terms.vue';
import CmsPreview from './views/CmsPreview.vue';
import CMSAdmin from './views/CMSAdmin.vue';
import AdminLogin from './views/AdminLogin.vue';
import AdminSecurity from './views/AdminSecurity.vue';
import NotFound from './views/NotFound.vue';
import { trackPageView } from './analytics';

const SITE = 'enterprise IT';
const BASE_DESC = "Adelaide's SA owned & operated ICT lifecycle, secure IT asset disposal (ITAD) and cyber defence provider. Practices aligned to NIST SP 800-88 & ISO 27001.";

const routes = [
  { path: '/', name: 'Home', component: Home,
    meta: { title: 'enterprise IT | Sovereignty. Security. Sustainability.', description: BASE_DESC } },
  { path: '/services', name: 'Services', component: Services,
    meta: { title: 'IT Services — ICT Lifecycle, ITAD & Cyber Defence | enterprise IT', description: 'Hardware lifecycle, secure data sanitisation & IT asset disposal, cyber defence and analytics services for enterprise clients across Australia.' } },
  { path: '/about', name: 'About', component: About,
    meta: { title: 'About enterprise IT — SA Owned ICT & Cyber Specialists', description: 'Adelaide-based, SA owned and operated. Our practices are aligned to ISO 27001, NIST SP 800-88 and the Australian Privacy Act 1988.' } },
  { path: '/contact', name: 'Contact', component: Contact,
    meta: { title: 'Contact & Request a Quote | enterprise IT', description: 'Talk to an enterprise IT specialist about ICT lifecycle, secure ITAD, cyber defence or data governance. Response within 24 hours.' } },
  { path: '/login', name: 'PortalLogin', component: PortalLogin,
    meta: { title: 'Client Login | enterprise IT', description: 'Secure client portal sign-in for enterprise IT clients and partners.' } },
  { path: '/portal', redirect: '/login' },
  { path: '/dashboard', name: 'PortalDashboard', component: PortalDashboard,
    meta: { title: 'Client Dashboard | enterprise IT' } },
  { path: '/resources/sustainability', name: 'Sustainability', component: ResourcesSustainability,
    meta: { title: 'Sustainability & Circular ICT | enterprise IT', description: 'Responsible IT asset disposal, ESG reporting and circular-economy recovery for South Australian and national clients.' } },
  { path: '/resources/blog', name: 'Blog', component: ResourcesBlog,
    meta: { title: 'Blog — Cybersecurity, ITAD & Data Insights | enterprise IT', description: 'Insights and guides on cybersecurity, IT asset disposition, data governance and ESG from the enterprise IT team.' } },
  { path: '/resources/news', name: 'News', component: ResourcesNews,
    meta: { title: 'News & Updates | enterprise IT', description: 'Company news and updates from enterprise IT, Adelaide.' } },
  { path: '/resources/blog/:slug', name: 'BlogPost', component: ResourcesBlogPost,
    meta: { title: 'Blog | enterprise IT', description: BASE_DESC } },
  { path: '/resources/news/:slug', name: 'NewsPost', component: ResourcesBlogPost,
    meta: { title: 'News | enterprise IT', description: BASE_DESC } },
  { path: '/privacy', name: 'Privacy', component: Privacy,
    meta: { title: 'Privacy Policy | enterprise IT', description: 'How enterprise IT collects, uses and protects your information, in line with the Australian Privacy Act 1988.' } },
  { path: '/terms', name: 'Terms', component: Terms,
    meta: { title: 'Terms of Service | enterprise IT', description: 'Terms of service for enterprise IT and enterpriseit.com.au.' } },
  { path: '/cms-preview', name: 'CmsPreview', component: CmsPreview, meta: { title: 'Preview | enterprise IT' } },
  { path: '/cms-admin', name: 'CMSAdmin', component: CMSAdmin, meta: { title: 'CMS Admin | enterprise IT' } },
  { path: '/admin-login', name: 'AdminLogin', component: AdminLogin, meta: { title: 'Admin Login | enterprise IT' } },
  { path: '/admin-security', name: 'AdminSecurity', component: AdminSecurity, meta: { title: 'Account Security | enterprise IT' } },
  { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound, meta: { title: 'Page Not Found | enterprise IT' } }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return { el: to.hash, behavior: 'smooth' };
    }
    return { top: 0 };
  }
});

function setMeta(name, content, attr = 'name') {
  if (!content) return;
  let el = document.head.querySelector(`meta[${attr}="${name}"]`);
  if (!el) {
    el = document.createElement('meta');
    el.setAttribute(attr, name);
    document.head.appendChild(el);
  }
  el.setAttribute('content', content);
}

// Per-route title, meta description, and Open Graph — plus SPA page-view tracking.
router.afterEach((to) => {
  const title = to.meta?.title || `${SITE}`;
  const description = to.meta?.description || BASE_DESC;
  const url = 'https://enterpriseit.com.au' + to.fullPath;

  document.title = title;
  setMeta('description', description);
  setMeta('og:title', title, 'property');
  setMeta('og:description', description, 'property');
  setMeta('og:url', url, 'property');
  setMeta('twitter:title', title);
  setMeta('twitter:description', description);

  // Fire after the tick so document.title is current for GA.
  setTimeout(() => trackPageView(to.fullPath), 0);
});

export default router;
