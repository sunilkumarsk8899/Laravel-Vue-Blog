
<template>
    <div class="row">
        <div class="col-3">
            <Sidebar/>
        </div>
        <div class="col-8">
            <h1>List Posts</h1>

            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>


<script setup>
import Sidebar from './Sidebar.vue';
import axios from 'axios';
import { onMounted, ref } from 'vue';

onMounted( async ()=>{
    $('#myTable').DataTable();
});
</script>
