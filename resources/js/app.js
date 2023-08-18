import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

import CustomerComponent from './components/CustomerComponent.vue';
app.component('customer-component', CustomerComponent);

import PaginationComponent from './components/partials/PaginationComponent.vue';
app.component('pagination', PaginationComponent);


app.mount('#app');
