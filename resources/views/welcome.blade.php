<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Group Project - ICT Academy</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            text-align: center;
            max-width: 800px;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        .credits {
            margin-top: 2rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        .laravel-logo {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }
        .feature {
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="laravel-logo">🚀</div>
        <h1>Welcome to Laravel Group Project</h1>
        <p class="subtitle">ICT Academy Learning Platform</p>
        
        <div class="features">
            <div class="feature">
                <h3>🎓 Educational</h3>
                <p>Learn Laravel framework with hands-on experience</p>
            </div>
            <div class="feature">
                <h3>👥 Collaborative</h3>
                <p>Work together as a team on real projects</p>
            </div>
            <div class="feature">
                <h3>💡 Innovative</h3>
                <p>Build modern web applications with best practices</p>
            </div>
        </div>

        <div class="credits">
            <h3>Project Credits</h3>
            <p><strong>Powered by:</strong> Eng. Mohamed Mansour</p>
            <p><strong>Institution:</strong> ICT Academy</p>
            <p><strong>Framework:</strong> Laravel PHP Framework</p>
        </div>
    </div>
</body>
</html>