<template>
  <div class="full-page">
    <div class="header">
      <button @click="goBack" class="btn btn-secondary">Voltar</button>
      <button @click="logOut" class="btn btn-danger">Logout</button>
    </div>
    <div class="container">
      <div class="form-container">
        <h1 class="logo">Cadastro de Pacientes</h1>
        <form @submit.prevent="submitForm" class="form-stylish">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" id="nome" class="form-control" v-model="form.nome" placeholder="Nome" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cep" class="form-label">CEP</label>
              <input type="text" id="cep" class="form-control" v-model="form.cep" placeholder="CEP" required @blur="buscarCEP">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="rua" class="form-label">Rua</label>
              <input type="text" id="rua" class="form-control" v-model="form.rua" placeholder="Rua" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="bairro" class="form-label">Bairro</label>
              <input type="text" id="bairro" class="form-control" v-model="form.bairro" placeholder="Bairro" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cidade" class="form-label">Cidade</label>
              <input type="text" id="cidade" class="form-control" v-model="form.cidade" placeholder="Cidade" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="estado" class="form-label">Estado</label>
              <input type="text" id="estado" class="form-control" v-model="form.estado" placeholder="Estado" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="numero" class="form-label">Número Celular</label>
              <input type="text" id="numero" class="form-control" v-model="form.numero" placeholder="Número" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" id="email" class="form-control" v-model="form.email" placeholder="Email" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="password" class="form-label">Senha</label>
              <input type="text" id="password" class="form-control" v-model="form.password" placeholder="Senha" required>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Cadastrar">
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
    }
  },
  data() {
    return {
      form: {
        nome: '',
        cep: '',
        rua: '',
        bairro: '',
        cidade: '',
        estado: '',
        numero: '',
        email: '',
        password: ''
      }
    };
  },
  methods: {
    buscarCEP() {
      const cep = this.form.cep;
      const url = `https://viacep.com.br/ws/${cep}/json/`;

      fetch(url)
        .then(response => response.json())
        .then(data => {
          if (data.erro) {
            alert('CEP não encontrado.');
            return;
          }
          this.form.rua = data.logradouro;
          this.form.bairro = data.bairro;
          this.form.cidade = data.localidade;
          this.form.estado = data.uf;
        })
        .catch(() => alert('Falha ao buscar o CEP.'));
    },
    submitForm() {
      fetch(this.storeRoute, {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify(this.form)
    })
    .then(response => response.json())
    .then(data => {
      if (data.message) {
        alert(data.message); // Mostra a mensagem retornada pelo servidor
      if (data.message.includes('sucesso')) {
        window.location.href = '/secretaria'; // Redireciona em caso de sucesso
        }
      }
    })
    .catch(error => {
      console.error('Erro ao submeter o formulário:', error);
      alert('Erro ao criar cliente'); // Mensagem genérica de erro
    });
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

.header button, .header nav {
  margin-right: 10px;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-top: 50px; /* Adicionando margem superior para compensar o header fixo */
}

.form-container {
  background: white;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  max-width: 500px;
  width: 100%;
}

.logo {
  color: #333;
  font-size: 28px;
  font-weight: 700;
  margin-bottom: 20px;
  text-align: center;
}

.form-stylish {
  display: flex;
  flex-direction: column;
}

.row {
  display: flex;
  flex-wrap: wrap;
}

.col-md-6 {
  flex: 0 0 50%;
  max-width: 50%;
}

.col-md-12 {
  flex: 0 0 100%;
  max-width: 100%;
}

.mb-3 {
  margin-bottom: 15px;
}

.form-label {
  font-weight: 500;
  color: #333;
  margin-bottom: 8px;
  font-size: 14px;
}

.form-control {
  border-radius: 8px;
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 14px;
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
  padding: 10px 15px;
  font-size: 14px;
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

.nav-buttons {
  display: inline;
}
</style>
