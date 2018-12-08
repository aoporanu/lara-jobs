<template>
    <form method="post">
        <div class="form-group">
            <input type="text" placeholder="Username" class="form-control" v-model="username" />
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" v-model="password" class="form-control" />
        </div>
    </form>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                username: '',
                password: '',
            }
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>