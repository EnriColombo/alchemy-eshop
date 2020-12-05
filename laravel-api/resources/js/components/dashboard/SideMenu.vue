<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <button class="btn btn-link" href="" @click="notifyClick('ManageProducts')">
                        <span data-feather="shopping-cart"></span>
                        Prodotti
                    </button>
                </li>
                <li class="nav-item mb-2">
                    <button class="btn btn-link" href="">
                        <span data-feather="file"></span>
                        Categorie
                    </button>
                </li>
                <li class="nav-item mb-2">
                    <button class="btn btn-link" href="#">
                        <span data-feather="users"></span>
                        Clienti
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "SideMenu",
    methods: {
        notifyClick(componentName) {
            this.$emit('menuItemClick', componentName)
        }
    }
}
</script>

<style scoped>

</style>
