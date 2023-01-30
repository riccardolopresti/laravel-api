<script>
import {store} from './store.js'
import axios from 'axios'


export default {
    name: 'SearchBar',
    data(){
        return{
            store
        }
    },
    methods:{
        getApiSearch(){
            axios.get(store.baseUrl + 'search', {params: this.tosearch})
            .then(result => {
                //store.projects = result.data;
                console.log(result.data);
            })
        }
    },
}
</script>

<template>
    <div class="search-box text-end pb-5 pe-4">
        <input v-model.trim="store.tosearch" @keyup.enter="getApiSearch()" type="text">
        <button @click="getApiSearch()" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
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
    border-left: none;
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
    padding:1px 10px;
}
</style>
