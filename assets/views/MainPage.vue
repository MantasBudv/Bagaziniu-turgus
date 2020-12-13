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
       <b-icon icon="question-circle-fill" animation="spin" v-b-modal.my-modal font-scale="2" ></b-icon>
    
    <b-modal id="my-modal" hide-footer>
    <template #modal-title>
      <h2>Pagalba</h2>
    </template>
      <b-form @submit.prevent="onSubmit">
        <b-form-group label-size="md">
          <b-input-group size="md">
            <b-form-textarea v-model="supportMessage" placeholder="Žinutė" minlength="20"></b-form-textarea>
          </b-input-group>
        </b-form-group>
        <b-button align="right" type="submit" variant="dark" class="ml-auto">Siųsti</b-button>
      </b-form>
      </b-modal>
  </div></div>
  
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
      if (this.$store.state.user.adminId == 0) {
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
.support {
 position: fixed;
  bottom: 0;
  right: -200px;
  width: 300px;
  margin-bottom: 30px;
}

</style>