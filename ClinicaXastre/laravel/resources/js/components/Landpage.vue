<template>
    <div>
        <section class="hero-section">
            <div class="hero-content">
                <h1>Seja bem vindo à GlobalMedic</h1>
                <p>A referência para a sua saúde</p>
                <button class="btn btn-primary" @click="goToLogin">Faça seu Login</button>
            </div>
            <div class="hero-image">
                <img src="/public/images/imagem.png" alt="Imagem de boa-vindas">
            </div>
        </section>

        <section class="section" id="services">
            <div class="container">
                <h2 class="section-title">Descrição dos Serviços</h2>
                <p class="section-description">
                    Oferecemos uma ampla gama de serviços médicos para garantir sua saúde e bem-estar.
                    Desde consultas de rotina até tratamentos especializados.
                </p>
            </div>
        </section>

        <section class="section" id="about">
            <div class="container">
                <h2 class="section-title">Sobre a Clínica</h2>
                <p class="section-description">
                    Nossa clínica está comprometida com a excelência em atendimento médico. Temos uma equipe
                    de profissionais altamente qualificados e dedicados a fornecer o melhor cuidado possível.
                </p>
            </div>
        </section>

        <section class="section testimonials" id="testimonials">
            <div class="container">
                <h2 class="section-title">Depoimentos de Pacientes</h2>
                <div class="testimonial-item">
                    <p>"Excelente atendimento e profissionais muito competentes. Recomendo a todos!"</p>
                    <div class="author">- João Silva</div>
                </div>
                <div class="testimonial-item">
                    <p>"A clínica me ajudou muito no meu tratamento. Sou muito grata a toda a equipe."</p>
                    <div class="author">- Maria Oliveira</div>
                </div>
            </div>
        </section>

        <section class="section" id="contact">
            <div class="container">
                <h2 class="section-title">Formulário de Contato</h2>
                <form class="contact-form" @submit.prevent="submitForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" v-model="form.nome" placeholder="Seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Seu email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="message" v-model="form.message" rows="3" placeholder="Sua mensagem"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </section>

        <section class="section" id="contact-info">
            <div class="container">
                <h2 class="section-title">Informações de Contato</h2>
                <div class="contact-info">
                    <p><strong>Telefone:</strong> (19) 1334-5678</p>
                    <p><strong>Email:</strong> contato@globalmedic.com.br</p>
                    <p><strong>Endereço:</strong> Rua Antônio Dias da Costa, 147, São Paulo, SP</p>
                    <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, 8h às 18h</p>
                </div>
            </div>
        </section>

        <!-- Custom Modal for Success -->
        <div v-if="showSuccessModal" class="custom-modal">
            <div class="custom-modal-content">
                <span class="close-button" @click="closeSuccessModal">&times;</span>
                <p>Mensagem enviada com sucesso!</p>
                <button @click="closeSuccessModal" class="btn btn-primary">OK</button>
            </div>
        </div>

        <!-- Custom Modal for Error -->
        <div v-if="showErrorModal" class="custom-modal">
            <div class="custom-modal-content">
                <span class="close-button" @click="closeErrorModal">&times;</span>
                <p>{{ errorMessage }}</p>
                <button @click="closeErrorModal" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LandPage',
    data() {
        return {
            form: {
                nome: '',
                email: '',
                message: ''
            },
            showSuccessModal: false,
            showErrorModal: false,
            errorMessage: ''
        };
    },
    methods: {
        goToLogin() {
            window.location.href = '/login';
        },
        async submitForm() {
            try {
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(this.form)
                });
                
                if (response.ok) {
                    this.showSuccessModal = true;
                    this.form.nome = '';
                    this.form.email = '';
                    this.form.message = '';
                } else {
                    const errorData = await response.json();
                    this.errorMessage = errorData.message || 'Erro ao enviar a mensagem.';
                    this.showErrorModal = true;
                }
            } catch (error) {
                this.errorMessage = 'Erro ao enviar a mensagem.';
                this.showErrorModal = true;
            }
        },
        closeSuccessModal() {
            this.showSuccessModal = false;
        },
        closeErrorModal() {
            this.showErrorModal = false;
        }
    }
}
</script>

<style scoped>
/* Adicione estilos adicionais aqui, se necessário */

.logout-button {
    bottom: 20px;
    right: 20px;
}

/* Custom modal styles */
.custom-modal {
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.custom-modal-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    max-width: 400px;
    width: 100%;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    cursor: pointer;
}
</style>
