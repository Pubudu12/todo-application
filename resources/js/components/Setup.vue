<template>
    <h1 class="pt-[2rem] pb-[5rem]">Todo Application</h1>

    <add-todo />
        
    <list-all-todo :items="items" v-on:loadUpdatedList="getAllTodos()" />
   
</template>

<script>
import AddTodo from './AddTodo.vue';
import ListAllTodo from './ListAllTodo.vue'
import { isProxy, toRaw, ref } from 'vue';
import axios from 'axios';

export default {
    components: {
        AddTodo,
        ListAllTodo
    },
    data() {
        return {
            items: []
        }
    },
    methods: {
        getAllTodos(){
            axios.get('api/v1/todos')
            // console.log('newTodos : ',JSON.parse(JSON.stringify(this.items.data.data)))
            .then(success => {

                this.items = success.data.data

                console.log('success here', this.items);
            })
            .catch(error => {
                console.log('error fetch',error)
            })
        }
    },
    created(){
        this.getAllTodos()
    }
}
</script>