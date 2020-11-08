<template>
  <b-container id="app" fluid>
    <Header />
    <b-container fluid="md">
      <router-view/>
    </b-container>
      <Footer />
  </b-container>
</template>

<script>
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'

export default {
  name: 'App',
  components: { Header, Footer }
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
  font-family: 'muli', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  padding-left: 0;
  padding-right: 0;
}
.card-body {
    padding-bottom: 0 !important;
}
</style>
