<template>
  <div class="orders">
    <div class="row names">
        <p>Užsakymo data</p>
        <p>Suma</p> 
        <p>Statusas</p>
        <p></p> 
    </div>
    <div>
        <div class="row" v-for="(order, index) in orders" :key="index">
            <p>{{ order.creationDate }}</p> 
            <p>{{ order.total }}</p> 
            <p>{{ order.status }}</p>
            <p><b-button @click="onGenerate(order.name)" variant="dark" class="ml-auto">Generuoti sąskaitą</b-button></p> 
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Coupons',
  data () {
      return {
          orders: []
      }
  },
  methods: {
      onGenerate () {
            
      }
  },
  mounted () {
      axios.get('/mokejimai/visi').then((res) => {
          this.orders = res.data
          res.data.forEach((item) => {
            if (item.creationDate) {
                item.creationDate = item.creationDate.substring(0, 10)
            }
          })
      })
  }
}
</script>

<style lang='scss' scoped>
.orders {
    display: flex;
    flex-direction: column;
    padding: 1.5em;
    max-width: 900px;
    background-color: #fff;
    border-radius: 10px;
    margin: 5em auto 0 auto;
}
.row {
    display: flex;
    flex-direction: row;
    p {
        width: 25%;
        padding: 0.5em;
    }
}
.names {
    font-size: 1.2em;
}
</style>