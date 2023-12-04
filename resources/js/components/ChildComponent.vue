<template>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADDRESS</th>
                <th>TOTAL</th>
                <th style="width: 10%;text-align: center;">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(customer, index) in customers" :key="customer.id">
                <td>{{ index + 1 }}</td>
                <td>{{ customer.name }}</td>
                <td>{{ customer.email }}</td>
                <td>{{ customer.phone }}</td>
                <td>{{ customer.address }}</td>
                <td>{{ customer.total }}</td>
                <td style="text-align: center;">
                    <button type="button" @click="selectCustomer(customer)" class="btn btn-success btn-sm ms-1">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            customers: [],
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get('/api/components')
                .then((res) => {
                    this.customers = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        selectCustomer(customer) {
            console.log(customer);
            this.$emit('customerData', customer)
        }
    }
};
</script>
