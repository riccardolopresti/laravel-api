<script>
import {store} from './store.js'
import axios from 'axios'


export default {
    name: 'SearchBar',
    data(){
        return{
            store,
            tosearch:''
        }
    },
    methods:{
        getApiSearch(){
            axios.get(store.baseUrl + 'search', {params:  {tosearch: this.tosearch}})
            .then(result => {
                store.projects = result.data;
                console.log(store.projects);
            })
        },

        getApiSearchTypes(id){
            axios.get(store.baseUrl + 'types/' + id)
            .then(result => {
                store.projects = result.data;
                console.log(store.projects);
            })
        },
        
    },
}
</script>

<template>

    <div class="search-box text-end pb-2 pe-4">

        <input v-model.trim="this.tosearch" @keyup.enter="getApiSearch()" type="text">

        <button @click="getApiSearch()" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        
    </div>
    
        <div class="tech text-end pb-5 pe-4">
            <span @click="getApiSearchTypes(item.id)" v-for="item in store.types" :key="item.id" class="badge text-bg-dark me-1">
                {{item.name}}
            </span>
        </div>

</template>

<style lang="scss" scoped>

input,
button{
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.237);
}

input{
    border-right: none ;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;

}

button{
    cursor: pointer;
    border-left: none;
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
    padding:1px 10px;
}
</style>
