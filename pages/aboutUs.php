<?php
// Array of developers with their names and photos
$developers = [
    [
        'name' => 'John Doe',
        'photo' => '../Images/ms.jpg',
    ],
    [
        'name' => 'Jane Smith',
        'photo' => '../Images/vp.jpg',
    ],
    [
        'name' => 'Mike Johnson',
        'photo' => '../Images/sp.jpg',
    ],
    [
        'name' => 'Sarah Williams',
        'photo' => '../Images/rp.jpg',
    ],
    [
        'name' => 'David Brown',
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
        </div>

    </nav>

    <div >
        <center><h1 > About us </h1></center>
        
    </div>
    
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
