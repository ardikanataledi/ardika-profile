<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otta Project Logo</title>
    <style>
        body {
            margin: 0;
            padding: 40px;
            background: white;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .logo-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .logo-main {
            display: flex;
            align-items: center;
            gap: 30px;
        }
        .logo-symbol {
            width: 80px;
            height: 80px;
            border: 4px solid #4ecdc4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: white;
        }
        .dollar-sign {
            font-size: 40px;
            font-weight: bold;
            color: #4ecdc4;
            font-family: 'Arial', sans-serif;
        }
        .logo-text {
            display: flex;
            flex-direction: column;
        }
        .company-name {
            font-size: 48px;
            font-weight: bold;
            color: #4ecdc4;
            margin: 0;
            letter-spacing: 2px;
        }
        .project-text {
            font-size: 18px;
            color: #666;
            margin: 5px 0 0 0;
            letter-spacing: 1px;
        }
        .tagline {
            font-size: 14px;
            color: #999;
            margin: 15px 0 0 0;
            letter-spacing: 0.5px;
        }
        
        /* Version dengan background transparan */
        .transparent-bg {
            background: transparent;
            box-shadow: none;
        }
        
        /* Versi horizontal compact */
        .compact-version {
            margin-top: 60px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .compact-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .compact-symbol {
            width: 50px;
            height: 50px;
            border: 3px solid #4ecdc4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
        }
        
        .compact-dollar {
            font-size: 24px;
            font-weight: bold;
            color: #4ecdc4;
        }
        
        .compact-text {
            font-size: 28px;
            font-weight: bold;
            color: #4ecdc4;
            margin: 0;
        }
        
        .version-label {
            text-align: center;
            margin: 30px 0 10px 0;
            font-size: 16px;
            color: #666;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div>
        <div class="version-label">OTTA PROJECT LOGO - Main Version</div>
        <div class="logo-container">
            <div class="logo-main">
                <div class="logo-symbol">
                    <div class="dollar-sign">$</div>
                </div>
                <div class="logo-text">
                    <h1 class="company-name">OTTA</h1>
                    <p class="project-text">PROJECT</p>
                    <p class="tagline">Technology • Creative • Innovation</p>
                </div>
            </div>
        </div>
        
        <div class="version-label">Compact Version</div>
        <div class="compact-version">
            <div class="compact-logo">
                <div class="compact-symbol">
                    <div class="compact-dollar">$</div>
                </div>
                <h2 class="compact-text">OTTA PROJECT</h2>
            </div>
        </div>
    </div>
</body>
</html>