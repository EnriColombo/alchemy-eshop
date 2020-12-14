<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <CategoryList></CategoryList>
            </div>
            <div class="col-lg-9">
                <ProductList></ProductList>
            </div>
        </div>
    </div>
</template>

<script>
import CategoryList from '../components/CategoryList';
import ProductList from "../components/ProductList";

export default {
    name: 'Home',
    components: {
        CategoryList,
        ProductList
    }
}
</script>

<style scoped>

</style>
