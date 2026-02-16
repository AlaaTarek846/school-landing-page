import { createI18n } from 'vue-i18n';
import ar from "./ar.json";
import en from "./en.json";

let lang = document.querySelector('meta[name="language"]').getAttribute('content');
const i18n = createI18n({
    locale: lang, // set locale
    fallbackLocale: lang, // set fallback locale
    legacy:false,
    messages: {
        ar,en
    }
});


export default i18n;
