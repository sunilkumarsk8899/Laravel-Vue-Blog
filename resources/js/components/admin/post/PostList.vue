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
    const data = response.data;
    productsData.value = data;
    console.log(data);
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
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
</template>




