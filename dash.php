<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Get user name from session
$name = $_SESSION['user_name'];

// Determine the page content based on the query parameter
$q = isset($_GET['q']) ? intval($_GET['q']) : 0;
$content = '';

switch ($q) {
    case 0:
        $content = "<h2>Welcome to the Dashboard</h2><p>This is your homepage.</p>";
        break;
    case 1:
        $content = "<h2>Users</h2><p>Manage users here.</p>";
        break;
    case 2:
        $content = "<h2>Ranking</h2><p>View rankings here.</p>";
        break;
    case 3:
        $content = "<h2>Add Survey</h2><p>Add a new survey here.</p>";
        break;
    case 4:
        $content = "<h2>Remove Survey</h2><p>Remove existing surveys here.</p>";
        break;
    default:
        $content = "<h2>404 Error</h2><p>Page not found!</p>";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Online Survey Management</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/dark-dashboard.css">
</head>
<body>
<div class="header">
  <div class="row align-items-center">
    <div class="col-lg-6">
      <span class="logo">Online Survey Management System</span>
    </div>
    <div class="col-lg-6 text-end">
      <span class="user-info">Hello, <strong><?php echo htmlspecialchars($name); ?></strong> | 
      <a href="logout.php" class="logout-btn">Logout</a></span>
    </div>
  </div>
</div>

<!-- Navigation Menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link <?php echo ($q == 0 ? 'active' : ''); ?>" href="dashboard.php?q=0">Home</a></li>
        <li class="nav-item"><a class="nav-link <?php echo ($q == 1 ? 'active' : ''); ?>" href="dashboard.php?q=1">Users</a></li>
        <li class="nav-item"><a class="nav-link <?php echo ($q == 2 ? 'active' : ''); ?>" href="dashboard.php?q=2">Ranking</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Surveys</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="dashboard.php?q=3">Add Survey</a></li>
            <li><a class="dropdown-item" href="dashboard.php?q=4">Remove Survey</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
  <div class="dashboard">
    <?php echo $content; ?>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
