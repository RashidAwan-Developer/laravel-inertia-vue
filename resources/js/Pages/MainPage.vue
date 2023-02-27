<template>
    <div>
        <section className="vh-100" style="background-color: #eee;">
            <div className="container py-5 h-100">
                <div className="row d-flex justify-content-center align-items-center h-100">
                    <div className="col-md-12 col-xl-10">

                        <div className="card">
                            <div className="card-header p-3">
                                <h5 className="mb-0"><i className="fas fa-tasks me-2"></i>Task List</h5>
                            </div>


<!--                            <ListViewComponent-->
                            <ListViewComponent
                                :items="items"
                                v-on:reloadList="getList()"
                            />
                            <add-component
                                v-on:itemChanged="getList()"
                            />
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</template>

<script setup>

import ListViewComponent from "@/Pages/ListViewComponent.vue";
import AddComponent from "@/Pages/AddComponent.vue";


</script>

<script >
export default {
    name: 'MainPage',
    props: {
        items: Object
    }
}

</script>
