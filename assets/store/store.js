import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        user: {
            id: 1,
            name: 'Jonas',
            surname: 'Jonauskas',
            email: 'jonas.jonauskas@gmail.com',
            phone: '+37060000000',
            username: 'JonJon',
            password: 'testas123',
            admin_id: 1
        },
        loggedIn: true,
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