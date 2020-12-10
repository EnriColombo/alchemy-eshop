<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h3 class="mb-4">Dettagli cliente</h3>
        <form>
            <div class="form-group row">
                <label for="username" class="col-md-2 col-form-label text-md-right">Username</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" v-model="customer.username" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" v-model="customer.email" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_category_id" class="col-md-2 col-form-label text-md-right">Categoria</label>
                <div class="col-md-6">
                    <input class="form-control" id="customer_category_id" name="customer_category_id" v-model="customer.category.name" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="firstname" class="col-md-2 col-form-label text-md-right">Nome</label>
                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control" name="firstname" v-model="customer.firstname" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-md-2 col-form-label text-md-right">Cognome</label>
                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control" name="lastname" v-model="customer.lastname" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label text-md-right">Indirizzo</label>
                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address" v-model="customer.address" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="zip" class="col-md-2 col-form-label text-md-right">Codice postale</label>
                <div class="col-md-6">
                    <input id="zip" type="text" class="form-control" name="zip" v-model="customer.zip" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-md-2 col-form-label text-md-right">Citta'</label>
                <div class="col-md-6">
                    <input id="city" type="text" class="form-control" name="city" v-model="customer.city" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-md-2 col-form-label text-md-right">Stato</label>
                <div class="col-md-6">
                    <input id="country" type="text" class="form-control" name="country" v-model="customer.country" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="shipping_address" class="col-md-2 col-form-label text-md-right">Indirizzo di spedizione</label>
                <div class="col-md-6">
                    <input id="shipping_address" type="text" class="form-control" name="shipping_address" v-model="customer.shipping_address" disabled>
                </div>
            </div>
        </form>
    </main>
</template>

<script>
export default {
    name: "CustomerDetails",
    props: ['customer']
}
</script>

<style scoped>

</style>
