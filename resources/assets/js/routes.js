import SeriIndex from './components/SeriIndexComponent.vue';
import SeriCreate from './components/SeriCreateComponent.vue';

export const routes = [
    { path: '/admin/seri', component: SeriIndex, name: 'SeriIndex' },
    { path: '/admin/seri/create', component: SeriCreate, name: 'SeriCreate' }
];
