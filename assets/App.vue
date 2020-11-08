<template>
  <b-container id="app" fluid>
    <Header />
    <b-container fluid="md">
      <router-view/>
    </b-container>
  </b-container>
</template>

<script>
import Header from './components/Header.vue'

export default {
  name: 'App',
  components: { Header }
}
</script>

<style lang="scss">
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  min-height: 100vh;
  background-color: #ebebeb;
}
#app {
  color: #2c3e50;
  padding-left: 0;
  padding-right: 0;
}
.card-body {
    padding-bottom: 0 !important;
}
</style>
