<template>
  <div class="full-page">
    <div class="header">
      <button @click="goBack" class="btn btn-secondary">Voltar</button>
      <button @click="logOut" class="btn btn-danger">Logout</button>
    </div>
    <div class="history-container">
      <h1 class="title">Histórico de Agendamentos</h1>
      <div class="table-container">
        <table class="history-table">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Psicólogo</th>
              <th>Descrição</th>
              <th>Status</th>
              <th>Data de Agendamento</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="agendamento in agendas" :key="agendamento.id">
              <td><strong>{{ agendamento.nome }}</strong></td>
              <td><strong>{{ agendamento.psi_nome }}</strong></td>
              <td><strong>{{ agendamento.descricao }}</strong></td>
              <td><strong>{{ agendamento.status }}</strong></td>
              <td><strong>{{ new Date(agendamento.created_at).toLocaleDateString() }}</strong></td> <!-- Exibir nome do psicólogo -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Historico',
  props: {
    agendas: {
      type: Array,
      required: true
    }
  },
  methods: {
    goBack() {
      window.location.href = '/cliente';
    },
    logOut() {
      window.location.href = '/logout';
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
  align-items: center;
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

.header button {
  margin-right: 10px;
}

.history-container {
  margin: 70px auto 0; /* Ajustado para adicionar espaço para o header */
  width: 100%;
  max-width: 800px;
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

.history-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.history-table th,
.history-table td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.history-table th {
  background-color: #007bff;
  color: white;
}

.history-table tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

.history-table tbody tr:hover {
  background-color: #ddd;
}

.btn-secondary {
  background-color: #6c757d;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 10px 15px;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-secondary:hover {
  background-color: #5a6268;
  transform: translateY(-2px);
}

.btn-danger {
  background-color: #dc3545;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 10px 15px;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-danger:hover {
  background-color: #c82333;
  transform: translateY(-2px);
}
</style>
