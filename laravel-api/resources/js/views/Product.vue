<template>
    <div class="container">
        <div class="row">
            <ProductDetails :productId="id"></ProductDetails>
            <CartWidget></CartWidget>
        </div>
    </div>
</template>

<script>
import ProductDetails from "../components/ProductDetails";
import CartWidget from "../components/CartWidget";

export default {
    name: "Product",
    props: ['id'],
    components: {
        ProductDetails,
        CartWidget
    }
}
</script>

<style scoped>

</style>
