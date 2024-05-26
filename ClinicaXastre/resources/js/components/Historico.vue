<template>
  <div class="history-container">
    <h1 class="title">Histórico de Agendamentos</h1>
    <div class="table-container">
      <table class="history-table">
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Data de Agendamento</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="agendamento in agendas" :key="agendamento.id">
            <td>{{ agendamento.nome }}</td>
            <td>{{ agendamento.descricao }}</td>
            <td>{{ agendamento.status }}</td>
            <td>{{ new Date(agendamento.created_at).toLocaleDateString() }}</td>
          </tr>
        </tbody>
      </table>
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
  }
};
</script>

<style scoped>
.history-container {
  margin: 50px auto;
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
</style>
