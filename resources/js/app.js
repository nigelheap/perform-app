import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import dayjs from 'dayjs';
import "dayjs/locale/es";
import relativeTime from "dayjs/plugin/relativeTime";


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy);

        dayjs.locale('es')
        dayjs.extend(relativeTime)
        app.config.globalProperties.$date = dayjs;
        app.config.globalProperties.$config = {
            mapbox: {
                key: 'pk.eyJ1IjoibmlnZWxoZWFwIiwiYSI6ImNsc2l2ODYwbTFrNnIydnFwbmcxd3plMDIifQ.gSiw-20dTR4w2knYpDofFg',
            }
        };

        return app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
