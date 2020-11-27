<template>
    <div class="container">
        <div class="row">
            <ProductDetails :productId="id"></ProductDetails>
            <div class="container col-md-4 order-md-2">
            <CartWidget v-show="isAuthenticated"></CartWidget>
            <ProductWidget :productId="id"></ProductWidget>
            </div>
        </div>
    </div>
</template>

<script>
import ProductDetails from "../components/ProductDetails";
import CartWidget from "../components/CartWidget";
import ProductWidget from "../components/ProductWidget";

export default {
    name: "Product",
    props: ['id'],
    data: function () {
        return {
            isAuthenticated: false
        }
    },
    components: {
        ProductDetails,
        CartWidget,
        ProductWidget
    },
    mounted() {
        this.checkAuthentication();
    },
    methods: {
        checkAuthentication: function () {
            axios.get('/api/athenticated').then(()=>{
                this.isAuthenticated = true;
            }).catch(()=>{
                this.isAuthenticated = false;
            });
        }
    }
}
</script>

<style scoped>

</style>
