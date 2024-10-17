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



<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <Sidebar/>
        </div>
        <div class="col-9">
            <h1>Welcome Dashboard</h1>
        </div>
    </div>
</div>

</template>
