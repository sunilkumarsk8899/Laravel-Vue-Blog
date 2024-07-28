<template>
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">

    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item text-center">
        <router-link to="/admin/post/add" class="nav-link active" aria-current="page">Add Post</router-link>
      </li>
      <li class="text-center">
        <router-link to="/admin/post/list" class="nav-link link-dark">Post List</router-link>
      </li>
      <li class="text-center">
        <router-link to="/admin/category/add" class="nav-link link-dark">Add Category</router-link>
      </li>
    </ul>
  </div>
</template>
