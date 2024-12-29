<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .btn-submit,
        .btn-signup {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
        .btn-signup {
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            display: block;
        }
        .btn-signup:hover {
            background-color: #1976D2;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Sign In</h2>
        <?php
        session_start();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Add your authentication logic here
            // This is just a basic example
            if ($username && $password) {
                // Replace with actual database authentication
                if ($username === "admin" && $password === "password") {
                    $_SESSION['username'] = $username;
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error = "Invalid username or password";
                }
            } else {
                $error = "Please fill in all fields";
            }
        }
        ?>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-submit">Sign In</button>
        </form>
        <a href="up.php" class="btn-signup">Sign Up</a>
    </div>
</body>
</html>
