<script>

import ProjectCard from '../ProjectsCard.vue'

import axios from 'axios'
import {store} from '../store.js'

    export default {
        name:'Detail',
        data(){
    return{
      store,
    }
  },
  methods:{
    getApi(page){
      store.current = page
      axios.get(store.baseUrl + this.$route.params.slug )
        .then(result => {
          store.projectDetail = result.data;
          console.log(store.projectDetail);
        })
    }
  },
  mounted(){
    this.getApi(store.current)
    //console.log(this.$route.params.slug);
  }
    }
</script>

<template>

    <main>
        <div class="container">
            <h1 class="text-center py-4 fw-bold text-uppercase text-white">DETTAGLIO {{store.projectDetail.name}}</h1>

            <div class="card">

                <img src="#" class="card-img-top" alt="">

                <div class="card-body">

                    <h5 class="card-title">{{store.projectDetail.name}}</h5>
                    <div class="d-block">
                    <span class="badge rounded-pill text-bg-info me-1">{{store.projectDetail.type.name}}</span>
                    </div>
                        <span v-for="item in store.projectDetail.technologies" :key="item.id" class="badge text-bg-dark me-1">
                            {{item.name}}
                        </span>
                    <p v-html="store.projectDetail.summary" class="card-text"></p>

                </div>
            </div>
        </div>
        

    </main>

</template>


<style lang="scss" scoped>

h1{
    text-shadow: 0 0  5px rgba(0, 0, 0, 0.782);
}
</style>
