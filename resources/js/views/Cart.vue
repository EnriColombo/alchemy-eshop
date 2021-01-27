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
                    <div class="col m-3">
                        <h6 class="my-0">{{ item.product.name }} (€{{ item.product.price }})</h6>
                        <small class="text-muted">{{ item.product.description }}</small>
                    </div>
                    <div class="col-sm-1">
                        <h6 class="mb-2">Q.ta'</h6>
                        <input type="number" class="form-control" required v-model.number="item.quantity" @change="updateCartTotal">
                    </div>
                    <div class="d-flex align-items-end flex-column ml-3">
                        <div class="text-muted">€{{ getItemTotal(item).toFixed(2) }}</div>
                        <div class="mt-auto">
                            <button class="btn btn-danger btn-sm" @click="deleteItem(item)">Elimina</button>
                        </div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Totale (EUR)</span>
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
            userCart: {},
            error: false
        }
    },
    mounted() {
        this.loadItems();
    },
    methods: {
        loadItems() {
            axios.get('/api/cart')
                .then(response => {
                    this.userCart = response.data.data;
                })
                .catch(error => {
                    this.error = true;
                    console.log(error);
                });
        },
        deleteItem(item) {
            this.$swal({
                icon: 'question',
                title: 'Vuoi rimuovere il prodotto dal carrello?',
                showCancelButton: true,
                confirmButtonText: `Rimuovi`,
                confirmButtonColor: '#d33',
                cancelButtonText: 'Annulla'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/cart/' + item.id, item).then(response => {
                        this.userCart.items.splice(this.userCart.items.indexOf(item), 1);
                        this.updateCartTotal();
                    }).catch(error => {
                        console.log(error);
                    });
                }
            })
        },
        updateCartTotal()
        {
            this.userCart.total = 0;
            let total = 0;
            this.userCart.items.forEach(item => {
                total += this.getItemTotal(item);
            });
            this.userCart.total = new Intl.NumberFormat().format(total);
        },
        getItemTotal(item)
        {
            return item.quantity * item.product.price;
        },
        goToCheckout()
        {
            this.dbCartUpdate();
            this.$router.push('/checkout');
        },
        goHome()
        {
            this.dbCartUpdate();
            this.$router.push('/');
        },
        dbCartUpdate()
        {
            // Aggiornamento carrello sul db
            axios.put('/api/cart/' + this.userCart.id, this.userCart).then(response => {})
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
