<template>
    <div>
        <h4 class="my-4">Categorie</h4>
        <div class="list-group">
            <a class="list-group-item" v-for="category in categories" :key="category.id" href="#">
                {{ category.name }}
            </a>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  name: "CategoryList",

  data: function () {
    return {
      categories: []
    }
  },

  mounted() {
    this.loadCategories();
  },

  methods: {
    loadCategories: function () {
      // load API
      axios.get('/api/categories')
          .then((response) => {
            // assign this.categories
            this.categories = response.data.data;
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
