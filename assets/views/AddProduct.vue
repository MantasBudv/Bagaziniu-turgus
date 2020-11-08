<template>
  <div class="add-form">
    <b-form @submit.prevent="onSubmit">

      <b-form-group label="Pavadinimas:" label-size="lg">
        <b-input-group size="md">
          <b-form-input v-model="product.name" required placeholder="Pavadinimas" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Pilnas aprašymas:" label-size="lg">
        <b-input-group size="md">
          <b-form-textarea v-model="product.full_description" required placeholder="Pilnas aprašymas" maxlength="255"></b-form-textarea>
        </b-input-group>
      </b-form-group>
      
      <b-form-group label="Trumpas aprašymas:" label-size="lg">
        <b-input-group size="md">
          <b-form-textarea v-model="product.short_description" required placeholder="Trumpas aprašymas" maxlength="255"></b-form-textarea>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Kaina:" label-size="lg">
        <b-input-group size="md">
          <b-form-input v-model="product.price" required placeholder="Kaina" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Gamintojas:" label-size="lg">
        <b-input-group size="md">
          <b-form-input v-model="product.manufacturer" required placeholder="Gamintojas" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Kilmės šalis:" label-size="lg">
        <b-input-group size="md">
          <b-form-input v-model="product.country_of_origin" required placeholder="Kilmės šalis" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>
      
      <b-form-group label="Kiekis:" label-size="lg">
        <b-input-group size="md">
          <b-form-input v-model="product.quantity" required placeholder="Kiekis" maxlength="10"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-button type="submit" variant="primary" class="ml-auto" >Įkelti</b-button>
    </b-form>
  </div>
</template>

<script>
export default {
  name: 'AddProduct',
  data() {
    return {
        product: {}
    }
  },
  methods: {
    onSubmit () {
      // Add product  
      this.$router.push('/')
    }
  }
}
</script>

<style lang='scss' scoped>
.add-form {
  padding: 1.5em;
  max-width: 900px;
  background-color: #fff;
  border-radius: 10px;
  margin: 2.5em auto 2.5em auto;
}
.form-group {
    width: 100%;
    min-width: 150px;
    margin-left: auto;
    margin-right: auto;
}
form {
    display: flex;
    flex-direction: column;
    width: 50%;
    margin: 0 auto;
}
</style>