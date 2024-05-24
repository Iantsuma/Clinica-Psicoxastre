<template>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Edição de Pacientes</h1>
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" v-model="form.nome" placeholder="Nome" required>
            </div>
            <div class="mb-3">
              <label for="cep">CEP</label>
              <input type="text" class="form-control" v-model="form.cep" id="cep" placeholder="CEP" required @blur="buscarCEP">
            </div>
            <div class="mb-3">
              <label for="rua">Rua</label>
              <input type="text" class="form-control" v-model="form.rua" id="rua" placeholder="Rua" required>
            </div>
            <div class="mb-3">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" v-model="form.bairro" id="bairro" placeholder="Bairro" required>
            </div>
            <div class="mb-3">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" v-model="form.cidade" id="cidade" placeholder="Cidade" required>
            </div>
            <div class="mb-3">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" v-model="form.estado" id="estado" placeholder="Estado" required>
            </div>
            <div class="mb-3">
              <label for="numero">Número Celular</label>
              <input type="text" class="form-control" v-model="form.numero" placeholder="Número" required>
            </div>
            <div class="mb-3">
              <label for="numero">Email</label>
              <input type="text" class="form-control" v-model="form.email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" value="Salvar">
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      updateRoute: {
        type: String,
        required: true
      },
      user: {
        type: Object,
        required: true
      }
    },
    data() {
      return {
        form: {
          nome: this.user.nome || '',
          cep: this.user.cep || '',
          rua: this.user.rua || '',
          bairro: this.user.bairro || '',
          cidade: this.user.cidade || '',
          estado: this.user.estado || '',
          numero: this.user.numero || '',
          email: this.user.email || ''
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
        fetch(this.updateRoute, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify(this.form)
        })
        .then(() => {
          window.location.href = '/psicologa'; // ou o caminho correto da sua rota home
        })
        .catch(error => {
          console.error('Erro ao submeter o formulário:', error);
        });
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    margin-top: 50px;
  }
  </style>
  