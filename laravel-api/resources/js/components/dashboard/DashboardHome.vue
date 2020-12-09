<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h1 class="h2">Ordini</h1>
        <line-chart :data="purchasesData"></line-chart>
    </main>
</template>

<script>
export default {
    name: "DashboardHome",
    data() {
        return {
            purchasesData: {
                '2020-11-13': 3,
                '2020-11-14': 5,
                '2020-11-15': 4,
                '2020-11-16': 7,
                '2020-11-17': 9,
            }
        }
    }
}
</script>

<style scoped>

</style>
