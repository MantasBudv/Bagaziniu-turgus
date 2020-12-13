<template>
    <b-navbar :sticky="true" toggleable="md" type="dark" variant="dark"> <!--primary, success, info, warning, danger, dark, or light -->
     <b-navbar-brand id="title" to="/">Bagažinių turgus</b-navbar-brand>
        
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
            
            <b-navbar-nav class="ml-auto">
                <b-nav-form @submit.prevent="onSearch">
                    <b-form-input size="sm" class="mr-sm-2" placeholder="Ieškoti..."></b-form-input>
                    <b-button size="sm" class="mr-sm-2" type="submit"><b-icon icon="search"></b-icon></b-button>
                </b-nav-form>
                <b-nav-item to="/">
                    <b-icon id="home" icon="house" aria-hidden="true"></b-icon>
                    <b-tooltip target="home" triggers="hover">
                        Namai
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="!loggedIn" to="/prisijungimas">Prisijungti</b-nav-item>
                <b-nav-item v-if="loggedIn && !isAdmin" to="/krepselis">
                    <b-icon id="cart" icon="cart3" aria-hidden="true"></b-icon>
                    <b-badge v-if="cartItems" variant="light">{{ cartItems }}</b-badge>
                    <b-tooltip target="cart" triggers="hover">
                        Krepšelis
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn && !isAdmin" to="/profilis">
                    <b-icon id="profile" icon="person" aria-hidden="true"></b-icon>
                    <b-tooltip target="profile" triggers="hover">
                        Profilis
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn && !isAdmin" to="/uzsakymai">
                    <b-icon id="journal" icon="journal" aria-hidden="true"></b-icon>
                    <b-tooltip target="journal" triggers="hover">
                        Uzsakymai
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn && isAdmin" to="/prideti">
                    <b-icon id="add" icon="plus-circle-fill" aria-hidden="true"></b-icon>
                    <b-tooltip target="add" triggers="hover">
                        Pridėti prekę
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn && isAdmin" to="/nuolaidos">
                    <b-icon id="discount" icon="server" aria-hidden="true"></b-icon>
                    <b-tooltip target="discount" triggers="hover">
                        Nuolaidų kuponai
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn && isAdmin" to="/klausimai">
                    <b-icon id="question" icon="question-circle-fill" aria-hidden="true"></b-icon>
                    <b-tooltip target="question" triggers="hover">
                        Klientų klausimai
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn" @click="logout">
                    <b-icon id="logout" icon="power" aria-hidden="true"></b-icon>
                    <b-tooltip target="logout" triggers="hover">
                        Atsijungti
                    </b-tooltip>
                </b-nav-item>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</template>

<script>
export default {
  name: 'Header',
  methods: {
      onSearch () {
          this.cartItems++
      },
      logout () {
          this.$store.state.loggedIn = false
          this.$router.push('/')
      }
  },
  computed: {
      loggedIn () {
          return this.$store.state.loggedIn
      },
      cartItems () {
          return this.$store.state.cart.length
      },
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
@import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
  .btn-outline-none {
    color: rgba(255, 255, 255, 0.5) !important;
    &:hover {
        color: rgba(255, 255, 255, 0.8) !important;
    }
  }
  svg {
      font-size: 150% !important;
  }
    #title {
    font-family: 'Pacifico', cursive;  
  }
</style>