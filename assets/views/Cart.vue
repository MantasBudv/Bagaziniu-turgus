<template>
  <div class="cart">

      <h2>Prekių krepšelis </h2>
    <table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
        <th scope="col">Produktas</th>
        <th scope="col"> </th>
        <th scope="col"> </th>
        <th scope="col">Kiekis</th>
        <th scope="col">Kaina</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td class="align-middle"><img id ="product_picture" src="/build/images/money.599ac086.jpg" alt="Image"></td>
        <td class="align-middle">{{product.name}}</td>
        <td class="align-middle">{{product.short_description}}</td>
        <td class="align-middle">{{quantity}}</td>
        <td class="align-middle">{{product.price}} €</td>
        </tr>
                <tr>
        <td class="align-middle"><img id ="product_picture" src="/build/images/money.599ac086.jpg" alt="Image"></td>
        <td class="align-middle">{{product.name}}</td>
        <td class="align-middle">{{product.short_description}}</td>
        <td class="align-middle">{{quantity}}</td>
        <td class="align-middle">{{product.price}} €</td>
        </tr>
                <tr>
        <td class="align-middle"><img id ="product_picture" src="/build/images/money.599ac086.jpg" alt="Image"></td>
        <td class="align-middle">{{product.name}}</td>
        <td class="align-middle">{{product.short_description}}</td>
        <td class="align-middle">{{quantity}}</td>
        <td class="align-middle">{{product.price}} €</td>
        </tr>
    </tbody>
    </table>
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

</style>