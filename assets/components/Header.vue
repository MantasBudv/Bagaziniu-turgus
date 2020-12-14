<template>
    <b-navbar :sticky="true" toggleable="md" type="dark" variant="dark"> <!--primary, success, info, warning, danger, dark, or light -->
     <b-navbar-brand id="title" to="/">Bagažinių turgus</b-navbar-brand>
        
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
            
            <b-navbar-nav class="ml-auto">
                <b-nav-item to="/">
                    <b-icon id="home" icon="house" aria-hidden="true"></b-icon>
                    <b-tooltip target="home" triggers="hover">
                        Namai
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="!loggedIn" to="/prisijungimas">Prisijungti</b-nav-item>
                <b-nav-item v-if="!loggedIn" to="/registracija">Registracija</b-nav-item>
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
                <b-nav-item v-if="loggedIn && !isAdmin" @click="getNewspaper">
                    <b-icon id="newspaper" icon="newspaper" aria-hidden="true"></b-icon>
                    <b-tooltip target="newspaper" triggers="hover">
                        Gauti naujienlaiškį
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn && isAdmin" to="/prideti">
                    <b-icon id="add" icon="plus-circle-fill" aria-hidden="true"></b-icon>
                    <b-tooltip target="add" triggers="hover">
                        Pridėti prekę
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn && isAdmin" to="/pridetiBuda">
                    <b-icon id="addB" icon="cash" aria-hidden="true"></b-icon>
                    <b-tooltip target="addB" triggers="hover">
                        Pridėti mokėjimo būdą
                    </b-tooltip>
                </b-nav-item>
                <b-nav-item v-if="loggedIn && isAdmin" @click="getProductReport">
                    <b-icon id="addB" icon="card-list" aria-hidden="true"></b-icon>
                    <b-tooltip target="addB" triggers="hover">
                        Generuoti prekių ataskaitą
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
                <b-nav-item v-if="loggedIn && isAdmin" to="/uzsakymu_red">
                    <b-icon id="question" icon="bag-check" aria-hidden="true"></b-icon>
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
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
export default {
  name: 'Header',
  methods: {
      logout () {
          this.$store.state.loggedIn = false
          this.$store.state.user = {}
          this.$router.push('/')
      },
      getNewspaper () {
        axios.post('/email').then((res) => {
            console.log('wow')
        })
      },
      getProductReport() {
        axios.get('/produktai/visi').then((res) => {
            var body =  [];
            console.log(res.data);
            pdfMake.vfs = pdfFonts.pdfMake.vfs;
            body.push([ 'Nr', 'Pavadinimas', 'Pridėjimo data', 'Gamintojas', 'Kilmės šalis', 'Kaina', 'Kiekis']);
            res.data.forEach((item) => {
                body.push([item.id,item.name,item.dateAdded.substring(0,10)
                ,item.manufacturer,item.countryOfOrigin,item.price + "€",item.quantity]);
             })
            var docDefinition = {
                                    content: 
                                    [
                                        {text: "Prekių ataskaita:\n\n", fontSize:20},
                                        {
                                        layout: 'lightHorizontalLines', // optional
                                        table: {
                                            // headers are automatically repeated if the table spans over multiple pages
                                            // you can declare how many rows should be treated as headers
                                            headerRows: 1,
                                            widths: [ 20, 100, 70, 70,70, 70, 40, 40],
                                            body: body,
                                            
                                        }, fontSize:11
                                        }
                                    ]
                                };
            pdfMake.createPdf(docDefinition).download('Produktai.pdf'); 
      });
      }
  },
  computed: {
      loggedIn () {
          return this.$store.state.loggedIn
      },
      cartItems () {
          return this.$store.getters.getCartItemsCount
      },
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