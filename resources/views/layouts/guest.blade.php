<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SAAHDEL ONG') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
            :root {
                --primary-green: #34C759;
                --dark-green: #2E865F;
                --primary-blue: #4682B4;
                --light-bg: #f7f7f7;
            }
            
            body {
                background-color: var(--light-bg);
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            .auth-logo {
                height: 60px;
                margin-bottom: 20px;
            }
            
            .auth-card {
                border: none;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
                background: white;
                width: 100%;
                max-width: 28rem;
            }
            
            .auth-header {
                background-color: var(--primary-blue);
                color: white;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                padding: 20px;
                text-align: center;
            }
            
            .btn-primary {
                background-color: var(--primary-green);
                border-color: var(--primary-green);
            }
            
            .btn-primary:hover {
                background-color: var(--dark-green);
                border-color: var(--dark-green);
            }
            
            .link-primary {
                color: var(--primary-blue);
            }
            
            .link-primary:hover {
                color: var(--dark-green);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <!-- Logo personnalisé SAAHDEL -->
                <a href="/">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo SAAHDEL" class="auth-logo">
                </a>
            </div>

            {{ $slot }}
        </div>
    </body>
</html>