<template>
  <div class="orders">
  

      <table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
        <th scope="col">Užsakymo data</th>
        <th scope="col">Suma</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(order,index) in orders" :key="index">
            <td>{{order.creationDate}}</td>
            <td>{{order.total}}</td>
            <td><b-button @click="onComplete(order.id)" variant="dark">Užbaigti</b-button></td>
        </tr>
    </tbody>
      </table></div>
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
.questions {
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
        width: 40%;
    }
}
.names {
    font-size: 1.2em;
}
</style>