<template>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Indirizzo di fatturazione</h4>
        <form novalidate @submit.prevent="purchase">
            <div class="row">
                <div class="col-md-6 mb-3 form-group">
                    <label for="firstName">Nome</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value=""
                           v-model.trim="customerData.firstname">
                    <div class="text-danger"
                         v-if="!$v.customerData.firstname.required && $v.customerData.firstname.$dirty">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3 form-group">
                    <label for="lastName">Cognome</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value=""
                           v-model.trim="customerData.lastname">
                    <div class="text-danger"
                         v-if="!$v.customerData.lastname.required && $v.customerData.lastname.$dirty">
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
                    <input type="text" class="form-control" id="username" placeholder="Username"
                           v-model.trim="customerData.username">
                    <div class="text-danger" style="width: 100%;"
                         v-if="!$v.customerData.username.required && $v.customerData.username.$dirty">
                        Your username is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com"
                       v-model.trim="customerData.email">
                <div class="text-danger" style="width: 100%;"
                     v-if="(!$v.customerData.email.required || !$v.customerData.email.email) && $v.customerData.email.$dirty">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="mb-3">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                       v-model="customerData.address">
                <div class="text-danger" v-if="!$v.customerData.address.required && $v.customerData.address.$dirty">
                    Please enter your address.
                </div>
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="same-address" checked v-model="sameAddrChecked">
                <label class="custom-control-label" for="same-address">L'indirizzo di spedizione è lo stesso
                    dell'indirizzo di fatturazione</label>
            </div>
            <div class="mb-3" v-show="!sameAddrChecked">
                <label for="shipping-address">Indirizzo di spedizione</label>
                <input type="text" class="form-control" id="shipping-address" placeholder="1234 Main St"
                       v-model="customerData.shipping_address">
                <div class="text-danger"
                     v-if="!$v.customerData.shipping_address.required && !sameAddrChecked && $v.customerData.shipping_address.$dirty">
                    Please enter your shipping address.
                </div>
            </div>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="city">Città</label>
                    <select class="custom-select d-block w-100" id="city" v-model="customerData.city">
                        <option value="">Choose...</option>
                        <option>Milano</option>
                    </select>
                    <div class="text-danger" v-if="!$v.customerData.city.required && $v.customerData.city.$dirty">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">CAP</label>
                    <input type="text" class="form-control" id="zip" placeholder="" v-model="customerData.zip">
                    <div class="text-danger" v-if="!$v.customerData.zip.required && $v.customerData.zip.$dirty">
                        Zip code required.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="country">Paese</label>
                    <select class="custom-select d-block w-100" id="country" v-model="customerData.country">
                        <option value="">Choose...</option>
                        <option>Italia</option>
                    </select>
                    <div class="text-danger" v-if="!$v.customerData.country.required && $v.customerData.country.$dirty">
                        Please select a valid country.
                    </div>
                </div>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Pagamento</h4>

            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" value="credit" name="paymentMethod" type="radio" class="custom-control-input"
                           checked v-model="paymentData.method">
                    <label class="custom-control-label" for="credit">Carta di credito</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" value="debit" name="paymentMethod" type="radio" class="custom-control-input"
                           v-model="paymentData.method">
                    <label class="custom-control-label" for="debit">Carta di debito</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="paypal" value="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                           v-model="paymentData.method">
                    <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
                <div class="text-danger" v-if="!$v.paymentData.method.required && $v.paymentData.method.$dirty">
                    Payment method is required
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Intestazione carta</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" v-model="paymentData.cardname">
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="text-danger" v-if="!$v.paymentData.cardname.required && $v.paymentData.cardname.$dirty">
                        Name on card is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Numero carta</label>
                    <input type="number" class="form-control" id="cc-number" placeholder="" required
                           v-model="paymentData.cardnumber">
                    <div class="text-danger"
                         v-if="!$v.paymentData.cardnumber.required && $v.paymentData.cardnumber.$dirty">
                        Credit card number is required
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Scadenza</label>
                    <input type="date" class="form-control" id="cc-expiration" placeholder="" required
                           v-model="paymentData.cardexpiration">
                    <div class="text-danger"
                         v-if="!$v.paymentData.cardexpiration.required && $v.paymentData.cardexpiration.$dirty">
                        Expiration date required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="number" class="form-control" id="cc-cvv" placeholder="" required
                           v-model="paymentData.cardcvv">
                    <div class="text-danger" v-if="!$v.paymentData.cardcvv.required && $v.paymentData.cardcvv.$dirty">
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
import {required, email, requiredIf} from 'vuelidate/lib/validators'

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
    validations: {
        customerData: {
            firstname: {
                required
            },
            lastname: {
                required
            },
            username: {
                required
            },
            email: {
                required,
                email
            },
            address: {
                required
            },
            shipping_address: {
                required: requiredIf(function () {
                    return !this.sameAddrChecked
                })
            },
            city: {
                required
            },
            zip: {
                required
            },
            country: {
                required
            }
        },
        paymentData: {
            method: {
                required
            },
            cardname: {
                required
            },
            cardnumber: {
                required
            },
            cardexpiration: {
                required
            },
            cardcvv: {
                required
            }
        }
    },
    mounted() {
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
        purchase: function () {
            this.$v.$touch();

            if (!this.$v.customerData.$invalid && !this.$v.paymentData.$invalid) {
                this.purchaseData.customer = this.customerData;
                this.purchaseData.payment = this.paymentData;
                console.log(JSON.stringify(this.purchaseData));
                axios.post('/api/purchases', this.purchaseData)
                    .then(response => {
                        this.$swal(
                            'Complimenti!',
                            "Grazie per l'acquisto",
                            'success'
                        ).then(() => {
                                this.$router.push('/');
                            }
                        );
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
}
</script>

<style scoped>

</style>
