<script setup>
import { useRoute } from 'vue-router';
import { ref, onMounted, onUnmounted, computed } from 'vue';

const route = useRoute();
const currentRouteName = computed(() => route.fullPath);

onMounted(() => {
    console.log('mounted');
    console.log(currentRouteName.value);
});

const activeMenu = (url) =>{
    return (url == currentRouteName) ? 'active' : '';
}

</script>
<template>
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark" style="width: 280px;">

    <ul class="nav nav-pills flex-column mb-auto">

      <li class="nav-item text-center">
        <router-link to="/admin/dashboard" class="nav-link link-dark text-light"  aria-current="page">Dashboard</router-link>
      </li>

      <li class="nav-item text-center">
        <router-link to="/admin/post/add" class="nav-link link-dark text-light" aria-current="page">Add Post</router-link>
      </li>

      <li class="text-center">
        <router-link to="/admin/post/list" class="nav-link link-dark text-light">Post List</router-link>
      </li>

      <li class="text-center">
        <router-link to="/admin/category/add" class="nav-link link-dark text-light">Add Category</router-link>
      </li>

    </ul>
  </div>
</template>
