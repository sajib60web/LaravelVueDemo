import "./bootstrap";
import { createApp } from "vue";

const app = createApp({});

import ExampleComponent from "./components/ExampleComponent.vue";
app.component("example-component", ExampleComponent);

import CustomerComponent from "./components/CustomerComponent.vue";
app.component("customer-component", CustomerComponent);

import PaginationComponent from "./components/partials/PaginationComponent.vue";
app.component("pagination", PaginationComponent);

import ChildComponentToParentComponent from "./components/ChildComponentToParentComponent.vue";
app.component(
    "child-component-to-parent-component",
    ChildComponentToParentComponent
);

app.mount("#app");
