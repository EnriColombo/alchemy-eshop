<template>
    <div class="container">
        <div class="col-md-12 mb-4" v-if="!error">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Il tuo carrello</span>
                <span class="badge badge-secondary badge-pill">{{ userCart.items_no }}</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed" v-for="item in userCart.items" :key="item.id">
                    <img src="http://placehold.it/120x80" alt="">
                    <div class="m-3">
                        <h6 class="my-0">{{ item.product.name }}</h6>
                        <small class="text-muted">{{ item.product.description }}</small>
                    </div>
                    <div>
                        <h6 class="my-0">Q.ty</h6>
                        <input type="number" class="form-control" required value="1">
                    </div>
                    <span class="text-muted ml-3">€{{ item.product.price }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (EUR)</span>
                    <strong>€{{ userCart.total }}</strong>
                </li>
            </ul>

            <div class="card p-2">
                <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" @click="goHome">Continua con gli acquisti</button>
                        <button type="button" class="btn btn-success" @click="goToCheckout">Checkout</button>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-4" v-if="error">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Il tuo carrello è vuoto</span>
            </h4>
            <div class="card p-2">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" @click="goHome">Vai agli acquisti</button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Cart",
    data: function () {
        return {
            userCart: [],
            error: false
        }
    },
    mounted() {
        axios.get('/api/cart')
            .then(response => {
                this.userCart = response.data.data;
            })
            .catch(error => {
                this.error = true;
                console.log(error);
            });
    },
    methods: {
        goToCheckout()
        {
            this.$router.push('/checkout')
        },
        goHome()
        {
            this.$router.push('/')
        }
        // TODO funzione elimina prodotti
    }
}
</script>

<style scoped>

</style>
