import './bootstrap';
import { createApp } from 'vue';
import Landpage from './components/Landpage.vue';
import CadastroPaciente from './components/CadastroPaciente.vue';
import Psicologa from './components/Psicologa.vue';
import EditarPacientes from './components/EditarPacientes.vue';
import AlterarPaciente from './components/AlterarPaciente.vue';
import Cliente from './components/Cliente.vue';
import Agendar from './components/Agendar.vue';
import Historico from './components/Historico.vue';
import Secretaria from './components/Secretaria.vue';
import Anunciar from './components/Anunciar.vue';
import Avisos from './components/Avisos.vue';
import Ficha from './components/Ficha.vue';
import Sessoes from './components/Sessoes.vue';
import Info from './components/Info.vue';
import Documento from './components/Documento.vue';
import Proximos from './components/Proximos.vue';



const app = createApp();

app.component('land-page', Landpage);
app.component('cadastro-paciente', CadastroPaciente);
app.component('psicologa', Psicologa);
app.component('editar-pacientes', EditarPacientes);
app.component('alterar-paciente', AlterarPaciente);
app.component('cliente', Cliente);
app.component('agendar', Agendar);
app.component('historico', Historico);
app.component('secretaria', Secretaria);
app.component('anunciar', Anunciar);
app.component('avisos', Avisos);
app.component('ficha', Ficha);
app.component('sessoes', Sessoes);
app.component('info', Info);
app.component('documento', Documento);
app.component('proximos', Proximos);

app.mount('#app');


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
