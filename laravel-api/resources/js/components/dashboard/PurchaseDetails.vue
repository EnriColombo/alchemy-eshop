<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="col-md-8 order-md-1">
            <h3 class="mb-3">Dettagli acquisto</h3>
            <form>
                <div class="row">
                    <div class="col-md-4 mb-3 form-group">
                        <label for="date">Data acquisto</label>
                        <input type="text" class="form-control" id="date"
                               v-model.trim="purchase.date" disabled>
                    </div>
                    <div class="col-md-3 mb-3 form-group">
                        <label for="items_no">Prodotti acquistati</label>
                        <input type="number" class="form-control" id="items_no"
                               v-model.trim="purchase.cart.items_no" disabled>
                    </div>
                    <div class="col-md-5 mb-3 form-group">
                        <label for="total">Totale (€)</label>
                        <input type="number" class="form-control" id="total"
                               v-model.trim="purchase.total" disabled>
                    </div>
                </div>

                <hr class="mb-4">
                <h4 class="mb-3">Dati cliente</h4>
                <div class="row">
                    <div class="col-md-6 mb-3 form-group">
                        <label for="firstName">Nome</label>
                        <input type="text" class="form-control" id="firstName"
                               v-model.trim="purchase.cart.customer.firstname" disabled>
                    </div>
                    <div class="col-md-6 mb-3 form-group">
                        <label for="lastName">Cognome</label>
                        <input type="text" class="form-control" id="lastName"
                               v-model.trim="purchase.cart.customer.lastname" disabled>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="username"
                               v-model.trim="purchase.cart.customer.username" disabled>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"
                           v-model.trim="purchase.cart.customer.email" disabled>
                </div>
                <div class="mb-3">
                    <label for="address">Indirizzo</label>
                    <input type="text" class="form-control" id="address"
                           v-model="purchase.cart.customer.address" disabled>
                </div>
                <div class="mb-3">
                    <label for="shipping-address">Indirizzo di spedizione</label>
                    <input type="text" class="form-control" id="shipping-address"
                           v-model="purchase.cart.customer.shipping_address" disabled>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="city">Città</label>
                        <input type="text" class="form-control" id="city" v-model="purchase.cart.customer.city"
                               disabled>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">CAP</label>
                        <input type="text" class="form-control" id="zip" v-model="purchase.cart.customer.zip" disabled>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="country">Paese</label>
                        <input type="text" class="form-control" id="country" v-model="purchase.cart.customer.country"
                               disabled>
                    </div>
                </div>

                <hr class="mb-4">
                <h4 class="mb-3">Pagamento</h4>
                <div class="mb-3">
                    <label for="paymentMethod">Metodo</label>
                    <input type="text" class="form-control" id="paymentMethod"
                           v-model="purchase.method" disabled>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Intestazione carta</label>
                        <input type="text" class="form-control" id="cc-name" v-model="purchase.cardname" disabled>
                        <small class="text-muted">Full name as displayed on card</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Numero carta</label>
                        <input type="number" class="form-control" id="cc-number"
                               v-model="purchase.cardnumber" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Scadenza</label>
                        <input type="text" class="form-control" id="cc-expiration"
                               v-model="purchase.cardexpiration" disabled>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="number" class="form-control" id="cc-cvv" placeholder="" required
                               v-model="purchase.cardcvv" disabled>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="form-group row mb-0">
                    <div class="col-md-8">
                        <button type="button" class="btn btn-primary"
                                @click="notifyClick('ManagePurchases')">
                            Indietro
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</template>

<script>
export default {
    name: "PurchaseDetails",
    props: ['purchase'],
    methods: {
        notifyClick(componentName, param) {
            this.$emit('buttonClick', componentName, param)
        }
    }
}
</script>

<style scoped>

</style>
