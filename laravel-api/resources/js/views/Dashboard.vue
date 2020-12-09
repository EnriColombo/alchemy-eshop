<template>
    <div class="container-fluid">
        <div class="row">
            <side-menu v-on:menuItemClick="loadComponent"></side-menu>
            <component :is="dynamicComponent" v-bind="componentParam" v-on:buttonClick="loadComponent"/>
        </div>
    </div>
</template>

<script>
import SideMenu from "../components/dashboard/SideMenu";
// Dynamic load only on request
const DashboardHome = () => import("../components/dashboard/DashboardHome");
const ManageProducts = () => import("../components/dashboard/ManageProducts");
const ProductCreate = () => import("../components/dashboard/ProductCreate");
const ProductEdit = () => import("../components/dashboard/ProductEdit");
const ManageCategories = () => import("../components/dashboard/ManageCategories");
const CategoryCreate = () => import("../components/dashboard/CategoryCreate")
const ManageCustomers = () => import("../components/dashboard/ManageCustomers")
const ManagePurchases = () => import("../components/dashboard/ManagePurchases")
// ...

export default {
    name: "Dashboard",
    data: function () {
        return {
            componentsMap: {
                'DashboardHome': DashboardHome,
                'ManageProducts': ManageProducts,
                'ProductCreate': ProductCreate,
                'ProductEdit': ProductEdit,
                'ManageCategories': ManageCategories,
                'CategoryCreate': CategoryCreate,
                'ManageCustomers': ManageCustomers,
                'ManagePurchases': ManagePurchases
            },
            componentToLoad: null,
            componentParam: null
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
        // Icons
        feather.replace();
    },
    methods: {
        loadComponent(componentName, param) {
            this.componentParam = param;
            this.componentToLoad = this.componentsMap[componentName];
        }
    }
}

</script>

<style scoped>

</style>
