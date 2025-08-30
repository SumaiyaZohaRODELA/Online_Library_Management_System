<?php
// success.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Registration Successful</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: "Segoe UI", sans-serif;
    }

    .success-card {
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      text-align: center;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      max-width: 450px;
      width: 100%;
      animation: fadeInUp 0.8s ease;
    }

    .success-card h2 {
      color: #28a745;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .success-card p {
      font-size: 1rem;
      color: #555;
      margin-bottom: 25px;
    }

    .success-card .btn {
      border-radius: 12px;
      padding: 12px 20px;
      font-size: 1rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .success-card .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <div class="success-card">
    <div class="mb-3">
      <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="success" width="80">
    </div>
    <h2>🎉 Registration Successful!</h2>
    <p>Welcome! Your account has been created successfully.</p>
    <a href="main.php" class="btn btn-primary btn-block">📚 Go to Library</a>
    <a href="index.php" class="btn btn-outline-secondary btn-block mt-2">🏠 Back to Home</a>
  </div>
</body>

</html>