<template>
    <div>
        <h4 class="my-4">Catalogo prodotti</h4>
        <div class="row mt-4" :class="{'loading': loading}">
            <div class="col-lg-4 col-md-6 mb-4" v-for="product in products" :key="product.id">
                <div class="card h-100">
                    <a href="#">
                        <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{ product.name }}</a>
                        </h4>
                        <h5>€ {{ product.price }}</h5>
                        <p class="card-text">{{ product.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "ProductList",

  data: function () {
    return {
      products: [],
      loading: true
    }
  },

  mounted() {
    this.loadProducts();
  },

  methods: {
    loadProducts: function () {
      // load API
      axios.get('/api/products')
          .then((response) => {
            // assign this.products
            this.products = response.data.data;
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
