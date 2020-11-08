<template>
  <div class="about">
    <div class="column">
        <img src="../img/money.jpg">
    </div>
    <div class="column">
        <p class="bigger">{{product.name}}</p>
        <p>{{product.full_description}}</p>
        <p class="label">Gamintojas:</p> <p>{{product.manufacturer}}</p> 
        <p class="label">Kilmės šalis:</p> <p>{{product.country_of_origin}}</p> 
        <p class="label">Kiekis sandelyje:</p> <p>{{quantity}}</p> 
        <p class="bigger">{{product.price}} €</p>
        <b-button variant="primary" @click="addToCart">Pridėti į krepšelį</b-button>
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
        max-width: 45%;
        min-width: 100px;
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