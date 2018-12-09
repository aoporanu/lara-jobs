<template>
    <nav class="navbar navbar-expand-sm navbar-dark bg-info mb-2">
        <ul class="nav navbar-nav">
                <a href="#" class="navbar-brand">Jobs4All</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="nabvarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
            <li v-if="!loggedIn" class="nav-item"><a class="nav-link" href="#">Login</a></li>
            <li v-if="!loggedIn" class="nav-item"><a class="nav-link" href="#">Register</a></li>
            <li v-if="loggedIn" class="nav-item"><a class="nav-link" href="#">Logout</a></li>
        </ul>

    </nav>
</template>

<script>
    export default {
        computed: {
            loggedIn() {
                return localStorage.getItem('access_token');
            }
        }
    }
</script>
