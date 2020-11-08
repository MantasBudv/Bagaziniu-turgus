<template>
    <b-card :title="title" tag="article" class="product text-center">
        <img src="/build/images/money.599ac086.jpg" alt="Image">
        <b-card-text>{{content}}</b-card-text>
        <b-list-group flush>
            <b-list-group-item class="price">{{price}} €</b-list-group-item>
        </b-list-group>
        <input type="button" value="Pirkti">
    </b-card>
</template>

<script>
export default {
    name: 'Product',
    data () {
        return {
            title: 'Hello Neda',
            content: 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
            price: 50
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
        width: calc(100% + 2.5rem);
        margin-left: -1.25rem;
        line-height: 2em;
        font-size: 1.5em;
        border: none;
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