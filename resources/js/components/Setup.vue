<template>
    <h1 class="pt-[2rem] pb-[3rem] text-center text-2xl font-bold">Todo Application</h1>

    <add-todo @todo-added="getAllTodos" />
        
    <div class="flex flex-col items-center pt-5">
        <list-all-todo :items="items" v-on:reloadlist="getAllTodos()" />
    </div>

    
   
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
        getAllTodos(selectedOption, page = 1){
            
            axios.get('api/v1/todos?status='+selectedOption+'&page='+page+'&limit=10')

            .then(success => {

                this.items = success.data.data

                console.log('success here', this.items);
            })
            .catch(error => {
                console.log('error fetch',error)
            })
        },
    },
    created(){
        this.getAllTodos('all')
    }
}
</script>