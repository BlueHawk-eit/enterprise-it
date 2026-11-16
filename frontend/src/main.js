import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import './mobile.css'
import router from './router'
import { initAnalytics } from './analytics'
import DOMPurify from 'dompurify'

// Any link in sanitised CMS content that opens a new tab gets rel="noopener
// noreferrer", so the opened page can't control or redirect this one.
DOMPurify.addHook('afterSanitizeAttributes', (node) => {
  if (node.tagName === 'A' && node.getAttribute('target') === '_blank') {
    node.setAttribute('rel', 'noopener noreferrer')
  }
})

// Start analytics (loads tags only if IDs are configured and consent allows).
initAnalytics()

const app = createApp(App)
app.use(router)
app.mount('#app')
