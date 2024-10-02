<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tab Component</div>
                    <div class="card-body">
                        <CategoryTabs :categories="categories" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import CategoryTabs from './CategoryTabs.vue';
export default {
    components:{
        CategoryTabs 
    },
    data() {
        return {
            categories: [
                {
                    name: 'Electronics',
                    products: [
                        { id: 1, name: 'Smartphone', description: 'A modern smartphone with a great camera.' },
                        { id: 2, name: 'Laptop', description: 'A powerful laptop for professionals.' },
                        { id: 3, name: 'PC', description: 'A powerful pc for professionals.' },
                    ],
                },
                {
                    name: 'Home Appliances',
                    products: [
                        { id: 4, name: 'Vacuum Cleaner', description: 'A vacuum cleaner with powerful suction.' },
                        { id: 5, name: 'Air Conditioner', description: 'A highly efficient air conditioner.' },
                    ],
                },
                {
                    name: 'Fashion',
                    products: [
                        { id: 6, name: 'T-shirt', description: 'A comfortable cotton t-shirt.' },
                        { id: 7, name: 'Jeans', description: 'Stylish and durable jeans.' },
                    ],
                },
            ],
        }
    }
};
</script>
