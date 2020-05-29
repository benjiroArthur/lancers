<template>
    <li class="nav-item dropdown ml-4">
        <a class="nav-link count-indicator text-white" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="fas fa-bell text-dark h4"></i>
            Updates
        </a>


        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
        </div>
    </li>
</template>

<script>
    export default {
        name: "Notification"
    }
</script>

<style scoped>

</style>
