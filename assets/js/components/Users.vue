<template lang="html">
    <mdb-col md="12">
        <mdb-card-body>
            <h3 class="mt-5 text-left"><strong>Basic examples</strong></h3>
            <p>Using the most basic table markup, here’s how .table-based tables look in Bootstrap. All table styles are inherited in Bootstrap 4, meaning any nested tables will be styled in the same manner as the parent.</p>
            <mdb-tbl>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </mdb-tbl>
        </mdb-card-body>
    </mdb-col md="12">
</template>

<script>
    import { mdbRow, mdbCol, mdbCard, mdbView, mdbCardBody, mdbTbl } from 'mdbvue'

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
            return {}
        }
    }
</script>

<style lang="css" scoped>
</style>
