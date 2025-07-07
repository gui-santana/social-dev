<template>
  <div class="p-6 my-4 bg-white border border-gray-200 rounded-lg shadow-md">
    <h3 class="text-xl font-bold text-gray-800">Feed de Posts da API</h3>

    <div v-if="loading" class="mt-4 text-gray-500">
      Carregando posts...
    </div>

    <div v-else-if="error" class="mt-4 text-red-500">
      Ocorreu um erro ao buscar os posts: {{ error.message }}
    </div>

    <div v-else-if="posts.length > 0" class="mt-4 space-y-4">
      <div v-for="post in posts" :key="post.id" class="p-4 bg-gray-50 rounded-lg border">
        <h4 class="font-bold text-blue-600">{{ post.title }}</h4>
        <p class="text-sm text-gray-500">
          por {{ post.user.name }}
        </p>
        <p class="mt-2 text-gray-700">{{ post.content }}</p>
      </div>
    </div>

    <div v-else class="mt-4 text-gray-500">
      Nenhum post para exibir.
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

// 1. Definimos as nossas variáveis de estado reativas
const posts = ref([]);      // Um array para guardar os posts
const loading = ref(true);  // Um booleano para saber se estamos a carregar
const error = ref(null);    // Para guardar qualquer erro que ocorra

// 2. onMounted() é um "Lifecycle Hook" do Vue.
// O código dentro dele é executado automaticamente assim que o componente
// é montado na página. É o lugar perfeito para buscar dados iniciais.
onMounted(async () => {
  try {
    // 3. Usamos o axios para fazer uma requisição GET para o nosso endpoint
    const response = await axios.get('/api/posts');

    // 4. Se a requisição for bem-sucedida, atualizamos o nosso estado
    posts.value = response.data;

  } catch (err) {
    // 5. Se ocorrer um erro, guardamo-lo no nosso estado
    console.error('Erro ao buscar posts:', err);
    error.value = err;

  } finally {
    // 6. Independentemente de sucesso ou erro, paramos o carregamento
    loading.value = false;
  }
});
</script>