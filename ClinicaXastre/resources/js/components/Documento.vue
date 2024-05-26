<template>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Encaminhamento de Documentos</h1>
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label for="encaminhamentos">Encaminhamentos</label>
              <input type="text" class="form-control" v-model="form.encaminhamentos" placeholder="Encaminhamento">
            </div>
            <div class="mb-3">
              <label for="atestados">Atestados</label>
              <input type="text" class="form-control" v-model="form.atestados" placeholder="Atestado">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" value="Encaminhar">
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
      editdocRoute: {
        type: String,
        required: true
      },
      agenda: {
        type: Object,
        required: true
      }
    },
    data() {
      return {
        form: {
          encaminhamentos: this.agenda.encaminhamentos || '',
          atestados: this.agenda.atestados || ''
        }
      };
    },
    methods: {
      submitForm() {
        fetch(this.editdocRoute, {
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
  