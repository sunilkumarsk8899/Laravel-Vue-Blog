<script setup>
import { onMounted,ref } from 'vue';
import axios from "axios";
import router from '../router';

let form = ref([]);
let err = ref('');
let msg = ref('');

const onLogin = async (e) =>{
    err.value = '';
    if (!form.value.email || !form.value.password) {
        err.value = 'All fields are required.';
        return;
    }

    const email = form.value.email;
    const pass = form.value.password;
    console.log(email,pass);

    const formData = new FormData();
     formData.append('email',email);
     formData.append('password',pass);

    err.value = '';
    const resp = await axios.post('/api/login',formData);
    if(resp){
        console.log(resp);
        if(resp.data.user.roles == 'admin'){
            router.push('/admin/dashboard');
        } else if(resp.data.user.roles == 'user'){
            router.push('/user/dashboard');
        }
    }

}

</script>

<template>

    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Login</h4>
                <!-- <h2>Create Your Profile For Write Blogs</h2> -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Banner Ends Here -->


    <section class="contact-us">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <div class="down-contact">
              <div class="row">

                <div class="col-lg-12">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>Login</h2>
                      <p v-if="err" class="text-danger">{{ err }}</p>
                    </div>
                    <div class="content">
                      <form id="contact" action="" method="post">
                        <div class="row">

                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Your email" required="" v-model="form.email">
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="password" type="password" id="password" placeholder="Enter Your Password" v-model="form.password">
                            </fieldset>
                          </div>

                          <div class="col-lg-12">
                            <fieldset>
                              <button type="button" id="form-submit" class="main-button" @click="onLogin()">Login</button>
                            </fieldset>
                          </div>

                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
    </section>

</template>
