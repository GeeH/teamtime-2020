import { createApp } from 'vue'
import message from './components/message'

console.log("Creating app...");
const AppComponent = {} ;
const app = createApp(AppComponent);
const vm = app.mount('#app');
app.component('message');

require('moment');
