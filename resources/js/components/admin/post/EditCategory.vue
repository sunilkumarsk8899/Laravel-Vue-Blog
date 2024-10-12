<script setup>
import axios from 'axios';
import Sidebar from './Sidebar.vue';
import { onMounted, reactive, ref, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Swal from 'sweetalert2';

const route = useRouter();

/** define form field according object key */
const form = reactive({
    category: '',
    category_slug: '',
});

const catError = ref('');
const refresh = ref(false);
const getCategorys = ref([]);
const cat_id = ref('');
const params = useRoute();
cat_id.value = params.params.id; // get cat id from url


/** onmounted */
onMounted(() => {
    fetchCategory();
});

/** Watch for changes in category_name and auto-generate slug */
watch( () => refresh.value,
  (newVal, oldVal) => {
    fetchCategory();
  }
);


/** add category handle */
const updateCategoryHandle = async (e) =>{
    e.preventDefault();
    console.log(form);

    try{
        const response = await axios.post(`/api/category/${cat_id.value}/update`,form);
        Swal.fire({
            position: "center",
            icon: "success",
            title: response.data.message,
            showConfirmButton: false,
            timer: 2000
        });
        refresh.value = Math.ceil(Math.random()*1000000);
        route.push('/admin/category/add');
    }catch(error){
        console.log(error.response.data.message);
        catError.value = error.response.data.message;
        Swal.fire({
            icon: "error",
            title: error.response.data.message,
            position: "center",
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
        });
    }
}

/** category name according slug create */
const generate_slug = (e) =>{
    let cat = e.target.value.trim();
    cat = cat.replace(/\s+/g, '-').toLowerCase();
    form.category_slug = cat.trim();
}

/** fetch category */
const fetchCategory = async () =>{
    console.log(cat_id.value);

    const resp = await axios.post(`/api/category/${cat_id.value}/edit`);
    getCategorys.value = resp.data.categories;
    form.category = getCategorys.value.name;
    form.category_slug = getCategorys.value.slug;
}

</script>
<template>
    <div class="container-fluid">
        <div class="row">

            <div class="col-4">
                <Sidebar/>
            </div>

            <div class="col-8">
                <section class="contact-us">
                    <div class="container">
                        <div class="row">

                        <div class="col-lg-12">
                            <div class="down-contact">
                            <div class="row">
                                <div class="col-lg-8">
                                <div class="sidebar-item contact-form">
                                    <div class="sidebar-heading">
                                    <h2>Edit Category</h2>
                                    </div>
                                    <div class="content">
                                    <form id="contact" action="" method="post">
                                        <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                            <input name="category" type="text" id="category" placeholder="Enter Category Name" required="" v-model="form.category" v-on:keyup="generate_slug">
                                            <small v-if="catError"> {{ catError }} </small>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                            <input name="category_slug" type="text" id="category_slug" placeholder="Enter Category Slug" required="" v-model="form.category_slug" >
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12">
                                            <fieldset>
                                            <button type="submit" id="form-submit" class="main-button" @click="updateCategoryHandle">Update Category</button>
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
            </div>

        </div>
    </div>
</template>
