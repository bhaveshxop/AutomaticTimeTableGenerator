<?php
// Include the database connection file
include('../utils/dbcon.php');

// Function to add a department to the database
function addDepartment($conn, $deptName, $dCode)
{
    $query = "INSERT INTO departments (dept_name, d_code) VALUES ('$deptName', '$dCode')";
    return mysqli_query($conn, $query);
}

// Function to delete a department from the database
function deleteDepartment($conn, $deptId)
{
    $query = "DELETE FROM departments WHERE id = $deptId";
    return mysqli_query($conn, $query);
}

// Check if the Add Department button is clicked
if (isset($_POST['addDepartment'])) {
    // Get values from the input fields
    $deptName = $_POST['departmentName'];
    $dCode = $_POST['departmentCode'];

    // Add the department to the database
    addDepartment($conn, $deptName, $dCode);
}

// Check if the Delete button is clicked
if (isset($_POST['deleteDepartment'])) {
    // Get department ID from the clicked row
    $deptIdToDelete = $_POST['deleteDepartment'];

    // Delete the department from the database
    deleteDepartment($conn, $deptIdToDelete);
}


// Fetch data from the database
$query = "SELECT * FROM departments";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Departments</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link active" href="#">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/class.html">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Staff</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="head">
            <h2>Department List</h2>
        </div>
        <div class="content">
            <form method="post">
                <div class="d-flex mb-3 ">
                    <!-- Input department name -->
                    <input type="text" name="departmentName" class="form-control me-2 mt-2" placeholder="Department name">
                    <!-- Input department code -->
                    <input type="text" name="departmentCode" class="form-control me-2 mt-2" placeholder="Department code">
                    <button type="submit" name="addDepartment" class="btn btn-success mt-2 w-25">Add Department</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Department name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Section</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the fetched data and display it in the table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['id'] . '</th>';
                            echo '<td scope="row">' . $row['dept_name'] . '</td>';
                            echo '<td scope="row">' . $row['d_code'] . '</td>';
                            echo '<td scope="row">Semester</td>';
                            echo '<td scope="row">section</td>';
                            echo '<td>';
                            echo '<button type="button" class="btn btn-primary btn-sm">View</button>';
                            echo ' ';    
                            echo '<button type="button" class="btn btn-danger btn-sm" onclick="deleteDepartment(' . $row['id'] . ')">Delete</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // JavaScript function to confirm and delete a department
        function deleteDepartment(deptId) {
            if (confirm('Are you sure you want to delete this department?')) {
                // If user confirms, submit the form with the department ID
                var form = document.createElement('form');
                form.method = 'post';
                form.action = '';
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'deleteDepartment';
                input.value = deptId;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>


</body>

</html>



