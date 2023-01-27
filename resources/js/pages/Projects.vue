<script>

import ProjectCard from '../ProjectsCard.vue'

    export default {
        name:'Home',
        components:{
            ProjectCard
        },
    }
</script>

<template>

    <main>

        <h1 class="text-center mt-4 text-uppercase">Projects</h1>

        <ProjectCard />

        <div class="paginate text-center my-5">

<button :disabled="store.current === 1" type="button" class="btn btn-outline-secondary me-1">prev</button>

<button  v-for="i in store.last" :key="i" type="button" class="btn btn-outline-secondary me-1" @click="this.getApi(i)">{{i}}</button>

<button :disabled="store.current === store.last" type="button" class="btn btn-outline-secondary ms-1" @click="this.getApi(store.current + 1)">next</button>

</div>

    </main>

</template>


<style>

</style>
