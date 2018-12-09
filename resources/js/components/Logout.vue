<template>

</template>

<script>
export default {
    created() {
        fetch('/logout')
            .then(response => {
                localStorage.removeItem('access_token');
            })
            .catch(error => {
                localStorage.removeItem('access_token');
            })
    }
}
</script>

<style lang="css">
</style>
