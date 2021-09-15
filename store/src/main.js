import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import VueAxios from "vue-axios";

axios.defaults.baseURL =
  process.env.VUE_APP_REQUEST_BASE_URL + process.env.VUE_APP_REQUEST_PREFIX;

axios.defaults.headers = {
  "Content-Type": "application/json",
  Accept: "application/json, */*",
};

createApp(App)
  .use(store)
  .use(router)
  .use(VueAxios, axios)
  .mount("#app");


