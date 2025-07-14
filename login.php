<?php
try {
  $pdo = new PDO("mysql:host=localhost;dbname=Hospital102", "root", "");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $email = $_POST['email'];
  $password = $_POST['password'];

  // SELECT query using placeholders
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  //Fetch user from database
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    //Verify the hashed password
    if (password_verify($password, $user['password'])) {
        // Set cookie for 1 day 
        setcookie("user_email", $email, time() + 86400, "/");
        header("Location: First.php");
        exit();
    }
    
    else {
      // Incorrect password
      echo "<script>alert('Incorrect password'); window.location.href = 'index.html';</script>";
    }
  } else {
    // Email not found
    echo "<script>alert('Email not registered'); window.location.href = 'index.html';</script>";
  }

} catch (PDOException $e) {
  echo "Database error: " . $e->getMessage();
}
?>


