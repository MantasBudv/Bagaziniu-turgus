<template>
  <div class="add-form">
    <b-form @submit.prevent="onSubmit">

      <b-form-group label="Pavadinimas:" label-size="lg">
        <b-input-group size="md">
          <b-form-input v-model="product.name" required placeholder="Pavadinimas" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-button type="submit" variant="dark" class="ml-auto" >Įkelti</b-button>
    </b-form>
  </div>
</template>

<script>
export default {
  name: 'AddPaymentMethod',
  data() {
    return {
        product: {}
    }
  },
  methods: {
    onSubmit () {
      axios.post('/payment/method/sukurti', {
        'name': this.product.name
      }).then((res)=>{
      this.product = res.data
      console.log(this.product)
      })
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