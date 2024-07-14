<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import router from './router';

export default {
  name: 'App',
  setup() {
    const is_login = ref(false);

    onMounted(() => {
      is_login.value = localStorage.getItem('role') ? true : false;
      console.log(is_login.value);
    });

    const logout = () => {
      console.log('logout');
      localStorage.removeItem('userData');
      localStorage.removeItem('role');
      router.push('/login');
    };

    return {
      is_login,
      logout,
    };
  },
};
</script>


<template>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="" style="position: relative;">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <!-- <a class="navbar-brand" href="index.html"><h2>Stand Blog<em>.</em></h2></a> -->
           <router-link to="/" class="navbar-brand"><h2>Stand Blog<em>.</em></h2></router-link>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <!-- <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a> -->
                <router-link to="/" class="nav-link">Home</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/about-us" class="nav-link">About Us</router-link>
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link" href="blog.html">Blog Entries</a> -->
                <router-link to="/blog" class="nav-link">Blog</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/contact-us" class="nav-link">Contact Us</router-link>
                <!-- <a class="nav-link" href="post-details.html">Post Details</a> -->
              </li>

              <li class="nav-item" v-if="is_login">
                <span class="nav-link" @click="logout">Logout</span>
              </li>

              <div class="" v-else>
                <li class="nav-item">
                    <router-link to="/register" class="nav-link">Register</router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/login" class="nav-link">Login</router-link>
                </li>
              </div>

              <!-- <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
    </header>


    <!-- <div class="container"> -->
        <router-view></router-view>
    <!-- </div> -->




<div class="tost-container">
  <div class="toast" data-autohide="false">
    <div class="toast-header">
      <strong class="mr-auto text-light">Stand Blog </strong>
      <small class="text-dark toast-time">5 Close</small>
      <!-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button> -->
    </div>
    <div class="toast-body">
    </div>
  </div>
</div>


<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="social-icons">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Behance</a></li>
            <li><a href="#">Linkedin</a></li>
            <li><a href="#">Dribbble</a></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright 2020 Stand Blog Co.

               | Design: <a rel="nofollow" href="#" target="_parent">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

    <!-- </div> -->
  </template>


  <style>
  nav {
    margin-bottom: 1em;
  }
  nav a {
    margin-right: 1em;
    text-decoration: none;
    color: #3490dc;
  }
  nav a.router-link-exact-active {
    font-weight: bold;
    color: #ffed4a;
  }
  </style>

