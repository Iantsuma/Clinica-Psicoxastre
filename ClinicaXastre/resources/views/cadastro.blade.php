<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Cadastro de Pacientes</h1>
                <form action="{{ route('paciente.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP" required onblur="buscarCEP()">
                    </div>
                    <div class="mb-3">
                        <label for="rua">Rua</label>
                        <input type="text" class="form-control" name="rua" id="rua" placeholder="Rua" required>
                    </div>
                    <div class="mb-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required>
                    </div>
                    <div class="mb-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero">Número Celular</label>
                        <input type="text" class="form-control" name="numero" placeholder="Número" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function buscarCEP() {
            var cep = document.getElementById('cep').value;
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';
            
            fetch(url).then(response => response.json()).then(data => {
                if (data.erro) {
                    alert('CEP não encontrado.');
                    return;
                }
                document.getElementById('rua').value = data.logradouro;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('estado').value = data.uf;
                // Adicione aqui mais campos se necessário
            }).catch(error => alert('Falha ao buscar o CEP.'));
        }
    </script>

  </body>
</html>
