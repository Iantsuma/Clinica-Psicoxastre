<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem de Contato - GlobalMedic</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #333333;
            font-size: 20px;
            margin-top: 0;
        }

        .content p {
            color: #666666;
            font-size: 16px;
            line-height: 1.5;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
            border-radius: 0 0 5px 5px;
        }

        .footer p {
            color: #666666;
            font-size: 14px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>GlobalMedic</h1>
        </div>
        <div class="content">
            <h2>Nova Mensagem de Contato</h2>
            <p><strong>Nome:</strong> {{ $data['fromName'] }}</p>
            <p><strong>Email:</strong> {{ $data['fromEmail'] }}</p>
            <p><strong>Mensagem:</strong></p>
            <p>{{ $data['message'] }}</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 GlobalMedic. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>
