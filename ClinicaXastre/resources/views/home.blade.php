<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        <paginicial create-route="{{ route('paciente.create') }}" index-route="{{ route('paciente.index') }}"></paginicial>
    </div>
</body>
</html>
