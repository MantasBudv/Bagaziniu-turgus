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
  components: { Header },
  mounted () {
    axios.get('/produktai/visi').then((res)=>{
      res.data.forEach((item) => {
        item.inCart = 0
      })
      this.$store.state.products = res.data
    })
    axios.get('/nuolaidos/visos').then((res)=>{
      this.$store.state.coupons = res.data
    })
    axios.get('/mokejimuikai').then((res)=>{
      this.$store.state.paymentMethods = res.data
    })
  }
}
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans&family=Libre+Baskerville&family=Spartan&display=swap');
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

  font-family: 'Alegreya Sans', sans-serif;
  font-family: 'Libre Baskerville', serif;
  font-family: 'Spartan', sans-serif;
  color: #2c3e50;
  padding-left: 0;
  padding-right: 0;
}
.card-body {
    padding-bottom: 0 !important;
}
</style>
