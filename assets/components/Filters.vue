<template>
    <b-container class="container">
        <b-row class="text-center">
            <b-col md="6">
                <b-form-group label="Metai" label-size="lg" label-cols-lg="1">
                    <div class="flex-row">
                        <b-input-group size="lg" prepend="nuo" class="margin-left">
                            <b-form-input placeholder="1917" v-model="fromY" maxlength="4"></b-form-input>
                        </b-input-group>
                        <b-input-group size="lg" prepend="iki" class="margin-left">
                            <b-form-input placeholder="1940" v-model="toY" maxlength="4"></b-form-input>
                        </b-input-group>
                    </div>
                </b-form-group>
            </b-col>
            <b-col md="6">
                <b-form-group label="Kaina" label-size="lg" label-cols-lg="1">
                    <div class="flex-row">
                        <b-input-group size="lg" prepend="nuo" class="margin-left">
                            <b-form-input placeholder="1" v-model="fromPrice"></b-form-input>
                        </b-input-group>
                        <b-input-group size="lg" prepend="iki" class="margin-left">
                            <b-form-input placeholder="13.37" v-model="toPrice"></b-form-input>
                        </b-input-group>
                    </div>
                </b-form-group>
            </b-col>
        </b-row>
        <b-row class="justify-content-md-center text-center">
            <b-col md="5">
                <b-form-group label="Šalis" label-size="lg" label-cols-lg="1">
                    <b-input-group size="lg" class="margin-left no-margin-left">
                        <b-form-input placeholder="Lietuva" v-model="country"></b-form-input>
                    </b-input-group>
                </b-form-group>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: 'Filters',
    data() {
        return {
            fromY: '',
            toY: '',
            fromPrice: null,
            toPrice: null,
            country: ''
        }
    }
}
</script>

<style lang='scss' scoped>
.flex-row {
    display: flex;
    flex-direction: row;
}
.container {
    padding-top: 1rem;
}
.margin-left {
    margin-left: 1rem;
}
input::placeholder {
    color: rgba(53, 26, 26, 0.2)
}
// Small devices (landscape phones, 576px and up)
@media (max-width: 576px) { 

}

// Medium devices (tablets, 768px and up)
@media (max-width: 768px) { 
    .container {
        max-width: 100%;
        padding: 1em;
    }
    .no-margin-left {
        margin-left: 0;
    }
}
</style>