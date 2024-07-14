<script setup>
import { ref, onMounted } from 'vue';
import router from '../../router';

const role = ref('');

onMounted(() => {
  role.value = localStorage.getItem('role');
  if(role.value != 'user'){
    router.push('/');
  }
});
</script>
<template>
    <h1>User Dashboard</h1>
</template>
