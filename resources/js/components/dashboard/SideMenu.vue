<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <router-link to="/dashboard" class="btn btn-link">
                        <span data-feather="home"></span>
                        Dashboard
                    </router-link>
                </li>
                <li class="nav-item mb-2">
                    <router-link to="/dashboard/products" class="btn btn-link">
                        <span data-feather="shopping-cart"></span>
                        Prodotti
                    </router-link>
                </li>
                <li class="nav-item mb-2">
                    <router-link to="/dashboard/categories" class="btn btn-link">
                        <span data-feather="file"></span>
                        Categorie
                    </router-link>
                </li>
                <li class="nav-item mb-2">
                    <router-link to="/dashboard/customers" class="btn btn-link">
                        <span data-feather="users"></span>
                        Clienti
                    </router-link>
                </li>
                <li class="nav-item mb-2">
                    <router-link to="/dashboard/purchases" class="btn btn-link">
                        <span data-feather="file-text"></span>
                        Ordini
                    </router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "SideMenu",
    mounted() {
        // Icons
        feather.replace();
    }
}
</script>

<style scoped>

</style>
