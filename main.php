<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}

// Get user's first name
$firstName = $_SESSION['firstName'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch all books
$books = [];
$result = $conn->query("SELECT * FROM books ORDER BY id ASC");
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $books[] = $row;
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>📚 Online Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
    body {
      background: linear-gradient(to right, #75878dff, #041428ff);
      font-family: "Segoe UI", sans-serif;
      padding: 40px 20px;
    }

    .navbar {
      border-radius: 10px;
      margin-bottom: 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .library-header {
      text-align: center;
      margin-bottom: 40px;
      color: #fff;
      animation: fadeInDown 0.8s ease;
    }

    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
      position: relative;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .card img {
      height: 220px;
      object-fit: cover;
    }

    .card-body {
      text-align: center;
    }

    .card-title {
      font-weight: 600;
      font-size: 1.1rem;
    }

    .btn {
      border-radius: 10px;
      padding: 8px 15px;
      font-size: 0.9rem;
    }

    .book-number {
      position: absolute;
      top: 10px;
      left: 10px;
      background: #ffc107;
      color: #000;
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.85rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-40px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">📚 Welcome, <?php echo htmlspecialchars($firstName); ?></a>
    <div class="ml-auto">
      <a href="index.php" class="btn btn-light btn-sm mr-2">🏠 Home</a>
      <a href="review.php" class="btn btn-warning btn-sm">✍️ Review/Complain</a>
      <a href="logout.php" class="btn btn-danger btn-sm ml-2">🚪 Logout</a>
    </div>
  </nav>

  <div class="container">
    <div class="library-header">
      <h1>📖 Welcome to the Online Library</h1>
      <p class="lead">Read and download your favorite books anytime</p>
    </div>

    <div class="row">
      <?php
      $counter = 1;
      foreach ($books as $book) {
        echo '<div class="col-md-4 mb-4">
    <div class="card">
        <span class="book-number">#' . $counter . '</span>
        <img src="' . htmlspecialchars($book['image']) . '" class="card-img-top" alt="' . htmlspecialchars($book['title']) . '">
        <div class="card-body">
            <h5 class="card-title">' . htmlspecialchars($book['title']) . '</h5>
            <a href="' . htmlspecialchars($book['read_link']) . '" target="_blank" class="btn btn-primary btn-sm">📖 Read</a>
            <a href="' . htmlspecialchars($book['download_link']) . '" download class="btn btn-outline-secondary btn-sm">⬇️ Download</a>
        </div>
    </div>
    </div>';
        $counter++;
      }
      ?>
    </div>
  </div>
</body>

</html>