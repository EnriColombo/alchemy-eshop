<template>
    <div class="mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Il tuo carrello</span>
            <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Product name</h6>
                    <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Second product</h6>
                    <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Third item</h6>
                    <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                    <h6 class="my-0">Promo code</h6>
                    <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (EUR)</span>
                <strong>€20</strong>
            </li>
        </ul>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary" @click="goToCart" v-show="$route.name != 'checkout'">Vai al carrello</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "CartWidget",
    methods: {
        goToCart() {
            this.$router.push('/cart')
        }
    }
}
</script>

<style scoped>

</style>
