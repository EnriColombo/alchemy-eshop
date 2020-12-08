<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <form @submit.prevent="submit">
            <div class="alert alert-success" v-show="success">Prodotto modificato con successo!</div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" v-model="fields.name" required autofocus>
                    <div class="alert alert-danger" v-if="errors && errors.name">
                        {{ errors.name[0] }}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="product_category_id" class="col-md-2 col-form-label text-md-right">Categoria</label>
                <div class="col-md-6">
                    <select class="form-control" id="product_category_id" name="product_category_id" v-model="fields.product_category_id">
                        <option v-for="category in categories"
                                :value="category.id">{{ category.name }}
                        </option>
                    </select>
                    <div class="alert alert-danger" v-if="errors && errors.product_category_id">
                        {{ errors.product_category_id[0] }}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-2 col-form-label text-md-right">Descrizione</label>
                <div class="col-md-6">
                    <textarea id="description" rows="5" class="form-control" name="description" v-model="fields.description" required></textarea>
                    <div class="alert alert-danger" v-if="errors && errors.description">
                        {{ errors.description[0] }}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-md-2 col-form-label text-md-right">Prezzo (€)</label>
                <div class="col-md-6">
                    <input id="price" type="number" min="0" step="0.01" class="form-control" name="price" v-model="fields.price" required autofocus>
                    <div class="alert alert-danger" v-if="errors && errors.price">
                        {{ errors.price[0] }}
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        Modifica prodotto
                    </button>
                </div>
            </div>
        </form>
    </main>
</template>

<script>
export default {
    name: "ProductEdit",
    props: ['product'],
    data() {
        return {
            categories: null,
            fields: {},
            success: false,
            errors: {}
        }
    },
    mounted() {
        axios.get('/api/categories').then(response => {
            this.categories = response.data.data;
        });
        this.fields = this.product;
    },
    methods: {
        submit() {
            axios.put('/api/products/' + this.fields.id, this.fields).then(response => {
                this.fields = {};
                this.success = true;
                this.errors = {};
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
                console.log('Error');
            });
        }
    }
}
</script>

<style scoped>

</style>
