# Instruções de Configuração
# Passo 1: Baixar o Projeto
Você pode baixar o arquivo zipado da branch "main" ou clonar o repositório na pasta desejada com o seguinte comando:
```
git clone https://github.com/Iantsuma/Clinica-Psicoxastre.git
```
# Passo 2: Navegue até a pasta ClinicaXastre pelo Vscode

# Passo 3: Inicializar o Docker Swarm
Para inicializar um novo Swarm no nó atual, execute o seguinte comando:
```
docker swarm init
```
# Passo 4: Construir a Imagem Docker
Para criar a imagem a partir do Dockerfile, utilize o comando:
```
docker build -t myapp_php .
```
# Passo 5: Deploy da Stack
Para finalizar a criação dos containers e utilizar o Swarm, execute o comando:
```
docker stack deploy -c docker-compose.yml myapp
```

# ElectronJS
Caso deseje executar o programa pelo app executável electronjs, entre na pasta laravel:
```
cd laravel
```
  
E após isso e com os containers executando, execute o seguinte comando:
```
npm start
```
# Encerrar Container
Para encerrar os containers ativos, basta utiliza o comando:
```
docker swarm leave --force
```


