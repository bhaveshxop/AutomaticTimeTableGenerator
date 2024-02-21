<?php
include '../utils/dbcon.php';

function addStaff($conn, $staffName, $shortName)
{
    $query = "INSERT INTO staff (staff_name, short_name) VALUES ('$staffName', '$shortName')";
    return mysqli_query($conn, $query);
}

function deleteStaff($conn, $shortName)
{
    $query = "DELETE FROM staff WHERE short_name = '$shortName'";
    return mysqli_query($conn, $query);
}

if (isset($_POST['addStaff'])) {
    $staffName = $_POST['staffName'];
    $shortName = $_POST['shortName'];
    addStaff($conn, $staffName, $shortName);
}

if (isset($_POST['deleteStaff'])) {
    $shortNameToDelete = $_POST['deleteStaff'];
    deleteStaff($conn, $shortNameToDelete);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">
                <img src="../Images/logo.webp" width="34" height="36">
                TimeTable</a>
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
                        <a class="nav-link" href="./class.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./subjects.php">Subjects</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="head row">
            <h2 class="m-0 col-md-6">Staff List</h2>
            <!--
            <div class="col-md-6">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div> -->
        </div>
        <div class="content">
            <form method="post" class="row g-0 my-3">
                <!-- Staff name -->
                <div class="col-md-6 pe-2">
                    <input type="text" class="form-control" name="staffName" placeholder="Staff name" required>
                </div>

                <!-- Short name -->
                <div class="col-md-4 pe-2">
                    <input type="text" class="form-control" name="shortName" placeholder="Short name" required>
                </div>

                <button type="submit" name="addStaff" class="btn col btn-success col-md-2">Add Staff</button>

            </form>

            <div className="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. no</th>
                            <th scope="col">Staff name</th>
                            <th scope="col">Short name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM staff");
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $count . '</th>';
                            echo '<td scope="row">' . $row['staff_name'] . '</td>';
                            echo '<td scope="row">' . $row['short_name'] . '</td>';
                            echo '<td>';
                            echo '<button type="button" class="btn btn-primary btn-sm">Update</button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-danger btn-sm" onclick="deleteStaff(\'' . $row['short_name'] . '\')">Delete</button>';
                            echo '</td>';
                            echo '</tr>';
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        function deleteStaff(shortName) {
            if (confirm('Are you sure you want to delete this staff member?')) {
                var form = document.createElement('form');
                form.method = 'post';
                form.action = '';
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'deleteStaff';
                input.value = shortName;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</body>

</html>