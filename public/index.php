<?php

/*
|--------------------------------------------------------------------------
| Laravel Group Project - ICT Academy
|--------------------------------------------------------------------------
|
| This is the entry point for the Laravel Group Project.
| Powered by Eng. Mohamed Mansour for ICT Academy students.
|
*/

// For now, this is a placeholder. In a full Laravel installation,
// this would bootstrap the Laravel application.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Group Project - Setup Required</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 2rem;
            background: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: #e74c3c; }
        .code { 
            background: #f8f9fa; 
            padding: 1rem; 
            border-radius: 5px; 
            font-family: monospace;
            border-left: 4px solid #007bff;
        }
        .step {
            margin: 1rem 0;
            padding: 1rem;
            background: #e8f4f8;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Laravel Group Project</h1>
        <p><strong>ICT Academy - Powered by Eng. Mohamed Mansour</strong></p>
        
        <h2>Setup Required</h2>
        <p>To complete the Laravel installation, please follow these steps:</p>
        
        <div class="step">
            <h3>Step 1: Install Dependencies</h3>
            <div class="code">composer install</div>
        </div>
        
        <div class="step">
            <h3>Step 2: Configure Environment</h3>
            <div class="code">cp .env.example .env<br>php artisan key:generate</div>
        </div>
        
        <div class="step">
            <h3>Step 3: Start Development Server</h3>
            <div class="code">php artisan serve</div>
        </div>
        
        <p>After completing these steps, you'll have a fully functional Laravel application!</p>
        
        <hr>
        <p><small>This project is part of the ICT Academy curriculum, supervised by Eng. Mohamed Mansour.</small></p>
    </div>
</body>
</html>