<?php
session_start();
require_once('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Authentication successful
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Redirect to the dashboard or any other page
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid username or password.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - AutoG</title>
    <link rel="icon" type="image/x-icon" href="./Images/logo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body class="bg-light">

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="form-outline mb-4">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control form-control-lg" required />
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="typePasswordX-2">Password</label>
                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" required />
              </div>

              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>

            <?php
            if (isset($error_message)) {
                echo '<div class="text-danger mt-3">' . $error_message . '</div>';
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
