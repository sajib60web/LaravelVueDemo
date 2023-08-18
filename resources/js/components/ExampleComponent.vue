<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User List</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>User ID</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in posts" :key="post.id">
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.userId }}</td>
                                    <td>
                                        <span v-if="post.completed" class="badge text-bg-success">
                                            Active
                                        </span>
                                        <span v-else class="badge text-bg-danger">
                                            Inactive
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            posts: [],
            name: "Sajib"
        }
    },
    mounted() {
        axios.get('https://jsonplaceholder.typicode.com/todos')
            .then((response) => {
                this.posts = response.data
            })
            .catch((error) => {
                console.log(error);
            })
            .finally(() => {
                // always executed
            });
    },
};
</script>
