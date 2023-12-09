<template>
    <h1>Add to-do Task</h1>
    <input type="text" class="bg-slate-100" v-model="item.title" />
    <!-- <font-awsome-icon icon="plus"/> -->
    <button @click="addNewTodo()">Add</button>
</template>

<script>

export default {
   data:function(){
        return{
            item :{
                title:''
            }
        }
   },
   methods: {
        addNewTodo(){
            if(this.item.title == ''){
                return;
            }

            axios.post('api/v1/todos',{
                title:this.item.title  
            })
            .then(response => {
                if (response.status == 200) {
                    this.item.title = ''
                }
                console.log('called sucees from here',response)
            })
            .catch(error => {
                console.log('error here!!',error)
            })        
        }        
   },
}
</script>