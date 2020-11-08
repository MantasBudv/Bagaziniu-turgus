<template>
  <div class="cart">
      <div class="row names">
        <p>Pavadinimas</p>
        <p>Trumpas aprašymas</p>
        <p>Kiekis</p> 
        <p>Kaina</p>
    </div>
    <div class="row">
        <p>{{product.name}}</p>
        <p>{{product.short_description}}</p>
        <p>{{quantity}}</p> 
        <p>{{product.price}} €</p>
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
          return this.$store.state.cart[0][1]
      }
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