<template>
  <div class="about">
        <div class="column">
            <img id ="product_picture" src="/build/images/money.599ac086.jpg" alt="Image">
        </div>
        <div class="column">
            <p class="bigger">{{product.name}}</p>
            <p>{{product.full_description}}</p>

            <table class="table">
            <tbody>
                <tr>
                <th scope="row">Gamintojas:</th>
                <td>{{product.manufacturer}}</td>
                </tr>
                <tr>
                <th scope="row">Kilmės šalis:</th>
                <td>{{product.country_of_origin}}</td>
                </tr>
                <tr>
                <th scope="row">Kiekis sandelyje:</th>
                <td>{{quantity}}</td>

                </tr>
            </tbody>
            </table>
            
            <p class="bigger">{{product.price}} €</p>
            <b-button variant="dark" @click="addToCart"><b-icon id="profile" icon="plus" aria-hidden="true"></b-icon> Pridėti į krepšelį</b-button>
        </div>
  </div>
</template>

<script>
export default {
  name: 'About',
  computed: {
      product () {
          return this.$store.state.product
      },
      quantity () {
          const quantity = this.$store.state.product.quantity
          if (quantity > 10) {
              return '10+'
          } else {
              return quantity
          }
      }
  },
  methods: {
      addToCart () {
          this.$store.commit('addToCart', this.product.id)
      }
  }
}
</script>

<style lang='scss' scoped>
.about {
    display: flex;
    flex-direction: row;
    padding: 1.5em;
    max-width: 900px;
    background-color: #fff;
    border-radius: 10px;
    margin: 5em auto 0 auto;
}
.column {
    width: 50%;
    img {
        width: 70%;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 25px;
        margin-bottom: auto;
    }
}
p {
    font-size: 1em;
}
.bigger {
    font-size: 2em;
}
.label {
    font-size: 1.2em;
}
</style>