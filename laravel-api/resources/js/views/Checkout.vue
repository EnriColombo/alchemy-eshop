<template>
    <div class="container">
        <div class="row">
            <CheckoutForm></CheckoutForm>
            <CartWidget></CartWidget>
        </div>
    </div>
</template>

<script>
import CartWidget from "../components/CartWidget";
import CheckoutForm from "../components/CheckoutForm";

export default {
name: "Checkout",
    props: ['id'],
    components: {
        CheckoutForm,
        CartWidget
    }
}
</script>

<style scoped>

</style>
