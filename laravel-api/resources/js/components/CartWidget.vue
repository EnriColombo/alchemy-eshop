<template>
    <div class="mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Il tuo carrello</span>
            <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed" v-for="item in userCart.items" :key="item.id">
                <div>
                    <h6 class="my-0">{{ item.product.name }}</h6>
                    <small class="text-muted">{{ item.product.description.substr(0, 80) }} ...</small>
                </div>
                <span class="text-muted">€{{ item.product.price }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (EUR)</span>
                <strong>€20</strong>
            </li>
        </ul>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary" @click="goToCart" v-show="$route.name != 'checkout'">Vai al carrello</button>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CartWidget",
    data: function () {
        return {
            userCart: []
        }
    },
    mounted() {
        axios.get('/api/cart')
            .then((response) => {
                this.userCart = response.data.data;
                console.log(JSON.stringify(this.userCart));
            })
            .catch(function (error) {
                console.log(error);
            });
    },
    methods: {
        goToCart() {
            this.$router.push('/cart')
        }
    }
}
</script>

<style scoped>

</style>
