<?php
// Include your database connection file
include '../utils/dbcon.php';

// Fetch department names from the departments table
$departmentsQuery = "SELECT * FROM departments";
$departmentsResult = mysqli_query($conn, $departmentsQuery);

// Fetch years from a static array (you can modify this to fetch from a database if needed)
if (isset($_POST['department'])) {
    $selectedDepartment = $_POST['department'];

    // Fetch years associated with the selected department
    $yearsQuery = "SELECT DISTINCT year FROM departments WHERE id = $selectedDepartment";
    $yearsResult = mysqli_query($conn, $yearsQuery);
    
    // Fetch sections associated with the selected department
    $sectionsQuery = "SELECT DISTINCT sections FROM departments WHERE id = $selectedDepartment";
    $sectionsResult = mysqli_query($conn, $sectionsQuery);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Class Information</title>
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
                        <a class="nav-link" aria-current="page" href="/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./department.php">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pages/class.html">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff.php">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./subjects.php">Subjects</a>
                    </li>

    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
                    <div class="head">
                        <h2>Class Information</h2>
                    </div>
                    <div>
                    <form action="" method="POST">
                        <select name="department" id="department" onchange="this.form.submit()">
                            <option value="">Select department</option>
                            <?php while ($row = mysqli_fetch_assoc($departmentsResult)) : ?>
                                <option value="<?php echo $row['id']; ?>" <?php if(isset($selectedDepartment) && $row['id'] == $selectedDepartment) echo 'selected'; ?>><?php echo $row['dept_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <select name="year" id="year">
                            <option value="">Select year</option>
                            <?php if (isset($yearsResult)) : ?>
                                <?php while ($row = mysqli_fetch_assoc($yearsResult)) : ?>
                                    <option value="<?php echo $row['year']; ?>"><?php echo "Year " . $row['year']; ?></option>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </select>
                        <select name="section" id="section">
                            <option value="">Select section</option>
                            <?php if (isset($sectionsResult)) : ?>
                                <?php while ($row = mysqli_fetch_assoc($sectionsResult)) : ?>
                                    <option value="<?php echo $row['section']; ?>"><?php echo $row['section']; ?></option>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </select>
                        <button type="submit" class="btn btn-success ">Assign</button>
                    </form>
                    
                </div>
                
            </div>
            

            <div className="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Subject code</th>
                            <th scope="col">Type</th>
                            <th scope="col">Staff name</th>
                            <th scope="col">Total in week</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">Python Programming</td>
                            <td scope="row">CS101</td>
                            <td scope="row">Theory</td>
                            <td scope="row">Prof. Shilpa Jadhav</td>
                            <td scope="row">2</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Data Structures</td>
                            <td scope="row">CS102</td>
                            <td scope="row">Theory</td>
                            <td scope="row">Prof. Mahesh Rathod</td>
                            <td scope="row">5</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td scope="row">Python Programming</td>
                            <td scope="row">CS101</td>
                            <td scope="row">Lab</td>
                            <td scope="row">Dr. Pravin Satav</td>
                            <td scope="row">4</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td scope="row">Database Management System</td>
                            <td scope="row">CS103</td>
                            <td scope="row">Theory</td>
                            <td scope="row">Prof. Ashivini Patil</td>
                            <td scope="row">5</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td scope="row">Computer Networks</td>
                            <td scope="row">CS104</td>
                            <td scope="row">Theory</td>
                            <td scope="row">Prof. Archana Jane</td>
                            <td scope="row">4</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>