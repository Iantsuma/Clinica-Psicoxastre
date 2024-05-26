<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Inserir Informações</h1>
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
                        <input type="submit" class="btn btn-success" value="Inserir">
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
    margin-top: 50px;
}
</style>
