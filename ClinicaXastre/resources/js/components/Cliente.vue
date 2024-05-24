<template>
  <div class="container">
    <h1 class="logo">Clínica</h1>
    <div class="buttons">
      <button @click="navigateTo(createRoute)">Agendar</button>
      <button @click="navigateTo(lerRouteWithUserId)">Histórico Agendamentos</button>
      <button @click="navigateTo(readRouteWithUserId)">Próximos Agendamentos</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    createRoute: String,
    lerRoute: String,
    readRoute: String,
    userId: Number,
  },
  computed: {
    lerRouteWithUserId() {
      return `${this.lerRoute}?user_id=${this.userId}`;
    },
    readRouteWithUserId() {
      return `${this.readRoute}?user_id=${this.userId}`;
    }
  },
  methods: {
    navigateTo(url) {
      window.location.href = url;
    }
  }
};
</script>

<style scoped>
.container {
  text-align: center;
  margin-top: 50px;
}
.logo {
  color: #007BFF; /* Azul bonito */
  font-size: 48px;
  margin-bottom: 20px;
}
.buttons button {
  margin: 10px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  background-color: #007BFF;
  color: white;
  border: none;
  border-radius: 5px;
}
.buttons button:hover {
  background-color: #0056b3;
}
</style>
