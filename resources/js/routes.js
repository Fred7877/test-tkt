import Vue from 'vue'
import VueRouter from 'vue-router'
import CompagniesList from '@/js/components/CompagniesList'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/compagnies',
            name: 'compagnies',
            component: CompagniesList
        },
        {
            path: '/',
            name: 'compagnies',
            component: CompagniesList
        }
    ]
});

export default router;
