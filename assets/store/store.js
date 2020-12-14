import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        user: {},
        loggedIn: false,
        products: [],
        coupons: [],
        filters: {
            fromY: '',
            toY: '',
            fromPrice: '',
            toPrice: '',
            country: '',
            name: ''
        }
    },
    getters: {
        getProducts (state) {
            let products = state.products
            products = products.filter(item => Number(item.quantity) > 0)
            if (state.filters.fromY !== '') {
                products = products.filter(item => Number(item.dateAdded.substring(0,4)) >= Number(state.filters.fromY))
            }
            if (state.filters.toY !== '') {
                if (Number(state.filters.fromY) <= Number(state.filters.toY)) {
                    if (state.filters.toY.length == 4) {
                        products = products.filter(item => Number(item.dateAdded.substring(0,4)) <= Number(state.filters.toY))
                    }
                }
            }
            if (state.filters.fromPrice !== '') {
                products = products.filter(item => item.price >= Number(state.filters.fromPrice))
            }
            if (state.filters.toPrice !== '') {
                if (state.filters.fromPrice !== '') {
                    if (Number(state.filters.fromPrice) <= Number(state.filters.toPrice)) {
                        products = products.filter(item => item.price <= Number(state.filters.toPrice))
                    }
                } else {
                    products = products.filter(item => item.price <= Number(state.filters.toPrice))
                }
            }
            if (state.filters.country !== '') {
                products = products.filter(item => item.countryOfOrigin.toLowerCase().includes(state.filters.country.toLowerCase()))
            }
            if (state.filters.name !== '') {
                products = products.filter(item => item.name.toLowerCase().includes(state.filters.name.toLowerCase()))
            }
            return products
        },
        getCartItemsCount (state) {
            let count = 0
            state.products.forEach((item) => {
                if (item.inCart == 1) {
                    count++
                }
            })
            return count
        },
        getCartItems (state) {
            return state.products.filter((item) => item.inCart == 1)
        },
    },
    mutations: {
        addToCart(state, id) {
            const index = state.products.findIndex((item) => item.id == id)
            state.products[index].inCart = 1
        },
        removeCartItem (state, id) {
            const index = state.products.findIndex((item) => item.id == id)
            state.products[index].inCart = 0
        }
    }
});