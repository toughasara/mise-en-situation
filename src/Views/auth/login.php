<?php include __DIR__.'/../layouts/header.php';?>

<?php 
require_once __DIR__.'/../../config/Database.php';
use App\Controllers\Auth\AuthControlleur;


// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $Controller = new Controller();
    $Controller->loginuser($username, $password);

} else {
    // Redirect if accessed without form submission
    // header("Location: ../../views/auth/login.php");
    // exit();
}
?>
<h2>Login</h2>
<!-- TODO: Add login form with input fields for username and password -->
<!-- Add Bootstrap form classes as needed -->
<form method="post" action="../../controllers/auth/login.php">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php include __DIR__.'/../layouts/footer.php'; ?>
