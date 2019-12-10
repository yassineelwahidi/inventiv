<template>
    <div>
        <p>
            <router-link to="/user" class="dropdown-item">User Link</router-link>
            <router-link to="/ex" class="dropdown-item">ex Link</router-link>
        </p>
        <router-view></router-view>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('App home mounted.')
        }
    }
</script>