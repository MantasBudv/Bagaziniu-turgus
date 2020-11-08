<template>
    <b-navbar toggleable="md" type="dark" variant="dark"> <!--primary, success, info, warning, danger, dark, or light -->
        <b-navbar-brand to="/">LDK monetos</b-navbar-brand>
        
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item to="/">Pradžia</b-nav-item>
            </b-navbar-nav>
            
            <b-navbar-nav class="ml-auto">
                <b-nav-form @submit.prevent="onSearch">
                    <b-form-input size="sm" class="mr-sm-2" placeholder="Ieškoti..."></b-form-input>
                    <b-button size="sm" class="mr-sm-2" type="submit"><b-icon icon="search"></b-icon></b-button>
                </b-nav-form>
                <b-nav-item v-if="!loggedIn" to="/prisijungimas">Prisijungti</b-nav-item>
                <b-nav-item v-if="loggedIn" to="/krepselis">
                    <b-icon id="cart" icon="cart3" aria-hidden="true"></b-icon>
                    <b-badge v-if="cartItems" variant="light">{{ cartItems }}</b-badge>
                    <b-tooltip target="cart" triggers="hover">
                        Krepšelis
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn" to="/profilis">
                    <b-icon id="profile" icon="person" aria-hidden="true"></b-icon>
                    <b-tooltip target="profile" triggers="hover">
                        Profilis
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
      }
  }
}
</script>

<style lang='scss' scoped>
  .btn-outline-none {
    color: rgba(255, 255, 255, 0.5) !important;
    &:hover {
        color: rgba(255, 255, 255, 0.8) !important;
    }
  }
  svg {
      font-size: 150% !important;
  }
</style>