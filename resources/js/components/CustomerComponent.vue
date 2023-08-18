<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User List</div>
                    <div class="card-body">
                        <div class="m-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>Search By: </strong>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select v-model="queryField" class="form-control">
                                            <option value="name">Name</option>
                                            <option value="email">EMAIL</option>
                                            <option value="phone">PHONE</option>
                                            <option value="address">ADDRESS</option>
                                            <option value="total">TOTAL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" v-model="query" class="form-control" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <!-- <th>IMAGE</th> -->
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
                                    <!-- <td v-if="customer.image != null">
                                        <img style="width:120px;" :src="'../storage/customer/'+customer.image" :alt="customer.image">
                                        <img style="width:120px;" :src="customer.image" :alt="customer.image">
                                    </td>
                                    <td v-else>
                                        <img style="width:120px;" :src="'/assets/customers/img.jpg'" :alt="customer.image">
                                    </td> -->
                                    <td>{{ customer.name }}</td>
                                    <td>{{ customer.email }}</td>
                                    <td>{{ customer.phone }}</td>
                                    <td>{{ customer.address }}</td>
                                    <td>{{ customer.total }}</td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm ms-1">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5"
                            @paginate="getData()">
                        </pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            customers: [],
            pagination: {
                current_page: 1,
            },
            query: "",
            queryField: "name",
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get('/api/customers?page=' + this.pagination.current_page)
                .then((response) => {
                    this.customers = response.data.data;
                    this.pagination = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        searchData() {
            axios.get('/api/search/customer' + '/' + this.queryField + '/' + this.query + '?page=' + this.pagination.current_page)
                .then((response) => {
                    this.customers = response.data.data;
                    this.pagination = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },
    watch: {
        query: function (newQ, old) {
            if (newQ === "") {
                this.getData();
            } else {
                this.searchData();
            }
        }
    },
};
</script>
