<template>
  <div class="full-page">
    <div class="header">
      <button @click="goBack" class="btn btn-secondary">Voltar</button>
      <button @click="logOut" class="btn btn-danger">Logout</button>
    </div>
    <div class="anunciar-container">
      <h1 class="title">Sessões Concluídas</h1>
      <div class="table-container">
        <table class="agendamentos-table">
          <thead>
            <tr>
              <th>Paciente</th>
              <th>Descrição</th>
              <th>Status</th>
              <th>Data de Agendamento</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="agendamento in agendas" :key="agendamento.id">
              <td><strong>{{ agendamento.nome }}</strong></td>
              <td><strong>{{ agendamento.descricao }}</strong></td>
              <td><strong>{{ agendamento.status }}</strong></td>
              <td><strong>{{ new Date(agendamento.created_at).toLocaleDateString() }}</strong></td>
              <td class="action-buttons">
                <div class="button-row">
                  <a :href="createRoute(agendamento.id)" class="btn btn-info">Info</a>
                  <button @click="gerarDoc(agendamento.user_id)" class="btn btn-danger">Atestado</button>
                </div>
                <a :href="editRoute()" class="btn btn-secondary">Encaminhamentos</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Anunciar',
  props: {
    agendas: {
      type: Array,
      required: true
    }
  },
  methods: {
    createRoute(agendamentoId) {
      return `/psicologa/ficha/sessoes/info/${agendamentoId}`;
    },
    editRoute() {
      return `/psicologa/ficha/sessoes/documentos`;
    },
    goBack() {
      window.location.href = '/psicologa/ficha';
    },
    logOut() {
      window.location.href = '/logout';
    },
    gerarDoc(agendamentoId) {
      const userId = agendamentoId;
      window.location.href = `/document/${userId}`;
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');

.full-page {
  height: 100vh;
  display: flex;
  flex-direction: column;
  background: #f0f0f0; /* fundo cinza */
  font-family: 'Montserrat', sans-serif;
}

.header {
  width: 100%;
  display: flex;
  justify-content: flex-start;
  padding: 5px 20px;
  position: absolute;
  top: 0;
}

.header button, .header nav {
  margin-right: 10px;
}

.anunciar-container {
  margin: 70px auto 0; /* Ajustado para adicionar espaço para o header */
  width: 100%;
  max-width: 800px; /* Largura máxima ajustada para ser 20% menor */
  padding: 20px;
  background-color: #f7f7f7;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.title {
  font-size: 32px;
  color: #333;
  text-align: center;
  margin-bottom: 20px;
  font-weight: bold;
}

.table-container {
  overflow-x: auto;
}

.agendamentos-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.agendamentos-table th,
.agendamentos-table td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.agendamentos-table th {
  background-color: #007bff;
  color: white;
}

.agendamentos-table tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

.agendamentos-table tbody tr:hover {
  background-color: #ddd;
}

.agendamentos-table td strong {
  font-weight: bold;
}

.action-buttons {
  display: flex;
  flex-direction: column;
}

.button-row {
  display: flex;
  margin-bottom: 5px; /* Add this line to add spacing between rows */
}

.action-buttons a,
.action-buttons button {
  display: inline-block;
  padding: 10px 15px; /* Ajuste de padding para combinar com os outros botões */
  text-decoration: none;
  border-radius: 8px; /* Ajuste de borda para combinar com os outros botões */
  transition: background-color 0.3s;
  margin-right: 10px;
  margin-bottom: 5px; /* Add this line to add spacing between rows */
}

.action-buttons a:last-child,
.action-buttons button:last-child {
  margin-right: 0; /* Remove margin from the last button */
}

.btn-info {
  background-color: #28a745; /* Cor vibrante verde */
  color: white;
  border: none; /* Remover borda */
  border-radius: 8px; /* Ajuste de borda para combinar com os outros botões */
  padding: 10px 15px; /* Ajuste de padding para combinar com os outros botões */
  font-size: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-info:hover {
  background-color: #218838;
}

.btn-secondary {
  background-color: #6c757d;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 10px 15px;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-secondary:hover {
  background-color: #5a6268;
}

.btn-primary {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.btn-danger {
  background-color: #dc3545;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 10px 15px;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-danger:hover {
  background-color: #c82333;
}

.header .btn-secondary:hover, 
.header .btn-danger:hover {
  transform: translateY(-3px); /* Adicionar transformação de salto apenas para os botões de Voltar e Logout */
}
</style>
