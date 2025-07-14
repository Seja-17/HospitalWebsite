<?php
try {
  $pdo = new PDO("mysql:host=localhost;dbname=Hospital102", "root", "");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Get form input data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  //Prepare INSERT statement using placeholders
  $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
  
  //Bind actual values
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);

  //Execute the statement
  if ($stmt->execute()) {
    echo "<script>alert('Sign up successful! Please log in.'); window.location.href = 'index.html';</script>";
  } else {
    echo "<script>alert('Something went wrong. Try again.'); window.location.href = 'signup.html';</script>";
  }

} catch (PDOException $e) {
  //Handle duplicate email or DB error
  if ($e->errorInfo[1] == 1062) { // 1062 = duplicate entry
    echo "<script>alert('Email already registered.'); window.location.href = 'index.html';</script>";
  } else {
    echo "Database error: " . $e->getMessage();
  }
}
?>
