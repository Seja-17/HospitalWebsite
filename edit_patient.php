<?php
$pdo = new PDO("mysql:host=localhost;dbname=Hospital102", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch patient data by patient_id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM patients WHERE patient_id = ?");
    $stmt->execute([$id]);
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$patient) {
        echo "Patient not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $dob        = $_POST['dob'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];

    $update = $pdo->prepare("UPDATE patients SET firstName=?, lastName=?, DOB=?, gender=?, contact=? WHERE patient_id=?");
    $success = $update->execute([$first_name, $last_name, $dob, $gender, $email, $id]);

    if ($success) {
        header("Location: Patients.php");
        exit;
    } else {
        echo "Update failed!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Edit Patient</h2>
    <form method="POST">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($patient['firstName']) ?>" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($patient['lastName']) ?>" required>
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="<?= $patient['DOB'] ?>" required>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control" required>
                <option value="M" <?= $patient['gender'] === 'M' ? 'selected' : '' ?>>Male</option>
                <option value="F" <?= $patient['gender'] === 'F' ? 'selected' : '' ?>>Female</option>
                <option value="O" <?= $patient['gender'] === 'O' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($patient['contact']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Patient</button>
        <a href="Patients.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
