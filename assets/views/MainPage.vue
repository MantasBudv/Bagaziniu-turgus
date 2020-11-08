<template>
  <div class="background-color">
    <Filters />
    <div class="content">
      <Product />
      <Product />
      <Product />
      <Product />
    </div>
  </div>
</template>

<script>
import Filters from '../components/Filters.vue'
import Product from '../components/Product.vue'
export default {
  name: 'MainPage',
  components: { Filters, Product },
}
</script>

<style lang='scss' scoped>
.content {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 1em;
}
.background-color {
    background-color: #f0f0f0;
}
</style>