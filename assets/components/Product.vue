<template>
    <b-card :title="product.name" tag="article" class="product text-center">
        <img src="images/catbowl.jpg" />
        <b-card-text>{{product.shortDescription}}</b-card-text>
        <b-list-group flush>
            <b-list-group-item class="price">{{product.price}} €</b-list-group-item>
        </b-list-group>
        <div class="flex-row">
            <input type="button" value="Aprašymas" @click="onAbout">
            <input type="button" value="Pirkti" v-if="!isAdmin && isLogged" @click="addToCart">
            <input type="button" class="noHover" value="" v-if="!isLogged" disabled>
            <input type="button" value="Redaguoti" v-if="isAdmin" @click="onEdit">
            <input type="button" value="Šalinti" v-if="isAdmin" @click="onDelete(product.id)">
        </div>
    </b-card>
</template>

<script>
export default {
    name: 'Product',
    props: {
        product: Object
    },
    computed: {
        isAdmin () {
            if (this.$store.state.user.adminId == 0 || this.$store.state.loggedIn == false) {
                return false
            } else {
                return true
            }
        },
        isLogged () {
            return this.$store.state.loggedIn
        }

    },
    methods: {
        onAbout () {
            this.$router.push({path: `/aprasymas/${this.product.id}`})
        },
        onEdit () {
            this.$router.push({path: `/redagavimas/${this.product.id}`})
        },
        onDelete (id) {
            axios.delete(`/prekes/trinti/${id}`).then((res) => {
                axios.get('/produktai/visi').then((res)=>{
                    res.data.forEach((item) => {
                        item.inCart = 0
                    })
                    this.$store.state.products = res.data
                })
            })    
        },
        addToCart () {
          this.$store.commit('addToCart', this.product.id)
        }
    }
}
</script>

<style lang='scss' scoped>
.product {
    position: relative;
    flex-basis: 32%;
    margin-bottom: 2em;
    color: rgba(0,0,0,0.5);
    img {
        width: 100%;
        height: 150px;
        margin-bottom: 0.5em;
    }
    input {
        cursor: pointer;
        text-decoration: none;
        line-height: 2em;
        font-size: 1em;
        border: none;
        width: 50%;
        background-color: rgba(0,0,0,0.03);
        &:hover {
            background-color: rgba(0,0,0,0.1);
        }
    }
    .price {
        font-size: 1.5em;
        font-weight: 700;
        margin-bottom: 20px;
        color: #000;
    }
}
.flex-row {
    position: absolute;
    display: flex;
    flex-direction: row;
    width: 100%;
    margin-left: -1.25rem;
    bottom: 0;
}
.noHover{
    pointer-events: none;
}
@media (max-width: 992px) { 
    .product {
        flex-basis: 45%;
    }
}
@media (max-width: 768px) { 
    .product {
        flex-basis: 100%;
    }
}
</style>