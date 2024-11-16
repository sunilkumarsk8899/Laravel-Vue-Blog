<script setup>
import { reactive } from 'vue';


const form = reactive({
    title: '',
    image: '',
    desc: '',
    cat_id: '',
    published_date: '',
    status: '',
});
const formError = ref({});


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
                                    <form id="contact" action="" method="post">
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
                                            <select name="" id="cat_id" style="width: 100%;padding: 14px 0;margin-bottom: 10px;" @change="getCatId">
                                                <option v-for="getCategory in getCategorys" :key="getCategory.id" :value=" getCategory.id ">
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
