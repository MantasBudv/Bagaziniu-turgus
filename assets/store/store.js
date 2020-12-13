import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        user: {},
        loggedIn: false,
        cart: [
            [1, 1]
        ],
        products: [],
        filters: {
            fromY: '',
            toY: '',
            fromPrice: null,
            toPrice: null,
            country: '',
            name: ''
        }
    },
    getters: {
        getProducts (state) {
            let products = state.products
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
            if (state.filters.fromPrice !== null) {
                products = products.filter(item => item.price >= Number(state.filters.fromPrice))
            }
            if (state.filters.toPrice !== null) {
                if (state.filters.fromPrice !== null) {
                    if (Number(state.filters.fromPrice) <= Number(state.filters.toPrice)) {
                        products = products.filter(item => item.price <= Number(state.filters.toPrice))
                    }
                }
            }
            if (state.filters.country !== '') {
                products = products.filter(item => item.countryOfOrigin.toLowerCase().includes(state.filters.country.toLowerCase()))
            }
            if (state.filters.name !== '') {
                products = products.filter(item => item.name.toLowerCase().includes(state.filters.name.toLowerCase()))
            }
            return products
        }
    },
    mutations: {
        addToCart(state, id) {
            let isAdded = false
            state.cart.forEach((item) => {
                if (item[0] == id) {
                    isAdded = true
                }
            })
            if (!isAdded) {
                state.cart.push([id, 1])
            }
        }
    }
});