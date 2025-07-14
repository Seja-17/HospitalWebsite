<?php
require 'db.php';

if (!isset($_GET['id'])) {
    echo "No patient ID provided.";
    exit;
}

$patient_id = $_GET['id'];

// Check if the patient exists
$stmt = $pdo->prepare("SELECT COUNT(*) FROM patients WHERE patient_id = ?");
$stmt->execute([$patient_id]);
$count = $stmt->fetchColumn();

if ($count > 0) {
    // If patient exists, redirect to edit.php
    header("Location:edit.php?id=" . $patient_id);
    exit;
} else {
    // If not found, show error
    echo "<h2>Patient ID $patient_id not found.</h2>";
    echo '<a href="ask-id.html">Try Again</a>';
}
?>

