<template>
    <div>
        <!-- Category Tabs -->
        <ul class="nav nav-pills">
            <li class="nav-item" v-for="(category, index) in categories" :key="index">
                <a class="nav-link" role="button" :class="{ active: activeTab === index }"
                @click="activeTab = index">{{ category.name }}</a>
            </li>
        </ul>

        <!-- Category Products -->
        <div class="tab-content">
            <ul>
                <li v-for="product in filteredProducts" :key="product.id">
                    <strong>{{ product.name }}</strong> - {{ product.description }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        categories: Array, // Array of categories with products
    },
    data() {
        return {
            activeTab: 0, // Tracks which category tab is active
        };
    },
    computed: {
        filteredProducts() {
            return this.categories[this.activeTab].products;
        },
    },
};
</script>

<style scoped>
.tabs button {
    padding: 10px;
    margin-right: 5px;
    cursor: pointer;
}

.tabs button.active {
    background-color: #007bff;
    color: white;
}

.tab-content {
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #ddd;
}
</style>