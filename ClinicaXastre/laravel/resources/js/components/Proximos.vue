<template>
    <div class="full-page">
      <div class="header">
        <button @click="goBack" class="btn btn-secondary">Voltar</button>
        <button @click="logOut" class="btn btn-danger">Logout</button>
      </div>
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
                  <a :href="getEditRoute(user.id)" class="btn btn-success">Editar</a>
                  <button @click="confirmDelete(user.id)" class="btn btn-danger">Excluir</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  
      <!-- Confirmation Modal -->
      <div v-if="showConfirmModal" class="custom-modal">
        <div class="custom-modal-content">
          <span class="close-button" @click="closeModal">&times;</span>
          <p>Você tem certeza que deseja excluir este usuário?</p>
          <button @click="deleteUser" class="btn btn-danger">Excluir</button>
          <button @click="closeModal" class="btn btn-secondary">Cancelar</button>
        </div>
      </div>
  
      <!-- Result Modal -->
      <div v-if="showResultModal" class="custom-modal">
        <div class="custom-modal-content">
          <span class="close-button" @click="closeResultModal">&times;</span>
          <p>{{ resultMessage }}</p>
          <button @click="closeResultModal" class="btn btn-primary">OK</button>
        </div>
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
    data() {
      return {
        showConfirmModal: false,
        showResultModal: false,
        selectedUserId: null,
        resultMessage: ''
      };
    },
    methods: {
      getEditRoute(id) {
        return `/psicologa/ficha/ler/editar/${id}`;
      },
      goBack() {
        window.location.href = '/psicologa/ficha';
      },
      logOut() {
        window.location.href = '/logout';
      },
      confirmDelete(id) {
        this.selectedUserId = id;
        this.showConfirmModal = true;
      },
      closeModal() {
        this.showConfirmModal = false;
        this.selectedUserId = null;
      },
      closeResultModal() {
        this.showResultModal = false;
        this.selectedUserId = null;
        window.location.reload();
      },
      deleteUser() {
        fetch(`/users/${this.selectedUserId}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.json().then(data => ({ status: response.status, body: data })))
        .then(({ status, body }) => {
          if (status === 200) {
            this.resultMessage = 'Erro ao excluir o usuário';
            this.users = this.users.filter(user => user.id !== this.selectedUserId);
          } else {
            this.resultMessage = 'Usuário excluído com sucesso!';
          }
          this.showResultModal = true;
          this.showConfirmModal = false;
        })
        .catch(error => {
          this.resultMessage = 'Usuário excluído com sucesso!';
          this.showResultModal = true;
          this.showConfirmModal = false;
        });
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
  
  .users-list-container {
    margin: 70px auto 0; /* Ajustado para adicionar espaço para o header */
    width: 70%; /* Largura reduzida para 70% */
    max-width: 800px; /* Largura máxima ajustada */
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
    background-color: #28a745; /* Cor verde */
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    margin-right: 10px; /* Espaçamento entre botões */
  }
  
  .btn-primary:hover {
    background-color: #218838; /* Cor verde mais escura */
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
  
  /* Custom modal styles */
  .custom-modal {
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .custom-modal-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    max-width: 400px;
    width: 100%;
  }
  
  .close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    cursor: pointer;
  }
  </style>
  