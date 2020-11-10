<template>
  <div class="coupons">
    <b-form @submit.prevent="onSubmit" v-if="createNew">

        <b-form-group label="Pavadinimas:" label-size="lg">
            <b-input-group size="md">
                <b-form-input v-model="couponName" required placeholder="Pavadinimas" maxlength="50"></b-form-input>
            </b-input-group>
        </b-form-group>

        <b-form-group label="Tipas:">
            <b-form-radio v-model="selected" value="Procentinis">Procentinis</b-form-radio>
            <b-form-radio v-model="selected" value="Fiksuotas">Fiksuotas</b-form-radio>
        </b-form-group>

        <b-form-group :label="this.selected === 'Procentinis' ? 'Nuolaida procentais:' : 'Nuolaidos suma:'" label-size="lg">
            <b-input-group size="md">
                <b-form-input v-model="amount" required placeholder="0.000" maxlength="3"></b-form-input>
            </b-input-group>
        </b-form-group>

        <b-button type="submit" variant="dark" class="ml-auto">Išsaugoti</b-button>
        <b-button @click="onCancel" variant="dark" class="ml-auto">Atšaukti</b-button>

    </b-form>

    <div class="row names" v-if="!createNew">
        <p>Pavadinimas</p>
        <p>Tipas</p>
        <p>Nuolaidos kiekis</p> 
        <p>Galiojimo pabaiga</p> 
        <p></p> 

    </div>
    <div class="row" v-if="!createNew">
        <p>Batai</p>
        <p>Procentinis</p> 
        <p>50</p>
        <p>2022-10-10</p>
        <p><b-button @click="onCancel" variant="dark" class="ml-auto">Šalinti</b-button></p> 
    </div>
        <div class="row" v-if="!createNew">
        <p>no50</p>
        <p>Procentinis</p> 
        <p>50</p>
        <p>2022-10-10</p>
        <p><b-button @click="onCancel" variant="dark" class="ml-auto">Šalinti</b-button></p> 
    </div>
        <div class="row" v-if="!createNew">
        <p>Testukas</p>
        <p>Procentinis</p> 
        <p>50</p>
        <p>2022-10-10</p>
        <p><b-button @click="onCancel" variant="dark" class="ml-auto">Šalinti</b-button></p> 
    </div>

    <b-button @click="onCreate" variant="dark" class="ml-auto" v-if="!createNew">Kurti naują kuponą</b-button>
  </div>
</template>

<script>
export default {
  name: 'Coupons',
  data () {
      return {
          couponName: '',
          selected: 'Procentinis',
          amount: null,
          createNew: false
      }
  },
  methods: {
      onSubmit () {
        // add to coupon list
        this.createNew = false
      },
      onCancel () {
        this.createNew = false
      },
      onCreate () {
        this.createNew = true 
      }
  }
}
</script>

<style lang='scss' scoped>
.coupons {
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
        width: 20%;
        padding: 0.5em;
    }
}
.names {
    font-size: 1.2em;
}
</style>