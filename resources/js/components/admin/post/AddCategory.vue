<script setup>
import Sidebar from './Sidebar.vue';
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
                                    <h2>Add Category</h2>
                                    </div>
                                    <div class="content">
                                    <form id="contact" action="" method="post">
                                        <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                            <input name="category" type="text" id="category" placeholder="Enter Category Name" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                            <input name="category_slug" type="text" id="category_slug" placeholder="Enter Category Slug" required="">
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12">
                                            <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Add Category</button>
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
