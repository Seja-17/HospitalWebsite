<?php
require 'db.php'; 

//Check if ID is passed
if (!isset($_GET['id'])) {
    echo "Patient ID not provided.";
    exit;
}

$patient_id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM patients WHERE patient_id = ?");
$stmt->execute([$patient_id]);
$patient = $stmt->fetch();

if (!$patient) {
    echo "Patient not found.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $dob = $_POST['dob'];
    $gender = htmlspecialchars($_POST['gender']);
    $contact = htmlspecialchars($_POST['contact']);

    $updateStmt = $pdo->prepare("UPDATE patients SET firstName = ?, lastName = ?, DOB = ?, gender = ?, contact = ? WHERE patient_id = ?");
    $updateStmt->execute([$firstName, $lastName, $dob, $gender, $contact, $patient_id]);

    header("Location:edit.php?id=$patient_id&success=1");
    exit;
}
$showSuccess = isset($_GET['success']) && $_GET['success'] == 1;
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Edit Patient: ID <?= htmlspecialchars($patient_id) ?></h2>

 <?php if ($showSuccess): ?>
  <div class="alert alert-success">
  Patient updated successfully!
  </div>
<?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="firstName" value="<?= htmlspecialchars($patient['firstName']) ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lastName" value="<?= htmlspecialchars($patient['lastName']) ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="date" name="dob" value="<?= $patient['DOB'] ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <select name="gender" class="form-control" required>
                <option value="M" <?= $patient['gender'] === 'M' ? 'selected' : '' ?>>Male</option>
                <option value="F" <?= $patient['gender'] === 'F' ? 'selected' : '' ?>>Female</option>
                <option value="O" <?= $patient['gender'] === 'O' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="contact" value="<?= htmlspecialchars($patient['contact']) ?>" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Patient</button>
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
      window.location.href = 'Patients1.html'; // change to your target page
    }, 3000);
  }
</script>
</html>
