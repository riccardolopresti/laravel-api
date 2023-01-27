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
    }
  },
  mounted(){
    this.getApi(store.current)
  }
    }
</script>

<template>

    <main>

        <h1 class="text-center py-4 fw-bold text-uppercase text-white">Projects</h1>

        <ProjectCard />

        <div class="paginate text-center py-5">

            <button :disabled="store.current === 1" type="button" class="btn btn-light me-1">prev</button>

            <button  v-for="i in store.last" :key="i" type="button" class="btn btn-light me-1" @click="this.getApi(i)">{{i}}</button>

            <button :disabled="store.current === store.last" type="button" class="btn btn-light ms-1" @click="this.getApi(store.current + 1)">next</button>

        </div>

    </main>

</template>


<style lang="scss" scoped>

h1{
    text-shadow: 0 0  5px rgba(0, 0, 0, 0.782);
}
</style>
