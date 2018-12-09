<template>
    <form action="#" method="post" @submit.prevent="register" class="form-horizontal">
        <div class="form-group">
            <input placeholder="username" name="username" v-model="username" type="text" class="form-control" id="username" />
        </div>
        <div class="form-group">
            <input placeholder="password" name="password" v-model="password" type="password" class="form-control" id="password" />
        </div>
        <div class="form-group">
            <input placeholder="email@host.com" name="email" v-model="email" type="email" class="form-control" id="email" />
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
    </form>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            username: '',
            password: '',
            email: '',
        }
    },
    methods: {
        register: function() {

        }
    }
}
</script>
