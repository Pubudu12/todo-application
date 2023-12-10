<template>
    
    <div v-for="(item, index) in items" :key="index" class="">
        <list-item :item="item" v-on:itemchnaged="$emit('reloadlist')" />
    </div>

</template>

<script>

import listItem from './listItem.vue'
export default {
    props: ['items'],
    
    components:{
        listItem
    },
}

</script>