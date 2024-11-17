<script setup>
import { onMounted, reactive, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import axios from 'axios';

const route = useRoute();
onMounted(() => {
    console.log('params is here ',route.params);
    get_edit_product();
    get_categorys();
});


const form = reactive({
    title: '',
    image: '',
    desc: '',
    cat_id: '',
    published_date: '',
    status: '',
});
const formError = ref({});


const categorys = ref({});


const get_edit_product = async () => {
    try {
        const response = await axios.get(`/api/edit/${route.params.id}/product`);
        // Check the response structure and assign data accordingly
        const product = response.data.product;

        form.title = product.name;
        form.image = product.image; // Confirm if the path is correct
        form.desc = product.desc;
        form.cat_id = product.category_id;
        form.published_date = product.published_date;
        form.status = product.status;
    } catch (error) {
            console.log(error);
    }
}



const get_categorys = () =>{
    const resp = axios.get('/api/get-category');
    resp.then((res) => {
        console.log('all categorys ',res.data);
        categorys.value = res.data.categories;
    }).catch((err) => {
            console.log(err);
    });
}



const submitForm = async (event) => {
    event.preventDefault();
    console.log('submit',form);
    const resp = await axios.post(`/api/update/${route.params.id}/product`, form);
    console.log(resp.data);

}

</script>
<template>
    <div class="container-fluid">
        <div class="row">

            <div class="col-3">
                <Sidebar/>
            </div>

            <div class="col-9">
                <section class="contact-us">
                    <div class="container">
                        <div class="row">

                        <div class="col-lg-12">
                            <div class="down-contact">
                            <div class="row">
                                <div class="col-lg-8">
                                <div class="sidebar-item contact-form">
                                    <div class="sidebar-heading">
                                    <h2>Add Post</h2>
                                    </div>
                                    <div class="content">
                                    <form id="contact" action="" method="post" @submit.prevent="submitForm" >
                                        <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                            <input name="post_title" type="text" id="post_title" placeholder="Enter Post Title" required="" v-model="form.title">
                                            <span v-if="formError.title" class="error">{{ formError.title[0] }}</span>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                            <input name="post_title" type="file" id="image" placeholder="Enter Post Title" required="" @change="handleImageUpload">
                                            <span v-if="formError.image" class="error">{{ formError.image[0] }}</span>
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12">
                                            <fieldset>
                                            <textarea name="post_description" rows="6" id="post_description" placeholder="Enter Post Description" required="" v-model="form.desc"></textarea>
                                            <span v-if="formError.desc" class="error">{{ formError.desc[0] }}</span>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>

                                            <select v-model="form.cat_id" id="cat_id" style="width: 100%; padding: 14px 0; margin-bottom: 10px;" @change="getCatId">
                                                <option v-for="getCategory in categorys" :key="getCategory.id" :value="getCategory.id">
                                                    {{ getCategory.name }}
                                                </option>
                                            </select>

                                            <span v-if="formError.cat_id" class="error">{{ formError.cat_id[0] }}</span>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                            <input name="post_title" type="date" id="published_date" placeholder="Enter Post Title" required="" v-model="form.published_date">
                                            <span v-if="formError.published_date" class="error">{{ formError.published_date[0] }}</span>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                            <input name="post_title" type="checkbox" id="status" placeholder="Enter Post Title" required="" v-model="form.status">
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12">
                                            <fieldset>
                                            <button type="submit" id="form-submit" class="main-button" @click="addProductHandle">Add Product</button>
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
