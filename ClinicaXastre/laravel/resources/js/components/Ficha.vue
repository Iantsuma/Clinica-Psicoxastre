<template>
  <div class="full-page">
    <div class="header">
      <button @click="goBack" class="btn btn-secondary">Voltar</button>
      <button @click="logOut" class="btn btn-danger">Logout</button>
    </div>
    <div class="container">
      <div class="content">
        <h1 class="logo">Fichas Pacientes</h1>
        <div class="buttons">
          <button @click="navigateTo(lerRoute)" class="btn btn-primary">Pacientes</button>
          <button @click="navigateTo(sessoesRoute)" class="btn btn-tertiary">Sessões</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    lerRoute: String,
    sessoesRoute: String,
  },
  methods: {
    navigateTo(url) {
      window.location.href = url;
    },
    goBack() {
      window.location.href = '/psicologa';
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

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-grow: 1; /* Permite que a seção ocupe o espaço restante */
}

.content {
  text-align: center;
  background: #fff;
  padding: 50px;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 100%;
}

.logo {
  color: #333;
  font-size: 40px;
  font-weight: 700;
  margin-bottom: 40px;
}

.buttons {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.buttons button {
  padding: 15px 30px;
  font-size: 18px;
  cursor: pointer;
  border: none;
  border-radius: 25px;
  transition: all 0.3s ease;
}

.btn-primary {
  background-color: #007bff;
  color: white;
}

.btn-primary:hover {
  background-color: #0056b3;
  transform: translateY(-3px);
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

.btn-tertiary {
  background-color: #28a745;
  color: white;
}

.btn-tertiary:hover {
  background-color: #218838;
  transform: translateY(-3px);
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
