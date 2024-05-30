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
                <form class="contact-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" placeholder="Seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Seu email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Sua mensagem"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </section>

        <section class="section" id="contact-info">
            <div class="container">
                <h2 class="section-title">Informações de Contato</h2>
                <div class="contact-info">
                    <p><strong>Telefone:</strong> (11) 1234-5678</p>
                    <p><strong>Email:</strong> contato@clinicamedica.com.br</p>
                    <p><strong>Endereço:</strong> Rua Exemplo, 123, São Paulo, SP</p>
                    <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, 8h às 18h</p>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'LandPage',
    methods: {
        goToLogin() {
            window.location.href = '/login';
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
</style>
