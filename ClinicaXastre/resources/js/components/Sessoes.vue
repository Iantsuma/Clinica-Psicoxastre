<template>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Paciente</th>
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
              <a :href="createRoute(agendamento.id)" class="btn btn-primary">Info</a>
              <a :href="editRoute(agendamento.id)" class="btn btn-primary">Documentos</a>
            </td>
          </tr>
        </tbody>
      </table>
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
      editRoute(agendamentoId) {
        return `/psicologa/ficha/sessoes/documentos/${agendamentoId}`;
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
  