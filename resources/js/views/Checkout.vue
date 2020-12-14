<template>
    <div class="container">
        <div class="row">
            <CheckoutForm></CheckoutForm>
            <CartWidget class="col-md-4 order-md-2"></CartWidget>
        </div>
    </div>
</template>

<script>
import CartWidget from "../components/CartWidget";
import CheckoutForm from "../components/CheckoutForm";

export default {
name: "Checkout",
    components: {
        CheckoutForm,
        CartWidget
    }
}
</script>

<style scoped>

</style>
