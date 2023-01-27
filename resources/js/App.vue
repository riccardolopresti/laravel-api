<script>

import AppHeader from './partials/AppHeader.vue'

export default {
  name: 'App',
  components:{
    AppHeader
  },

}
</script>

<template>

    <AppHeader/>

    <router-view></router-view>

</template>

<style lang="scss">

</style>
