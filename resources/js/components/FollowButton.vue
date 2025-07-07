<template>
  <div>
    <button @click="toggleFollow" :class="buttonClass" :disabled="loading">
      {{ buttonText }}
    </button>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';

// Props que o componente recebe do Blade
const props = defineProps({
  userId: Number,
  initialIsFollowing: Boolean,
});

// Estado reativo interno do componente
const isFollowing = ref(props.initialIsFollowing);
const loading = ref(false);

// Lógica para mudar o texto e a classe do botão
const buttonText = computed(() => isFollowing.value ? 'Seguindo' : 'Seguir');
const buttonClass = computed(() => [
  'px-4', 'py-2', 'text-sm', 'font-medium', 'rounded-md', 'transition',
  isFollowing.value
    ? 'bg-gray-200 text-gray-800 hover:bg-gray-300'
    : 'bg-blue-500 text-white hover:bg-blue-600'
]);

// Função principal que é chamada no clique
async function toggleFollow() {
  loading.value = true;
  const url = `/api/users/${props.userId}/${isFollowing.value ? 'unfollow' : 'follow'}`;
  
  try {
    await axios.post(url);
    // Inverte o estado local em caso de sucesso
    isFollowing.value = !isFollowing.value;
  } catch (error) {
    console.error('Erro ao seguir/deixar de seguir:', error);
  } finally {
    loading.value = false;
  }
}
</script>