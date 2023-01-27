<script>
import ProjectCard from './ProjectsCard.vue'

import axios from 'axios'
import {store} from './store.js'

export default {
  name: 'App',
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

<header>
        <ul>
            <li><router-link :to="{ name: 'home'}">home</router-link></li>
            <li><router-link :to="{ name: 'about'}">chi siamo</router-link></li>
        </ul>
    </header>

    <router-view></router-view>

    <!-- <ProjectCard /> -->

    <div class="paginate text-center my-5">

        <button :disabled="store.current === 1" type="button" class="btn btn-outline-secondary me-1">prev</button>

        <button  v-for="i in store.last" :key="i" type="button" class="btn btn-outline-secondary me-1" @click="this.getApi(i)">{{i}}</button>

        <button :disabled="store.current === store.last" type="button" class="btn btn-outline-secondary ms-1" @click="this.getApi(store.current + 1)">next</button>

    </div>

</template>

<style lang="scss">

</style>
