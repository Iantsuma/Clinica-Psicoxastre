<template>
  <div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <th scope="row">{{ user.nome }}</th>
          <td>
            <a :href="getEditRoute(user.id)" class="btn btn-primary">Editar</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
  
  <script>
  export default {
    name: 'UsersList',
    props: {
      users: {
        type: Array,
        required: true
      }
    },
    methods: {
      getEditRoute(id) {
        return `/psicologa/ficha/ler/editar/${id}`;
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  