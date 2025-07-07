import './bootstrap';

import { createApp } from 'vue';

// Importa nosso componente
import HelloWorld from './components/HelloWorld.vue';

// Cria a aplicação Vue
const app = createApp({});

// Registra o componente globalmente
app.component('hello-world', HelloWorld);

// "Monta" a aplicação Vue na div com id="app" no nosso HTML
app.mount('#app');