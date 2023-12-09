<template>
    <div class="text-center">
        
        <span class="bg-slate-100 py-2">
            <span class="cursor-pointer px-3"><font-awesome-icon icon="plus" @click="addNewTodo()" /></span>
            <input type="text" placeholder="Enter Todo Task" class="bg-slate-100 pl-3 pr-10 border-transparent focus:border-transparent focus:ring-0" v-model="item.title" />
        </span>

        <span class="py-2 bg-slate-100 ml-2 px-3">
            <select name="" id="" class="bg-slate-100">
                <option value="all">All Todos</option>
                <option value="archived">Archived Todos</option>
                <option value="unarchived">Unarchived Todos</option>
            </select>
        </span>
    </div>
    
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