<?php
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $dob = $_POST['dob'];
    $gender = htmlspecialchars($_POST['gender']);
    $contact = htmlspecialchars($_POST['contact']);

    $stmt = $pdo->prepare("INSERT INTO patients (firstName, lastName, DOB, gender, contact) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $dob, $gender, $contact]);

    header("Location: add.php?success=1"); 
    exit;
}
$showSuccess = isset($_GET['success']) && $_GET['success'] == 1;
?>


<!DOCTYPE html>
<html>
<head>
  <title>Add Patient</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
  <h2 class="mb-4">Add New Patient</h2>
  
  <?php if ($showSuccess): ?>
  <div class="alert alert-success">
  Patient added successfully!
  </div>
<?php endif; ?>

  <form method="POST" action="">  <!--Data sent to the same page -->
    <div class="form-group">
      <label for="firstName">First Name:</label>
      <input type="text" name="firstName" id="firstName" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="lastName">Last Name:</label>
      <input type="text" name="lastName" id="lastName" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" name="dob" id="dob" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="gender">Gender:</label>
      <select name="gender" id="gender" class="form-control" required>
        <option value="">-- Select Gender --</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
        <option value="O">Other</option>
      </select>
    </div>

    <div class="form-group">
      <label for="contact">Email:</label>
      <input type="email" name="contact" id="contact" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Add Patient</button>
    <a href="Patients1.html" class="btn btn-secondary">Cancel</a>
  </form>
</body>
<script>
  const alert = document.querySelector('.alert');

  if (alert) {
    // Wait 3 seconds before hiding and then redirecting
    setTimeout(() => {
      alert.style.display = 'none';

      // Redirect to another page after alert disappears
      window.location.href = 'Patients.php'; // change to your target page
    }, 2000);
  }
</script>

</html>
