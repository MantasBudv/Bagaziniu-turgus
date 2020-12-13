<template>
  <div class="edit-form">
    <b-form @submit.prevent="onSubmit">

      <b-form-group label="Pavadinimas:" label-size="lg">
        <b-input-group size="md">
          <b-form-input v-model="product.name" required placeholder="Pavadinimas" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Pilnas aprašymas:" label-size="lg">
        <b-input-group size="md">
          <b-form-textarea v-model="product.fullDescription" required placeholder="Pilnas aprašymas" maxlength="255"></b-form-textarea>
        </b-input-group>
      </b-form-group>
      
      <b-form-group label="Trumpas aprašymas:" label-size="lg">
        <b-input-group size="md">
          <b-form-textarea v-model="product.shortDescription" required placeholder="Trumpas aprašymas" maxlength="255"></b-form-textarea>
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
          <b-form-input v-model="product.countryOfOrigin" required placeholder="Kilmės šalis" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>
      
      <b-form-group label="Kiekis:" label-size="lg">
        <b-input-group size="md">
          <b-form-input v-model="product.quantity" required placeholder="Kiekis" maxlength="10"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-button type="submit" variant="dark" class="ml-auto">Išsaugoti</b-button>
    </b-form>
  </div>
</template>

<script>
export default {
  name: 'Edit',
  data() {
    return {
        product: {}
    }
  },
  methods: {
    onSubmit () {
        axios.post('/keistiProdukta', {
          'id': this.$route.params.id,
          'name': this.product.name,
          'fullDescription': this.product.fullDescription,
          'shortDescription': this.product.shortDescription,
          'price': this.product.price,
          'manufacturer': this.product.manufacturer,
          'countryOfOrigin': this.product.countryOfOrigin,
          'quantity': this.product.quantity
          }).then((res)=>{
          this.product = res.data
        })
        this.$router.push('/')
    }
  },
  created () {
      this.product = this.$store.state.product
  },
  mounted () {
  axios.get('/gautiProdukta', {
    params: {
        id: this.$route.params.id
    }}).then((res)=>{
        this.product = res.data
  })
  }
}
</script>

<style lang='scss' scoped>
.edit-form {
  padding: 1.5em;
  max-width: 900px;
  background-color: #fff;
  border-radius: 10px;
  margin: 5em auto 0 auto;
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