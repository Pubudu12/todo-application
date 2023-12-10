<template>
    <div class="pt-2">
        <input type="checkbox" @change="updateStatus()" v-model="item.is_completed" class="text-[17px]"/> {{ item.title }}
        <button @click="removeTodo()" class="bg-red-200 pb-[2px] px-[8px]"> <font-awesome-icon icon="trash" class="text-red-600 text-[11px]" /></button>        
    </div>

</template>

<script>

import listItem from './listItem.vue'
export default {
    props: ['item'],
    methods: {
        updateStatus(){
            axios.patch('api/v1/todo/update-status/'+this.item.id,{
                is_completed: this.item.is_completed
            })
            .then(success => {
                console.log('success hre ::',success)
                // if (success.status == true) {
                //     this.$emit('itemchnaged')
                // }
            })
            .catch(error => {
                console.log('error hre ::',error)

            });
        },

        removeTodo(){
            axios.delete('api/v1/todos/'+this.item.id)
            .then(success => {
                console.log('success hre ::',success)
            })
            .catch(error => {
                console.log('error hre ::',error)
            })
        }
    },
}

</script>