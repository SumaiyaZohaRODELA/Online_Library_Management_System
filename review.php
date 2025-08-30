<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'test'); // Adjust DB credentials
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Get user first name (optional)
$user_email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT firstName FROM registration WHERE email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$stmt->bind_result($firstName);
$stmt->fetch();
$stmt->close();

// Handle form submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $review = $_POST['review'];

    $stmt = $conn->prepare("INSERT INTO reviews (email, review_text) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_email, $review);
    if ($stmt->execute()) {
        $message = "✅ Your review/complaint has been submitted successfully!";
    } else {
        $message = "❌ Error submitting your review. Please try again.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>✍️ Review / Complain - Online Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4b6cb7, #182848);
            font-family: "Segoe UI", sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .review-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 500px;
        }
        textarea {
            border-radius: 15px;
            padding: 15px;
            width: 100%;
            resize: none;
        }
        .btn-submit {
            background: linear-gradient(90deg, #ff6a00, #ee0979);
            border: none;
            color: white;
            border-radius: 30px;
            padding: 12px;
            font-size: 1.1rem;
            width: 100%;
            transition: 0.3s;
        }
        .btn-submit:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 105, 0, 0.5);
        }
        .message {
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="review-card">
        <h3 class="text-center mb-3">✍️ Hello, <?php echo htmlspecialchars($firstName); ?>! Submit your Review/Complain</h3>

        <?php if($message != ""): ?>
            <p class="message text-center"><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <textarea name="review" rows="6" placeholder="Write your review or complain here..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">Submit</button>
        </form>
        <div class="text-center mt-3">
            <a href="main.php" class="btn btn-light btn-sm">🏠 Back to Library</a>
        </div>
    </div>
</body>
</html>
