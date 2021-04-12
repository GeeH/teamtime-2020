import { createApp } from 'vue'
import App from './components/App';

console.log("Creating app...");

const app = createApp(App)
app.config.devtools = true;

const vm = app.mount('#app');

require('moment');
