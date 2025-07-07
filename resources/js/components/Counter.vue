<template>
  <div class="p-6 my-4 bg-white border border-gray-200 rounded-lg shadow-md">
    <h3 class="text-lg font-bold text-gray-800">Componente de Contador Reativo</h3>
    <p class="mt-2 text-gray-700">
      O valor atual é: 
      <span class="font-mono bg-gray-200 text-lg font-semibold px-2 py-1 rounded">{{ count }}</span>
    </p>
    <div class="mt-4">
      <button @click="increment" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
        Incrementar +
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// 1. Criamos nossa variável de estado reativa
const count = ref(0);

// 2. Criamos uma função que modifica esse estado
function increment() {
  // No script, usamos .value
  count.value++;
  console.log('O contador foi incrementado para:', count.value);
}
</script>

<style scoped>
/* Este estilo SÓ se aplica ao parágrafo deste componente */
p {
  color: #374151; /* um tom de cinza */
}
</style>