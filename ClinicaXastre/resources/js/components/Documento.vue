<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="logo">Encaminhamento de Documentos</h1>
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
            <input type="submit" class="btn btn-um" value="Encaminhar">
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
  margin-top: 80px;
}
.logo {
  color: #ff6b6b; /* Coral color */
  font-size: 48px;
  font-weight: bold;
  margin-bottom: 30px;
  text-shadow: 2px 2px #ff8787;
  text-align: center;
}
.form-stylish {
  background: white;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.form-label {
  font-weight: bold;
  color: #555;
}
.form-control {
  border-radius: 10px;
  border: 1px solid #ddd;
  padding: 10px;
}
.form-control:focus {
  border-color: #ff6b6b;
  box-shadow: 0 0 8px rgba(255, 107, 107, 0.2);
}
.btn-um {
  background: linear-gradient(to right, #ff6b6b, #ff8787);
  color: white;
  border: none;
  border-radius: 10px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.btn-um:hover {
  background: linear-gradient(to right, #ff8787, #ff6b6b);
}
</style>
