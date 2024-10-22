import "./bootstrap";
import { createApp } from "vue";
import VueGoogleMaps from '@fawmi/vue-google-maps';

const app = createApp({});

import ExampleComponent from "./components/ExampleComponent.vue";
app.component("example-component", ExampleComponent);

import CustomerComponent from "./components/CustomerComponent.vue";
app.component("customer-component", CustomerComponent);

import PaginationComponent from "./components/partials/PaginationComponent.vue";
app.component("pagination", PaginationComponent);

import ChildComponentToParentComponent from "./components/ChildComponentToParentComponent.vue";
app.component("child-component-to-parent-component", ChildComponentToParentComponent);

import BootstrapVueComponent from "./components/BootstrapVueComponent.vue";
app.component("bootstrap-vue-component", BootstrapVueComponent);

import TabComponent from "./components/tabs/TabComponent.vue";
app.component("tab-component", TabComponent);

import GoogleMapAutocompleteComponent from "./components/GoogleMapAutocompleteComponent.vue";
app.component("google-map-autocomplete", GoogleMapAutocompleteComponent);


// google map
app.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBxwyLXWNfom9BRx0Ccr_PdIzDCHyKDeNo',
        libraries: 'places',
        async: true,
        defer: true,
    },
});
app.mount("#app");
