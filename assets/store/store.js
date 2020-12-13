import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        user: {
        },
        loggedIn: false,
        product: {
            id: 1,
            name: 'Testas',
            full_description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            date_added: '2020-11-03',
            price: 50,
            short_description: 'Lorem ipsum dolor sit amet',
            manufacturer: 'Nokia',
            country_of_origin: 'China',
            quantity: 55
        },
        cart: [
            [1, 1]
        ]
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