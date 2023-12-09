<template>
    <div>
        <input type="checkbox" @change="updateStatus()" v-model="item.is_completed" /> {{ item.title }}
        <button @click="removeTodo()">Delete</button>
        
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