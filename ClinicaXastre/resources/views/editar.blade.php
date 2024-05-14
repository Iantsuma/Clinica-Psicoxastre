<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Edição de Pacientes</h1>
                <form action="{{ route('paciente.alterar',['paciente'=>$paciente->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="mb-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{$paciente->nome}}">
                    </div>
                    <div class="mb-3">
                        <label for="nome">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="{{$paciente->endereco}}">
                    </div>
                    <div class="mb-3">
                        <label for="nome">Número</label>
                        <input type="text" class="form-control" name="numero" value="{{$paciente->numero}}">
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

  </body>
</html>