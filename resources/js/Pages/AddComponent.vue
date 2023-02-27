<template>
        <div v-if="form.message" class="alert alert-success flex-nowrap justify-content-center" role="alert">
            {{form.message}}
        </div>
    {{props.message}}
    <div class="card-footer text-end p-3">
        <div class="input-group flex-nowrap justify-content-center" >
<!--                <p :class="[form.name == '' ? 'error' : 'none'] ">Fill Name Field</p>-->
<!--                <p :class="[form.priority == '' ? 'error' : 'none']">Fill Priority Field </p>-->

            <div class="form-outline col-3 mx-2">
                <input v-model="form.name" maxlength="80" id="search-focus" type="search" class="form-control bg-white border h-100" />
                <label class="form-label field" for="form1">Add List</label>
            </div>
            <div class="form-outline col-3 ">
<!--                <input v-model="item.priority" id="search-focus" type="search" class="form-control bg-white border h-100" />-->
<!--                <label class="form-label" for="form1">Add Priority</label>-->
                <select v-model="form.priority" class="form-select form-select-sm h-100" aria-label=".form-select-sm example">
                    <option value="low">Low Priority</option>
                    <option value="medium">Medium Priority</option>
                    <option value="high">High Priority</option>
                </select>
            </div>
            <span @click="addItem()" type="button" class="btn btn-outline-success">
                <i class="fas fa-plus" ></i>
            </span>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    name: null,
    priority: null,
    message: null
})

const props = defineProps({
    message: String
})

function addItem() {
    router.post('item/store', form, {
        onSuccess: () => {
            form.name = ''
            form.priority = ''
        }
    })
}

</script>



<style scoped>
.none{
    display: none;
}
.error{
    margin: 0;
    color: red;
    margin-right: 15px;
}
</style>
