<template>
    <!--            <th>-->
    <!--                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"-->
    <!--                     class="shadow-1-strong rounded-circle" alt="avatar 1"-->
    <!--                     style="width: 55px; height: auto;">-->
    <!--                <span class="ms-2">Alice Mayer</span>-->
    <!--            </th>-->
    <td class="align-middle">
        <input
            type="checkbox"
            @change="updateCheckbox(item.id)"
            v-model="item.completed"
            :true-value="1"
            :false-value="0"
            :class="[item.completed ? 'checked' : 'unchecked']"
            style="margin-right:10px;"
        >
        <span :class="[item.completed ? 'completed' : '', 'itemText']">{{ item.name }}</span>
    </td>
    <td class="align-middle">
        <h6 class="mb-0">
            <select id=""
                    :class="'badge bg-black'"
                    @change="router.put('item/' + item.id, {item:item})"
                    v-model="item.priority"
                    @mouseover.prevent="showPriorityHover()"

            >
                <option value="low">low</option>
                <option value="medium">medium</option>
                <option value="high">high</option>
            </select>

<!--            <span id="priority"-->
<!--                  @mouseover="hover = true"-->
<!--                  @mouseout="hover = false"-->
<!--                  :class="'badge bg-black', { active: hover }"-->
<!--            >-->
<!--                {{ item.priority }} priority-->
<!--            </span>-->
        </h6>
    </td>
    <td class="align-middle">
        <a data-mdb-toggle="tooltip" title="Remove"><i
            class="fas fa-trash-alt text-danger" @click="deleteRecord(item.id)"></i></a>
    </td>

</template>

<script setup>
import { router } from '@inertiajs/vue3'

const props = defineProps({
    item: Object
})


const updateCheckbox = (id) => {
    router.put('item/' + id, {item:props.item})
}

const deleteRecord = (id) => {
    console.log(id)

    router.delete('item/' + id)
}


</script>

<!--<script>-->
<!--import axios from "axios";-->
<!--import ConfirmDeleteComponent from "./ConfirmDeleteComponent.vue";-->


<!--export default {-->
<!--    name: "ListItemComponent",-->
<!--    components: {ConfirmDeleteComponent},-->
<!--    props: ['item', 'userId'],-->
<!--    emits: ['itemChanged'],-->
<!--    data: function(){-->
<!--        return {-->
<!--            userIdBigIntDetected : ''-->

<!--        }-->
<!--    },-->
<!--    methods: {-->
<!--        updateCheck() {-->

<!--            axios-->
<!--                .put('api/item/' + this.item.id, {-->
<!--                    item: this.item-->
<!--                })-->
<!--                .then(response => {-->
<!--                    if(response.status == 200){-->
<!--                        this.$emit('itemChanged')-->
<!--                    }-->
<!--                })-->
<!--                .catch(error => {-->
<!--                    console.log(error.response.data)-->
<!--                })-->
<!--        },-->
<!--        // confirmBox(){-->
<!--        //     this.userIdBigIntDetected = this.item.id-->
<!--        //     $('#deleteUserModel').modal('show');-->
<!--        //     console.log(this.userIdBigIntDetected)-->
<!--        // },-->
<!--        deleteRecord(){-->
<!--            // console.log(this.userIdBigIntDetected)-->
<!--            axios-->
<!--                .delete('api/item/' + this.$props.item.id)-->
<!--                .then(response => {-->
<!--                    if(response.status == 200){-->
<!--                        $('#deleteUserModel').modal('hide');-->
<!--                        this.$emit('itemChanged')-->
<!--                    }-->
<!--                })-->
<!--                .catch(error => {-->
<!--                    console.log(error.response.data)-->
<!--                })-->

<!--        },-->

<!--    },-->
<!--    created() {-->
<!--        //-->
<!--    }-->

<!--}-->



<!--</script>-->

<style scoped>
.completed{
    text-decoration: line-through;
    color: #999;
}

.itemText {
    width:100%;
    margin-left: 20px;
}

.checked{
    /*background:url('images/check-box.png') no-repeat;*/
    color: red;
}

.listName{
    color: #000;
    border: none;
    background: #fff;
}

.active{
    display: inline-block;
    background: red;
    color: green;
}

#prioritySelect{
    display: none;
}



</style>
