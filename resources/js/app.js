import "./bootstrap";
import { createApp } from "vue";
import i18n from "./translation/web.js";
import jq from "jquery";
$ = window.$ = window.jQuery = jq;

window.axios.defaults.headers.common["lang"] = "XMLHttpRequest";

const app = createApp({});

import PrimeVue from "primevue/config";
import Aura from "@primevue/themes/aura";
import Loader from './components/Loader.vue';
import ErrorMessage from "./components/ErrorMessage.vue";
import store from "./store/index.js";
import components from "./component.js";
import Select from "primevue/select";
import "vue-tel-input/vue-tel-input.css";
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import SearchAndFiltersVue from './components/SearchAndFilters.vue';
import VueTelInput from 'vue-tel-input';
const globalOptions = {
  mode: "auto",
};
import Chips from "primevue/chips";

app.use(i18n);
app.component("Select", Select);
app.component('Pagination', Bootstrap5Pagination);
app.component('search-and-filters', SearchAndFiltersVue)
app.component('loader', Loader);
app.component("error-message", ErrorMessage);
app.component("Chips", Chips);
components(app);

app.use(VueTelInput, globalOptions);

app.use(PrimeVue, {
  theme: {
    preset: Aura,
  },
});

app.use(store).mount(".app");
