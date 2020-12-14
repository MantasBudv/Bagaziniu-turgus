<template>
  <div class="orders">
    <div class="row names">
        <p>Užsakymo data</p>
        <p>Kliento id</p>
        <p>Suma</p>
        <p>Veiksmai</p>
     </div>
    <div>
        <div class="row" v-for="(order,index) in orders" :key="index">
            <p>{{order.creationDate}}</p>
            <p>{{order.userId}}</p>
            <p>{{order.total}}</p>
            <p><b-button @click="onComplete(order.id)" variant="dark">Užbaigti</b-button></p>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Orders',
  data() {
      return{
          orders:[]
      }
  },
  methods: {
      onComplete(id) {
          axios.post("/uzsakymai/answer", {'id':id}).then((res)=>{
            const index = this.orders.findIndex(item => item.id === id)
            this.orders.splice(index, 1)
          })
      },
  },
  mounted() {
      axios.get("/mokejimai/aktyvus").then((res)=>{
          this.orders=res.data
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
    max-width: 1200px;
    background-color: #fff;
    border-radius: 10px;
    margin: 5em auto 0 auto;
}
.row {
    display: flex;
    flex-direction: row;
    p {
        width: 25%;
    }
}
.names {
    font-size: 1.2em;
}
</style>