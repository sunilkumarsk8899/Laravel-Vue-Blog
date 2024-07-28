<script setup>
import { ref, onMounted } from 'vue';
import router from '../../router';
import Sidebar from './post/Sidebar.vue';

const role = ref('');

onMounted(() => {
  role.value = localStorage.getItem('role');
  if(role.value != 'admin'){
    router.push('/');
  }
});
</script>

<template>

<Sidebar/>

</template>
