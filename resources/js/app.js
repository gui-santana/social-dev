import './bootstrap';

import { createApp } from 'vue';

// Importa nosso componente
import HelloWorld from './components/HelloWorld.vue';
import Counter from './components/Counter.vue'; // Importa o novo componente
import PostList from './components/PostList.vue'; // Importa o novo componente
import FollowButton from './components/FollowButton.vue';

// Cria a aplicação Vue
const app = createApp({});

// Registra o componente globalmente
app.component('hello-world', HelloWorld);
app.component('counter-component', Counter); // Registra o novo componente
app.component('post-list', PostList); // Regista o novo componente
app.component('follow-button', FollowButton);

// "Monta" a aplicação Vue na div com id="app" no nosso HTML
app.mount('#app');