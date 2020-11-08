<template>
    <b-card :title="product.name" tag="article" class="product text-center">
        <img src="/build/images/money.599ac086.jpg" alt="Image">
        <b-card-text>{{product.short_description}}</b-card-text>
        <b-list-group flush>
            <b-list-group-item class="price">{{product.price}} €</b-list-group-item>
        </b-list-group>
        <div class="flex-row">
            <input type="button" value="Aprašymas" @click="onAbout">
            <input type="button" value="Pirkti">
        </div>
    </b-card>
</template>

<script>
export default {
    name: 'Product',
    computed: {
        product () {
            return this.$store.state.product
        }
    },
    methods: {
        onAbout () {
            this.$router.push({path: `/aprasymas/${this.product.id}`})
        }
    }
}
</script>

<style lang='scss' scoped>
.product {
    flex-basis: 32%;
    margin-bottom: 2em;
    color: rgba(0,0,0,0.5);
    img {
        width: 100%;
        margin-bottom: 0.5em;
    }
    input {
        cursor: pointer;
        text-decoration: none;
        line-height: 2em;
        font-size: 1.5em;
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
        color: #000;
    }
}
.flex-row {
    display: flex;
    flex-direction: row;
    width: calc(100% + 2.5rem);
    margin-left: -1.25rem;
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