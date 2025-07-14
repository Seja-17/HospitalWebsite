<!DOCTYPE html>
<html>
<head>
    <title>Delete Patient by ID</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Delete Patient by ID</h2>

    <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    Patient deleted successfully!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>


    <form method="POST" action="delete.php" onsubmit="return confirm('Are you sure you want to delete this patient?');">
        <div class="form-group">
            <label for="id">Enter Patient ID:</label>
            <input type="number" name="id" id="id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger">Delete</button>
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
    }, 2000);
  }
</script>
</html>
