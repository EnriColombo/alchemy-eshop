<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Ordini</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>
        <line-chart :data="purchasesData"></line-chart>
    </main>
</template>

<script>
import axios from "axios";

export default {
    name: "DashboardHome",
    data() {
        return {
            purchases: [],
            purchasesData: [[]],
            // purchasesData: [
            //     ['2020-11-13', 3]
            //     ['2020-11-14', 5]
            //     ['2020-11-15', 4]
            //     ['2020-11-16', 7]
            //     ['2020-11-17', 9]
            // ]
        }
    },
    mounted() {
        this.loadPurchases();
    },
    methods: {
        loadPurchases: function () {
            // load API
            axios.get('/api/chartdata')
                .then((response) => {
                    this.purchases = response.data;
                    this.generateChartData();
                })
                .catch(function (error) {
                    // catch errors
                    console.log(error);
                });
        },
        generateChartData: function () {
            let x = new Array(this.purchases.length);
            for (let i = 0; i < x.length; i++) {
                x[i] = [
                        new Date(this.purchases[i].date).toISOString().slice(0,10),
                        this.purchases[i].purchase_count
                       ];
            }
            this.purchasesData = x;
        }
    }
}
</script>

<style scoped>

</style>
