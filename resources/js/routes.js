import Vue from 'vue'
import VueRouter from 'vue-router'
import CompagniesList from '@/js/components/CompagniesList'
import ExampleComponent from '@/js/components/ExampleComponent'

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
            name: 'example',
            component: ExampleComponent
        }
    ]
});

export default router;
