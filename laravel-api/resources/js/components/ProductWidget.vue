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
            <button type="button" class="btn btn-lg btn-block btn-success">Aggiungi al carrello</button>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ProductWidget",
    props: ['productId'],
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
                    // assign this.categories
                    this.details = response.data.data;
                })
                .catch(function (error) {
                    // catch errors
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
