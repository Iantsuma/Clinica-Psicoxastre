<template>
  <div class="full-page">
    <div class="header">
      <button @click="goBack" class="btn btn-secondary">Voltar</button>
      <button @click="logOut" class="btn btn-danger">Logout</button>
    </div>
    <div class="container">
      <div class="form-container">
        <h1 class="logo">Inserir Informações</h1>
        <form @submit.prevent="submitForm" class="form-stylish">
          <div class="mb-3">
            <label for="hora_inicio" class="form-label">Horário de Inicio</label>
            <input type="text" id="hora_inicio" class="form-control" v-model="form.hora_inicio" placeholder="Hora de inicio" required>
          </div>
          <div class="mb-3">
            <label for="hora_fim" class="form-label">Horário de Encerramento</label>
            <input type="text" id="hora_fim" class="form-control" v-model="form.hora_fim" placeholder="Hora de Fim" required>
          </div>
          <div class="mb-3">
            <label for="tema" class="form-label">Tema</label>
            <input type="text" id="tema" class="form-control" v-model="form.tema" placeholder="Tema" required>
          </div>
          <div class="mb-3">
            <label for="avaliacao" class="form-label">Avaliação da Sessão</label>
            <input type="text" id="avaliacao" class="form-control" v-model="form.avaliacao" placeholder="Avaliação" required>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Inserir">
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    storeRoute: {
      type: String,
      required: true
    },
    agendamento: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      form: {
        sessao_id: this.agendamento.id,
        data: new Date(this.agendamento.created_at).toLocaleDateString(),
        hora_inicio: '',
        hora_fim: '',
        tema: '',
        avaliacao: ''
      }
    };
  },
  methods: {
    submitForm() {
      fetch(this.storeRoute, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(this.form)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error(`Erro: ${response.status} ${response.statusText}`);
        }
        return response.json();
      })
      .then(data => {
        if (data.message) {
          alert(data.message);
        } else {
          alert('Informações inseridas com sucesso.');
          this.$router.push('/');
        }
      })
      .catch(error => {
        console.error('Erro ao submeter o formulário:', error);
        alert('Você já inseriu informações nesta sessão!');
      });
    },
    goBack() {
      window.location.href = '/psicologa/ficha/sessoes';
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

.header button {
  margin-right: 10px;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-top: 70px; /* Adicionando margem superior para compensar o header fixo */
}

.form-container {
  background: white;
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  max-width: 500px;
  width: 100%;
}

.logo {
  color: #333;
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 30px;
  text-align: center;
}

.form-stylish {
  display: flex;
  flex-direction: column;
}

.mb-3 {
  margin-bottom: 20px;
}

.form-label {
  font-weight: 500;
  color: #333;
  margin-bottom: 8px;
}

.form-control {
  border-radius: 8px;
  border: 1px solid #ddd;
  padding: 10px;
  font-size: 16px;
}

.form-control:focus {
  border-color: #007bff;
  box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
}

.btn-primary {
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 12px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background-color: #0056b3;
  transform: translateY(-2px);
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
