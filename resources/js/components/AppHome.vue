<template>
    <div>
        <p>
            App home
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

