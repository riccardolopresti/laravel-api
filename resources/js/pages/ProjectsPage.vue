<script>

import ProjectCard from '../ProjectsCard.vue'
import SearchBar from '../SearchBar.vue'

import axios from 'axios'
import {store} from '../store.js'

    export default {
        name:'ProjectsPage',
        components:{
            ProjectCard,
            SearchBar
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

                <SearchBar />

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

.wrapper{
    background-color: white;
}
</style>
