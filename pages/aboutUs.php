<?php
// authentication code
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./login.php');
}

// Array of developers with their names and photos
$developers = [
    [
        'name' => 'Mrunali Sonawane',
        'photo' => '../Images/ms.jpg',
    ],
    [
        'name' => 'Varsha Patil',
        'photo' => '../Images/vp.jpg',
    ],
    [
        'name' => 'Sushma Patil',
        'photo' => '../Images/sp.jpg',
    ],
    [
        'name' => 'Rajshri Pawar',
        'photo' => '../Images/rp.jpg',
    ],
    [
        'name' => 'Ashwini Rajput',
        'photo' => '../Images/ar.jpg',
    ],
];

?>
<html>
<head>
    <title>About Us</title>
    <style>
      
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../Images/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            width: 300px;
            text-align: center;
            margin: 10px;
            background-color: rgb(206, 186, 186);
        }

        .card img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .card h3 {
            margin-top: 10px;
        }
        p{
            margin-top: 50px;
            margin-left: 20%;
            margin-right: 20%;
            font-size: 20px;
            background-color: lightcyan;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">
                <img src="../Images/logo.webp" width="34" height="36">
                TimeTable Generator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./department.php">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./class.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff.php">Staff</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./subjects.php">Subjects</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="./aboutUs.php">About us</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a href="./logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
            </div>
        </div>

    </nav>

    <div >
        <center><h1 style="margin-top : 30px" > About us </h1></center>

        <p> We are 3 rd year students  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa vel est veritatis tempora fugit ea expedita maiores neque, tenetur ad magni odio suscipit facere cumque natus dicta officiis blanditiis asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque unde, eius, magnam maiores repellat magni culpa nesciunt quibusdam veniam commodi aperiam saepe facere ad beatae autem cum quasi? Illum, nemo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam quia aliquid explicabo rem cumque odio maxime perspiciatis neque reiciendis, similique accusamus quidem sequi eaque! Tenetur eaque doloremque minima quaerat dolores.</p>
    </div>

    <center><h1 style="margin-top : 30px" > Our Team </h1></center>
    
    <div class="card-container mt-3">
        <?php foreach ($developers as $developer): ?>
            <div class="card">
                <img src="<?php echo $developer['photo']; ?>" alt="<?php echo $developer['name']; ?>">
                <h3><?php echo $developer['name']; ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
