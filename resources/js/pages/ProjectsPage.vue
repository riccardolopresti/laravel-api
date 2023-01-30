<script>

import ProjectCard from '../ProjectsCard.vue'

import axios from 'axios'
import {store} from '../store.js'

    export default {
        name:'ProjectsPage',
        components:{
            ProjectCard
        },
        data(){
    return{
      store,
      tosearch:''
    }
  },
  methods:{
    getApi(page){
      store.current = page
      //console.log('------',store.current)
      axios.get(store.baseUrl, {params: {page: store.current }})
        .then(result => {
          store.projects = result.data.projects.data;
          store.current = result.data.projects.current_page
          store.last = result.data.projects.last_page
          //console.log(store.baseUrl, {params: {page: store.current }})
        })
    },
    getApiSearch(){
        axios.get(store.baseUrl + '/search', {params: this.tosearch})
        .then(result => {
          store.projects = result.data;
          console.log(result.data);
        })
    }
  },
  mounted(){
    this.getApi(store.current)
  }
    }
</script>

<template>

    <main>

        <div class="container py-5">
            <div class="wrapper rounded-4">

                <h1 class="text-center py-4 fw-bold text-uppercase text-white">Projects</h1>

                <div class="search-box text-end pb-5 pe-4">
                    <input v-model.trim="store.tosearch" @keyup.enter="getApiSearch()" type="search">
                    <button @click="getApiSearch()" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <ProjectCard />

                <div class="paginate text-center py-5">

                    <button :disabled="store.current === 1" type="button" class="btn btn-light me-1">prev</button>

                    <button  v-for="i in store.last" :key="i" type="button" class="btn btn-light me-1" @click="this.getApi(i)">{{i}}</button>

                    <button :disabled="store.current === store.last" type="button" class="btn btn-light ms-1" @click="this.getApi(store.current + 1)">next</button>

                </div>

            </div>
        </div>

    </main>

</template>


<style lang="scss" scoped>

h1{
    text-shadow: 0 0  5px rgba(0, 0, 0, 0.782);
}

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

.wrapper{
    background-color: white;
}
</style>
