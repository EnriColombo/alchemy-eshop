<template>
    <div class="container-fluid">
        <div class="row">
            <side-menu v-on:menuItemClick="loadComponent"></side-menu>
            <component :is="dynamicComponent" v-on:menuItemClick="loadComponent"/>
        </div>
    </div>
</template>

<script>
import SideMenu from "../components/dashboard/SideMenu";
// Dynamic load only on request
const DashboardHome = () => import("../components/dashboard/DashboardHome");
const ManageProducts = () => import("../components/dashboard/ManageProducts");
const ProductCreate = () => import("../components/dashboard/ProductCreate");
// ...

export default {
    name: "Dashboard",
    data: function () {
        return {
            componentsMap: {
                'DashboardHome': DashboardHome,
                'ManageProducts': ManageProducts,
                'ProductCreate': ProductCreate,
            },
            componentToLoad: null
        }
    },
    components: {
        SideMenu
    },
    computed: {
      dynamicComponent() {
        return this.componentToLoad;
      }
    },
    mounted() {
        feather.replace();
    },
    methods: {
        loadComponent(componentName) {
            this.componentToLoad = this.componentsMap[componentName];
        }
    }
}

</script>

<style scoped>

</style>
