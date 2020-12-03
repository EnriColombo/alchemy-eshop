<template>
    <div>
        <h4 class="my-4">Catalogo prodotti</h4>
        <div class="row mt-4" :class="{'loading': loading}">
            <div class="col-lg-4 col-md-6 mb-4" v-for="product in products.data" :key="product.id">
                <div class="card h-100">
                    <a :href="'products/' + product.id">
                        <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a :href="'products/' + product.id">{{ product.name }}</a>
                            <span class="text-muted float-right small">{{ product.category.name }}</span>
                        </h4>
                        <h5>€ {{ product.price }}</h5>
                        <p class="card-text">{{ product.description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <pagination :data="products" @pagination-change-page="loadProducts" align="center"></pagination>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ProductList",

    data: function () {
        return {
            products: {},
            loading: true
        }
    },

    mounted() {
        // Listener per refresh su selezione categorie in CategoryList
        this.$root.$on('filtraCategorie', (categoryArray) => {
            this.loadProducts(1, categoryArray);
        });
        this.loadProducts();
    },

    methods: {
        loadProducts: function (page = 1, categoryFilter) {
            // load API
            axios.get('/api/products?page=' + page, {
                params: {
                    categories: categoryFilter
                }
            })
                .then((response) => {
                    // console.log(JSON.stringify(response));
                    this.products = response.data;
                    this.loading = false;
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
