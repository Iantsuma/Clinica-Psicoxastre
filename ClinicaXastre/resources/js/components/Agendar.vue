<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="logo">Agendar</h1>
                <form @submit.prevent="submitForm" class="form-stylish">
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" id="descricao" class="form-control" v-model="form.descricao" placeholder="Descrição" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-um" value="Agendar">
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
        storeRoute: {
            type: String,
            required: true
        },
        userId: {
            type: Number,
            required: true
        },
        userName: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            form: {
                nome: this.userName,
                id_user: this.userId,
                status: 'agendado',
                descricao: ''
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
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                }
                window.location.href = '/'; // ou o caminho correto da sua rota home
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
.btn-quatro {
  background: linear-gradient(to right, #4bb543, #32CD32); /* Gradiente verde */
  color: white;
}

.btn-quatro:hover {
  background: linear-gradient(to right, #32CD32, #4bb543);
}
</style>
