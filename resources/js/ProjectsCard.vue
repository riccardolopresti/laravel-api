<script>
import {store} from './store.js'

export default {
  name: 'ProjectCard',
  data(){
    return{
      store
    }
  },
}
</script>

<template>
  <div class="container">
    <h1 class="text-center">HOME PAGE</h1>
    <div class="row">
      <div class="col d-flex flex-wrap ">
        <div v-for="project in store.projects" :key="project.id" class="card m-2" style="width: 18rem;">

          <div class="card-body">
            <h5 class="card-title">{{project.name}}</h5>
            <h6>{{project.client_name}}</h6>
            <div class="d-block">
              <span class="badge rounded-pill text-bg-info me-1">{{project.type.name}}</span>
            </div>
            <span v-for="item in project.technologies" :key="item.id" class="badge text-bg-dark me-1">{{item.name}}</span>
            <p v-html="project.summary" class="card-text"></p>

          </div>

        </div>
      </div>

    </div>

  </div>
</template>

<style lang="scss">

</style>
