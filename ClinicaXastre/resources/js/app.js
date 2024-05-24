import './bootstrap';
import { createApp } from 'vue';
import Paginicial from './components/Paginicial.vue';
import CadastroPaciente from './components/CadastroPaciente.vue';
import Psicologa from './components/Psicologa.vue';
import EditarPacientes from './components/EditarPacientes.vue';
import AlterarPaciente from './components/AlterarPaciente.vue';
import Cliente from './components/Cliente.vue';
import Agendar from './components/Agendar.vue';


const app = createApp();

app.component('paginicial', Paginicial);
app.component('cadastro-paciente', CadastroPaciente);
app.component('psicologa', Psicologa);
app.component('editar-pacientes', EditarPacientes);
app.component('alterar-paciente', AlterarPaciente);
app.component('cliente', Cliente);
app.component('agendar', Agendar);

app.mount('#app');


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
