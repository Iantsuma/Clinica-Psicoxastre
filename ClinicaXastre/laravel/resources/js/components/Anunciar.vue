<template>
  <div class="full-page">
    <div class="header">
      <button @click="goBack" class="btn btn-secondary">Voltar</button>
      <button @click="logOut" class="btn btn-danger">Logout</button>
    </div>
    <div class="announcement-container">
      <h1 class="title">Anunciar Chegada</h1>
      <div class="table-container">
        <table class="announcement-table">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Psicólogo</th>
              <th>Descrição</th>
              <th>Status</th>
              <th>Data de Agendamento</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="agendamento in agendas" :key="agendamento.id">
              <td><strong>{{ agendamento.nome }}</strong></td>
              <td><strong>{{ agendamento.psi_nome }}</strong></td>
              <td><strong>{{ agendamento.descricao }}</strong></td>
              <td><strong>{{ agendamento.status }}</strong></td>
              <td><strong>{{ new Date(agendamento.created_at).toLocaleDateString() }}</strong></td>
              <td class="actions-cell">
                <a :href="editRoute(agendamento.id)" class="btn btn-primary">Anunciar Chegada</a>
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
    editRoute(id) {
      return `/secretaria/anunciar/editar/${id}`;
    },
    goBack() {
      window.location.href = '/secretaria';
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
  background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
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

.announcement-container {
  margin: 50px auto;
  width: 90%; /* Ajustar a largura para ocupar 90% da tela */
  max-width: 1200px; /* Ajustar o máximo de largura */
  padding: 20px;
  background-color: #f7f7f7;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.title {
  font-size: 36px; /* Aumentar o tamanho da fonte do título */
  color: #333;
  text-align: center;
  margin-bottom: 20px;
  font-weight: bold;
}

.table-container {
  overflow-x: auto;
}

.announcement-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.announcement-table th,
.announcement-table td {
  padding: 16px 20px; /* Ajustado para maior espaçamento */
  text-align: left;
  border-bottom: 1px solid #ddd;
  white-space: nowrap; /* Evitar quebras de linha nas células */
}

.announcement-table th {
  background-color: #007bff;
  color: white;
  font-size: 18px; /* Aumentar o tamanho da fonte dos cabeçalhos */
}

.announcement-table tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

.announcement-table tbody tr:hover {
  background-color: #ddd;
}

.announcement-table td {
  font-size: 16px; /* Ajustar o tamanho da fonte das células */
}

.actions-cell {
  padding-right: 5px; /* Reduzir o padding à célula de ações */
}

.btn-primary {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s;
  margin-right: 5px; /* Reduzir margem direita ao botão */
}

.btn-primary:hover {
  background-color: #0056b3;
}

.btn-secondary {
  background-color: #6c757d;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 10px 15px;
  font-size: 16px; /* Aumentar o tamanho da fonte dos botões */
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
  font-size: 16px; /* Aumentar o tamanho da fonte dos botões */
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-danger:hover {
  background-color: #c82333;
  transform: translateY(-2px);
}

.nav-buttons {
  display: inline;
}
</style>
