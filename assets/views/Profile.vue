<template>
  <div class="profile-form">
    <b-form @submit.prevent="onSubmit">

      <b-form-group label="Vardas:" label-size="md">
        <b-input-group size="md">
          <b-form-input v-model="user.name" required placeholder="Vardas" maxlength="50" :disabled="disabledFields"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Pavardė:" label-size="md">
        <b-input-group size="md">
          <b-form-input v-model="user.surname" required placeholder="Pavardė" maxlength="50" :disabled="disabledFields"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="El. paštas:" label-size="md">
        <b-input-group size="md">
          <b-form-input v-model="user.email" required placeholder="El. paštas" maxlength="50" :disabled="disabledFields"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Tel. nr.:" label-size="md">
        <b-input-group size="md">
          <b-form-input v-model="user.phone" required placeholder="Tel. nr." maxlength="12" :disabled="disabledFields"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Slaptažodis:" label-size="md" v-if="!disabledFields">
        <b-input-group size="md">
          <b-form-input type="password" v-model="user.password" required placeholder="Slaptažodis" minlength="8" maxlength="50" :disabled="disabledFields"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Pakartokite slaptažodį:" label-size="md" v-if="!disabledFields">
        <b-input-group size="md">
          <b-form-input type="password" v-model="confirmPassword" required minlength="8" maxlength="50" :disabled="disabledFields"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-button type="submit" variant="dark" class="ml-auto" v-if="disabledFields">Redaguoti</b-button>
      <b-button type="submit" variant="dark" class="ml-auto" v-if="!disabledFields">Išsaugoti</b-button>
      <b-button @click="onProfileDelete" variant="dark" class="ml-auto margin-top" v-if="disabledFields">Ištrinti profilį</b-button>
    </b-form>
  </div>

</template>


<script>
export default {
  name: 'Profile',
  data() {
    return {
        user: {},
        disabledFields: true,
        confirmPassword: ''
    }
  },
  methods: {
    onSubmit () {
      if (this.disabledFields) {
        this.disabledFields = false
      } else {
          if (this.user.password === this.confirmPassword) {
              axios.post(`/klientai/redaguoti`,{'id': this.$store.state.user.id, 'name':this.user.name,'surname':this.user.surname,'email':this.user.email,'phone':this.user.phone,'password':this.user.password}).then((res) => {
                this.$store.state.loggedIn = false
                this.$store.state.user = res.data.user
                alert('Sekmingai pakoreguotas')
              }).catch((err)=>{
                  alert("Nepavyko pakeisti duomenu")
                })
              this.confirmPassword = ''
              this.disabledFields = true
          } else {
              alert('Slaptažodžiai nesutampa')
          }
      }
    },
    onProfileDelete () {
        axios.delete(`/klientai/trinti/${this.$store.state.user.id}`).then((res) => {
            this.$store.state.loggedIn = false
            this.$store.state.user = {}
            this.$router.push({path: `/`})
        }).catch((err)=>{
                  alert("Nepavyko pakeisti duomenu")
                })
            
      },
    
    onProfileEdit () {
        
    } 
  },
  created () {
        this.user = this.$store.state.user
  }
}
</script>

<style lang='scss' scoped>
.profile-form {
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
.margin-top{
  margin-top: 10px;
}
</style>