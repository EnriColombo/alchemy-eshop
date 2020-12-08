<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Prodotti</h2>
        <button class="btn btn-primary mb-2" @click="notifyClick('ProductCreate')">Nuovo prodotto</button>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Categoria</th>
                    <th>Prezzo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="product in products.data" :key="product.id">
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.category.name }}</td>
                    <td class="text-nowrap">€ {{ product.price }}</td>
                    <td>
                        <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm" @click="notifyClick('ProductEdit', {product: product})">Modifica</button>
                        <button type="button" class="btn btn-danger btn-sm float-right" @click="deleteProduct(product)">Rimuovi</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <pagination :data="products" @pagination-change-page="loadProducts" align="center"></pagination>
        </div>
    </main>
</template>

<script>
import axios from "axios";

export default {
    name: "ManageProducts",
    data: function () {
      return {
          products: {},
      }
    },
    mounted() {
        this.loadProducts();
    },
    methods: {
        notifyClick(componentName, param) {
            this.$emit('buttonClick', componentName, param)
        },
        loadProducts: function (page = 1) {
            // load API
            axios.get('/api/products?page=' + page)
                .then((response) => {
                    this.products = response.data;
                })
                .catch(function (error) {
                    // catch errors
                    console.log(error);
                });
        },
        deleteProduct(product) {
            axios.delete('/api/products/' + product.id, product).then(response => {
                this.loadProducts(this.products.meta.current_page);
            }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>

</style>
