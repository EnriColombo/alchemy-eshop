<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <form @submit.prevent="submit">
            <div class="alert alert-success" v-show="success">Categoria creata con successo!</div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" v-model="fields.name" required
                           autofocus>
                    <div class="alert alert-danger" v-if="errors && errors.name">
                        {{ errors.name[0] }}
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        Crea categoria
                    </button>
                </div>
            </div>
        </form>
    </main>
</template>

<script>
export default {
    name: "CategoryCreate",
    data() {
        return {
            fields: {},
            success: false,
            errors: {}
        }
    },
    methods: {
        submit() {
            axios.post('/api/categories', this.fields).then(response => {
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
