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
            return state.products
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