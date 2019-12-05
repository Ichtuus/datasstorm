<template>
    <form @submit.prevent="loginSubmit" action="/login" method="post" class="pad" ref="form">
        <div v-if="loginError" class="alert alert-danger">
            {{ loginError }}
        </div>
        <div v-if="accessToken" class="alert alert-success">
            login Successful
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" v-model="password" name="password" class="form-control"
                   id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" v-bind:class="{ disabled: isLoading }">Log in</button>
    </form>
</template>
<script>
    import axios from 'axios';
    import { mapState, mapActions } from 'vuex';
    export default {
        data() {
            return {
                email: '',
                password: '',
                error: '',
                isLoading: false
            }
        },
        computed: {
            ...mapState([
                'loggingIn',
                'loginError',
                'accessToken'
          ])
        },
        methods: {
            ...mapActions([
                'doLogin'
            ]),
            loginSubmit() {
                this.doLogin({
                    email: this.email,
                    password: this.password
                });
            }
        }
    }
</script>
<style >
.pad{
    padding: 12em;
}
</style>
