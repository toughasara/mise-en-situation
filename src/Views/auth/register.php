<?php include __DIR__.'/../layouts/header.php'; ?>
<?php
require_once __DIR__.'/../../config/Database.php';
use App\Controllers\Auth\AuthControlleur;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $fullname = trim($_POST['fullname']);
    $password = trim($_POST['password']);

    $Controller = new Controller();
    $Controller->adduser($username, $fullname, $password);

} else {
    // Redirect if accessed without form submission
    header("Location: ../../views/auth/register.php");
    exit();
}
?>
<h2>Register</h2>
<!-- TODO: Add registration form with input fields for username, password, etc. -->
<!-- Add Bootstrap form classes as needed -->
<form method="post" action="../../controllers/auth/register.php">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="fullname">Fullname:</label>
        <input type="text" class="form-control" name="fullname" id="fullname" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <!-- Add other registration fields as needed -->
    <button type="submit" class="btn btn-success">Register</button>
</form>

<?php include __DIR__.'/../layouts/footer.php'; ?>
