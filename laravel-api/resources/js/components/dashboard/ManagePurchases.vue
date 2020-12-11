<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Ordini di acquisto</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Prodotti acquistati</th>
                    <th>Totale</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="purchase in purchases.data" :key="purchase.id">
                    <td>{{ purchase.id }}</td>
                    <td>{{ purchase.date }}</td>
                    <td>{{ purchase.cart.customer.firstname }} {{ purchase.cart.customer.lastname }}</td>
                    <td>{{ purchase.cart.items_no }}</td>
                    <td>€ {{ purchase.total }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"
                                @click="notifyClick('PurchaseDetails', {purchase: purchase})">
                            Dettagli
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            <pagination :data="purchases" @pagination-change-page="loadPurchases" align="center"></pagination>
        </div>
    </main>
</template>

<script>
import axios from "axios";

export default {
    name: "ManagePurchases",
    data: function () {
        return {
            purchases: {},
        }
    },
    mounted() {
        this.loadPurchases();
    },
    methods: {
        notifyClick(componentName, param) {
            this.$emit('buttonClick', componentName, param)
        },
        loadPurchases: function (page = 1) {
            // load API
            axios.get('/api/purchases?page=' + page)
                .then((response) => {
                    this.purchases = response.data;
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
