<?php
include('./utils/dbcon.php'); // Include your database connection file

// Fetch data from the database
$query = "SELECT * FROM departments";
$result = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Your head content goes here -->
</head>

<body>

    <!-- Your navigation bar goes here -->

    <div class="container mt-3">
        <div class="head">
            <h2>Department List</h2>
        </div>
        <div class="content">
            <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-success">Add department</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Department name</th>
                            <th scope="col">Code</th>
                            <!-- Remove Semesters and Sections from the table header -->
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the fetched data and display it in the table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['Id'] . '</th>';
                            echo '<td scope="row">' . $row['DepartmentName'] . '</td>';
                            echo '<td scope="row">' . $row['Code'] . '</td>';
                            // Remove Semesters and Sections from the table rows
                            echo '<td>';
                            echo '<button type="button" class="btn btn-primary btn-sm">View</button>';
                            echo '<button type="button" class="btn btn-danger btn-sm">Delete</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Your script tags and Bootstrap JS go here -->

</body>

</html>
