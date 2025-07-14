<?php
//Connect to the database
$host = 'localhost';
$dbname = 'Hospital102';
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set error reporting to exception mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Run the query
    $stmt = $pdo->query("SELECT * FROM patients");

    //Fetch all rows
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patients</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <style>
    body {
      background-color: #f4f6f8;
    }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Patients</h2>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                   <th>Patient ID</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>DOB</th>
                   <th>Gender</th>
                   <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Print rows
                foreach ($rows as $row) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>