<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Categorie prodotto</h2>
        <router-link to="/dashboard/categories/new" class="btn btn-primary mb-2">Nuova categoria</router-link>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th># Prodotti</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>{{ category.id }}</td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.products_no }}</td>
                    <td>
                        <div class="btn-group">
                            <router-link :to="{name: 'CategoryEdit', params: {category: category}}" class="btn btn-primary btn-sm">
                                Modifica
                            </router-link>
                            <button type="button" class="btn btn-danger btn-sm float-right" @click="deleteCategory(category)" :disabled="category.products_no != 0">Rimuovi</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>

<script>
import axios from "axios";

export default {
    name: "ManageCategories",
    data: function () {
        return {
            categories: [],
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
                    this.categories = response.data.data;
                })
                .catch(function (error) {
                    // catch errors
                    console.log(error);
                });
        },
        deleteCategory(category) {
            if (confirm("Confermi l'eliminazione della categoria?")) {
                axios.delete('/api/categories/' + category.id, category).then(response => {
                    this.loadCategories();
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>

<style scoped>

</style>
