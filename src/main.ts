import { createApp } from 'vue'
import App from './App.vue'
import { createPinia } from 'pinia'
import './index.css'
import Content from './plugins/content'

createApp(App)
  .use(createPinia)
  .use(Content)
  .mount('#app')
