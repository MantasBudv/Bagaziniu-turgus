<template>
  <div class="login-form">
    <b-form @submit.prevent="onSubmit">

      <b-form-group label="Prisijungimo vardas:" label-size="lg">
        <b-input-group size="lg">
          <b-form-input v-model="username" required placeholder="Prisijungimo vardas" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Slaptažodis:" label-size="lg">
        <b-input-group size="lg">
          <b-form-input type="password" v-model="password" required placeholder="Slaptažodis" maxlength="50"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-button type="submit" variant="dark" class="ml-auto">Prisijungti</b-button>
    </b-form>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data () {
      return {
          username: '',
          password: ''
      }
  },
  methods: {
    onSubmit () {
      axios.post(`/prisijungimas`,{'username':this.username,'password':this.password}).then((res) => {
        this.$store.state.loggedIn = true
        this.$store.state.user = res.data.user
        this.$router.push({path: `/`})
      }).catch((err)=>{
        alert("Neteisingi prisijungimo duomenys")
      })
    }
  },
}
</script>

<style lang='scss' scoped>
.login-form {
  padding: 1.5em;
  max-width: 600px;
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
    width: 100%;
    margin: 0 auto;
}
</style>