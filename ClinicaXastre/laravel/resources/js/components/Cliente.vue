<template>
  <div class="container">
    <h1 class="logo">Área Cliente</h1>
    <div class="buttons">
      <button @click="navigateTo(createRoute)" class="btn btn-um">Agendar</button>
      <button @click="navigateTo(lerRouteWithUserId)" class="btn btn-dois">Histórico Agendamentos</button>
      <button @click="navigateTo(readRouteWithUserId)" class="btn btn-tres">Próximos Agendamentos</button>
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
  margin-top: 100px;
}
.logo {
  color: #ff6b6b; /* Coral color */
  font-size: 64px;
  font-weight: bold;
  margin-bottom: 50px;
  text-shadow: 2px 2px #ff8787;
}
.buttons {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.buttons button {
  margin: 15px;
  padding: 15px 30px;
  font-size: 18px;
  cursor: pointer;
  border: none;
  border-radius: 50px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}
.btn-um {
  background: linear-gradient(to right, #ff6b6b, #ff8787);
  color: white;
}

.btn-um:hover {
  background: linear-gradient(to right, #ff8787, #ff6b6b);
}

.btn-dois {
  background: linear-gradient(to right, #4facfe, #00f2fe);
  color: white;
}

.btn-dois:hover {
  background: linear-gradient(to right, #00f2fe, #4facfe);
}

.btn-tres {
  background: linear-gradient(to right, #3e8b7d, #3e8b7d);
  color: white;
}

.btn-tres:hover {
  background: linear-gradient(to right, #3e8b7d, #3e8b7d);
}


</style>
