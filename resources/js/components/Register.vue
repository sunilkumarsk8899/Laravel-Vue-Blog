<script setup>
import { onMounted,ref } from 'vue';
import axios from "axios";

let form = ref([]);
let err = ref('');
let msg = ref('');

const onRegister = async (e) =>{
    err.value = '';
    if (!form.value.name || !form.value.email || !form.value.password) {
        err.value = 'All fields are required.';
        return;
    }

    const name = form.value.name;
    const email = form.value.email;
    const pass = form.value.password;
    console.log(name,email,pass);

    const formData = new FormData();
     formData.append('name',name);
     formData.append('email',email);
     formData.append('pass',pass);

    err.value = '';
    const resp = await axios.post('/api/register',formData);
    msg.value = resp.data.msg;
    let color = 'darkseagreen';
    if(resp.data.status == false){
        color = 'red';
    }
    $('.toast-body').text(msg.value).css({'color':'#fff'});
    $('.tost-container').css({'background-color':color});
    $('.tost-container').show();

    let count = 5;
    setInterval(() => {
        $('.toast-time').text(count+' Close');
        count--;
    }, 1000);

    setTimeout(() => {
        $('.tost-container').hide();
    }, 6000);
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
                <h4>Register</h4>
                <h2>Create Your Profile For Write Blogs</h2>
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
                      <h2>Create Your Profile For Write Blogs</h2>
                      <p v-if="err" class="text-danger">{{ err }}</p>
                    </div>
                    <div class="content">
                      <form id="contact" action="" method="post">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your name" required="" v-model="form.name">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
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
                              <button type="button" id="form-submit" class="main-button" @click="onRegister()">Create</button>
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
