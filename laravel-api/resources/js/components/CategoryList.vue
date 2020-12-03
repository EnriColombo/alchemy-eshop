<template>
    <div>
        <h4 class="my-4">Categorie</h4>
        <div class="list-group">
            <div class="list-group-item" v-for="category in categories" :key="category.id">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" :value="category.id" id="category.id" v-model="checkedCategories" @change="check($event)">
                    <label class="form-check-label" for="category.id">
                        {{ category.name }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CategoryList",

    data: function () {
        return {
            categories: [],
            checkedCategories: []
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
        },
        check: function(e) {
            // console.log(JSON.stringify(this.checkedCategories));
            // Refresh ProductList
            this.$root.$emit('filtraCategorie', this.checkedCategories);
        }
    }
}
</script>

<style scoped>

</style>
