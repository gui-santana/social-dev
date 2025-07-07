<template>
    <div class="p-6 my-4 bg-green-100 border border-green-400 rounded-lg shadow">
        <p class="font-bold text-green-800">{{ message }}</p>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const message = ref('Olá do meu primeiro componente Vue! Tudo foi configurado corretamente.');
</script>