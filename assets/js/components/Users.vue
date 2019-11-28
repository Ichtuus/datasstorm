<template lang="html">
    <mdb-col md="12">
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
                        <th>Status</th>
                        <th>Role</th>
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
    import axios from 'axios';
    export default {
        name: 'Tables',
        components: {
            mdbRow,
            mdbCol,
            mdbCard,
            mdbView,
            mdbCardBody,
            mdbTbl
        },
        data () {
            return {
                users: null
            }
        },
        created () {
            axios
            .get('/api/users.json', {
                headers:{
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                console.log(response.data);
                this.users = response.data
            })
            .catch(e => {
                console.log(e);
                this.errors = e
            })
        }
    }
</script>

<style lang="css" scoped>
</style>
