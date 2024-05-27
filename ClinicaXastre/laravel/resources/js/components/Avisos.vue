<template>
    <div class="anunciar-container">
      <h1 class="title">Pacientes na Clinica</h1>
      <div class="table container">
      <table class="agendamentos-table">
        <thead>
          <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Descrição</th>
            <th scope="col">Status</th>
            <th scope="col">Data de Agendamento</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="agendamento in agendas" :key="agendamento.id">
            <td>{{ agendamento.nome }}</td>
            <td>{{ agendamento.descricao }}</td>
            <td>{{ agendamento.status }}</td>
            <td>{{ new Date(agendamento.created_at).toLocaleDateString() }}</td>
            <td>
              <a :href="editRoute(agendamento.id)" class="btn btn-success">Concluir Sessão</a>
            </td>
          </tr>
        </tbody>
      </table>
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
        return `/psicologa/avisos/${id}`;
      }
    }
  };
  </script>
  
  <style scoped>
  .anunciar-container {
    margin: 50px auto;
    max-width: 1000px;
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
  
  .action-buttons a {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    margin-right: 10px;
    margin-bottom: 5px; /* Add this line to add spacing between rows */
  }
  
  .action-buttons a:last-child {
    margin-right: 0; /* Remove margin from the last button */
  }
  
  .btn-info {
    background-color: #28a745; /* Cor vibrante verde */
    color: white;
  }
  
  .btn-info:hover {
    background-color: #218838;
  }
  
  .btn-secondary {
    background-color: #ffc107; /* Cor vibrante amarela */
    color: white;
  }
  
  .btn-secondary:hover {
    background-color: #e0a800;
  }
  </style>
  