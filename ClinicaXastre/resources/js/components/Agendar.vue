<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Agendar</h1>
                <form @submit.prevent="submitForm">
                    <div class="mb-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" v-model="form.nome" placeholder="Nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" v-model="form.descricao" placeholder="Descrição" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_user">ID User</label>
                        <input type="text" class="form-control" v-model="form.id_user" placeholder="ID User" required>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" v-model="form.status" placeholder="Status" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Cadastrar">
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
        }
    },
    data() {
        return {
            form: {
                nome: '',
                id_user: '',
                status: '',
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
    margin-top: 50px;
}
</style>
