<template>
  <div class="users-list-container">
    <h1 class="title">Lista de Usuários</h1>
    <div class="table-container">
      <table class="users-table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td><strong>{{ user.nome }}</strong></td>
            <td>
              <a :href="getEditRoute(user.id)" class="btn btn-primary">Editar</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
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
.users-list-container {
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

.users-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.users-table th,
.users-table td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.users-table th {
  background-color: #007bff;
  color: white;
}

.users-table tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

.users-table tbody tr:hover {
  background-color: #ddd;
}

.users-table td strong {
  font-weight: bold;
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
</style>
