import './bootstrap';
import { createApp } from 'vue';

import Alpine from 'alpinejs';
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-dt';
import PostList from './components/PostList.vue';

DataTable.use(DataTablesCore);

window.Alpine = Alpine;

DataTable.use(DataTablesCore);
Alpine.start();

const app = createApp({});
PostList
app.component('DataTable', DataTable)
.component('PostList', PostList)
.mount('#vue')
