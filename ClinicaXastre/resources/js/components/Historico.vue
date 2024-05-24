<template>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Descrição</th>
            <th scope="col">Status</th>
            <th scope="col">Data de Agendamento</th>
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
  .table {
    width: 100%;
    margin: 20px 0;
  }
  .thead-dark {
    background-color: #343a40;
    color: white;
  }
  </style>
  