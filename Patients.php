<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px 0;
    }
    .action-btn {
      margin-right: 5px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="top-bar">
      <h2>Patient Management</h2>
      <a href="add.php" class="btn btn-primary">+ New</a>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="thead-dark">
        <tr>
                   <th>Patient ID</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>DOB</th>
                   <th>Gender</th>
                   <th>Email</th>
                   <th>Edit / Delete</th>
        </tr>
      </thead>
      <tbody>
  <?php
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=Hospital102", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM patients");
    $stmt1 = $pdo->query("SELECT count(*) from patients");
    $count = $stmt1->fetchColumn();

    if ($stmt->rowCount() > 0) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
        <td>{$row['patient_id']}</td>
        <td>{$row['firstName']}</td>
        <td>{$row['lastName']}</td>
        <td>{$row['DOB']}</td>
        <td>{$row['gender']}</td>
        <td>{$row['contact']}</td>
        <td>
          <a href='edit_patient.php?id={$row['patient_id']}' class='btn btn-sm btn-warning action-btn'>Edit</a>
          <a href='delete_patient.php?id={$row['patient_id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this patient?\")'>Delete</a>
        </td>
      </tr>";

      }
    } else {
      echo "<tr><td colspan='7'>No patients found</td></tr>";
    }
  } catch (PDOException $e) {
    echo "<tr><td colspan='7'>Connection failed: " . $e->getMessage() . "</td></tr>";
  }

  echo '<br>';
  echo "<p class='font-weight-bold' style='font-size: 1.5rem;'>Total Patients: $count</p>";


  $pdo = null;
  ?>
</tbody>


    </table>
  </div>
</body>
</html>
