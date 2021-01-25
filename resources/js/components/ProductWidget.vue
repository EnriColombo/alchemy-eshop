<template>
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ details.name }}</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">€{{ details.price }}</h1>
            <div class="mt-3 mb-4">
                {{ details.description }}
            </div>
            <button type="button" class="btn btn-lg btn-block btn-success" @click="addToCart">Aggiungi al carrello</button>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Vue from "vue";

export default {
    name: "ProductWidget",
    props: ['productId'], // TODO Valutare se passare tutto l'oggetto product ed evitare una get
    data: function () {
        return {
            details: {}
        }
    },

    mounted() {
        this.loadDetails();
    },

    methods: {
        loadDetails: async function ()
        {
            // load API
            await axios.get('/api/products/' + this.productId)
                .then((response) => {
                    this.details = response.data.data;
                })
                .catch(function (error) {
                    // catch errors
                    console.log(error);
                });
        },
        addToCart: async function ()
        {
            await axios.post('/api/cart', this.details)
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                    Vue.swal(
                        '',
                        "E' necessario accedere o registrarsi",
                        'info'
                    ).then(() => {
                            // Redirect to Laravel' route 'login'
                            window.location.href = '/login';
                        }
                    );
                });
            // Refresh CartWidget
            this.$root.$emit('Prodotto aggiunto al carrello');
        }
    }
}
</script>

<style scoped>

</style>
