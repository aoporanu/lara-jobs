<template>
    <form action="#" @submit.prevent="login" method="post">
        <div class="form-group">
            <input type="text" placeholder="Username" name="username" class="form-control" v-model="username" />
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" v-model="password" class="form-control" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Login</button>
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
            login: function() {
                // console.info(this.username);
                // console.info(this.password);
                fetch('/api/login', {
                    method: 'post',
                    body: JSON.stringify({username: this.username, password: this.password}),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                    .then(res => {
                        const token = res.access_token;
                        localStorage.setItem('access_token', token);

                    })
                        .catch(err => console.info(err));
            }
        }
    }
</script>
