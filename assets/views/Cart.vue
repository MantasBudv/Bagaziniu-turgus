<template>
  <div class="cart">
    <h2 v-if="products.length != 0">Prekių krepšelis </h2>
    <table class="table table-striped table-hover align-middle" v-if="products.length != 0">
        <thead>
            <tr>
                <th scope="col">Produktas</th>
                <th scope="col"> </th>
                <th scope="col"> </th>
                <th scope="col bigger">Kaina</th>
                <th scope="col bigger"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(product, index) in products" :key="index">
                <td class="align-middle"><img id ="product_picture" src="/images/catbowl.jpg" alt="Image"></td>
                <td class="align-middle">{{product.name}}</td>
                <td class="align-middle">{{product.shortDescription}}</td>
                <td class="align-middle bigger">{{product.price}} €</td>
                <td class="align-middle"><b-button @click="onDelete(product.id)" variant="dark">Šalinti</b-button></td>
            </tr>
        </tbody>
    </table>
    <b-form-group v-if="products.length != 0" label="Įveskite nuolaidos kodą:" label-size="md">
        <b-input-group size="md">
            <b-form-input type="text" v-model="couponName"></b-form-input>
        </b-input-group>
    </b-form-group>

    <b-form-group v-if="products.length != 0" label="Pasirinkite apmokėjimo būdą:" label-size="md">
        <b-input-group size="md">
            <b-form-select v-model="selected" :options="options"></b-form-select>
        </b-input-group>
    </b-form-group>


    <h3 v-if="products.length != 0">
        Prekių suma: {{ sum }} €
    </h3>
    <h3 v-if="products.length != 0">
        Prekių suma pritaikius mokesčius ir nuolaidos kodą:
    </h3>
    <h3 v-if="products.length != 0">
        {{ totalSum }} €
    </h3>
    
    <b-button v-if="products.length != 0" variant="dark" @click="onBuy">Apmokėti</b-button>
    <h1 v-if="products.length == 0">Prekių krepšelyje nėra!</h1>
  </div>
</template>

<script>
export default {
  name: 'Cart',
  data () {
      return {
          couponName: '',
          options: [],
          selected: ''
      }
  },
  computed: {
    products () {
        return this.$store.getters.getCartItems
    },
    sum () {
        let sum = 0
        this.products.forEach((item) => {
            sum += item.price
        })
        return sum
    },
    totalSum () {
        let sum = 0
        let discount = 0
        let type = ''
        let sutampa = false
        this.products.forEach((item) => {
            sum += item.price 
        })
        sum = sum * 1.21
        this.coupons.forEach((item) => {
            if (item.name == this.couponName) {
                sutampa = true
                if (item.isPercentile == 1) {
                    type = 'Procentinis'
                    discount = item.percentile
                } else {
                    type = 'Fiksuotas'
                    discount = item.sum
                }
            }
        })
        if (sutampa) {
            if (type == 'Procentinis') {
                discount = sum * discount / 100
            }
        }
        return (sum - discount).toFixed(2)
    },
    coupons () {
        return this.$store.state.coupons
    }
  },
  methods: {
    onBuy () {
        axios.post(`/pirkti`, {
            sum: this.totalSum,
            user_id: this.$store.state.user.id,
            payment_method: this.selected
        }).then((res) => {
            this.products.forEach((item) => {
                this.$store.commit('removeCartItem', item.id)
            })
        })
    },
    onDelete (id) {
        this.$store.commit('removeCartItem', id)
    }
  },
  mounted() {
    this.$store.getters.getPaymentMethods.forEach((item)=>{
    let option = {}
    option.value = item.id
    option.text = item.name
    this.options.push(option)
    })
  }

}
</script>

<style lang='scss' scoped>
.cart {
    display: flex;
    flex-direction: column;
    padding: 1.5em;
    max-width: 900px;
    background-color: #fff;
    border-radius: 10px;
    margin: 5em auto 0 auto;
    #product_picture{
        max-height: 200px;
        max-width: 200px;
    }
    .table td{
        align-content: center;
    }
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
.bigger {
    width: 100px;
}
h3 {
    margin: 10px auto;
}
</style>