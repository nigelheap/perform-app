import './bootstrap';
// import '../css/admin.css';

import { createApp, h } from 'vue/dist/vue.esm-bundler';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import dayjs from 'dayjs';
import "dayjs/locale/es";
import relativeTime from "dayjs/plugin/relativeTime";


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
//     setup({ el, App, props, plugin }) {
//         const app = createApp({ render: () => h(App, props) })
//             .use(plugin)
//             .use(ZiggyVue, Ziggy);
//
//         dayjs.locale('es')
//         dayjs.extend(relativeTime)
//         app.config.globalProperties.$date = dayjs;
//
//         return app.mount(el);
//     },
//     progress: {
//         color: '#4B5563',
//     },
// });

const app = createApp({
    data() {
        return {
            loading: false,
            open: false,
            userMenu: false,
            mobileMenu: false
        };
    },
    created() {
        // this.$events.$on('loading', (loading) => {
        //     this.loading = loading;
        // });
    }
})

app.mount('#app')
