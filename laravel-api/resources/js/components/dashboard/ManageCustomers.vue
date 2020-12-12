<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Clienti</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Categoria</th>
                    <th>Nome / Cognome</th>
                    <th>Citta'</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="customer in customers.data" :key="customer.id">
                    <td>{{ customer.id }}</td>
                    <td>{{ customer.username }}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.category.name }}</td>
                    <td class="text-nowrap">{{ customer.firstname }} {{ customer.lastname }}</td>
                    <td class="text-nowrap">{{ customer.city }}</td>
                    <td>
                        <router-link :to="{name: 'CustomerDetails', params: {customer: customer}}" class="btn btn-primary btn-sm">
                            Dettagli
                        </router-link>
                    </td>
                </tr>
                </tbody>
            </table>
            <pagination :data="customers" @pagination-change-page="loadCustomers" align="center"></pagination>
        </div>
    </main>
</template>

<script>
import axios from "axios";

export default {
    name: "ManageCustomers",
    data: function () {
        return {
            customers: {},
        }
    },
    mounted() {
        this.loadCustomers();
    },
    methods: {
        loadCustomers: function (page = 1) {
            // load API
            axios.get('/api/customers?page=' + page)
                .then((response) => {
                    this.customers = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
