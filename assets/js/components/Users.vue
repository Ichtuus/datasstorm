<template lang="html">
    <mdb-col md="12">
        <mdb-card-body>
            <h3 class="mt-5 text-left"><strong>Basic examples</strong></h3>
            <p>Using the most basic table markup, here’s how .table-based tables look in Bootstrap. All table styles are inherited in Bootstrap 4, meaning any nested tables will be styled in the same manner as the parent.</p>
            <mdb-tbl>
                <!-- {{users}} -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
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
