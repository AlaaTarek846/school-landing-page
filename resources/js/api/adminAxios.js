import axios from "axios";
import Cookies from "js-cookie";



const webApi = axios.create({
    baseURL: `${window.location.origin}/api/`
});

let lang = document.querySelector('meta[name="language"]').getAttribute('content');
webApi.interceptors.request.use(
    function (config) {
        config.headers['lang'] = lang;
        config.headers['Accept-Language'] = lang;
        config.headers['Authorization'] = "Bearer " + (Cookies.get("token") || '');
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);
webApi.defaults.headers.common['Accept'] = 'application/json';
webApi.defaults.headers.common['lang'] = lang;
webApi.defaults.headers.common['Accept-Language'] = lang;

webApi.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if (401 === error.response.status) {
        location.href = '/login';
    } else {
        return Promise.reject(error);
    }
});
// end axios
export default webApi;
