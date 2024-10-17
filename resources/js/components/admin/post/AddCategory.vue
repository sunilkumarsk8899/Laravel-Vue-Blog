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


/** onmounted */
onMounted(() => {
    fetchCategory();
});

/** Watch for changes in category_name and auto-generate slug */
watch(
  () => refresh.value,  // Watching refresh.value
  (newVal, oldVal) => { // Callback when it changes
    if (newVal !== oldVal) { // Optionally, check if there's an actual change
      fetchCategory(); // Call the method to fetch categories

    }
  }
);


/** add category handle */
const addCategoryHandle = async (e) =>{
    e.preventDefault();
    try{
        const response = await axios.post('/api/add-category',form);
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Category  Added Successfully",
            showConfirmButton: false,
            timer: 2000
        });
        refresh.value = Math.ceil(Math.random()*1000000);
    }catch(error){
        // console.log(error.response.data.message);
        catError.value = error.response.data.message;
        Swal.fire({
            icon: "error",
            title: error.response.data.message,
            position: "center",
            showConfirmButton: false,
            timer: 500,
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
    const resp = await axios.get('/api/get-category');
    getCategorys.value = resp.data.categories;
}

/** edit cat redirect */
const editCatHandle = (id) =>{
    route.push(`/admin/category/${id}/edit`);
}

/** delete category */
const deleteCategoryHandle = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then(async (result) => { // Mark the callback function as async
        if (result.isConfirmed) {
            try {
                const resp = await axios.delete(`/api/category/${id}/delete`);
                // console.log(resp.data.message);
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                refresh.value = Math.ceil(Math.random()*1000000);
            } catch (error) {
                // console.error('Error deleting category:', error);
                Swal.fire({
                    title: "Error!",
                    text: "There was a problem deleting the category.",
                    icon: "error"
                });
            }
        }
    });
};


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
                                    <h2>Add Category</h2>
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
                                            <button type="submit" id="form-submit" class="main-button" @click="addCategoryHandle">Add Category</button>
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

                        <div class="col-lg-12">
                            <h1>Categorys</h1>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col" colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="cat in getCategorys" :key="cat.id">
                                        <th scope="row">{{ cat.name }}</th>
                                        <td>{{ cat.slug }}</td>
                                        <td>{{ (cat.status) ? "Published" : 'Draft' }}</td>
                                        <td class="text-center"><button class="text-light btn btn-primary" @click="editCatHandle(cat.id)">Edit</button></td>
                                        <td class="text-center"><button class="text-light btn btn-danger" @click="deleteCategoryHandle(cat.id)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</template>
