<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Form Builder</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2, #ff9a9e, #fad0c4);
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            width: 420px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            color: #fff;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: scale(1.02);
        }
        h2 {
            margin-bottom: 25px;
            font-size: 24px;
            color: #fff;
        }
        label {
            font-weight: 500;
            display: block;
            margin: 12px 0;
            text-align: left;
        }
        input[type=checkbox] {
            accent-color: #4CAF50;
            transform: scale(1.2);
            margin-right: 10px;
        }
        input[type=submit] {
            width: 100%;
            padding: 14px;
            background: #2196F3;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }
        input[type=submit]:hover {
            background: #0b7dda;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🛠 Build Your Dynamic Form</h2>
        <form method="POST" action="form.php">
            <label><input type="checkbox" name="fields[]" value="text"> Name (Text)</label>
            <label><input type="checkbox" name="fields[]" value="email"> Email</label>
            <label><input type="checkbox" name="fields[]" value="password"> Password</label>
            <label><input type="checkbox" name="fields[]" value="dropdown"> Course (Dropdown)</label>
            <label><input type="checkbox" name="fields[]" value="checkbox"> Terms & Conditions</label>
            <input type="submit" value="✨ Generate Form">
        </form>
    </div>
</body>
</html>
