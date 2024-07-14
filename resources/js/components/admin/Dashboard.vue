<script setup>
import { ref, onMounted } from 'vue';
import router from '../../router';

const role = ref('');

onMounted(() => {
  role.value = localStorage.getItem('role');
  if(role.value != 'admin'){
    router.push('/');
  }
});
</script>

<template>
  <div>
    <h1>Admin Dashboard </h1>
  </div>
</template>
