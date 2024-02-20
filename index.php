
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoG</title>
    <link rel="icon" type="image/x-icon" href="./Images/logo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="script" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                <li class="nav-item">
                    <a class=" nav-link active " aria-current="page" href="./index.html">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="./about.html">About</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link active" href="./contact.html">Contact us</a>
                </li>
                </ul>
                <button class="btn btn-pr
                imary" id="loginButton" >Login</button>  
            </div>
            </div>
        </nav>

        <script>

            document.getElementById("loginButton").addEventListener("click", function() {
                window.location.href = "admin_login.php";
            });
        </script>
        
  </body>
</html>