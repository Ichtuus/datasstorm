<template lang="html">
    <mdb-col md="12">
        <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>
        <mdb-card-body>
            <h3 class="mt-5 text-left"><strong>Users list</strong></h3>
            <p>list of all user with online status and role</p>
            <mdb-tbl>
                <!-- {{users}} -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(elem, i) in users">
                        <th scope="row">{{i + 1}}</th>
                        <td>{{elem.username}}</td>
                        <td>{{elem.email}}</td>
                    </tr>
                </tbody>
            </mdb-tbl>
        </mdb-card-body>
    </mdb-col md="12">
</template>

<script>
    import { mdbRow, mdbCol, mdbCard, mdbView, mdbCardBody, mdbTbl } from 'mdbvue'
    import { mapState } from 'vuex';
    import axios from 'axios';
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    export default {
        name: 'Tables',
        components: {
            mdbRow,
            mdbCol,
            mdbCard,
            mdbView,
            mdbCardBody,
            mdbTbl,
            Loading
        },
        data () {
            return {
                users: null,
                isLoading: false,
                fullPage: true
            }
        },
        created () {
            this.isLoading = true;
            axios
            .get('/api/users.json', {
                headers:{
                    'Content-Type': 'application/json', 'Authorization': 'Bearer ' + localStorage.getItem("accessToken") + ' '
                }
            })
            .then(response => {
                this.isLoading = false;
                console.log(response.data);
                this.users = response.data
            })
            .catch(e => {
                console.log(e);
                this.errors = e
            })
        },
        computed: {
            ...mapState([
                'accessToken'
            ])
        }
    }
</script>

<style lang="css" scoped>
</style>
