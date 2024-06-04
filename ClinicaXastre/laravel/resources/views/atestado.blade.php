<!DOCTYPE html>
<html>
<head>
    <title>Atestado Médico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .content {
            margin: 20px;
        }
        .signature {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>ATESTADO MÉDICO</h1>
        <p>Nós, da clinica GlobalMedic, certificamos que o paciente <strong>{{ $user->nome }}</strong> foi atendido em nosso consultório e necessita de repouso e afastamento de suas atividades habituais por motivos de saúde. O período de afastamento recomendado é de 7 dias, a partir desta data.</p>
        <p>Este documento é emitido para os devidos fins que se fizerem necessários.</p>
        <div class="signature">
            <p>Atenciosamente,</p>
            <p>Clinica GlobalMedic<br>
            Especializada em Psicologia</p>
        </div>
    </div>
</body>
</html>
