import './bootstrap';
import { createApp } from 'vue';
import Paginicial from './components/Paginicial.vue';
import CadastroPaciente from './components/CadastroPaciente.vue';

const app = createApp();

app.component('paginicial', Paginicial);
app.component('cadastro-paciente', CadastroPaciente);

app.mount('#app');
