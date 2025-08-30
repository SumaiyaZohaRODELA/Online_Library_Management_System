<?php
// start.php
// Entry page for Online Library
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Online Library</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: url('back.png') no-repeat center center/cover;
      font-family: "Segoe UI", sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #030303ff;
      text-align: center;
    }
    .welcome-card {
      background: rgba(255, 255, 255, 0.1);
      padding: 50px;
      border-radius: 20px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      animation: fadeIn 1s ease-in-out;
    }
    h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      font-weight: 700;
    
    }
    .btn-custom {
      border-radius: 30px;
      padding: 12px 30px;
      font-size: 1.1rem;
      margin: 10px;
      transition: 0.3s;
    }
    .btn-register {
      background: linear-gradient(90deg, #667eea, #764ba2);
      border: none;
      color: white;
    }
    .btn-register:hover {
      transform: scale(1.05);
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.5);
    }
    .btn-login {
      background: linear-gradient(90deg, #43cea2, #185a9d);
      border: none;
      color: white;
    }
    .btn-login:hover {
      transform: scale(1.05);
      box-shadow: 0 5px 15px rgba(67, 206, 162, 0.5);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="welcome-card">
    <h1>📚 Welcome to Online Library</h1>
    <p>Your gateway to knowledge and endless reading.</p>
    <div class="mt-4">
      <a href="registration.php" class="btn btn-custom btn-register">📝 Register New</a>
      <a href="login.php" class="btn btn-custom btn-login">🔑 Already Registered? Login</a>
    </div>
  </div>
</body>
</html>
