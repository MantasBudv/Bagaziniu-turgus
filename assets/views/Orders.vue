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
            <p><b-button @click="onGenerate(order.name,order.id)" variant="dark" class="ml-auto">Generuoti sąskaitą</b-button></p> 
        </div>
    </div>
  </div>
</template>

<script>
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
export default {
  name: 'Coupons',
  data () {
      return {
          orders: []
      }
  },
  methods: {
      onGenerate (name,index) {
        axios.get('/mokejimai/gautisaskaita', {
            params: {
                id: index
        }}).then((res) => {
            pdfMake.vfs = pdfFonts.pdfMake.vfs;
            var paymentm = this.$store.state.paymentMethods.filter((item) => item.id == res.data.paymentMethod)[0]
            var docDefinition = {
                content: [
                    // using a { text: '...' } object lets you set styling properties
                    {text: 'Sąskaita\n\n', fontSize: 20 },
                    { text: '', fontSize: 20 },
                    {text: 'Užsakymo numeris: ' + index},
                    {text: 'Užsakymo kaina: ' + res.data.total + "€"},
                    {text: 'Užsakymo data: ' + res.data.creationDate.substring(0,10)},
                    {text: 'Atsiskaitymo metodas: ' + paymentm.name}
                ]
            };
            pdfMake.createPdf(docDefinition).download('Saskaita_'+index+'.pdf');  
        })
      }
  },
  mounted () {
      axios.get('/mokejimai/visi', {
            params: {
                id: this.$store.state.user.id
        }}).then((res) => {
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