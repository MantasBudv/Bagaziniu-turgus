<template>
  <div class="background-color">
    <Filters />
    <div class="content">
      <Product />
      <Product />
      <Product />
      <Product />
      <Product />
      <Product />
      <Product />
      <Product />
      <Product />
    </div>
    <div class="support" v-if="!isAdmin">
      <h2>Pagalba</h2>
      <b-form @submit.prevent="onSubmit">
        <b-form-group label-size="md">
          <b-input-group size="md">
            <b-form-textarea v-model="supportMessage" placeholder="Žinutė" minlength="20"></b-form-textarea>
          </b-input-group>
        </b-form-group>
        <b-button type="submit" variant="primary" class="ml-auto">Siųsti</b-button>
      </b-form>
    </div>
  </div>
</template>

<script>
import Filters from '../components/Filters.vue'
import Product from '../components/Product.vue'
export default {
  name: 'MainPage',
  components: { Filters, Product },
  data () {
    return {
      supportMessage: ''
    }
  },
  methods: {
    onSubmit () {
      // send message
      alert('Žinutė išsiųsta')
      this.supportMessage = ''
    }
  },
  computed: {
    isAdmin () {
      if (this.$store.state.user.admin_id == 0) {
        return false
      } else {
        return true
      }
    }
  }
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