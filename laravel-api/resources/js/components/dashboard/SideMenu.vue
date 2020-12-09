<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <button class="btn btn-link" @click="notifyClick('DashboardHome')">
                        <span data-feather="home"></span>
                        Dashboard
                    </button>
                </li>
                <li class="nav-item mb-2">
                    <button class="btn btn-link" @click="notifyClick('ManageProducts')">
                        <span data-feather="shopping-cart"></span>
                        Prodotti
                    </button>
                </li>
                <li class="nav-item mb-2">
                    <button class="btn btn-link" @click="notifyClick('ManageCategories')">
                        <span data-feather="file"></span>
                        Categorie
                    </button>
                </li>
                <li class="nav-item mb-2">
                    <button class="btn btn-link" @click="notifyClick('ManageCustomers')">
                        <span data-feather="users"></span>
                        Clienti
                    </button>
                </li>
                <li class="nav-item mb-2">
                    <button class="btn btn-link" @click="notifyClick('ManagePurchases')">
                        <span data-feather="file-text"></span>
                        Ordini
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "SideMenu",
    mounted() {
        this.notifyClick('DashboardHome');
    },
    methods: {
        notifyClick(componentName) {
            this.$emit('menuItemClick', componentName)
        }
    }
}
</script>

<style scoped>

</style>
