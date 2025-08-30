<?php
session_start();

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Check if email exists and get firstName
    $stmt = $conn->prepare("SELECT firstName FROM registration WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->bind_result($firstName);
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->fetch();
        // ✅ Login successful
        $_SESSION['email'] = $email;
        $_SESSION['firstName'] = $firstName; // store first name in session
        header("Location: main.php"); // redirect to your books page
        exit();
    } else {
        $error = "Invalid email or password!";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Online Library</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <style>
    body {
      background: url('libr.png') no-repeat center center fixed;
      background-size: cover;
      font-family: "Segoe UI", sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
    }
    .login-card {
      background: rgba(255, 255, 255, 0.1);
      padding: 40px;
      border-radius: 20px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 400px;
      animation: fadeIn 1s ease-in-out;
    }
    h2 { margin-bottom: 20px; font-weight: bold; }
    .form-control { border-radius: 30px; padding: 15px; }
    .btn-login {
      background: linear-gradient(90deg, #6468d6ff, #ff7eb3);
      border: none; color: white; padding: 12px; border-radius: 30px; font-size: 1.1rem; transition: 0.3s;
    }
    .btn-login:hover { transform: scale(1.05); box-shadow: 0 5px 15px rgba(75, 61, 63, 0.5); }
    .text-danger { font-size: 0.9rem; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
  </style>
</head>
<body>
  <div class="login-card">
    <h2 class="text-center">🔑 Login</h2>
    <?php if (!empty($error)): ?>
      <p class="text-danger text-center"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn btn-login btn-block">Login</button>
    </form>
    <div class="mt-3 text-center">
      <small>Not registered yet? <a href="registration.php" style="color: #fff; text-decoration: underline;">Register here</a></small>
    </div>
  </div>
</body>
</html>
        