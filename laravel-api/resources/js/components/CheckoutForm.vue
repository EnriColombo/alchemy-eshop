<template>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Indirizzo di fatturazione</h4>
        <form class="needs-validation" novalidate @submit.prevent="purchase">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Nome</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required v-model="customerData.firstname">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Cognome</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required v-model="customerData.lastname">
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" id="username" placeholder="Username" required :value="customerData.username">
                    <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" :value="customerData.email">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="mb-3">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required v-model="customerData.address">
                <div class="invalid-feedback">
                    Please enter your address.
                </div>
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="same-address" checked v-model="sameAddrChecked">
                <label class="custom-control-label" for="same-address">L'indirizzo di spedizione è lo stesso dell'indirizzo di fatturazione</label>
            </div>
            <div class="mb-3" v-show="!sameAddrChecked">
                <label for="shipping-address">Indirizzo di spedizione</label>
                <input type="text" class="form-control" id="shipping-address" placeholder="1234 Main St" required v-model="customerData.shipping_address">
                <div class="invalid-feedback">
                    Please enter your address.
                </div>
            </div>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="city">Città</label>
                    <select class="custom-select d-block w-100" id="city" required v-model="customerData.city">
                        <option value="">Choose...</option>
                        <option>Milano</option>
                    </select>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">CAP</label>
                    <input type="text" class="form-control" id="zip" placeholder="" required v-model="customerData.zip">
                    <div class="invalid-feedback">
                        Zip code required.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="country">Paese</label>
                    <select class="custom-select d-block w-100" id="country" required v-model="customerData.country">
                        <option value="">Choose...</option>
                        <option>Italia</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid country.
                    </div>
                </div>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Pagamento</h4>

            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" value="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required v-model="paymentData.method">
                    <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" value="debit" name="paymentMethod" type="radio" class="custom-control-input" required v-model="paymentData.method">
                    <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="paypal" value="paypal" name="paymentMethod" type="radio" class="custom-control-input" required v-model="paymentData.method">
                    <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required v-model="paymentData.cardname">
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                        Name on card is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Credit card number</label>
                    <input type="number" class="form-control" id="cc-number" placeholder="" required v-model="paymentData.cardnumber">
                    <div class="invalid-feedback">
                        Credit card number is required
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input type="date" class="form-control" id="cc-expiration" placeholder="" required v-model="paymentData.cardexpiration">
                    <div class="invalid-feedback">
                        Expiration date required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="number" class="form-control" id="cc-cvv" placeholder="" required v-model="paymentData.cardcvv">
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">Acquista</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CheckoutForm",
    data: function () {
        return {
            customerData: {},
            paymentData: {},
            purchaseData: {},
            sameAddrChecked: true
        }
    },
    mounted() {
        // TODO da rifattorizzare con Vue
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        this.preloadCustomerData();
    },
    methods: {
        preloadCustomerData() {
            axios.get('/api/customer')
                .then(response => {
                    this.customerData = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        purchase: function ()
        {
            this.purchaseData.customer = this.customerData;
            this.purchaseData.payment = this.paymentData;
            console.log(JSON.stringify(this.purchaseData));
            axios.post('/api/purchase', this.purchaseData)
                .then(function (response) {
                    console.log(response);
                    this.$router.push('/'); // TODO dare un avviso di successo
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
