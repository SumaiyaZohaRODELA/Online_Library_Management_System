<?php
// index.php
// Registration Page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Online Library</title>
  <!-- Bootstrap CSS -->
  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  />
  <style>
    body {
      background: url('back2.png') no-repeat center center/cover;
      font-family: "Segoe UI", sans-serif;
      min-height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      background: rgba(255, 255, 255, 0.95);
      border: none;
      border-radius: 40px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.25);
      animation: fadeInUp 0.8s ease;
    }
    .card-header {
      border-radius: 30px 30px 0 0;
      background: linear-gradient(90deg, #1f1429, #4b2c82);
      color: #fff;
      font-weight: bold;
      font-size: 1.3rem;
    }
    .form-control {
      border-radius: 30px;
      transition: 0.5s;
    }
    .form-control:focus {
      box-shadow: 0 0 10px rgba(75, 44, 130, 0.4);
      border-color: #4b2c82;
    }
    .btn-primary {
      background: linear-gradient(90deg, #6a11cb, #2575fc);
      border: none;
      border-radius: 20px;
      transition: transform 0.2s;
    }
    .btn-primary:hover {
      transform: scale(1.05);
    }
    .card-footer {
      background: transparent;
      border-top: none;
      font-size: 0.9rem;
    }
    a.login-link {
      color: #4b2c82;
      font-weight: bold;
      text-decoration: none;
    }
    a.login-link:hover {
      text-decoration: underline;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg">
          <div class="card-header text-center">
            <h3>📝 Create Your Account</h3>
          </div>
          <div class="card-body p-4">
            <form action="connect.php" method="POST">
              <!-- First Name -->
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="firstName"
                  placeholder="Enter your first name"
                  required
                />
              </div>
              <!-- Last Name -->
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastName"
                  name="lastName"
                  placeholder="Enter your last name"
                  required
                />
              </div>
              <!-- Gender -->
              <div class="form-group">
                <label>Gender</label><br />
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="male"
                    value="m"
                    required
                  />
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="female"
                    value="f"
                  />
                  <label class="form-check-label" for="female">Female</label>
                </div>
              </div>
              <!-- Email -->
              <div class="form-group">
                <label for="email">Email address</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  required
                />
              </div>
              <!-- Password -->
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Enter a strong password"
                  required
                />
              </div>
              <!-- Phone Number -->
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="tel"
                  class="form-control"
                  id="number"
                  name="number"
                  placeholder="Enter your phone number"
                  required
                />
              </div>
              <!-- Submit -->
              <button type="submit" class="btn btn-primary btn-block py-2">
                🚀 Register Now
              </button>
            </form>
          </div>
          <div class="card-footer text-center text-muted">
            <p>Already have an account? 
              <a href="login.php" class="login-link">Login here</a>
            </p>
            <small>&copy; <?php echo date("Y"); ?> Sumaiya Zoha Rodela</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
