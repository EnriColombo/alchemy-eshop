<template>
    <div class="col-md-8 order-md-1">
        <div class="card">
            <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                        <h2 class="card-title">{{ details.name }}</h2>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-lg btn-block btn-success" @click="addToCart">Aggiungi al carrello</button>
                    </div>
                </div>
                <h4>€{{ details.price }}</h4>
                <p class="card-text">{{ details.description }}</p>
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                4.0 stars
            </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
            <div class="card-header">
                Product Reviews
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <a href="#" class="btn btn-secondary">Leave a Review</a>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-lg-9 -->
</template>

<script>
import axios from "axios";

export default {
    name: "ProductDetails",
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
        },
        addToCart: function ()
        {
            axios.post('/api/cart', this.details)
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            // Refresh CartWidget
            this.$root.$emit('Prodotto aggiunto al carrello');
        }
    }
}
</script>

<style scoped>

</style>
