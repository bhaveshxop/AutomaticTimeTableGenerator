<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: admin_login.php"); // Redirect to login page if not logged in
    exit();
}

// Retrieve the username from the session
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - AutoG</title>
    <link rel="icon" type="image/x-icon" href="./Images/logo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body sticky-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./Images/logo.webp" width="60" height="60" alt="">
        </a>
        <a class="navbar-brand bname" href="#">AutoG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item active">
                    <span class="nav-link">Welcome, <?php echo $username; ?>!</span>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section style="margin-left: 70px; margin-top: 100px;">
<div class="container-fluid " >
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar mt-16">
            <div class="position-sticky" style="border: 3px solid black;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active " href="#" " >
                            ADD TEACHERS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            ADD SUBJECTS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            ADD CLASSROOMS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            ALLOTMENT
                        </a>
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">THEORY</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">LAB</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CLASSROOMS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            GENERATE TIMETABLE
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            LOGOUT
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Your dashboard content goes here -->
        </main>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
