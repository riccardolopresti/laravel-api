<script>

import AppHeader from './partials/AppHeader.vue'
import AppFooter from './partials/AppFooter.vue'

export default {
  name: 'App',
  components:{
    AppHeader,
    AppFooter
  },

}
</script>

<template>

    <AppHeader/>

    <router-view></router-view>

    <AppFooter/>


</template>

<style lang="scss">

</style>
