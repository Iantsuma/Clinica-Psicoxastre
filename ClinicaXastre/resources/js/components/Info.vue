<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="logo">Inserir Informações</h1>
                <form @submit.prevent="submitForm">
                    <div class="mb-3">
                        <label for="hora_inicio">Horário de Inicio</label>
                        <input type="text" class="form-control" v-model="form.hora_inicio" placeholder="Hora de inicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="hora_fim">Horário de Encerramento</label>
                        <input type="text" class="form-control" v-model="form.hora_fim" placeholder="Hora de Fim" required>
                    </div>
                    <div class="mb-3">
                        <label for="tema">Tema</label>
                        <input type="text" class="form-control" v-model="form.tema" placeholder="Tema" required>
                    </div>
                    <div class="mb-3">
                        <label for="avaliacao">Avaliação da Sessão</label>
                        <input type="text" class="form-control" v-model="form.avaliacao" placeholder="Avaliação" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-um" value="Inserir">
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
            console.log('Dados do formulário:', this.form);
            console.log('Rota de envio:', this.storeRoute);

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
                    // Caso a resposta não seja ok (status != 2xx)
                    throw new Error(`Erro: ${response.status} ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.message) {
                    alert(data.message);
                }
                window.location.href = '/'; // ou o caminho correto da sua rota home
            })
            .catch(error => {
                console.error('Erro ao submeter o formulário:', error);
                alert('Erro ao criar agendamento');
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
