<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=Hospital102", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare and execute delete statement
        $stmt = $pdo->prepare("DELETE FROM patients WHERE patient_id = ?");
        $stmt->execute([$id]);

        // Redirect back to the main patient list
        header("Location: Patients.php");
        exit;
    } else {
        echo "Invalid request. No patient ID provided.";
    }

} catch (PDOException $e) {
    echo "Error deleting patient: " . $e->getMessage();
}
?>
