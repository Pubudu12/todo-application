import './bootstrap';
import { createApp, isProxy, toRaw } from 'vue';
import Setup from './components/Setup.vue'
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { faPlus, faTrash } from '@fortawesome/free-solid-svg-icons'
import axios from 'axios';

library.add(faPlus, faTrash)


const app = createApp({
    components: {
        Setup,
    }
});

app.component('font-awesome-icon', FontAwesomeIcon);

app.mount("#app");
