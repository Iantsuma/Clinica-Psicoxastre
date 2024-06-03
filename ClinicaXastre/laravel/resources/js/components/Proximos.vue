<template>
  <div class="full-page">
    <div class="header">
      <button @click="goBack" class="btn btn-secondary">Voltar</button>
      <button @click="logOut" class="btn btn-danger">Logout</button>
    </div>
    <div class="history-container">
      <h1 class="title">Próximos Agendamentos</h1>
      <div class="table-container">
        <table class="history-table">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Psicólogo</th>
              <th>Descrição</th>
              <th>Status</th>
              <th>Data de Agendamento</th>
              <th>Ações</th> <!-- Nova coluna para ações -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="agendamento in agendas" :key="agendamento.id">
              <td><strong>{{ agendamento.nome }}</strong></td>
              <td><strong>{{ agendamento.psi_nome }}</strong></td>
              <td><strong>{{ agendamento.descricao }}</strong></td>
              <td><strong>{{ agendamento.status }}</strong></td>
              <td><strong>{{ new Date(agendamento.created_at).toLocaleDateString() }}</strong></td>
              <td>
                <button @click="confirmDelete(agendamento.id)" class="btn btn-danger">Cancelar</button>
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
        <p>Você tem certeza que deseja cancelar este agendamento?</p>
        <button @click="deleteAgendamento" class="btn btn-danger">Sim</button>
        <button @click="closeModal" class="btn btn-secondary">Não</button>
      </div>
    </div>

    <!-- Success/Error Modal -->
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
  name: 'Historico',
  props: {
    agendas: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      showConfirmModal: false,
      showResultModal: false,
      selectedAgendamentoId: null,
      resultMessage: ''
    };
  },
  methods: {
    goBack() {
      window.location.href = '/cliente';
    },
    logOut() {
      window.location.href = '/logout';
    },
    confirmDelete(id) {
      this.selectedAgendamentoId = id;
      this.showConfirmModal = true;
    },
    closeModal() {
      this.showConfirmModal = false;
      this.selectedAgendamentoId = null;
    },
    closeResultModal() {
      this.showResultModal = false;
      this.selectedAgendamentoId = null;
      window.location.reload();
    },
    deleteAgendamento() {
      fetch(`/agendamentos/${this.selectedAgendamentoId}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          'Content-Type': 'application/json'
        }
      })
      .then(response => response.json().then(data => ({ status: response.status, body: data })))
      .then(({ status, body }) => {
        if (status === 200) {
          this.resultMessage = 'Erro ao cancelar o agendamento';
          this.agendas = this.agendas.filter(agendamento => agendamento.id !== this.selectedAgendamentoId);
        } else {
          this.resultMessage = 'Agendamento cancelado com sucesso!';
        }
        this.showResultModal = true;
        this.showConfirmModal = false;
      })
      .catch(error => {
        this.resultMessage = 'Agendamento cancelado com sucesso!';
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
