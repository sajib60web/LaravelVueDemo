<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Customer List</div>
                    <div class="card-body">
                        <child-component v-on:customer-data="customerData($event)" />
                    </div>
                </div>
            </div>
        </div>
        <p>Name: {{ name }}</p>
        <p><img :src="image_preview" alt="" height="200"></p>
        <p>ID: {{ image_id }}</p>
    </div>
</template>

<script>
import ChildComponent from '@/components/ChildComponent.vue';
export default {
    components: {
        ChildComponent
    },
    data() {
        return {
            name: '',
            image_preview: '',
            image_id: '',
        }
    },
    mounted() {

    },
    methods: {
        customerData(event) {
            console.log(event);
            this.name = event.name;
            this.image_preview = event.image;
            this.image_id = event.id;
        }
    }
};
</script>
