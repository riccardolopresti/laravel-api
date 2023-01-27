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
    getApi(){
      axios.get(store.baseUrl + this.$route.params.slug )
        .then(result => {
          store.projectDetail = result.data;
          console.log(store.projectDetail);
        })
    }
  },
  mounted(){
    this.getApi();
    //console.log(this.$route.params.slug);
  }
    }
</script>

<template>

    <main>
        <div class="container">
            <h1 class="text-center py-4 fw-bold text-uppercase text-white">DETTAGLIO {{store.projectDetail.name}}</h1>

            <div class="card">

                <div class="card-body">

                    <img :src="store.projectDetail.cover_image" :alt="store.projectDetail.name">

                    <h5 class="card-title">{{store.projectDetail.name}}</h5>
                    <div class="d-block">
                    <span v-if="store.projectDetail.type" class="badge rounded-pill text-bg-info me-1">{{store.projectDetail.type.name}}</span>
                    </div>
                        <span v-for="item in store.projectDetail.technologies" :key="item.id" class="badge text-bg-dark me-1">
                            {{item.name}}
                        </span>
                    <p v-html="store.projectDetail.summary" class="card-text"></p>

                    <a href="#" class="btn btn-primary">
                        <router-link :to="{name: 'projectspage'}">
                            Torna a tutti i Progetti
                        </router-link>
                    </a>

                </div>
            </div>
        </div>
        

    </main>

</template>


<style lang="scss" scoped>

h1{
    text-shadow: 0 0  5px rgba(0, 0, 0, 0.782);
}

a{
        text-decoration: none;
        color: rgb(255, 255, 255);
        transition: all 0.45s;
        &:hover{
            color: rgb(215, 215, 215);
        }
    }
</style>
