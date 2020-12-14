<template>
<b-container class="container">
  <b-button style="text-align : left" squared block v-b-toggle.collapse-1 variant="clear">Filter              
                    <b-icon id="profile" icon="caret-down" aria-hidden="true"></b-icon>
  </b-button>
  <b-collapse id="collapse-1" class="mt-2">
        <b-row class="text-center">
            <b-col sm="6">
                <b-form-group label="Metai" label-size="sm" label-cols-sm="1">
                    <div class="flex-row">
                        <b-input-group size="sm" prepend="nuo" class="margin-left">
                            <b-form-input placeholder="1917" v-model="fromY" maxlength="4"></b-form-input>
                        </b-input-group>
                        <b-input-group size="sm" prepend="iki" class="margin-left">
                            <b-form-input placeholder="1940" v-model="toY" maxlength="4"></b-form-input>
                        </b-input-group>
                    </div>
                </b-form-group>
            </b-col>
            <b-col sm="6">
                <b-form-group label="Kaina" label-size="sm" label-cols-sm="1">
                    <div class="flex-row">
                        <b-input-group size="sm" prepend="nuo" class="margin-left">
                            <b-form-input placeholder="1" v-model="fromPrice"></b-form-input>
                        </b-input-group>
                        <b-input-group size="sm" prepend="iki" class="margin-left">
                            <b-form-input placeholder="13.37" v-model="toPrice"></b-form-input>
                        </b-input-group>
                    </div>
                </b-form-group>
            </b-col>
        </b-row>
        <b-row class="justify-content-sm-center text-center">
            <b-col sm="5">
                <b-form-group label="Pavadinimas" label-size="sm" label-cols-sm="3">
                    <b-input-group size="sm" class="margin-left no-margin-left">
                        <b-form-input placeholder="Dubenėlis" v-model="name"></b-form-input>
                    </b-input-group>
                </b-form-group>
            </b-col>
            <b-col sm="5">
                <b-form-group label="Šalis" label-size="sm" label-cols-sm="1">
                    <b-input-group size="sm" class="margin-left no-margin-left">
                        <b-form-input placeholder="Lietuva" v-model="country"></b-form-input>
                    </b-input-group>
                </b-form-group>
            </b-col>
        </b-row>
          </b-collapse>
    </b-container>
</template>

<script>
export default {
    name: 'Filters',
    data() {
        return {
            fromY: '',
            toY: '',
            fromPrice: '',
            toPrice: '',
            country: '',
            name: ''
        }
    },
    watch: {
        fromY (val, oldVal) { 
            this.$store.state.filters.fromY = val
        },
        toY (val, oldVal) { 
            this.$store.state.filters.toY = val
        },
        fromPrice (val, oldVal) { 
            this.$store.state.filters.fromPrice = val
        },
        toPrice (val, oldVal) { 
            this.$store.state.filters.toPrice = val
        },
        country (val, oldVal) { 
            this.$store.state.filters.country = val
        },
        name (val, oldVal) { 
            this.$store.state.filters.name = val
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

.btn:focus, .btn.focus {
    outline: 0;
    box-shadow: none;
}


</style>