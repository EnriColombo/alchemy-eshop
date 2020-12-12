<template>
    <div class="container-fluid">
        <div class="row">
            <side-menu></side-menu>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import SideMenu from "../components/dashboard/SideMenu";

export default {
    name: "Dashboard",
    components: {
      SideMenu
    }
}

</script>

<style scoped>

</style>
