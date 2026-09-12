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

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/services', name: 'Services', component: Services },
  { path: '/about', name: 'About', component: About },
  { path: '/contact', name: 'Contact', component: Contact },
  { path: '/login', name: 'PortalLogin', component: PortalLogin },
  { path: '/portal', redirect: '/login' },
  { path: '/dashboard', name: 'PortalDashboard', component: PortalDashboard },
  { path: '/resources/sustainability', name: 'Sustainability', component: ResourcesSustainability },
  { path: '/resources/blog', name: 'Blog', component: ResourcesBlog },
  { path: '/resources/news', name: 'News', component: ResourcesNews },
  { path: '/resources/blog/:slug', name: 'BlogPost', component: ResourcesBlogPost },
  { path: '/resources/news/:slug', name: 'NewsPost', component: ResourcesBlogPost },
  { path: '/privacy', name: 'Privacy', component: Privacy },
  { path: '/terms', name: 'Terms', component: Terms },
  { path: '/cms-preview', name: 'CmsPreview', component: CmsPreview },
  { path: '/cms-admin', name: 'CMSAdmin', component: CMSAdmin },
  { path: '/admin-login', name: 'AdminLogin', component: AdminLogin },
  { path: '/admin-security', name: 'AdminSecurity', component: AdminSecurity },
  { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound }
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

export default router;
