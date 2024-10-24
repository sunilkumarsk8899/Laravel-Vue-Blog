<script setup>
import Sidebar from './Sidebar.vue';
import axios from 'axios';
import { onMounted, ref, nextTick } from 'vue';

const productsData = ref([]);
onMounted(() => {
    getProducts();
});

const getProducts = async () =>{
    const response = await axios.get('http://127.0.0.1:8000/api/get-products');
    productsData.value = response.data.products;
    console.log(response);
}

</script>
<template>
    <div class="row">
        <div class="col-3">
            <Sidebar/>
        </div>
        <div class="col-8">
            <h1>List Posts</h1>

            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Published Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in productsData" :key="product.id">
                        <td>{{ product.id }}</td>
                        <td><img :src="`/images/${product.image}`" alt="" style="width: 60px;"></td>
                        <th scope="row">{{ product.name }}</th>
                        <td>{{ product.desc }}</td>
                        <td>{{ product.published_date }}</td>
                        <td>{{ product.category.name }}</td>
                        <td>{{ (product.status) ? "Published" : 'Draft' }}</td>
                        <td class="text-center"><button class="text-light btn btn-primary" @click="editCatHandle(product.id)">Edit</button></td>
                        <td class="text-center"><button class="text-light btn btn-danger" @click="deleteCategoryHandle(product.id)">Delete</button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>




