<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Clínica - Página Inicial</title>
    @vite(['resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .section {
            padding: 60px 0;
        }

        .section-title {
            font-size: 36px;
            margin-bottom: 30px;
            color: #007bff;
        }

        .section-description {
            font-size: 18px;
            color: #6c757d;
        }

        .contact-form .form-control, .contact-form button {
            border-radius: 0;
        }

        .contact-info {
            font-size: 18px;
            color: #333;
        }

        .contact-info p {
            margin: 0;
        }

        .testimonials {
            background-color: #f8f9fa;
        }

        .testimonial-item {
            margin-bottom: 30px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .testimonial-item p {
            font-size: 16px;
            color: #333;
        }

        .testimonial-item .author {
            margin-top: 15px;
            font-size: 14px;
            font-style: italic;
            color: #007bff;
        }

        .hero-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 60px;
            background-color: #e9f5f2;
        }

        .hero-content {
            max-width: 50%;
        }

        .hero-content h1 {
            font-size: 48px;
            color: #333;
        }

        .hero-content p {
            font-size: 20px;
            color: #666;
            margin-top: 10px;
        }

        .hero-content .btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <land-page></land-page>
    </div>
</body>
</html>
