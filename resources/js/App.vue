<script>
import AppHeader from './partials/AppHeader.vue'

import axios from 'axios'
import {store} from './store.js'

export default {
  name: 'App',
  components:{
    AppHeader
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

    <AppHeader/>

    <router-view></router-view>




</template>

<style lang="scss">

</style>
