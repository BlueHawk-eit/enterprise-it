import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import { initAnalytics } from './analytics'

// Start analytics (loads tags only if IDs are configured and consent allows).
initAnalytics()

const app = createApp(App)
app.use(router)
app.mount('#app')
