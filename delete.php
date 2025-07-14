<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'])) {
        header("Location: delete_form.php?deleted=0");
        exit;
    }

    $patient_id = $_POST['id'];
} else {
    echo "Invalid request method.";
    exit;
}

// Check if patient exists
$stmt = $pdo->prepare("SELECT * FROM patients WHERE patient_id = ?");
$stmt->execute([$patient_id]);
$patient = $stmt->fetch();

if (!$patient) {
    header("Location: delete_form.php?deleted=0");
    exit;
}

// Delete patient
$deleteStmt = $pdo->prepare("DELETE FROM patients WHERE patient_id = ?");
$deleteStmt->execute([$patient_id]);

header("Location: delete_form.php?deleted=1");
exit;
?>
