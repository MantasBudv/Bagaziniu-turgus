<template>
  <div class="upload-form">
    <b-form @submit="onSubmit">

      <b-form-group label="Pavadinimas:" label-size="lg">
        <b-input-group size="lg">
          <b-form-input v-model="title" required placeholder="Įveskite pavadinimą" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Aprašymas:" label-size="lg">
        <b-input-group size="lg">
          <b-form-input v-model="content" required placeholder="Įveskite aprašymą" maxlength="5000"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Kaina:" label-size="lg">
        <b-input-group size="lg">
          <b-form-input v-model="price" required placeholder="Įveskite kainą" maxlength="10"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Nuotrauka:" label-size="lg">
        <b-input-group size="lg">
          <b-form-input type="file" required></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-button type="submit" variant="dark" class="mx-auto">Įkelti</b-button>
    </b-form>
  </div>
</template>

<script>
import Filters from '../components/Filters.vue'
import Product from '../components/Product.vue'
export default {
  name: 'Upload',
  components: { Filters, Product },
  data() {
    return {
      title: '',
      content: '',
      price: null,
    }
  }
}
</script>

<style lang='scss' scoped>
.upload-form {
  display: flex;
  flex-direction: column;
  padding: 1.5em;
  max-width: 600px;
  background-color: #fff;
  border-radius: 10px;
  margin: 5em auto 0 auto;
}
</style>