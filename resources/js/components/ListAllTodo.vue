<template>
    
    <div v-for="(item, index) in items" :key="index">
        <list-item :item="item" v-on:itemchnaged="$emit(loadUpdatedList)" />
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