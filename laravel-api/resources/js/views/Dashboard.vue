<template>
    <div class="container-fluid">
        <div class="row">
            <side-menu v-on:menuItemClick="loadComponent"></side-menu>
            <component :is="dynamicComponent"/>
        </div>
    </div>
</template>

<script>
import SideMenu from "../components/dashboard/SideMenu";
// Dynamic load only on request
const ManageProducts = () => import("../components/dashboard/ManageProducts");
// ...

export default {
    name: "Dashboard",
    data: function () {
        return {
            componentsMap: {'ManageProducts': ManageProducts},
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
