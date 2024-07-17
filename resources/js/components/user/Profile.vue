<script>
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';

export default {
  name: 'App',
  setup() {
    const role = ref([]);
    const userData = ref([]);

    const name = ref('')
    const email = ref('')
    const curr_pass = ref('')
    const new_pass = ref('')
    const conf_pass = ref('')

    onMounted(() => {
      role.value = localStorage.getItem('role');
      userData.value = JSON.parse(localStorage.getItem('userData'));
      console.log(userData.value);
    });

    const updateProfile = () =>{
        console.log('update',name.value,email.value,curr_pass.value,new_pass.value,conf_pass.value);
    }


    return {
      userData,
      role,
      updateProfile,
      name,
      email,
      curr_pass,
      new_pass,
      conf_pass,
    };
  },
};
</script>


<template>


    <section class="contact-us">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <div class="down-contact">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>User Profile</h2>
                    </div>
                    <div class="content">
                      <form id="contact" action="" method="post">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your name" required="" v-model="userData.name">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Your email" required="" v-model="userData.email">
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="curr_pass" type="password" id="curr_pass" placeholder="Current Password" v-model="curr_pass">
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="new_pass" type="password" id="new_pass" placeholder="New Password" v-model="new_pass">
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="conf_pass" type="password" id="conf_pass" placeholder="Confirm Password" v-model="conf_pass">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="button" id="form-submit" class="main-button" @click="updateProfile">Send Message</button>
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

          <!-- <div class="col-lg-12">
            <div id="map">
              <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div> -->

        </div>
      </div>
    </section>

</template>
